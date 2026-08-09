'use strict';

const vscode = require('vscode');
const path = require('path');

const OUTPUT_NAME = 'MyStack';

function workspaceFolder(uri) {
    if (uri) return vscode.workspace.getWorkspaceFolder(uri);
    const folders = vscode.workspace.workspaceFolders || [];
    return folders.length === 1 ? folders[0] : undefined;
}

async function chooseWorkspace(uri) {
    const direct = workspaceFolder(uri);
    if (direct) return direct;
    const folders = vscode.workspace.workspaceFolders || [];
    if (!folders.length) {
        vscode.window.showErrorMessage('MyStack: open a workspace folder first.');
        return undefined;
    }
    const picked = await vscode.window.showQuickPick(
        folders.map(folder => ({ label: folder.name, description: folder.uri.fsPath, folder })),
        { placeHolder: 'Select the MyStack workspace to initialize' }
    );
    return picked && picked.folder;
}

async function exists(uri) {
    try { await vscode.workspace.fs.stat(uri); return true; } catch { return false; }
}

async function detectFramework(folder) {
    const loader = vscode.Uri.joinPath(folder.uri, 'library', 'library.php');
    const cli = vscode.Uri.joinPath(folder.uri, 'mystack');
    return (await exists(loader)) && (await exists(cli));
}

function normalizeRelative(value) {
    const normalized = String(value || '.mystack/ide').replace(/\\/g, '/').replace(/^\/+|\/+$/g, '') || '.mystack/ide';
    const segments = normalized.split('/');
    if (segments.some(segment => !segment || segment === '.' || segment === '..' || !/^[a-zA-Z0-9._-]+$/.test(segment))) {
        throw new Error('mystack.stubDirectory must be a safe workspace-relative directory.');
    }
    return segments.join('/');
}

async function safely(action) {
    try { return await action(); }
    catch (error) {
        const message = error instanceof Error ? error.message : String(error);
        vscode.window.showErrorMessage(`MyStack: ${message}`);
        return undefined;
    }
}

async function installStubs(context, folder, showMessage = true) {
    if (!vscode.workspace.isTrusted) {
        vscode.window.showWarningMessage('MyStack: trust this workspace before installing IDE metadata.');
        return false;
    }
    if (!(await detectFramework(folder))) {
        const answer = await vscode.window.showWarningMessage(
            `MyStack framework was not detected in “${folder.name}”. Install IDE metadata anyway?`,
            { modal: true }, 'Install'
        );
        if (answer !== 'Install') return false;
    }

    const configuration = vscode.workspace.getConfiguration('mystack', folder.uri);
    const relativeDirectory = normalizeRelative(configuration.get('stubDirectory'));
    const destinationDirectory = vscode.Uri.joinPath(folder.uri, ...relativeDirectory.split('/'));
    const destination = vscode.Uri.joinPath(destinationDirectory, 'mystack-stubs.php');
    const temporary = vscode.Uri.joinPath(destinationDirectory, `.mystack-stubs.${Date.now()}.tmp`);
    const source = vscode.Uri.file(path.join(context.extensionPath, 'stubs', 'mystack-stubs.php'));

    await vscode.workspace.fs.createDirectory(destinationDirectory);
    const bytes = await vscode.workspace.fs.readFile(source);
    try {
        await vscode.workspace.fs.writeFile(temporary, bytes);
        await vscode.workspace.fs.rename(temporary, destination, { overwrite: true });
    } catch (error) {
        try { await vscode.workspace.fs.delete(temporary); } catch {}
        throw error;
    }

    const intelephense = vscode.workspace.getConfiguration('intelephense', folder.uri);
    const current = intelephense.get('environment.includePaths', []);
    const includePaths = Array.isArray(current) ? [...current] : [];
    if (!includePaths.includes(relativeDirectory)) {
        includePaths.push(relativeDirectory);
        await intelephense.update('environment.includePaths', includePaths, vscode.ConfigurationTarget.WorkspaceFolder);
    }

    if (showMessage) vscode.window.showInformationMessage(`MyStack IDE support is ready in ${folder.name}.`);
    return true;
}

async function openDocumentation() {
    const local = vscode.workspace.workspaceFolders?.[0];
    if (local) {
        const page = vscode.Uri.joinPath(local.uri, 'docs', 'index.html');
        if (await exists(page)) {
            await vscode.env.openExternal(page);
            return;
        }
    }
    await vscode.env.openExternal(vscode.Uri.parse('https://mystack-framework.github.io/mystack/'));
}

async function runCliCommand(command) {
    const folder = await chooseWorkspace();
    if (!folder || !(await detectFramework(folder))) {
        vscode.window.showErrorMessage('MyStack: framework CLI was not found in the selected workspace.');
        return;
    }
    if (!vscode.workspace.isTrusted) {
        vscode.window.showWarningMessage('MyStack: trust this workspace before running framework commands.');
        return;
    }
    const terminal = vscode.window.createTerminal({ name: OUTPUT_NAME, cwd: folder.uri.fsPath });
    terminal.show();
    terminal.sendText(`php mystack ${command}`, true);
}

function activate(context) {
    const status = vscode.window.createStatusBarItem(vscode.StatusBarAlignment.Left, 20);
    status.text = '$(symbol-class) MyStack';
    status.tooltip = 'MyStack Framework tools';
    status.command = 'mystack.showCommands';
    status.show();

    const commands = [
        vscode.commands.registerCommand('mystack.init', uri => safely(async () => {
            const folder = await chooseWorkspace(uri);
            if (folder) await installStubs(context, folder);
        })),
        vscode.commands.registerCommand('mystack.refreshStubs', uri => safely(async () => {
            const folder = await chooseWorkspace(uri);
            if (folder) await installStubs(context, folder);
        })),
        vscode.commands.registerCommand('mystack.openDocumentation', () => safely(openDocumentation)),
        vscode.commands.registerCommand('mystack.doctor', () => safely(() => runCliCommand('doctor'))),
        vscode.commands.registerCommand('mystack.smoke', () => safely(() => runCliCommand('smoke'))),
        vscode.commands.registerCommand('mystack.showCommands', () => safely(async () => {
            const selected = await vscode.window.showQuickPick([
                { label: '$(tools) Initialize workspace', command: 'mystack.init' },
                { label: '$(refresh) Refresh IDE stubs', command: 'mystack.refreshStubs' },
                { label: '$(book) Open documentation', command: 'mystack.openDocumentation' },
                { label: '$(heart) Run doctor', command: 'mystack.doctor' },
                { label: '$(beaker) Run smoke test', command: 'mystack.smoke' }
            ], { placeHolder: 'MyStack Framework' });
            if (selected) await vscode.commands.executeCommand(selected.command);
        }))
    ];
    context.subscriptions.push(status, ...commands);
}

function deactivate() {}

module.exports = { activate, deactivate };

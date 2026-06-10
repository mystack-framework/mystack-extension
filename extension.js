const vscode = require('vscode');
const fs = require('fs');
const path = require('path');

function activate(context) {
    console.log('Mystack Helper is now active!');

    let disposable = vscode.commands.registerCommand('mystack.init', function () {
        const workspaceFolders = vscode.workspace.workspaceFolders;
        if (!workspaceFolders) {
            vscode.window.showErrorMessage('Please open a workspace folder first.');
            return;
        }

        const rootPath = workspaceFolders[0].uri.fsPath;
        const stubSrc = path.join(context.extensionPath, 'stubs', 'mystack-stubs.php');
        const stubDest = path.join(rootPath, '_mystack_stubs.php');

        try {
            // Copy stubs to workspace
            fs.copyFileSync(stubSrc, stubDest);
            
            // Configure settings
            const config = vscode.workspace.getConfiguration();
            let includePaths = config.get('intelephense.environment.includePaths') || [];
            if (!includePaths.includes('./_mystack_stubs.php')) {
                includePaths.push('./_mystack_stubs.php');
                config.update('intelephense.environment.includePaths', includePaths, vscode.ConfigurationTarget.Workspace);
            }

            vscode.window.showInformationMessage('Mystack Framework initialized successfully in this workspace!');
        } catch (err) {
            vscode.window.showErrorMessage('Failed to initialize Mystack: ' + err.message);
        }
    });

    context.subscriptions.push(disposable);
}

function deactivate() {}

module.exports = {
    activate,
    deactivate
};

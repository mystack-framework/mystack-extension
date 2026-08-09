'use strict';

const fs = require('fs');
const path = require('path');
const { spawnSync } = require('child_process');

const root = path.resolve(__dirname, '..');
const readJson = file => JSON.parse(fs.readFileSync(path.join(root, file), 'utf8'));
const packageJson = readJson('package.json');
const snippets = readJson('snippets/snippets.json');
const grammar = readJson('syntaxes/mystack.tmLanguage.json');
const extension = fs.readFileSync(path.join(root, 'extension.js'), 'utf8');

const errors = [];
if (packageJson.publisher !== 'Sakibweb') errors.push('Publisher identity must remain Sakibweb.');
if (!packageJson.contributes?.grammars?.length) errors.push('MyStack grammar is not contributed.');
for (const command of packageJson.contributes?.commands || []) {
    if (!extension.includes(`'${command.command}'`)) errors.push(`Command is not registered: ${command.command}`);
}
if (grammar.scopeName !== 'mystack.injected.php') errors.push('Unexpected grammar scope.');
if (Object.keys(snippets).length < 1000) errors.push('Snippet catalog is unexpectedly small.');
if (!Object.values(snippets).some(item => item.prefix?.includes('mystack:bootstrap'))) errors.push('Canonical bootstrap snippet is missing.');
if (!extension.includes("segment === '..'") || !extension.includes('safe workspace-relative directory')) errors.push('Stub-directory traversal guard is missing.');
if (!extension.includes('workspace.isTrusted')) errors.push('Workspace trust guard is missing.');

const nodeCheck = spawnSync(process.execPath, ['--check', path.join(root, 'extension.js')], { encoding: 'utf8' });
if (nodeCheck.status !== 0) errors.push(nodeCheck.stderr || 'extension.js syntax failed.');
const php = process.platform === 'win32' ? 'php.exe' : 'php';
const phpCheck = spawnSync(php, ['-l', path.join(root, 'stubs', 'mystack-stubs.php')], { encoding: 'utf8' });
if (phpCheck.error) errors.push('PHP executable is required to validate generated stubs.');
else if (phpCheck.status !== 0) errors.push(phpCheck.stdout + phpCheck.stderr);

if (errors.length) {
    console.error(errors.join('\n'));
    process.exit(1);
}
console.log(`MyStack extension validation passed: ${Object.keys(snippets).length} snippets, ${packageJson.contributes.commands.length} commands.`);

# MyStack Framework Helper for VS Code

Official VS Code language support and workspace tooling for [MyStack Framework](https://github.com/mystack-framework/mystack), maintained by [Sakibur Rahman (`sakibweb`)](https://github.com/sakibweb).

MyStack follows the rolling official `main` branch and has no fixed framework version. The extension package uses a normal VS Code Marketplace version only for installation and update delivery; that number is not a MyStack framework version.

## Highlights

- Source-derived PHP IDE stubs for all framework libraries, including `PHRO`, `PHDB`, `PHJS`, `PHUI`, `PHAU`, `PHPA`, `PHFY`, `PHMO`, `PHTP` and their public companion classes.
- 2,400+ snippets covering public framework methods, PHUI components, PHCS utilities, HTML, PHML and canonical bootstrap patterns.
- MyStack-aware PHP syntax highlighting for framework classes, methods, import paths, placeholders and declarative attributes.
- Safe multi-root workspace initialization with an atomic stub installation.
- Intelephense include-path configuration at workspace-folder scope.
- Commands for opening documentation and explicitly running `mystack doctor` or `mystack smoke`.
- No runtime dependency on Composer, npm packages, Alpine, HTMX, React or Vue.

## Requirements

- VS Code 1.85 or newer.
- PHP available on `PATH` only when using Doctor or Smoke commands.
- A MyStack checkout containing `library/library.php` and the `mystack` CLI for framework command integration.
- A PHP language server such as Intelephense is recommended for completion from the generated stubs.

## Getting started

1. Open the root folder of a MyStack project.
2. Open the Command Palette.
3. Run **MyStack: Initialize Workspace**.
4. Start typing prefixes such as `phro:`, `phdb:`, `phui:`, `phfy:` or `mystack:bootstrap` in a PHP file.

Initialization copies IDE-only metadata to `.mystack/ide/mystack-stubs.php` and adds `.mystack/ide` to the workspace-folder Intelephense include paths. It does not modify application source, framework libraries or system `PATH`.

> Do not import or require the generated stub file at runtime. It contains declarations only for editor analysis.

## Commands

| Command | Purpose |
| --- | --- |
| `MyStack: Initialize Workspace` | Detect MyStack, install stubs atomically and configure the language server. |
| `MyStack: Refresh IDE Stubs` | Recopy the extension's current source-derived stubs. |
| `MyStack: Open Documentation` | Open local generated docs when available, otherwise open official documentation. |
| `MyStack: Run Doctor` | Open a dedicated terminal and run `php mystack doctor`. |
| `MyStack: Run Smoke Test` | Open a dedicated terminal and run `php mystack smoke`. |
| `MyStack: Show Commands` | Open the compact MyStack command picker from the status bar. |

## Snippet families

| Prefix | Examples |
| --- | --- |
| `mystack:` | `mystack:bootstrap` |
| `phro:` | Router and security APIs |
| `phdb:` | Prepared CRUD, schema, transaction and streaming APIs |
| `phui:` / `ui:` | Reusable MyStack UI elements and sections |
| `phjs:` | PHP-to-JavaScript builder APIs |
| `phfy:` | Notification and Web Push APIs |
| `phmo:` | Monitoring, health, metrics and logging APIs |
| `phpa:` | Payment and courier APIs |
| `class:` | PHCS utility classes |
| `html:` | Semantic HTML snippets |

Snippet signatures are generated from executable framework source. Existing curated PHCS, HTML and PHUI entries are retained and validated during regeneration.

## Settings

### `mystack.stubDirectory`

Workspace-relative directory used for IDE stubs. Default: `.mystack/ide`.

The configured value is normalized as a relative path. Workspace writes and CLI execution are disabled until the workspace is trusted.

## Maintainer workflow

Regenerate metadata against a local MyStack checkout:

```bash
php scripts/sync-framework.php --framework=/absolute/path/to/mystack
npm test
npm run package
```

The generator loads only an explicitly selected trusted framework checkout, discovers library symbols through Reflection, writes stubs and snippets atomically, and never runs automatically in an extension host.

Validation checks JSON manifests, command registration, JavaScript syntax, stub PHP syntax, grammar registration and minimum snippet coverage.

## Security and privacy

- No analytics, telemetry, account login or background network request.
- No command executes automatically when a workspace opens.
- File installation and terminal commands require a trusted workspace.
- External documentation opens only after an explicit user command.
- Stub installation is restricted to the selected workspace folder and uses an atomic replacement.

See [SECURITY.md](SECURITY.md) for vulnerability reporting and trust boundaries.

## Troubleshooting

**Completion is missing**

Run **MyStack: Refresh IDE Stubs**, then restart the PHP language server. Confirm `.mystack/ide` appears in `intelephense.environment.includePaths` for the workspace folder.

**Framework not detected**

Open the folder containing both `library/library.php` and `mystack`, or select the correct folder in a multi-root workspace.

**Doctor/Smoke command does not start**

Confirm `php` is available from the integrated terminal. The extension intentionally does not discover or alter a system PHP installation.

## License and ownership

Copyright © 2026 Sakibur Rahman (`sakibweb`). The extension is distributed under the [MIT License](LICENSE). MyStack Framework itself is distributed under its own Apache License 2.0 and `NOTICE` terms.

- Organization: https://github.com/mystack-framework
- Framework: https://github.com/mystack-framework/mystack
- Issues: https://github.com/mystack-framework/mystack/issues

Unofficial modified extensions must not represent themselves as the official MyStack Framework Helper.

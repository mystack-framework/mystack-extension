# Contributing

Issues and pull requests are welcome for review. Public contribution does not grant direct write, merge, release or official-update authority; Sakibur Rahman (`sakibweb`) and explicitly authorized maintainers make official decisions.

## Development checklist

1. Keep changes framework-only and avoid project-specific paths, names or secrets.
2. Preserve workspace trust checks and multi-root behavior.
3. Regenerate stubs/snippets from a trusted current MyStack checkout when public APIs change.
4. Run `npm test` and confirm the generated stub passes `php -l`.
5. Update README and CHANGELOG for user-visible behavior.
6. Do not commit temporary files or stale VSIX packages.

Use focused commits and clearly identify modified files in derivative distributions.

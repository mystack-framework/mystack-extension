# Security Policy

## Supported code

Security fixes target the current extension source on the official repository. MyStack and this extension follow rolling source development; there is no framework-version support matrix.

## Reporting a vulnerability

Do not publish exploit details, secrets or private project data in a public issue. Contact the owner through the official [`sakibweb`](https://github.com/sakibweb) profile and provide:

- affected command or file;
- reproduction steps;
- expected and observed behavior;
- impact and suggested mitigation, if known.

## Trust boundaries

- Snippets and grammar highlighting are passive editor metadata.
- Stub installation writes only inside the explicitly selected workspace.
- Doctor and Smoke execute only after a user command and require workspace trust.
- The maintainer sync script loads a framework checkout only when explicitly run from a terminal; use it only with trusted source.
- The extension performs no telemetry or automatic remote request.

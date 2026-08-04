# Versioning Guide

Track releases in files only — **the website does not load or display the version** (no runtime impact, nothing shown in the UI).

## Files to update

| File | Purpose |
|------|---------|
| `docs/version.txt` | Current version number only (e.g. `1.2.0`) — for you / deploy notes |
| `CHANGELOG.md` | What changed in each release |

## Do not add version to

- `includes/config.php` — no `APP_VERSION` or similar constants
- Footer, header, or any page HTML
- JavaScript or CSS loaded on every page

## Version rules (SemVer)

- **MAJOR** (`2.0.0`): Breaking changes, major redesign
- **MINOR** (`1.2.0`): New features, pages, navigation changes
- **PATCH** (`1.1.1`): Bug fixes, copy/CSS fixes

## Workflow

1. Make your changes in the relevant PHP/CSS/JS files.
2. Set `docs/version.txt` to the new version.
3. Add a `## [x.y.z] - YYYY-MM-DD` block at the top of `CHANGELOG.md`.
4. Deploy the files you changed (version files are optional on the server).

## Example

```text
# docs/version.txt
1.2.0
```

```markdown
## [1.2.0] - 2026-06-01

### Changed
- Training Program menu items
```

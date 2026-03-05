# Wild Rose Realty Site

Website codebase for the Wild Rose Realty WordPress installation.

## Project Overview

This repository contains a hosted WordPress site snapshot and related server files.

- Primary site files live under `hannaht7.sg-host.com/public_html/`
- Standard WordPress core directories are included (`wp-admin`, `wp-content`, `wp-includes`)
- Hosting logs and stats are present under `hannaht7.sg-host.com/logs/` and `hannaht7.sg-host.com/webstats/`

## Repository Structure

```text
WildRoseRealty-site/
├── .gitignore
└── hannaht7.sg-host.com/
    ├── logs/
    ├── public_html/
    │   ├── wp-admin/
    │   ├── wp-content/
    │   ├── wp-includes/
    │   ├── wp-config.php
    │   └── index.php
    └── webstats/
```

## Requirements

To run this site locally, you typically need:

- PHP (compatible with your WordPress version)
- MySQL or MariaDB
- A local web server (Apache or Nginx)

Optional local tooling:

- [Local](https://localwp.com/)
- [MAMP](https://www.mamp.info/)
- [Docker](https://www.docker.com/)

## Local Development Setup

1. Clone this repository.
2. Serve `hannaht7.sg-host.com/public_html/` as your web root.
3. Create a local database.
4. Copy/update `wp-config.php` database credentials for your local environment.
5. Import your WordPress database dump (if available).
6. Update site URLs for local development if needed.

### Example URL updates (WP-CLI)

```bash
wp search-replace 'https://your-production-domain.com' 'http://localhost:8080' --skip-columns=guid
```

## Deployment Notes

- This repo mirrors a hosted WordPress directory layout.
- Keep secrets out of version control:
  - Database passwords
  - API keys
  - Any server-specific credentials
- Prefer environment-specific configuration where possible.

## Updating WordPress

Before updates:

1. Back up files and database.
2. Confirm plugin/theme compatibility.
3. Apply updates in staging first when possible.

After updates:

1. Verify frontend pages.
2. Verify admin login and key workflows.
3. Commit only intended file changes.

## Backups

Recommended backup cadence:

- Database: daily
- Uploads (`wp-content/uploads`): daily or weekly depending on content changes
- Full site files: weekly

## Git Workflow

Typical workflow:

```bash
git checkout -b chore/update-readme
# make changes
git add .
git commit -m "docs: update README"
git push origin chore/update-readme
```

## Notes

- `wp-config.php` exists in this repository; ensure no sensitive values are committed.
- Keep `.gitignore` up to date for logs, caches, and local-only files.

## License

WordPress core is licensed under GPLv2 or later. Theme and custom code licensing should be documented separately if applicable.

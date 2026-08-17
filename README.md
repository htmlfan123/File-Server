# File Server

A small, lightweight file manager built with HTML, JavaScript and PHP. It provides a minimal web interface to upload, list, download, delete and zip multiple files. This project is intended as a simple example or starting point — it is not hardened for production use.

## Features

- Upload single files via a simple form
- List available files with download and delete actions
- Select multiple files and download them as a ZIP archive
- Small, dependency-free front-end (single `index.html`) and a single PHP backend script (`code.php`)

## Stack

- Languages: HTML, JavaScript, PHP
- Requirements: PHP 7.0+ with the ZipArchive extension enabled

## Quick start

1. Clone the repository:

   git clone https://github.com/htmlfan123/File-Server.git
   cd File-Server

2. Start a PHP development server from the project root (recommended for testing):

   php -S 0.0.0.0:8000

3. Open your browser and visit:

   http://localhost:8000/index.html

The application will automatically create an `uploads/` directory next to `code.php` when first used.

## Configuration

- Upload directory: The backend stores files in the `uploads` directory. To change this, edit the `$dir` variable at the top of `code.php`.

## Security & hardening (important)

This example is intentionally minimal. Before using this in any exposed environment, review and implement the following protections:

- Validate uploaded file types and enforce a whitelist (do not rely solely on file extension).
- Limit maximum upload sizes (`upload_max_filesize` and `post_max_size` in php.ini) and enforce server-side checks.
- Store uploads outside the web root or serve them through an access-controlled script to prevent direct execution.
- Set strict filesystem permissions on the upload directory (owned by the web server user, not world-writable).
- Sanitize filenames more robustly and avoid relying only on `basename()` when path security matters.
- Implement authentication and authorization if files should not be public.
- Disable execution of uploaded files (for example, do not allow `.php` files to be uploaded and executed).

## Development notes

- The front-end is `index.html` (vanilla JS). The backend logic is in `code.php`.
- `code.php` exposes actions via a simple `action` query parameter:
  - `action=upload` — POST with `file` to upload
  - `action=list` — returns an HTML fragment listing files
  - `action=download&file=<name>` — downloads a single file
  - `action=delete&file=<name>` — deletes a single file
  - `action=zip` — POST with `files[]` to create and return a ZIP archive

## Contributing

Contributions are welcome. If you make improvements (especially around security or tests), please open a pull request describing the changes.

# File Server

A small, file manager built with PHP and html.
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


  - `action=zip` — POST with `files[]` to create and return a ZIP archive

## Contributing

Contributions are welcome. If you make improvements (especially around security or tests), please open a pull request describing the changes.

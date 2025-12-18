This folder provides a centralized database connection used by the application.

Usage:
- Include the file from any script with:
  `require_once __DIR__ . '/../includes/db.php';`

The file sets `$conn` as a mysqli connection and sets `utf8mb4` charset.
If your script is in a different directory, use an appropriate relative path (prefer `__DIR__` based paths for robustness).
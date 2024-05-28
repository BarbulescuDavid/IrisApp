# IrisApp
Requirements:
 * PHP 8+
 * Symfony
 * Composer
 * Symfony Cli
Steps:
 * Run composer install to make sure everything is up to date
 * Run: symfony server:start -d
 * Open http://127.0.0.1:8000
Debug routes:
 * For integer to string use the followin route /debug/number-to-title/<int>
 * For string to integer use the following route /debug/title-to-number/<string>

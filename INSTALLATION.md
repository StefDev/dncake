dncake
======
Installation instructions (not completed yet)
---------------------------------------------

1. Install current [CakePHP](http://www.cakephp.org "CakePHP") version as described on the website.

2. After creating the tables in the database create a config file for the connection in `/app/Config` named `dbconn.php`. It defines some database variables used in `database.php`:

```php
define("DNDBHOST", "<DBHOST>");
define("DNDBUSER", "<DBUSER>");
define("DNDBPASS", "<DBPASS>");
define("DNDBNAME", "<DBNAME>");
```
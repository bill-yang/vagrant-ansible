<?php
class Application
{
    // MySQL connection
    const DBHOST = '192.168.56.201'; // '127.0.0.1'
    const DBNAME = 'dev';
    const DBUSER = 'dev';
    const DBPASS = 'dev';

    public function __construct()
    {
    }
 
    public function info()
    {
        // Show all information, defaults to INFO_ALL
        phpinfo();

        // Show just the module information.
        // phpinfo(8) yields identical results.
        phpinfo(INFO_MODULES);
    }

    public function dbCheck()
    {
        // MySQL params
        $dbhost = self::DBHOST;
        $dbname = self::DBNAME;
        $dbuser = self::DBUSER;
        $dbpass = self::DBPASS;

        $connect = mysqli_connect($dbhost, $dbuser, $dbpass) or die("Unable to Connect to '$dbhost'");
        mysqli_select_db($connect, $dbname) or die("Could not open the db '$dbname'");
        if ($connect) {
            echo "==> Connected to MySQL database [$dbname] at host [$dbhost] successfully.";
        } else {
            echo "==> Error: Could not connect to the database $dbname at $dbhost";
        }
    }
}
$app = new Application();
$app->dbCheck();
$app->info();
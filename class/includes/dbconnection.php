<?php 
// DB credentials.
define('DB_HOST','sql211.epizy.com');
define('DB_USER','epiz_32081667');
define('DB_PASS','lw58YRZ71Jqzh3');
define('DB_NAME','epiz_32081667_studentmsdb');
// Establish database connection.
try
{
$dbh = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME,DB_USER, DB_PASS,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
}
catch (PDOException $e)
{
exit("Error: " . $e->getMessage());
}
?>

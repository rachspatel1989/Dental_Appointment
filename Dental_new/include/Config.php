<?php

/**
 * Database config variables
 */

define("DB_HOST", "localhost");
define("DB_USER", "root");
define("DB_PASSWORD", "");
define("DB_DATABASE", "dental");

//define("DB_HOST", "182.50.133.79");
//define("DB_USER", "yogintec_dental");
//define("DB_PASSWORD", "Ojaskikani27");
//define("DB_DATABASE", "yogintec_dental");

class DB_Class {

    function __construct() {
        $connection = @mysql_connect(DB_HOST, DB_USER, DB_PASSWORD) or die('Oops connection error -> ' . mysql_error());
        mysql_select_db(DB_DATABASE, $connection) or die('Database error -> ' . mysql_error());
    }

}
?>

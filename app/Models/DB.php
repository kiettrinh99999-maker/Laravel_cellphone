<?php
    class Database {
        private static $dbh;

        public static function connect() {
            $host = "mysql:dbname=main_database;host=localhost";
            $username = "user_laravel";
            $password = "";
            try {
                self::$dbh = new PDO( $host, $username, $password );
                self::$dbh->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT );
                self::$dbh->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );
                self::$dbh->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
            } catch( PDOException $e ){
                $error_message = $e->getMessage();
                exit();
            }
            return self::$dbh;
        }
    }
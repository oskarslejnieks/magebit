<?php

class Dbh {
    protected function connect() {
        try {
            $username = 'oskars';
            $password = 'localhost';
            $conn = new PDO('mysql:host=localhost; dbname=magebit', $username, $password);
            return $conn;
        }
        catch(PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
        }
    }
}
<?php

    define("DATABASE_URL", "127.0.0.1");
    define("DATABASE_USER", "root");
    define("DATABASE_PASSWORD", "password");
    define("DATABASE_NAME", "departments_database");

    $database_connector = mysqli_connect(DATABASE_URL, DATABASE_USER, DATABASE_PASSWORD, DATABASE_NAME);

?>
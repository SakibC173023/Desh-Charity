<?php

    function connect()
    {
         $host = 'localhost';
         $user = 'root';
         $pwd = '';
         $dbName = 'desh_charity';

         $dsn = 'mysql:host='.$host.';dbname='.$dbName;
         $pdo = new PDO($dsn,$user,$pwd);
         $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);
         return $pdo;
    }

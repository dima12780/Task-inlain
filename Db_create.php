<?php

    require_once "Db.php";

    $Db = new DBMySQl();

    // Создание базы данных
    $Db->query($Db->connect(), "CREATE DATABASE IF NOT EXISTS ".$Db->base.";");
    // cоздание таблиц
    $Db->connect = $Db->connect();

    // таблица posts
    $table_posts = "CREATE TABLE posts (
            id INT(10) AUTO_INCREMENT PRIMARY KEY,
            userId INT(7) ,
            title VARCHAR(30) ,
            body VARCHAR(300) 
            );";
    $Db->query($table_posts);

    // таблица comments
    $table_coom = "CREATE TABLE comments (
        id INT(6) AUTO_INCREMENT PRIMARY KEY,
        postId INT(10) REFERENCES posts (id),
        name VARCHAR(50) ,
        email VARCHAR(30) ,
        body VARCHAR(300) 
        );";
    $Db->query($table_coom);



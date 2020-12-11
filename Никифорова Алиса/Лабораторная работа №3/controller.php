<?php 
    $dbhost = "localhost"; //адрес локального сервера
    $dbname = "articles"; //имя базы данных
    $username = "root";
    $password = "";
    $charset = 'utf8';

    $db = new PDO("mysql:host=$dbhost; dbname=$dbname", $username, $password); //экземпляр класса

    function getPage($id) {
        global $db;
        $request = $db->prepare("SELECT * from articles WHERE `id_articles` = ?");
        $request->execute(array($id));
        $data = $request->fetch();
        return $data;
    }

    function getNav()
    {
        global $db;
        $request = $db->prepare("SELECT id_articles, title_articles from articles");
        $request->execute();
        $data = $request->fetchAll();
        return $data;
    }

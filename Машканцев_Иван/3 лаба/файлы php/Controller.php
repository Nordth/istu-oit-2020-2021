<?php
    class DB
    {
        public $dbh;
        function __construct()
        {
            $host = 'localhost';
            $db = 'lab1oit';
            $user = 'root';
            $pass = 'usbw';
            $charset = 'utf8';
            $dsn = "mysql:host=$host;dbname=$db;charset=$charset";

            $opt =
            [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
            ];

            try
            {
                $this->dbh = new PDO($dsn, $user, $pass, $opt);
            }
            catch (PDOException $e)
            {
                print "Error!: " . $e->getMessage() . "<br/>";
                die();
            }
        }
    }

    function getPage($id)
    {
        $db = new DB();

        $request = $db->dbh->prepare("SELECT * from articles WHERE `id_articles` = ?");
        $request->execute(array($id));
        $data = $request->fetch();
        return $data;
    }
    function getNav()
    {
        $db = new DB();

        $request = $db->dbh->query("SELECT id_articles, title_articles, text_articles, text_art from articles");
        $request->execute();
        $data = $request->fetchAll();

        return $data;
    }
    function getMain()
    {
        $db = new DB();

        $request = $db->dbh->query("SELECT text_articles from articles WHERE id_articles = 5");
        $request->execute();
        $data = $request->fetch();
        
        return $data;
    }
?>

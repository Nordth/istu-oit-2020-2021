<?php
class DB
{
	public $dbh;
	public $dbhon;
	function __construct()
	{
		$host = '127.0.0.1';
		$db = 'data';
		$dbon = 'online';
		$user = 'root';
		$pass = '';
		$charset = 'utf8';
		$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
		$dsnon = "mysql:host=$host;dbname=$dbon;charset=$charset";
		$opt =[
		PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
		PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
		PDO::ATTR_EMULATE_PREPARES => false,];
		try
		{
			$this->dbh = new PDO($dsn, $user, $pass, $opt);
			$this->dbhon = new PDO($dsnon, $user, $pass, $opt);
		}
		catch (PDOException $e)
		{
			print "Error!: " . $e->getMessage() . "<br/>";
			die();
		}
	}
}
function getPage($id){
	$db = new DB();
	$request = $db->dbh->prepare("SELECT * from articles WHERE `id_articles` = ?");
	$request->execute(array($id));
	$data = $request->fetch();
	return $data;
}
function getNav(){
	$db = new DB();
	$request = $db->dbh->prepare("SELECT id_articles, title_articles from articles");
	$request->execute();
	$data = $request->fetchAll();
	return $data;
}
function on_line($ip, $time) {
	$wine = 300;
	$table_online = "online";
	$table_max = "max";
	$db= new DB();
	$request = $db->dbhon->prepare("DELETE FROM $table_online WHERE `unix`+$wine < ? OR `ip` = ?");
	$request->execute([$time, $ip]);
	$request = $db->dbhon->prepare("INSERT INTO $table_online VALUES ('1',?,?)");
	$request->execute($ip, $time);
	$request = $db->dbhon->prepare("SELECT `id` FROM $table_online");
	$request->execute();
	$online_people = count($request->fetchAll()); 
	$online_people = (string) $online_people;
	$request = $db->dbhon->prepare("SELECT `maxonline` FROM $table_max WHERE `crutch`='0'");
	$request->execute();
	$result_max=$request->fetchAll()[0]['maxonline'];
	$rain = strlen($online_people);
	if($rain>$result_max){
		$request = $db->dbhon->prepare("DELETE FROM $table_max WHERE `crutch`='0'");
		$request->execute();
		$request = $db->dbhon->prepare("INSERT INTO $table_max VALUES ('0','$rain') ");
		$request->execute();
		$result_max=$rain;
		}
	return "На сайте: <strong>".$rain."</strong> Макс: <strong>".$result_max."</strong>";
}
?>
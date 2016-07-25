<?
	include_once("db.php");
	unset($_SESSION['password']);
	unset($_SESSION['login']); 
	unset($_SESSION['id']);
	echo "<meta http-equiv='Refresh' content='0; URL=../index.php'>";
?>
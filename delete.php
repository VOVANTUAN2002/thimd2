<?php
include_once('db.php');
$db = new db();
$connect = $db->connect();
$sql =  "DELETE FROM `products` WHERE mahang = '" . $_GET['mahang'] . "'";
$connect->exec($sql);
header("Location: index.php");
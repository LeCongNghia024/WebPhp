<?php

$db = new Database();

$id = $_GET['id'];
$sql =  $db->pdo->prepare("DELETE FROM product where id = $id ");

$sql->execute();


?>
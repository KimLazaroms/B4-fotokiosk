<?php
session_start(); 
$username = $_POST['username'];
$password = $_POST['password'];

require_once '../../../config/conn.php';

$query = "SELECT * FROM users WHERE username = :username"; //Voer hier zelf de juiste database toe
$statement = $conn->prepare($query);
$statement->execute([
    ":username" => $username,
]);

$user = $statement->fetch(PDO::FETCH_ASSOC);

if($statement->rowCount() < 1)
{
    die ("Error: account bestaat niet!");
}

if(!password_verify($password, $user['password']))
{
    die ("Error: wachtwoord onjuist!"); 
}

$_SESSION['user_id'] = $user['ID'];
$_SESSION['username'] = $user['username'];

$msg = "U bent nu ingelogd";	
header("location: ../../../index.php?msg=$msg");

?>
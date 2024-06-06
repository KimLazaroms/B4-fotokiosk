<?php

$naam = $_POST['naam'];
$achternaam = $_POST['achternaam'];
$email = $_POST['email'];
$username = $_POST['username'];
$password = $_POST['password'];

// Backend validation
// if (empty($naam) || empty($achternaam) || empty($username) || empty($password) || empty($email) || empty($afdeling)) {
//     $msg = "Vul alle velden in om te registreren.";
//     header("location:");
//     exit;
// }

$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// $msg = "Uw account is succesvol geregistreerd.";


require_once '../../../config/conn.php';

$query = "INSERT INTO users (naam, achternaam, email, username, password) VALUES (:naam, :achternaam, :email, :username, :password)";

$statement = $conn->prepare($query);

$statement->execute([
    ":naam" => $naam,
    ":achternaam" => $achternaam,
    ":email" => $email,
    ":username" => $username,
    ":password" => $hashed_password,
]);

$_SESSION['username'] = $username; // Update to use the correct variable
$_SESSION['naam'] = $naam; // Update to use the correct variable
$_SESSION['achternaam'] = $achternaam; // Update to use the correct variable
$_SESSION['email'] = $email;

header("Location: ../../../../PRA_B4_FOTOKIOSK/login.php?");
    
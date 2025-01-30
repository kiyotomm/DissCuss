<?php

error_reporting(E_ALL); // Report all errors
ini_set('display_errors', 1); // Display errors on the screen

session_start();
$host = 'localhost'; // Replace with your DB host
$dbname = 'disscuss'; // Replace with your DB name
$db_username = 'root'; // Replace with your DB username
$db_password = ''; // Replace with your DB password
$username = htmlspecialchars($_POST['username']);
$password = $_POST['password'];

 $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $db_username, $db_password);
 $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 //  SQL query to fetch data from the `posts` table
 $sql = "SELECT * FROM users WHERE username =:username";
 
 // Execute the query
 $stmt = $pdo->prepare($sql);
 $stmt->execute(['username'=>$username]);
 
 //user fetcher
 $result = $stmt->fetch();
 echo 'duck';

if (!$result) {
    
    echo 'dafuck is on username';
    exit();
}

if ($result['password'] !== $password) {
    
    echo 'dafuck password';
    exit();

}

$_SESSION['user'] = ['username'=>$username,'id'=>$result['id']];

header("Location: /");

 // Fetch the data as an associative array
 ?>
<?php
 $username = htmlspecialchars($_POST['username']);
 $password = $_POST['password'];

 $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
 $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

 // SQL query to fetch data from the `posts` table
 $sql = "SELECT * FROM users WHERE username =:username";

 // Execute the query
 $stmt = $pdo->prepare($sql);
 $stmt->execute(['username'=>$username]);

//user fetcher
 $result = $stnt->fetch();

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
 $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
 ?>
<?php require './includes/components/tailwinder.php';
require "./includes/database.php" ?>

<?php
session_start();
$user_username = isset($_POST['username']) ? trim($_POST['username']) : "";
$user_password = isset($_POST['password']) ? trim($_POST['password']) : "";



error_reporting(E_ALL); // Report all errors
ini_set('display_errors', 1); // Display errors on the screen



$pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//  SQL query to fetch data from the `posts` table
$sql = "SELECT * FROM users WHERE username =:username";

// Execute the query
$stmt = $pdo->prepare($sql);
$stmt->execute(['username' => $user_username]);

//user fetcher
$result = $stmt->fetch(); ?>




<div class="flex justify-center w-screen h-[70vh]">

    <?php if (!$result) { ?>

        <div class="flex flex-col items-center justify-center gap-5 w-[97vw] text-4xl font-bold"><span>
                Invalid username or
                password
            </span><a href="/disscuss/login-input.php" class="text-blue-700 underline">login</a></div>

    <?php exit();
    }
    if ($result['password'] !== $user_password) {

        echo 'dafuck password';
        exit();
    } else {

        $_SESSION['user'] = [
            'username' => $result['username'],
            'id' => $result['id']
        ]; ?>

        <div class=" flex flex-col items-center justify-center gap-5 w-[97vw] text-4xl font-bold">Login successful <a
                href="/disscuss" class="text-blue-700 underline">Return to
                homepage</a></div>
    <?php
    } ?>

</div>
<?php
$_SESSION['user'] = ['username' => $user_username, 'id' => $result['id']];

// header("Location: /disscuss");
// Fetch the data as an associative array
?>
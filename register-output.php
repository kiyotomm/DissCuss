<?php require './includes/components/navbar.php';
require "./includes/database.php" ?>
<?php
session_start();
$user_username = isset($_POST['username']) ? $_POST['username'] : "";
$user_password = isset($_POST['password']) ? $_POST['password'] : "";
?>

<?php
?>

<div class="flex justify-center items-center w-screen h-[80vh] text-4xl">

    <?php
    if (empty($user_username) || empty($user_password)) {
        echo '<div class="font-bold text-3xl">Registration failed... please add a username and password</div>';
    } else {
    ?>

    <div class="flex flex-col items-center">
        <p>
            <span class="font-bold text-red-500">
                diss!
            </span>
            you are now a disser!
        </p>
        <a class="underline text-blue-700" href="/disscuss/login-input.php">login now!</a>
    </div>

    <?php
        try {

            $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $stmt = $pdo->prepare("INSERT INTO users (username, password) VALUES (?,?)");
            $stmt->execute([$user_username, $user_password]);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        ?>
    <?php
    }
    ?>



</div>
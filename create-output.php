<?php require "./includes/components/navbar.php" ?>

<?php
$host = 'localhost'; // Replace with your DB host
$dbname = 'disscuss'; // Replace with your DB name
$db_username = 'root'; // Replace with your DB username
$db_password = ''; // Replace with your DB password
$title = isset($_POST['title']) ? $_POST['title'] : "";
$body = isset($_POST['body']) ? $_POST['body'] : "";


?>

<?php
?>

<div class="flex justify-center items-center w-screen h-[80vh] text-4xl">

    <?php
    if (empty($title) && empty($body)) {
    ?>
        <div class="font-bold text-3xl"> Post failed... please add a Title and a body.</div>
    <?php
    } else {
    ?>

        <span class="font-bold text-red-500">
            diss!
        </span>
        succesfully added.

        <?php
        try {

            $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $db_username, $db_password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


            $stmt = $pdo->prepare("INSERT INTO posts (title, body) VALUES (:title, :body)");
            $stmt->execute();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        ?>
    <?php
    }
    ?>

    <?php
    echo $title, $body;
    ?>

</div>
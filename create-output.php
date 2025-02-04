<?php require "./includes/components/tailwinder.php";
require "./includes/database.php" ?>
<?php
session_start();
var_dump($_SESSION);
if (!isset($_SESSION['user']['id'])) {
    echo '<div class="flex justify-center items-center w-screen h-[80vh] text-4xl font-bold text-red-500">
            You must be logged in to post.
          </div>';
    exit;
}

$title = isset($_POST['title']) ? $_POST['title'] : "";
$body = isset($_POST['body']) ? $_POST['body'] : "";
$user_id = $_SESSION['user']['id']; // Correct way to access user ID



?>

<?php
?>

<div class="flex justify-center items-center w-screen h-[80vh] text-4xl">

    <?php
    if (empty($title) || empty($body)) {
        echo '<div class="font-bold text-3xl">Post failed... please add a Title and a Body.</div>';
    } else {
    ?>

        <div class="flex flex-col items-center">
            <p>
                <span class="font-bold text-red-500">
                    diss!
                </span>
                succesfully added.
            </p>
            <a class="underline text-blue-700" href="/disscuss">back</a>
        </div>

        <?php
        try {

            $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $db_username, $db_password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $stmt = $pdo->prepare("INSERT INTO posts (title, body,user_id) VALUES (?, ?,?)");
            $stmt->execute([$title, $body, $user_id]);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        ?>
    <?php
    }
    ?>



</div>
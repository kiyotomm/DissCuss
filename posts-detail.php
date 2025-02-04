<?php require "./includes/components/navbar.php";
require "./includes/database.php";

?>

<?php

try {
    // Create a PDO instance (connect to the database)
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // SQL query to fetch data from the `posts` table
    $sql = "SELECT * FROM posts WHERE id=?";

    // Execute the query
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$_REQUEST['id']]);

    // Fetch the data as an associative array
    $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    // Handle connection errors
    echo "Database connection failed: " . $e->getMessage();
};
?>

<?php
foreach ($posts as $postDetail) { ?>

    <div class="flex  items-start justify-center w-[97vw] min-h-[60vh] break-words">
        <div class="flex flex-col gap-5 w-[50vw]  mt-10">
            <div class="text-4xl font-bold"><?php echo $postDetail['title'] ?></div>
            <div><?php echo $postDetail['body'] ?></div>
        </div>
    </div>
<?php
}
?>
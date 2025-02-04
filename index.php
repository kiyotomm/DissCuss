<?php require './includes/components/navbar.php';
require "./includes/database.php" ?>

<?php
try {
    // Create a PDO instance (connect to the database)
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // SQL query to fetch data from the `posts` table
    $sql = "SELECT * FROM posts";

    // Execute the query
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    // Fetch the data as an associative array
    $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $reverse_posts = array_reverse($posts);

    // Display the fetched data
    foreach ($reverse_posts as $post) {
        $id = $post['id'];
        $title = $post['title'];
        $body = $post['body'];
?>
        <div class="flex flex-col items-center justify-center w-[98vw] <?php echo $id; ?> ">
            <a href="posts-detail.php?id=<?php echo $id; ?> " class="flex justify-center gap-5 border-b-2 p-5  ">
                <div class="flex flex-col gap-7 w-[35vw]">
                    <div class="flex flex-col gap-3  ">
                        <div class="text-2xl font-bold"><?php echo $title; ?></div>
                        <div class="opacity-50 max-w-[32vw] break-words  ">
                            <?php if (strlen($body) > 50) {
                                echo substr($body, 0, 49), "...";
                            } else {
                                echo $body;
                            }
                            ?>
                        </div>
                    </div>
                    <div class="flex justify-between font-extralight">

                        <span><?php echo $post['posted-at'] ?></span>
                    </div>
                </div>
            </a>
        </div>
<?php  }
} catch (PDOException $e) {
    // Handle connection errors
    echo "Database connection failed: " . $e->getMessage();
}
?>
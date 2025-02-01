<?php require './includes/components/navbar.php' ?>

<?php
// Database configuration
$host = 'localhost'; // Replace with your DB host
$dbname = 'disscuss'; // Replace with your DB name
$username = 'root'; // Replace with your DB username
$password = ''; // Replace with your DB password

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

    // Display the fetched data
    foreach ($posts as $post) {
        $id = $post['id'];
?>
        <div class="flex flex-col items-center justify-center  w-screen <?php echo $id; ?> ">
            <a href="posts-detail.php?id=<?php echo $id; ?> " class="flex justify-center gap-5 border-b-2 p-5">
                <div class="flex flex-col gap-7 min-w-[35vw]">
                    <div class="flex-col  ">
                        <div class="text-2xl font-bold"><?php echo $post['title'] ?></div>
                        <div class="opacity-50"><?php echo $post['body']  ?></div>
                    </div>
                    <div class="flex justify-between font-extralight">
                        <div class="flex justify-between gap-3">
                            <!-- <button type="submit" name="liked">
                                <i class="fa-solid fa-heart"></i> <?php echo $post['likes'] ?>
                            </button> -->
                            <!-- <button>
                        <i class="fa-solid fa-comment"></i> <?php echo $post['comments'] ?>
                    </button> -->
                        </div>
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
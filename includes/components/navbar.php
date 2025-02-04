<?php session_start() ?>

<!DOCTYPE html>
<html lang="en">

<?php var_dump($_SESSION['user']); ?>


<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet">
</head>

<body>
    <nav class="flex justify-around p-10">
        <div class="flex gap-4 items-center">
            <a href="/disscuss">
                <h1 class="text-4xl font-bold">DissCuss</h1>
            </a>
            <a href="https://github.com/kiyotomm " target="_blank"><i class="fa-brands fa-github fa-2xl"></i></a>
        </div>

        <div class="p-1">
            <form action="/disscuss/search-output.php" method="POST">
                <input type="text" class="border border-gray-400 rounded w-[30vw] h-[5vh] p-2"
                    placeholder="外語ビジネスニュース..." />
                <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
            </form>
        </div>
        <ul class="flex gap-5 font-bold list-none">
            <a href="/disscuss">
                <li>Home</li>
            </a>
            <!-- <a href="/disscuss/explore.php">
                <li>Explore</li>
            </a> -->
            <a href="/disscuss/create-input.php">
                <li>Create</li>
            </a>
            <a href="<?php if (!isset($_SESSION['user'])) {
                            echo "/disscuss/login-input.php";
                        } else {
                            echo "/disscuss/user.php";
                        } ?>">
                <li><?php if (!isset($_SESSION['user'])) {
                        echo 'guest';
                    } else {
                        echo "<div class=", "font-extrabold ", ">", $_SESSION['user']['username'], "</div>";
                    } ?></li>
            </a>
            <a href="/user.php"></a>
        </ul>
    </nav>
</body>

</html>
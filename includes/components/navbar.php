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
        <a href="/disscuss">
            <h1 class="text-4xl font-bold">DissCuss</h1>
        </a>

        <div class="p-1">
            <input type="text" class="border border-gray-400 rounded w-[30vw] h-[5vh] p-2"
                placeholder="外語ビジネスニュース..." />
            <button><i class="fa-solid fa-magnifying-glass"></i></button>
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
                        echo $_SESSION['user']['username'];
                    } ?></li>
            </a>
            <a href="/user.php"></a>
        </ul>
    </nav>
</body>

</html>
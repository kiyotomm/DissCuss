<?php require "./includes/components/navbar.php";
session_start() ?>


<div class="flex flex-col items-center justify-center w-screen h-[60vh]">
    <div class="flex gap-7 flex-col font-bold text-3xl rounded-lg shadow-xl p-[5vw] mt-[10vh]">
        <div class="font-bold text-3xl self-center mb-9">user details</div>
        <div class="flex gap-[8vw]"><span>Username:</span><?php echo $_SESSION['user']['username'] ?></div>
        <div class="flex gap-[8vw]"><span>Password:</span><?php echo "*******"  ?></div>
        <a href="/disscuss/logout.php" class="self-center mt-5 p-3 rounded-lg bg-blue-600 text-white">logout</a>
    </div>
</div>
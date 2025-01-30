<?php require"./includes/components/navbar.php" ?>

<?php
    $title = $_POST['title'];
    $body = $_POST['body'];
?>


<div class="flex justify-center items-center w-screen h-[80vh] text-4xl">

    <?php
    if (empty($title) && empty($body) ) {
         echo '<div class="font-bold text-3xl"> Post failed... please add a Title and a body</div>';
    } else { ?>

    <span class="font-bold text-red-500">diss!</span>
    succesfully added.

    <?php 
    }
?>

</div>
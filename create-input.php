<?php require './includes/components/navbar.php' ?>


<form action="create-output.php" class="flex flex-col items-center justify-center gap-10 w-screen mt-10">
    <div class="flex flex-col gap-5 w-[30vw]">
        <h2 class="text-3xl">Title</h2>
        <input type="text" name="title" class="border border-gray-400 rounded-full w-[60vh] p-2"
            placeholder="プログラマーがAIに取って代わられる!!" />
    </div>
    <div class="flex flex-col gap-5 w-[30vw]">
        <h2 class="text-3xl">Body</h2>
        <textarea class="border border-gray-400 rounded-md w-[40vw] min-h-20 p-2"
            placeholder="AI making a planet..."></textarea>
    </div>
    <div class="flex items-center justify-center bg-blue-500 p-2 rounded text-white w-[5vw]">
        <input type="submit" name="body" value="Post" class="cursor-pointer self-center" />
    </div>
</form>
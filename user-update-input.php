<?php require "./includes/components/navbar.php"; ?>


<div class="flex flex-col justify-center items-center gap-6  w-[98vw] h-[60vh] ">
    <div class="flex flex-col justify-center items-center gap-6 p-10 rounded-xl  shadow-md">
        <span class="text-3xl">change details</span>
        <form action="user-update-output.php" method="POST" class="flex flex-col gap-10 w-[20vw]">
            <input type="text" name="username" placeholder="new username"
                class="p-2 border rounded-lg border-gray-400 " />
            <input type="password" name="password" placeholder="new password"
                class="p-2 border rounded-lg border-gray-400 " />
            <div class="flex flex-col items-center justify-center gap-5">
                <input type="submit" value="change"
                    class="cursor-pointer self-center p-3 rounded-lg text-white bg-blue-500" />

            </div>

        </form>
    </div>
</div>
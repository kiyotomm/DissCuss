<?php require './includes/components/navbar.php'; ?>



<div class="flex flex-col justify-center items-center gap-6  w-[98vw] h-[60vh] ">
    <div class="flex flex-col justify-center items-center gap-6 p-10 rounded-xl  shadow-md">
        <span class="text-3xl">Register</span>
        <form action="register-output.php" method="POST" class="flex flex-col gap-10 w-[20vw]">
            <input type="text" name="username" placeholder="your name" class="p-2 border rounded-lg border-gray-400 " />
            <input type="password" name="password" placeholder="•••••••••••"
                class="p-2 border rounded-lg border-gray-400 " />
            <div class="flex flex-col items-center justify-center gap-5">
                <input type="submit" value="register"
                    class="cursor-pointer self-center p-3 rounded-lg text-white bg-blue-500" />
                <span>Already registered? <a class="text-blue-700 underline" href="/disscuss/login-input.php">login
                    </a>here.</span>

            </div>
        </form>
    </div>
</div>
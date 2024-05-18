<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        clifford: '#da373d',
                    }
                }
            }
        }
    </script>
</head>
<body>
<section class="p-16 grid place-items-center h-dvh">
    <h1 class="text-5xl font-medium text-clifford mb-5">Ruby Travel&Tours</h1>
    <div class="flex gap-8 w-full justify-center text-white">
            <a href="register-form.php"><button class="w-40 bg-clifford py-4 rounded-full text-center">Register</button></a>
            <a href="login-form.php"><button class="w-40 bg-clifford py-4 rounded-full ">Login</button></a>
    </div>
</section>
</body>
</html>
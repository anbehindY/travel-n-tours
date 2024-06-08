<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.tailwindcss.com"></script>

    <title>Navigation bar</title>

</head>

<body>
<header class="bg-red-500 font-semibold text-white">
    <nav class="flex justify-between  py-4 px-8">
        <ul class="justify-start flex items-center gap-8" >
            <li><a href="dashboard.php">Dashboard</a></li>
            <li><a href="pitch.php">Pitch</a></li>
            <li><a href="pitch-type.php">Pitch Type</a></li>
        </ul>
        <button class="px-2 pt-1 pb-2 border-white border-2 rounded-lg text-center grid place-items-center">
            <a href="logout.php" class="ml-full block">Logout</a>
        </button>
    </nav>
</header>

</body>

</html>
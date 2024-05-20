<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="404/style.css">
    <title>Document</title>
</head>

<body>
    <div class="flex-container">
        <div class="text-center">
            <h1>
                <span class="fade-in" id="digit1">4</span>
                <span class="fade-in" id="digit2">0</span>
                <span class="fade-in" id="digit3">4</span>
            </h1>
            <h3 class="fadeIn">PAGE <?= $_GET['page'] ?> NOT FOUND</h3>
            <a href="?page=general"><button type="button" name="button">Return To Home</button></a>
        </div>
    </div>
</body>

</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= assets('css/style.css') ?>">
    <title>Document</title>
</head>
<body>
    <h1>Coucou</h1>
    <p id="">Server status : <span id="status"></span></p>
    <button id="start-button" class="button">Start</button>
    <button id="stop-button" class="button">Stop</button>
    <div id="loader">Loading</div>
    <div class="page-loader">
        <div class="spinner"></div>
    </div>
    <script src="<?= assets('js/zepto.min.js') ?>"></script>
    <script src="<?= assets('js/script.js') ?>"></script>
</body>
</html>

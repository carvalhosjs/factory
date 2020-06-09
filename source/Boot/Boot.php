<?php
    //create folder
    $main = CONF_THEME_PATH . "/" . CONF_VIEW_THEME;
    $assets = $main . "/assets";
    $css = $assets . "/css";
    $js = $assets . "/js";

    if(!file_exists($main)){
        mkdir($main, 0777, true);
        mkdir($assets, 0777, true);
        mkdir($css, 0777, true);
        mkdir($js, 0777, true);

        //git ignore

        $arquivo = fopen($main . '/home.php', 'w+');

        if ($arquivo == false) die('Não foi possível criar o arquivo.');
        $folder = '<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- CSS -->
    <link rel="stylesheet" href="<?= theme("/assets/style.css"); ?>"/>
    <title>Hello, world!</title>
</head>
<body>
    <div class="container">

    </div>
<!-- JS -->
<script src="<?= theme("/assets/scripts.js"); ?>"></script>
</body>
</html>';

        fwrite($arquivo, $folder);
        fclose($arquivo);


    }

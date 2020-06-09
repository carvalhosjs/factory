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

        $arquivoCSS = fopen($css .'/01-mobile.css', 'w+');
        $txtCSS = "body{background:red}";

        $arquivoCSS2 = fopen($css . '/02-medium.css', 'w+');
        $txtCSS2 = '@media (min-width: 576px) { body{background:green }}';

        $arquivoCSS3 = fopen($css . '/03-large.css', 'w+');
        $txtCSS3 = '@media (min-width: 992px) { body{background:blue}}';

        if ($arquivoCSS == false) die('Não foi possível criar o arquivo.');
        if ($arquivoCSS2 == false) die('Não foi possível criar o arquivo.');
        if ($arquivoCSS3 == false) die('Não foi possível criar o arquivo.');



        fwrite($arquivoCSS, $txtCSS);
        fwrite($arquivoCSS2, $txtCSS2);
        fwrite($arquivoCSS3, $txtCSS3);

        fclose($arquivoCSS);
        fclose($arquivoCSS2);
        fclose($arquivoCSS3);

        //js
        $arquivoJS = fopen($js .'/01-main.js', 'w+');
        $txtJS = 'console.log("Gerado com sucesso!")';
        fwrite($arquivoJS, $txtJS);
        fclose($arquivoJS);


    }

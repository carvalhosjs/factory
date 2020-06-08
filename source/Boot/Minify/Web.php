<?php
if(strpos(url(), "localhost")){
    /**css */
    $minCss = new MatthiasMullie\Minify\CSS();

    //plugins comentar o que não for usado
    //bootstrap
    //$minCss->add(__DIR__ . '/../../../assets/plugins/bootstrap/css/bootstrap-4.5.0.css');
    //lightbox
    //$minCss->add(__DIR__ . '/../../../assets/plugins/lightbox/lightbox-2.1.5.css');
    //swipper
    //$minCss->add(__DIR__ . '/../../../assets/plugins/swipper/swiper-5.4.2.css');
   //toast
    //$minCss->add(__DIR__ . '/../../../assets/plugins/toast/jquery.toast.min.css');
    $confFacs = CONF_FACTORIES;

    $cssDirLib = __DIR__ . '/../../../assets/plugins/';
    foreach ($confFacs as $cssLib){
        $cssFiles = scandir($cssDirLib . $cssLib);
        foreach ($cssFiles as $cssFile){
            $cssF = $cssDirLib . $cssLib . "/"  . $cssFile;
            if(is_file($cssF) && pathinfo($cssF)['extension']=="css"){
                $minCss->add($cssF);
            }
        }
    }

    //my libs

    $cssDir = scandir(__DIR__ . "/../../../themes/" . CONF_VIEW_THEME . "/assets/css");
    foreach($cssDir as $css){
        $cssFile = __DIR__ . "/../../../themes/" . CONF_VIEW_THEME . "/assets/css/{$css}";
        if(is_file($cssFile) && pathinfo($cssFile)['extension'] == "css"){
            $minCss->add($cssFile);
        }
    }

    //minify css

    $minCss->minify(__DIR__ . "/../../../themes/" . CONF_VIEW_THEME . "/assets/style.css");


    /**js */


    $minJs = new MatthiasMullie\Minify\JS();



    //plugins comentar o que não for usado
    //jquery
    //
    /*
    $minJs->add(__DIR__ . '/../../../assets/plugins/jquery/jquery-3.5.1.js');
    //bootstrap
    $minJs->add(__DIR__ . '/../../../assets/plugins/bootstrap/js/bootstrap-4.5.0.js');
    //jqueryFORM
    //form utilizar o ajax_off na class para desativar
    //$minJs->add(__DIR__ . '/../../../assets/plugins/jQueryForm/jquery.form.js');
    //$minJs->add(__DIR__ . '/../../../assets/js/form.js');

    //lightbox
    $minJs->add(__DIR__ . '/../../../assets/plugins/lightbox/lightbox-2.1.5.js');
    //sweetalert2
    $minJs->add(__DIR__ . '/../../../assets/plugins/sweetalert2/sweetalert2@9.js');
    //sweeper
    $minJs->add(__DIR__ . '/../../../assets/plugins/swipper/swiper-5.4.2.js');
    //toast
    $minJs->add(__DIR__ . '/../../../assets/plugins/toast/jquery.toast.min.js');
    //fontawesome
    $minJs->add(__DIR__ . '/../../../assets/plugins/fontawesome/all.min-5.12.0.js');
*/


    $jsDirLib = __DIR__ . '/../../../assets/plugins/';
    foreach ($confFacs as $jsLib){
        $cssFiles = scandir($jsLib . $cssLib);
        foreach ($cssFiles as $cssFile){
            $cssF = $cssDirLib . $cssLib . "/"  . $cssFile;
            if(is_file($cssF) && pathinfo($cssF)['extension']=="css"){
                $minCss->add($cssF);
            }
        }
    }


    //my libs

    //themme js

    $jsDir = scandir(__DIR__ . "/../../../themes/" . CONF_VIEW_THEME . "/assets/js");
    foreach($jsDir as $js){
        $jsFile = __DIR__ . "/../../../themes/" . CONF_VIEW_THEME . "/assets/js/{$js}";
        if(is_file($jsFile) && pathinfo($jsFile)['extension'] == "js"){
            $minJs->add($jsFile);
        }
    }


    //minify
    $minJs->minify(__DIR__ . "/../../../themes/" . CONF_VIEW_THEME . "/assets/scripts.js");


}
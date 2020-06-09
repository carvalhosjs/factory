<?php
if(strpos(url(), "localhost")){
    $confFacs = array_merge(CONF_FACTORIES, MY_LIBS);
    $libPath = __DIR__ . '/../../../assets/plugins/';

    /**css */
    $minCss = new MatthiasMullie\Minify\CSS();

    //libs system
    foreach ($confFacs as $cssLib){
        $cssFiles = scandir($libPath . $cssLib);
        foreach ($cssFiles as $cssFile){
            $cssF = $libPath . $cssLib . "/"  . $cssFile;
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


    /*Libs System */
    $minJs = new MatthiasMullie\Minify\JS();

    foreach ($confFacs as $jsLib){
        $jsFiles = scandir($libPath . $jsLib);
        foreach ($jsFiles as $jsFile){
            $jsF = $libPath . $jsLib . "/"  . $jsFile;

            if(is_file($jsF) && pathinfo($jsF)['extension']=="js"){
                $minJs->add($jsF);
            }
        }
    }


    //my libs
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
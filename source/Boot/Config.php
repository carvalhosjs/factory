<?php
/**
 * PROJECT URLs
 */
define("CONF_URL_BASE", "http://localhost/factory");
define("CONF_URL_TEST", "http://localhost/factory");

/**
 * SITE
 */
define("CONF_SITE_NAME", "Carvalhos");
define("CONF_SITE_TITLE", "Factory");
define("CONF_SITE_DESC", "Carvalhos Factory");
define("CONF_SITE_LANG", "pt_BR");
define("CONF_SITE_DOMAIN", "naus.com");
define("CONF_SITE_ADDR_STREET", "");
define("CONF_SITE_ADDR_NUMBER", "");
define("CONF_SITE_ADDR_COMPLEMENT", "");
define("CONF_SITE_ADDR_CITY", "");
define("CONF_SITE_ADDR_STATE", "");
define("CONF_SITE_ADDR_ZIPCODE", "");

/**
 * DATES
 */
define("CONF_DATE_BR", "d/m/Y H:i:s");
define("CONF_DATE_APP", "Y-m-d H:i:s");

/**
 * VIEW
 */
define("CONF_VIEW_PATH", __DIR__ . "/../../assets/views");
define("CONF_VIEW_EXT", "php");
define("CONF_VIEW_THEME", "factory");

/*libs*/

/*LIBS AVAILABLE
    bootstrap-4.5
    bootstrapgrid-4.5
    fontawesome-5.12
    jquery-3.5
    jqueryform-3.51
    lightbox-2.2
    materialize-1.0
    sweetalert2-9
    swipper-5.4
    toast-2.1
*/

define("CONF_FACTORIES", ['jquery-3.5', 'bootstrap-4.5', 'fontawesome-5.12', 'lightbox-2.2', 'sweetalert2-9', 'swipper-5.4']);
//per project
define("MY_LIBS", []);
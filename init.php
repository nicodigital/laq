<?php // HTML MINIFY
if( !function_exists('minify_output') ):
  function minify_output($buffer){
    $search = array('/\>[^\S ]+/s','/[^\S ]+\</s','/(\s)+/s');
    $replace = array('>','<','\\1');
      if (preg_match("/\<html/i",$buffer) == 1 && preg_match("/\<\/html\>/i",$buffer) == 1) {
        $buffer = preg_replace($search, $replace, $buffer);
      }
      return $buffer;
  }
endif;
ob_start('minify_output');

///////////////////////////// ERRORS ////////////////////////////////
error_reporting(E_ALL);
ini_set('display_errors', 1);

/*////////////////////// FOLDER & DOMAIN ///////////////////////////*/
$site_name    = 'LAQ';
$folder_name  = $slug = "laq";
$project_name = ucfirst($folder_name);
$domain       = "https://laq.com.uy/";
$claim        = "Live Better • Parque Miramar";

/*//////////////////////////// ROUTING /////////////////////////////*/
/*if is localhost*/
if ( $_SERVER['SERVER_NAME'] == "clientes.com" ){
  $home_url = "http://clientes.com/i+D/laq/www/";
}else if( $_SERVER['SERVER_NAME']=="localhost" ){
  $home_url = 'http://localhost/laq/';
}else if( $_SERVER['SERVER_NAME']=="127.0.0.1" ){
  $home_url = 'http://127.0.0.1:5500/';
}else if( $_SERVER['SERVER_NAME']=="testing.idmedia.uy.com" ){
  $home_url = "http://testing.idmedia.com/laq";
}else{
  $home_url = $domain;
}

// $home_url = "http://localhost/laq/";
// $home_url = "http://testing.idmedia.uy/laq/";

$url            = strtok("http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]", '?');
$root_url       = "http://$_SERVER[HTTP_HOST]";
$current_folder = dirname($_SERVER['PHP_SELF']);
$current_page   = $root_url.$current_folder;
$current_url    = $_SERVER['REQUEST_URI'];
$url_array      = explode('/',$url);
$pageTag        = end($url_array);
$fileName       = $pageTag;
$page           = $fileName;
$page_title     = str_replace('-',' ',$fileName);

/*///////////////////////// FORCE PAGE NAME ////////////////////////*/

if( $page == '' || $page =='index.php' || $page =='index' ){
    $page = 'home';
  }

/*//////////////////////// MOBILE DETECT /////////////////////////////*/
require 'inc/Mobile_Detect.php';
$detect = new Mobile_Detect;

/*////////////////////// FILES VERSIÓN & CACHE //////////////////////*/
$cache = '?v='.time();
// $cache = '';

if($cache !=""){
  header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
  header("Cache-Control: post-check=0, pre-check=0", false);
  header("Pragma: no-cache");
}

// $css = 'style.min.css';
$css = 'style.css';
$style_url = $css.$cache;

// $js = 'scripts.min.js';
$js = 'scripts.js';
$js_url = $js.$cache;

/* Google Captcha Keys */
/* Debes colocar la clave secreta en el archivo inc/send-form.php */
$recaptcha_key = "6LdYLT0bAAAAABJXCBXC3qUgWd5vJrkCNHRnZaUg"; // Testing
//$recaptcha_key = ""; // Producción

/* //////////////////////// INCLUDES ////////////////////////*/
// En caso de migrar a Wordpress mover estos al funcntions.php

include 'inc/detect-platform.php';
include 'inc/conditionals.php';
include 'inc/tools.php';
include 'inc/plantas.php';
include 'inc/global-data.php';
// include 'lang/'.$lang.'/i18n.php';

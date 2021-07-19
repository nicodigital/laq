<?php

/* GET LANG  */
if (isset($_GET['lang'])){
	$lang = $_GET['lang'];
}else{
	$lang = 'es' ;
}

if ( defined( 'ABSPATH' ) ) {
	$site_type = 'wp';
}else{
	$site_type = 'html';
}

if ( $detect->isMobile() ) {
  $device = 'mobile';
}else{
  $device = 'desktop';
}

switch ($page) {
	case 'home':
		$header_version = 'header-light';
		$logo_version 	= 'logo-light.svg';
		break;

	default:
		$header_version = '';
		$logo_version 	= 'logo-light.svg';
		break;
}
<!-- preload fonts -->
<link rel="preload" href="fonts/canela.woff2" as="font" type="font/woff2" crossorigin >
<link rel="preload" href="fonts/icomoon.ttf" as="font" type="font/ttf" crossorigin >
<link rel="preload" href="fonts/icomoon.woff" as="font" type="font/woff" crossorigin >

<!-- preload scripts -->
<?php if (!$detect->isMobile() && $platform == 'windows') {  ?>
<link rel="preload" href="https://cdnjs.cloudflare.com/ajax/libs/smoothscroll/1.4.10/SmoothScroll.js" as="script">
<?php } ?>
<link rel="preload" href="scripts.js" as="script">

<!-- preload images -->
<link rel="preload" href="img/logos/logo.svg" as="image" >
<link rel="preload" href="img/icons/arrow-down.svg" as="image" >

<?php

if( $page == 'home' ){
	echo '<link rel="preload" href="img/area.jpg" as="image" >';
	echo '<link rel="preload" href="img/area.webp" as="image" >';
}

if( $page == 'contacto' ){
	echo '<link rel="preload" href="img/contacto.jpg" as="image" >';
	echo '<link rel="preload" href="img/contacto.web" as="image" >';
}

if( $page == 'proyecto' ){
	echo '<link rel="preload" href="img/proyecto.jpg" as="image" >';
	echo '<link rel="preload" href="img/proyecto.web" as="image" >';
}

if( $page == 'residencia' ){

	echo '<link rel="preload" href="img/residencias.jpg" as="image" >';
	echo '<link rel="preload" href="img/residencias.webp" as="image" >';

	$preload_planos = '';
	$files = array();

	if ($handle = opendir('plantas/planos')) {
	    while (false !== ($photo = readdir($handle))) {
	        if ($photo != "." && $photo != ".." && $photo != "desktop.ini" && $photo != "thumbs" &&  $photo != "respaldo") {
	           $files[] = $photo;
	        }
	    }

	       foreach ($files as $file ) {
	       		$preload_planos.='<link rel="preload" href="plantas/planos/'.$file.'" as="image" >';
	       		$preload_planos.='<link rel="preload" href="plantas/sketch/'.$file.'" as="image" >';
	        }
	        closedir($handle);
	    }

	echo $preload_planos;

}
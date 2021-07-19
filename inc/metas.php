<?php
/*/////////////////////////// PAGE TITLE ///////////////////////////*/

if( $page == 'home'){
  $page_title = $project_name." &#8226; ".$claim;
}else{
  $page_title = ucfirst($page)." &#8226; ".$project_name;
}

/*////////////////////////// DESCRIPTION ///////////////////////////*/
// Esta debe tener hasta 150 caracteres
$description = 'LAQ es un conjunto selecto de residencias frente al lago para disfrutar e invertir en calidad de vida, en el mejor lugar de Parque Miramar.';

?>
<title>
	<?php echo $page_title ?>
</title>
<meta name="description" content="<?php echo $description ?>">
<!-- Open Graph data -->
<meta property="og:title" content="<?php echo $page_title ?>" />
<meta property="og:type" content="article" />
<meta property="og:url" content="<?=$home_url?>" />
<meta property="og:image" content="<?=$home_url?>/img/main-slider/slide-1.jpg" />
<meta property="og:description" content="<?=$description?>" />
<meta property="og:site_name" content="<?php echo $page_title ?>" />
<meta property="article:published_time" content="2013-09-17T05:59:00+01:00" />
<meta property="article:modified_time" content="2013-09-16T19:08:47+01:00" />
<meta property="article:section" content="<?php echo ucfirst($page) ?>" />
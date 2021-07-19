<?php // Ejecutar este php para crear el JSON a utilizar
$plantas = array(
	'E-001' => array(
		'title' 		=> 'E 001',
		'area_dormitorios' 	=> '2 Dormitorios',
		'area_propia' 	=> '108',
		'area_jardin' 	=> '24',
	),
	'E-003' => array(
		'title' 		=> 'E 003',
		'area_dormitorios' 	=> '3 Dormitorios',
		'area_propia' 	=> '175',
		'area_jardin' 	=> '38',
	),
	'E-004' => array(
		'title' 		=> 'E 004',
		'area_dormitorios' 	=> '3 Dormitorios',
		'area_propia' 	=> '156',
		'area_jardin' 	=> '41',
	),
	'E-101' => array(
		'title' 		=> 'E 101',
		'area_dormitorios' 	=> '2 Dormitorios',
		'area_propia' 	=> '108',
		'area_jardin' 	=> '',
	),
	'E-102' => array(
		'title' 		=> 'E 102',
		'area_dormitorios' 	=> '3 Dormitorios',
		'area_propia' 	=> '125',
		'area_jardin' 	=> '',
	),
	'E-103' => array(
		'title' 		=> 'E 103',
		'area_dormitorios' 	=> '3 Dormitorios',
		'area_propia' 	=> '175',
		'area_jardin' 	=> '',
	),	
	'E-104' => array(
		'title' 		=> 'E 104',
		'area_dormitorios' 	=> '3 Dormitorios',
		'area_propia' 	=> '156',
		'area_jardin' 	=> '',
	),	

	// 'E-107' => array(
	// 	'title' 		=> 'E 104',
	// 	'area_dormitorios' 	=> '3 Dormitorios',
	// 	'area_propia' 	=> '156',
	// 	'area_jardin' 	=> '',
	// ),	

	'E-201' => array(
		'title' 		=> 'E 201',
		'area_dormitorios' 	=> '2 Dormitorios',
		'area_propia' 	=> '108',
		'area_jardin' 	=> '29',
	),
	'E-202' => array(
		'title' 		=> 'E 202',
		'area_dormitorios' 	=> '3 Dormitorios',
		'area_propia' 	=> '125',
		'area_jardin' 	=> '38',
	),
	'E-203' => array(
		'title' 		=> 'E 203',
		'area_dormitorios' 	=> '3 Dormitorios',
		'area_propia' 	=> '175',
		'area_jardin' 	=> '',
	),
	'E-204' => array(
		'title' 		=> 'E 204',
		'area_dormitorios' 	=> '3 Dormitorios',
		'area_propia' 	=> '156',
		'area_jardin' 	=> '',
	),	
	'E-303' => array(
		'title' 		=> 'E 303',
		'area_dormitorios' 	=> '3 Dormitorios',
		'area_propia' 	=> '208',
		'area_jardin' 	=> '',
		'area_terrazas' => '36',		
		'area_boxtender'=> '10',
	),
	'W-005' => array(
		'title' 		=> 'W 005',
		'area_dormitorios' 	=> '3 Dormitorios',
		'area_propia' 	=> '175',
		'area_jardin' 	=> '38',
	),
	'W-007' => array(
		'title' 		=> 'W 007',
		'area_dormitorios' 	=> '2 Dormitorios',
		'area_propia' 	=> '108',
		'area_jardin' 	=> '24',
	),	
	'W-105' => array(
		'title' 		=> 'W 105',
		'area_dormitorios' 	=> '3 Dormitorios',
		'area_propia' 	=> '175',
		'area_jardin' 	=> '',
	),
	'W-106' => array(
		'title' 		=> 'W 106',
		'area_dormitorios' 	=> '2 Dormitorios',
		'area_propia' 	=> '125',
		'area_jardin' 	=> '',
	),
	'W-107' => array(
		'title' 		=> 'W 107',
		'area_dormitorios' 	=> '2 Dormitorios',
		'area_propia' 	=> '108',
		'area_jardin' 	=> '',
	),
	'W-205' => array(
		'title' 		=> 'W 205',
		'area_dormitorios' 	=> '3 Dormitorios',
		'area_propia' 	=> '175',
		'area_jardin' 	=> '',
	),
	'W-206' => array(
		'title' 		=> 'W 206',
		'area_dormitorios' 	=> '2 Dormitorios',
		'area_propia' 	=> '125',
		'area_jardin' 	=> '38',
	),
	'W-207' => array(
		'title' 		=> 'W 207',
		'area_dormitorios' 	=> '2 Dormitorios',
		'area_propia' 	=> '108',
		'area_jardin' 	=> '',
		'area_rooftop' 	=> '29',
	),
	'W-305' => array(
		'title' 		=> 'W 305',
		'area_dormitorios' 	=> '3 Dormitorios',
		'area_propia' 	=> '208',
		'area_jardin' 	=> '',
		'area_terrazas'	=> '10',
		'area_boxtender' 	=> '36',
	),

);

// $fp = fopen('plantas.json', 'W');
// fwrite($fp, json_encode($plantas));
// fclose($fp);

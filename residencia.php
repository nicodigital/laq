<?php include 'header.php' ?>
<main class="trans">

	<section class="flex align-center content-arround  h-100v rel z-1 bg-black overflow-hidden">

		<picture class="back-img block rellax">
			<source srcset="./img/residencias.webp" type="image/webp">
			<source srcset="./img/residencias.jpg" type="image/jpeg">
			<img class="zoom" style="opacity: .65;" src="./img/residencias.jpg" loading="lazy" decoding="async" >
		</picture>

		<section class="flex dir-column align-center rel z-50">
			<h1 class="title white mb-2 move-bottom-500">Residencias</h1>
		</section>

		<section class="flex dir-column align-center rel z-50 absolute-bottom-center mb-4">
			<a href="#go-down" class="smooth floating">
				<img class="go-down move-bottom-1000" src="./img/icons/arrow-down.svg" loading="lazy" decoding="async" alt="">
			</a>
		</section>

	</section>

	<section id="go-down" name="go-down" class="container bg-white rel z-80 pt-10 pb-6 pb-sm-10">
		<div class="col-1-13 col-sm-1-7 col-lg-1-6">
			<div class="px-1 px-md-2 py-2 move-left-500">
				<h2 class="title">Residencias</h2>
			</div>
		</div>
		<div class="col-1-13 col-sm-7-13 col-lg-6-12">
			<div class="px-1 px-md-2 py-2 move-right-500">
				<p>Espaciosas unidades con cómodas plantas, muy funcionales, bañadas de luz por medio de amplios ventanales al lago y concebidas con materiales nobles de primera calidad.</p>
				<p>Equipadas con tecnología de vanguardia, con la seguridad y el confort de un proyecto arquitectónico contemporáneo.</p>
				<p>Un cuidado proyecto de paisajismo, permite un alto grado de intimidad y sofisticación de cada unidad, e integra las áreas comunes al entorno con un elegante marco natural.</p>
			</div>
		</div>
	</section>

	<section class="container pb-20 pb-md-10">

		<div class="col-1-13 col-md-1-5 px-1">
			<p class="area-title big-title">E 001</p>

			<div class="grid mb-3">
				<div class="unit-data mb-3 col-1-6">
					<div class="area-dormitorios">2 Dormitorios</div>
					<div class="area-propia"> Área propia*<br> <span style="color: var(--grey);">108</span> <span style="color: var(--grey);"> m²</span></div>
					<div class="area-jardin">Área jardín<br> <span>24</span> m²</div>
					<div class="area-terrazas hide">Terrazas<br> <span></span> m²</div>
					<div class="area-boxtender hide">Box Tender<br> <span></span> m²</div>
					<div class="area-rooftop hide">Rooftop<br> <span></span> m²</div>

				</div>

				<figure id="sketch" class="sketch col-6-13 mb-3">
					<?php planta_img($plantas, 'sketch') ?>
				</figure>
			</div>

			<div class="grid-col-sm-2 grid-col-md-3 grid-gap-2 line-bottom-grey pb-2 my-2">
				<a href="plantas/pdf/E-001.pdf" class="ficha-download btn-color-1 btn-sm" target="_blank">
					Descargar planta
				</a>
				<a href="plantas/pdf/Memoria.pdf" class="memoria-download btn-sm btn-outline-dark" target="_blank">
					Descargar memoria
				</a>
				<a href="plantas/pdf/Master-plan.pdf" class="master-download btn-sm btn-outline-dark" target="_blank">
					Ver master plan
				</a>
			</div>

			<div class="grid-plantas-links">
				<div class="grid-plantas-links-col">
					<p class="plantas-title px-1">2 Dormitorios</p>
					<div id="filter" class="grid-col-md-3 pb-1 line-bottom-grey mb-5 line-right px-1">
						<a href="E-001" class="item active">E 001</a>
						<a href="E-101" class="item">E 101</a>
						<a href="E-201" class="item">E 201</a>
						<div class="hide md-bock">&nbsp;</div>
						<a href="W-007" class="item">W 007</a>
						<a href="W-106" class="item">W 106</a>
						<a href="W-107" class="item">W 107</a>
						<div class="hide md-bock">&nbsp;</div>
						<div></div>
						<a href="W-206" class="item">W 206</a>
						<a href="W-207" class="item">W 207</a>
					</div>
				</div>

				<div class="grid-plantas-links-col">
					<p class="plantas-title px-1">3 Dormitorios</p>
					<div id="filter" class="grid-col-3 pb-1 line-bottom-grey mb-5 line-right px-1">
						<a href="E-003" class="item">E 003</a>
						<a href="E-102" class="item">E 102</a>
						<a href="E-202" class="item">E 202</a>
						<div class="hide md-bock">&nbsp;</div>
						<a href="E-004" class="item">E 004</a>
						<a href="E-103" class="item">E 103</a>
						<a href="E-203" class="item">E 203</a>
						<div class="hide md-bock">&nbsp;</div>
						<a href="W-005" class="item">W 005</a>
						<a href="E-104" class="item">E 104</a>
						<a href="E-204" class="item">E 204</a>
						<div class="hide md-bock">&nbsp;</div>
						<div></div>
						<a href="W-105" class="item">W 105</a>
						<a href="W-205" class="item">W 205</a>
					</div>
				</div>

				<div class="grid-plantas-links-col">
					<p class="plantas-title px-1">Pent House</p>
					<div id="filter" class="grid-col-md-1 pb-1 line-bottom-grey mb-5 px-1">
						<a href="E-303" class="item">E 303</a>
						<div class="hide md-bock">&nbsp;</div>
						<a href="W-305" class="item">W 305</a>
					</div>
				</div>

			</div>

			<p class="super-small pr-10">
				*ÁREA PROPIA INTERNA
				<br><br>
				Incluye 100% de muros internos, 100% de muros perimetrales, 50% de las medianeras, terraza principal cubierta y de servicio, parrillero y jardíneras.
				Las superficies detalladas pueden diferir ligeramente de las superficies efectivamente construidas.

			</p>

		</div>

		<div class="col-1-13 col-md-5-13">
			<div class="planos">
				<?php planta_img($plantas, 'planos')
				?>
			</div>
		</div>
	</section>

</main>

<?php include 'footer.php';

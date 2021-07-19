<div class="col-7-12 col-lg-7-13">
	<?php include 'inc/menu-links.php';

	if ($detect->isMobile()) {
		$togg = 'togg';
	}

	?>
	<nav id="menu" class="container-aux trans pb-3 z-100" style="grid-template-rows: auto min-content;">
		<div class="nav-wrapper flex dir-column content-center col-3-13 col-sm-6-13">
			<?php foreach ($navData as $item) { ?>
				<a id="<?= $item['id'] ?>" href="<?= $item['link'] ?>" class="<?= checkPage($page, $item['link']) ?> ">
					<?= $item['title'] ?>
				</a>
			<?php } ?>
		</div>


		<div class="container-aux col-1-13">

			<div class="d-sm-none col-1-13 col-sm-1-6 col-md-1-6 small">
				<div class="">
					<span>Lake homes</span>
				</div>
			</div>

			<div class="col-1-5 col-sm-6-8 small">
				<span>Un proyecto de<br>
				<a id="link_equipo" class="link" href="./#equipo">Omar Rienzi Arquitecto</a>
				</span>
			</div>

			<div class="d-sm-none col-1-13 col-sm-9-11 small">
				<a href="tel:0059826017836" class="item">(+598) 2601 7836</a>
				<?php include 'layout/partials/whatsapp.php'; ?>
				<br>
				<a href="mailto:info@laq.com.uy" class="item">info@laq.com.uy</a>
			</div>

			<div class="col-6-13 col-sm-11-13 col-md-11-13 small">
				
			</div>

		</div>


	</nav>

</div>
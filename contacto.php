<?php include 'header.php' ?>
<main class="trans contact">

	<section class="flex align-center content-arround  h-100v rel z-1 bg-black overflow-hidden">

		<picture class="back-img block rellax">
			<source srcset="./img/contacto.webp" type="image/webp">
			<source srcset="./img/contacto.jpg" type="image/jpeg">
			<img class="zoom" style="opacity: .65;" src="./img/contacto.jpg" loading="lazy" decoding="async" >
		</picture>

		<section class="flex dir-column align-center rel z-50">
			<h1 class="title white mb-2 move-bottom-500">Contacto</h1>
		</section>

		<section class="flex dir-column align-center rel z-50 absolute-bottom-center mb-4">
			<a href="#go-down" class="smooth floating">
				<img class="go-down move-bottom-1000" src="./img/icons/arrow-down.svg" alt="">
			</a>
		</section>

	</section>

	<section id="go-down" name="go-down" class="container bg-white rel z-80 pt-10 pb-20">

		<div class="col-2-12 col-md-1-5">
			<p>OFICINA DE VENTAS</p>

			<span>Carlos F. Sáez 6422 / 101</span><br>
			<span>C.P. 11500 | Montevideo, Uruguay</span><br>
			<a href="tel:0059826017836" class="item">(+598) 2601 7836</a><br>
			<a href="tel:0059899919535" class="item">Cel. 099 919 535</a>
			<br><br>
			<span>Si desea más información escríbanos a:</span><br>
			<a href="mailto:info@laq.com.uy" class="item">info@laq.com.uy</a><br>
			<!-- <a href="">whatsapp</a> -->
			<?php include 'layout/partials/whatsapp.php'; ?>
			<br><br>
			<span>También puede contáctarnos a través<br>del formulario de contacto.</span>
		</div>
		<div class="col-2-12 col-md-6-11 pt-4 pt-md-0">
			<?php include 'layout/partials/contact-form.php' ?>
		</div>

	</section>

</main>


<?php include 'footer.php';

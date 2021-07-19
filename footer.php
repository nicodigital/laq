<?php
include 'layout/partials/contact-tab.php' ;
include 'layout/modals.php'
?>

<footer class="pt-3 pb-6 footer">

	<div class="container">

		<div class="d-sm-none col-1-13 col-sm-1-6 col-md-1-6 small">
			<div class="">
				<span>Lake homes</span>
			</div>
		</div>

		<div class="col-1-5 col-sm-6-8 col-md-6-8 small">
			<a href="https://www.facebook.com/laq/" class="item" target="_blank">Facebook</a>
			<br>
			<a href="https://www.instagram.com/laq" class="item" target="_blank">Instagram</a>
		</div>

		<div class="d-sm-none col-1-13 col-sm-8-11 col-md-8-11 small">
			<a href="tel:0059826017836" class="item">(+598) 2601 7836</a>
			<?php include 'layout/partials/whatsapp.php'; ?>
			<br>
			<a href="mailto:info@laq.com.uy" class="item">info@laq.com.uy</a>
		</div>

		<div class="col-6-13 col-sm-11-13 col-md-11-13 small">
			<span>©<?= date('Y') ?> LAQ</span>
		</div>

	</div>

</footer>

<?php

if (!$detect->isMobile() && $platform == 'windows') { ?>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/smoothscroll/1.4.10/SmoothScroll.js"></script>
<?php } ?>

<script src="<?= $js_url ?>"></script>
</body>

</html>
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/footer.css">

<footer id="footer">
	<div class="container">

		<!-- Logo -->
		<figure id="logoFooter">
			<?php getImagemObj(get_field('logo_footer', 'option')['sizes'], '2048x2048', 'Icea') ?>
		</figure>

		<!-- Botão Subir -->
		<div class="botaoSubir">
			<i class="fa fa-angle-up"></i>
		</div>

		<div class="dadosFooter">

			<!-- Categorias -->
			<div class="col-sm-5 menu">
				<span class="tituloFooter">Categorias</span>

				<div class="col-sm-6">
					<?php wp_nav_menu(array('theme_location' => 'footer_produtos_esquerda', 'container' => '')); ?>
				</div>

				<div class="col-sm-6">
					<?php wp_nav_menu(array('theme_location' => 'footer_produtos_direita', 'container' => '')); ?>
				</div>

			</div>

			<!-- Contatos -->
			<div class="col-sm-3 contatos">

				<span class="tituloFooter">Contatos</span>

				<!-- E-mail -->
				<?php if (get_field('e-mail', 'options')) { ?>
					<a href="mailto: <?= get_field('e-mail', 'options') ?>" id="emailRodape">
						<i class="fa fa-envelope-o"></i>
						<span><?= get_field('e-mail', 'options') ?></span>
					</a>
				<?php } ?>

				<!-- Whatspp -->
				<?php if (get_field('whatsapp', 'options')) { ?>
					<div class="clear"></div>
					<a href="https://api.whatsapp.com/send?phone=55<?= linkTelefone(get_field('whatsapp', 'options')) ?>" id="whatsappRodape" target="_blank">
						<i class="fa fa-whatsapp"></i>	
						<span><?= get_field('whatsapp', 'options') ?></span>
					</a>
				<?php } ?>

				<!-- Telefone -->
				<?php if (get_field('telefone', 'options')) { ?>
					<div class="clear"></div>
					<a href="tel: <?= linkTelefone(get_field('telefone', 'options')) ?>" id="telefoneRodape">
						<i class="fa fa-phone"></i>
						<span><?= get_field('telefone', 'options') ?></span>
					</a>
				<?php } ?>

				<!-- Redes Sociais -->
				<div class="redesSociais">

					<?php if(get_field('facebook', 'option')){ ?>
						<a href="<?php echo get_field('facebook', 'option') ?>" target="_blank">
							<i class="fa fa-facebook-square" aria-hidden="true"></i>
						</a>
					<?php } ?>

					<?php if(get_field('instagram', 'option')){ ?>
						<a href="<?php echo get_field('instagram', 'option') ?>" target="_blank">
							<i class="fa fa-instagram" aria-hidden="true"></i>
						</a>
					<?php } ?>

					<?php if(get_field('youtube', 'option')){ ?>
						<a href="<?php echo get_field('youtube', 'option') ?>" target="_blank">
							<i class="fa fa-youtube-play" aria-hidden="true"></i>
						</a>
					<?php } ?>

					<?php if(get_field('linkedin', 'option')){ ?>
						<a href="<?php echo get_field('linkedin', 'option') ?>" target="_blank">
							<i class="fa fa-linkedin" aria-hidden="true"></i>
						</a>
					<?php } ?>

					<div class="clear"></div>

				</div>
			</div>
		</div>

		<div class="clear"></div>

		<!-- Endereço -->
		<div class="enderecoFooter">
			<span><?= get_field('endereco', 'options') ?></span>
		</div>

	</div>
	
</footer>

<!-- Sub Footer -->
<div id="subfooter">
	<div class="container">

		<!-- Logo MMD -->
		<figure>
			<a href="https://muitomaisdigital.com.br/" target="_blank" title="Criação de Sites em Curitiba">
				<img src="<?php echo esc_url( home_url( '/' ) ); ?>wp-content/uploads/2021/07/logo-MMD-04-tons-de-cinza-1.png" alt="Criação de Sites em Curitiba">
			</a>
		</figure>

	</div>
</div>

<script src="<?php echo get_template_directory_uri()?>/assets/scripts.js"></script>

<?php wp_footer(); ?>

<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@700&family=Work+Sans&display=swap" rel="stylesheet">

</body>
</html>

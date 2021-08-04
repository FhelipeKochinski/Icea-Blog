<section id="entreEmContato">
	<div class="container">

		<div class="col-sm-6 imagem">
			<i class="fa fa-envelope-o"></i>
		</div>
		
		<div class="col-sm-6 formulario">
			<p class="texto"><?= get_field('texto_contato_geral') ?></p>
			<div class="form">
			
				<?php echo do_shortcode('[wpforms id="188" title="Contato Geral"]'); ?>

			</div>			
		</div>
		
	</div>	
</section>
<li class="col-sm-3 spotProduto">

	<div class="boxInterno">
	
		<a href="<?php the_permalink() ?>">
			<figure>
				<?php if(get_field('imagem_principal')){ ?>
					<?php getImagemObj(get_field('imagem_principal')['sizes'], 'post', get_the_title()) ?>
				<?php } else { ?>
					<img src="<?php echo esc_url( home_url( '/' ) ); ?>wp-content/uploads/2021/08/padrao.png" alt="<?php the_title() ?>" />
				<?php } ?>
			</figure>
		</a>

		<a href="<?php the_permalink() ?>">
			<h2><?php the_title() ?></h2>
		</a>

		<div class="descricao">
			<p><?php echo get_field('descricao_listagem') ?></p>
		</div>

		<a href="<?php the_permalink() ?>" class="botaoGeral hoverZoom">SAIBA MAIS</a>

	</div>
	
</li>
<li class="boxPost">
	<div class="col-sm-3">
		<a href="<?php the_permalink() ?>">
			<figure>
				<?php if(get_the_post_thumbnail()){ ?>
					<?php the_post_thumbnail('post') ?>
				<?php } else { ?>
					<img src="<?php echo esc_url( home_url( '/' ) ); ?>wp-content/uploads/2021/08/padrao.png" alt="<?php the_title() ?>" />
				<?php } ?>
			</figure>
		</a>
	</div>	
	<div class="col-sm-9">

		<a class="tituloPost" href="<?php the_permalink() ?>">
			<h2><?php the_title() ?></h2>
		</a>

		<div class="clear"></div>

		<div class="categorias">
			<?php
			$terms = wp_get_post_terms( $post->ID, 'category');
			$contCat = 1;
			foreach ( $terms as $term ) {
				
				$url = get_term_link($term->slug, 'category');
				
				if($contCat > 1){
					echo ', <a href="' . $url . '">' . $term->name . '</a>';
				} else {
					echo '<a href="' . $url . '">' . $term->name . '</a>';
				}
				
				$contCat++;
			}
			?>
		</div>

		<div class="clear"></div>

		<p><?php echo the_excerpt_max_charlength(230) ?></p>

		<a href="<?php the_permalink() ?>" class="botaoGeral hoverZoom"> <i class="fa fa-arrow-circle-right" aria-hidden="true"></i> SAIBA MAIS </a>

	</div>
</li>
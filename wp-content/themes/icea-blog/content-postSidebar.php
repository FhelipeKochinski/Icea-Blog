<li class="boxPost">
	<div class="col-sm-4">
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
	
	<div class="col-sm-8">
		<a class="titulo" href="<?php the_permalink() ?>"><h3><?php the_title() ?></h3></a>
		<div class="clear"></div>
		<a class="linkPost" href="<?php the_permalink() ?>">LEIA MAIS</a>
	</div>
</li>
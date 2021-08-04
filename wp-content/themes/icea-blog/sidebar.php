<aside id="sidebarBlog">

	<div id="sidebarBlogInterno">
	
		<!-- Banner Blog ----------------------------------------------------------->

		<?php if ( is_page(36) || is_search() || is_category() || is_tag()) : ?>

			<!-- Banner 1 -->

			<?php if(get_field('imagem_banner_1', 36)){ ?>

				<figure class="imagemSidebar">

					<?php if(get_field('link_banner_1', 36)){ ?>
						<a href="<?php the_field('link_banner_1', 36); ?>" <?php if(get_field('nova_guia_banner_1', 36)[0] == 'sim'){ ?> target="_blank" <?php } ?>>
					<?php } ?>

                        <?php getImagemObj(get_field('imagem_banner_1',36)['sizes'], '2048x2048', 'Banner') ?>
					<?php if(get_field('link_banner_1', 36)){ ?>
						</a>
					<?php } ?>

				</figure>

			<?php } ?>

			<!-- Banner 2 -->

			<?php if(get_field('imagem_banner_2', 36)){ ?>

				<figure class="imagemSidebar">

					<?php if(get_field('link_banner_2', 36)){ ?>
						<a href="<?php the_field('link_banner_2', 36); ?>" <?php if(get_field('nova_guia_banner_2', 36)[0] == 'sim'){ ?> target="_blank" <?php } ?>>
					<?php } ?>
                        <?php getImagemObj(get_field('imagem_banner_2',36)['sizes'], '2048x2048', 'Banner') ?>

					<?php if(get_field('link_banner_2', 36)){ ?>
						</a>
					<?php } ?>

				</figure>

			<?php } ?>

		<?php endif; ?>	

		<!-- Caso Seja Post ----------------------------------------------------------->

		<?php if ( is_single() ) { ?>

			<!-- Verifica se é pra substituir o primeiro banner -->
			<?php if (get_field('substituir_primeiro_banner_post', $post->ID)[0] == 'sim'){ ?>


				<?php if (get_field('link_banner_1_post', $post->ID)){ ?>

					<figure class="imagemSidebar">

						<?php if (get_field('link_banner_1_post', $post->ID)){ ?>
							<a href="<?php the_field('link_banner_1_post', $post->ID) ?>" <?php if(get_field('nova_guia_banner_1_post', $post->ID)[0] == 'sim'){ ?> target="_blank" <?php } ?>>
						<?php } ?>

							<?php getImagemObj(get_field('imagem_banner_1_post')['sizes'], '2048x2048', 'Banner') ?>

						<?php if (get_field('link_banner_1_post', $post->ID)){ ?>
							</a>
						<?php } ?>

					</figure>

				<?php } ?>

			<!-- Pega o da página principal -->
			<?php } else { ?>

				<!-- Banner 1 -->

				<?php if(get_field('imagem_banner_1', 36)){ ?>

					<figure class="imagemSidebar">

						<?php if(get_field('link_banner_1', 36)){ ?>
							<a href="<?php the_field('link_banner_1', 36); ?>" <?php if(get_field('nova_guia_banner_1', 36)[0] == 'sim'){ ?> target="_blank" <?php } ?>>
						<?php } ?>

							<?php getImagemObj(get_field('imagem_banner_1',36)['sizes'], '2048x2048', 'Banner') ?>
						<?php if(get_field('link_banner_1', 36)){ ?>
							</a>
						<?php } ?>

					</figure>

				<?php } ?>

			<?php } ?>

			<!-- Verifica se é pra substituir o segundo banner -->
			<?php if (get_field('substituir_segundo_banner_post', $post->ID)[0] == 'sim'){ ?>


				<?php if (get_field('imagem_banner_2_post', $post->ID)){ ?>

					<figure class="imagemSidebar">

						<?php if (get_field('link_banner_2_post', $post->ID)){ ?>
							<a href="<?php the_field('link_banner_2_post', $post->ID) ?>" <?php if(get_field('nova_guia_banner_2_post', $post->ID)[0] == 'sim'){ ?> target="_blank" <?php } ?>>
						<?php } ?>

						<?php getImagemObj(get_field('imagem_banner_2_post')['sizes'], '2048x2048', 'Banner') ?>

						<?php if (get_field('link_banner_2_post', $post->ID)){ ?>
							</a>
						<?php } ?>

					</figure>

				<?php } ?>

			<!-- Pega o da página principal -->
			<?php } else { ?>

				<!-- Banner 2 -->

				<?php if(get_field('imagem_banner_2', 36)){ ?>

					<figure class="imagemSidebar">

						<?php if(get_field('link_banner_2', 36)){ ?>
							<a href="<?php the_field('link_banner_2', 36); ?>" <?php if(get_field('nova_guia_banner_2', 36)[0] == 'sim'){ ?> target="_blank" <?php } ?>>
						<?php } ?>
							<?php getImagemObj(get_field('imagem_banner_2',36)['sizes'], '2048x2048', 'Banner') ?>

						<?php if(get_field('link_banner_2', 36)){ ?>
							</a>
						<?php } ?>

					</figure>

				<?php } ?>
					
			<?php } ?>		


		<?php } ?>

		<!-- Categorias ----------------------------------------------------------->

		<div id="categoriasSidebar">
			<span>CATEGORIAS</span>
			<?php $args = array( 'show_count' => false, 'pad_counts' => 0, 'title_li' => '', 'exclude' => array(1) ); ?>
			<ul><?php wp_list_categories($args) ?></ul>
		</div>

		<!-- Posts Destaques -->
	
		<?php
		$argsDes = array(
			'posts_per_page'      => 4,                 // Máximo de 4 artigos
			'no_found_rows'       => true,              // Não conta linhas
			'post_status'         => 'publish',         // Somente posts publicados
			'ignore_sticky_posts' => true,              // Ignora posts fixos
			'orderby'             => 'meta_value_num',  // Ordena pelo valor da post meta
			'meta_key'            => 'tp_post_counter', // A nossa post meta
			'order'               => 'DESC'             // Ordem decrescente
		);
		$wp_query_des = new WP_Query( $argsDes );
		?>

		<div id="postsDestaques">
			<h2>POSTS EM DESTAQUE</h2>
			<?php if($wp_query_des->have_posts()) : ?>
				<?php $cont = 1 ?>
				<ul>
					<?php while($wp_query_des->have_posts()) : $wp_query_des->the_post(); ?>
						<?php get_template_part('content','postSidebar'); ?>
						<?php if($cont % 2 == 0) { echo '<div class="clear"></div>'; } ?>
						<?php $cont++ ?>
					<?php endwhile; ?>
				</ul>
			<?php endif; ?>
			<?php wp_reset_postdata(); ?>
		</div>

	</div>
	
</aside>
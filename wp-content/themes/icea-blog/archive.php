<?php get_header() ?>

<?php $categoriaAtual = get_queried_object(); ?>

<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/home.css">

<?php include('templates/contents/breadCrumbs.php') ?>

<section id="blog">

	<!-- Título -->
	<div class="container">
		<?php tituloPrincipal($categoriaAtual->name, 'h1') ?>
	</div>

	<!-- Busca -->
	<?php include('templates/contents/buscaBlog.php') ?>
	
	<!-- Conteúdo -->
	<div class="container">
				
		<div class="conteudoBlog conteudoComSidebar">
					
			<div class="col-sm-9">

				<ul class="lista_noticias">
				
					<?php $cont = 1; ?>
	
					<?php if ( have_posts() ) : ?>
					
						<?php while ( have_posts() ) : ?>
						
							<?php the_post(); ?>
							
							<?php get_template_part('content','postBlog'); ?>
							
							<?php if($cont % 5 == 0 && $cont < 6){ ?>

								<?php if(get_field('qual_mostrar', 1156) == 'banner'){ ?>

									<?php if(get_field('link_banner_conteudo_home', 1156)){ ?>
										<a href="<?php echo get_field('link_banner_conteudo_home', 1156) ?>" 
										<?php if(get_field('nova_guia_banner_conteudo_home', 1156)[0] == 'sim'){ ?> target="_blank" <?php } ?>>
									<?php }	?>

									<?php if(get_field('banner_banner_conteudo_home', 1156)){ ?>
										<img class="bannerListagem" src="<?php echo get_field('banner_banner_conteudo_home', 1156) ?>" alt="Muito Mais Digital" />
									<?php }	?>

									<?php if(get_field('link_banner_conteudo_home', 1156)){ ?>
										</a>
									<?php }	?>

								<?php } else {	?>

									<?php if(get_field('iframe_banner_conteudo_home', 1156)){ ?>
										<div class="iframeListagem">
											<?php the_field('iframe_banner_conteudo_home', 1156) ?>
										</div>
									<?php }	?>

								<?php }	?>

							<?php }	?>
							
							<?php if($cont % 2 == 0){ ?>
								<div class="clear"></div>
							<?php } ?>
						
							<?php $cont++ ?>
							
						<?php endwhile; ?>
						
					<?php endif; ?>
		
					<?php
					the_posts_pagination( array(
						'prev_text' => '<i class="fa fa-angle-double-left" aria-hidden="true"></i>',
						'next_text' => '<i class="fa fa-angle-double-right" aria-hidden="true"></i>'
					) );
					wp_reset_query();
					wp_reset_postdata();
					?>

					<div class="clear"></div>

				</ul>

			</div>
			
			<div class="col-sm-3 boxSidebar">
				<?php echo get_sidebar() ?>
			</div>
		
		</div>
				
		<!-- Descrição da Categoria -->
		<?php if(category_description($categoriaAtual)){ ?>
			<div class="descricaoCategoria">
				<?php echo category_description($categoriaAtual) ?>
			</div>
		<?php } ?>
						
	</div>

	<!-- Newsletter -->
	<?php include('templates/contents/newsletter.php') ?>

</section>

<?php get_footer() ?>
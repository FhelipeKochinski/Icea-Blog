<?php
/**
 * Template Name: Home
 */
?>

<?php get_header() ?>

<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/home.css">

<?php include('contents/breadCrumbs.php') ?>

<section id="blog">

		<!-- Título -->
        <div class="container" id="tituloBlog">
		    <?php tituloPrincipal('Blog', 'h1') ?>
	    </div>

		<!-- Busca -->
		<?php include('contents/buscaBlog.php') ?>

		<!-- Conteúdo -->
	<div class="container">
		<div class="conteudoBlog conteudoComSidebar">

			<!-- Listagem de Posts -->
			<div class="col-sm-9">
				
				<ul class="lista_noticias">

					<?php
					$paged = (get_query_var('page')) ? get_query_var('page') : 1;
					$args = array('post_type' => 'post', 'posts_per_page' => 10, 'paged' => $paged);
					$wp_query = new WP_Query( $args );
					?>

					<?php if($wp_query->have_posts()) : ?>
						<?php while($wp_query->have_posts()) : $wp_query->the_post(); ?>
							<?php get_template_part('content','postBlog'); ?>
						<?php endwhile;	?>
					<?php endif; ?>
					
					<?php
						the_posts_pagination( array(
							'prev_text' => '<i class="fa fa-angle-double-left" aria-hidden="true"></i>',
							'next_text' => '<i class="fa fa-angle-double-right" aria-hidden="true"></i>'
						) );
						wp_reset_query();
						wp_reset_postdata();
					?>
					
				</ul>
				
			</div>
			
			<!-- Sidebar -->
			<div class="col-sm-3 boxSidebar">
				<?php echo get_sidebar() ?>
			</div>

		</div>
	</div>

	<!-- Newsletter -->
	<?php include('contents/newsletter.php') ?>

</section>

<?php get_footer() ?>
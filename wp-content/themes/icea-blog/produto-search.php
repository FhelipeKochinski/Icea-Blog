<?php 
get_header();
$s = get_search_query();
?>

<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/listaProdutos.css">

<?php include('templates/contents/breadCrumbs.php') ?>

<section id="listaProdutos">

    <!-- Filtros de Busca -->
	<?php include('templates/contents/buscaProdutos.php') ?>

    <!-- SEO -->
    <div class="boxSeo">
        <div class="container">
            <h1 class="titulo">Foram encontradas <?= $wp_query->found_posts ?> peças para sua busca '<?= $s; ?>'</h1>
        </div>
    </div>

    <!-- Compartilhe -->
    <div class="compartilhamento">
        <div class="container">

            <span>Compartilhe:</span>

            <div class="links">

                <!-- Facebook -->					
                <a class="hoverZoom" rel="nofollow" href="javascript: void(0);" onclick="window.open('https://www.facebook.com/sharer.php?u=<?php echo urlencode(esc_url( home_url() ) . $_SERVER['REQUEST_URI']) ?>', 'Vittrin', 'toolbar=0, status=0, width=650, height=450');">
                    <i class="fa fa-facebook-square"></i>
                </a>

                <!-- Twitter -->
                <a class="hoverZoom" rel="nofollow" href="javascript: void(0);" data-url="<?php echo urlencode(esc_url( home_url() ) . $_SERVER['REQUEST_URI']) ?>" data-lang="pt" onclick="window.open('https://twitter.com/share?url=<?php the_permalink() ?>', 'Vittrin', 'toolbar=0, status=0, width=650, height=450');">
                    <i class="fa fa-twitter"></i>
                </a>

                <!-- Linkedin -->
                <a class="hoverZoom" rel="nofollow" href="javascript: void(0);" data-url="<?php echo urlencode(esc_url( home_url() ) . $_SERVER['REQUEST_URI']) ?>" data-lang="pt" onclick="window.open('https://www.linkedin.com/shareArticle?mini=true&amp;url=<?php the_permalink() ?>', 'Vittrin', 'toolbar=0, status=0, width=650, height=450');">
                    <i class="fa fa-linkedin"></i>
                </a>

                <!-- Whatsapp -->
                <a class="hoverZoom" rel="nofollow" target="_blank" href="whatsapp://send?text=<?php echo urlencode(esc_url( home_url() ) . $_SERVER['REQUEST_URI']) ?>" data-action="share/whatsapp/share">
                    <i class="fa fa-whatsapp"></i>
                </a>

            </div>

        </div>
    </div>

    <!-- Lista de Produtos -->
	<div class="listaProdutos">
		<div class="container">
			
            <?php
			$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
			$args = array(
				'post_type' => 'produtos',
				'posts_per_page' => 16,
				'paged' => $paged,
                's' => $s,
                'meta_key' => 'pontos_produto',
				'orderby' => 'meta_value_num',
				'order' => 'DESC'
			);
			$wp_query = new WP_Query( $args );
			$cont = 1;
			?>

            <?php if($wp_query->have_posts()) { ?>

				<ul>

                    <?php while ( have_posts() ) : ?>

                        <?php the_post(); ?>

						<?php get_template_part( 'content', 'produto' ); ?>

						<?php if($cont % 4 == 0){ ?>
							<div class="clear"></div>
						<?php } ?>

						<?php $cont++ ?>

					<?php endwhile;	?>

				</ul>

			<?php } else { ?>

				<div class="semResultados">
					<span>Nenhum produto para sua pesquisa :(</span>
				</div>

			<?php } ?>

			<?php
				the_posts_pagination( array(
					'prev_text' => '<i class="fa fa-angle-double-left" aria-hidden="true"></i>',
					'next_text' => '<i class="fa fa-angle-double-right" aria-hidden="true"></i>'
				) );
				wp_reset_query();
				wp_reset_postdata();
			?>
			
		</div>
	</div>
	
</section>

<?php get_footer(); ?>
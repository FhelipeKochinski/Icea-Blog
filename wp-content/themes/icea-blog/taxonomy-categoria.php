<?php get_header() ?>

<?php $categoriaAtual = get_queried_object(); ?>

<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/listaProdutos.css">

<?php include('templates/contents/breadCrumbs.php') ?>

<section id="listaProdutos">

	<!-- Filtros de Busca -->
	<?php include('templates/contents/buscaProdutos.php') ?>

	<!-- SEO -->
	<div class="boxSeo">
		<div class="container">
			<h1><?php single_cat_title() ?></h1>
			<div class="conteudo">
				<?php echo category_description($categoriaAtual) ?>
			</div>
		</div>
		<?php if (category_description($categoriaAtual)) { ?>
			<div class="boxVejaMais">
				<i class="fa fa-angle-down"></i>
				<div class="clear"></div>
				<span>leia mais</span>
			</div>
		<?php } ?>
	</div>

	<!-- Compartilhe -->
	<div class="compartilhamento">
		<div class="container">

			<span>Compartilhe:</span>

			<div class="links">

				<!-- Facebook -->					
				<a class="hoverZoom" rel="nofollow" href="javascript: void(0);" onclick="window.open('https://www.facebook.com/sharer.php?u=<?php the_permalink() ?>','<?php the_title() ?>', 'toolbar=0, status=0, width=650, height=450');">
					<i class="fa fa-facebook-square"></i>
				</a>

				<!-- Twitter -->
				<a class="hoverZoom" rel="nofollow" href="javascript: void(0);" data-url="<?php the_permalink() ?>" data-lang="pt" onclick="window.open('https://twitter.com/share?url=<?php the_permalink() ?>','<?php the_title() ?>', 'toolbar=0, status=0, width=650, height=450');">
					<i class="fa fa-twitter"></i>
				</a>

				<!-- Linkedin -->
				<a class="hoverZoom" rel="nofollow" href="javascript: void(0);" data-url="<?php the_permalink() ?>" data-lang="pt" onclick="window.open('https://www.linkedin.com/shareArticle?mini=true&amp;url=<?php the_permalink() ?>','<?php the_title() ?>', 'toolbar=0, status=0, width=650, height=450');">
					<i class="fa fa-linkedin"></i>
				</a>

				<!-- Whatsapp -->
				<a class="hoverZoom" rel="nofollow" target="_blank" href="whatsapp://send?text=<?php the_permalink() ?>" data-action="share/whatsapp/share">
					<i class="fa fa-whatsapp"></i>
				</a>

			</div>

		</div>
	</div>

	<!-- Produtos Destaques -->
	<?php $produtos = get_field('produtos_destaques', $categoriaAtual); ?>
	<?php if ($produtos) { ?>
		<div class="produtosDestaques">
			<div class="container">
				<?php listProducts($produtos) ?>
			</div>
		</div>
	<?php } ?>

	<!-- Lista de Produtos -->
	<div class="listaProdutos">
		<div class="container">
			
			<?php
			$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
			$args = array(
				'post_type' => 'produtos', 
				'tax_query' => array( 
					array(
						'taxonomy' => 'categoria', 
						'field' => 'slug', 
						'terms' => $categoriaAtual
					)
				), 
				'posts_per_page' => 16,
				'meta_key' => 'pontos_produto',
				'orderby' => 'meta_value_num',
				'order' => 'DESC',
				'paged' => $paged
			);
			$wp_query = new WP_Query( $args );
			$cont = 1;
			?>

			<?php if($wp_query->have_posts()){ ?>

				<ul>

					<?php while($wp_query->have_posts()) : $wp_query->the_post(); ?>

						<?php get_template_part( 'content', 'produto' ); ?>

						<?php if($cont % 4 == 0){ ?>
							<div class="clear"></div>
						<?php } ?>

						<?php $cont++ ?>

					<?php endwhile;	?>

				</ul>

			<?php } else { ?>

				<div class="semResultados">
					<span>Nenhum produto nessa categoria :(</span>
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

	<!-- Posts Relacionados -->
	<?php $postsRelacioandos = get_field('posts_em_destaque', $categoriaAtual); ?>
	<?php if ($postsRelacioandos) { ?>
		<div class="postsRelacionados">
			<div class="container">
				<h2><?php the_field('titulo_dos_posts', $categoriaAtual) ?></h2>
				<?php listPosts($postsRelacioandos) ?>
			</div>
		</div>
	<?php } ?>

</section>

<?php get_footer() ?>
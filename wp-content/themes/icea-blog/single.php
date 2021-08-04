<?php get_header() ?>

<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/blogInterno.css">

<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/home.css">

<?php include('templates/contents/breadCrumbs.php') ?>

<section id="blog">

	<!-- Título -->
	<div class="container">
		<?php tituloPrincipal('Blog', 'span') ?>
	</div>
		
	<!-- Busca -->
	<?php include('templates/contents/buscaBlog.php') ?>
			
	<!-- Conteúdo -->
	<div class="container">
	
		<div class="conteudoComSidebar">

			<!-- Dados Autor --> 
			<div class="col-sm-2 autor">

				<?php
				$author_id = get_the_author_meta('ID');
				$user_info = get_userdata($author_id);
		 		$author_badge = get_field('avatar_usuario', 'user_'. $author_id );
				?>

				<figure class="imagemPost">
					<?php if(get_the_post_thumbnail()){ ?>
						<?php getImagem(get_post_thumbnail_id(get_the_ID()), 'post', get_sub_field('titulo'), '70') ?>
					<?php } else { ?>
						<img src="<?php echo esc_url( home_url( '/' ) ); ?>wp-content/uploads/2020/07/imagem-padrao.jpg" alt="<?php the_title() ?>" />
					<?php } ?>
				</figure>

				<span class="dataPost"><?php echo get_the_date(); ?></span>

				<div class="linksRedes">

					<span class="titulo">Compartilhe:</span>

					<!-- Facebook -->					
					<a class="hoverZoom" rel="nofollow" href="javascript: void(0);" onclick="window.open('https://www.facebook.com/sharer.php?u=<?php echo urlencode(esc_url( home_url() ) . $_SERVER['REQUEST_URI']) ?>', 'Vittrin', 'toolbar=0, status=0, width=650, height=450');">
						<i class="fa fa-facebook-square"></i>
					</a>

					<!-- Twitter -->
					<a class="hoverZoom" rel="nofollow" href="javascript: void(0);" data-url="<?php echo urlencode(esc_url( home_url() ) . $_SERVER['REQUEST_URI']) ?>" data-lang="pt" onclick="window.open('https://instagram.com/share?url=<?php the_permalink() ?>', 'Vittrin', 'toolbar=0, status=0, width=650, height=450');">
						<i class="fa fa-instagram"></i>
					</a>

					<!-- Linkedin -->
					<a class="hoverZoom" rel="nofollow" href="javascript: void(0);" data-url="<?php echo urlencode(esc_url( home_url() ) . $_SERVER['REQUEST_URI']) ?>" data-lang="pt" onclick="window.open('https://www.linkedin.com/shareArticle?mini=true&amp;url=<?php the_permalink() ?>', 'Vittrin', 'toolbar=0, status=0, width=650, height=450');">
						<i class="fa fa-linkedin"></i>
					</a>

				</div>

			</div>

			<div class="col-sm-7 content_noticia">

				<h1><?php the_title() ?></h1>

				<?php if (get_field('subtitulo')) { ?>
					<span class="subtitulo"><?php echo get_field('subtitulo') ?></span>
				<?php } ?>

				<div class="conteudo">
					<?php the_content() ?>
				</div>

				<div class="clear"></div>

				<?php if(has_tag()){ ?>
					<div id="marcadoresPost">
						<span>Marcadores</span>
						<?php echo $tag_list = get_the_tag_list( '', '', '', $post->ID ); ?> 
					</div>
				<?php } ?>

				<div class="comentarios" style="margin: 30px 0 0 0;">
					<?php comments_template( '', true ); ?>
				</div>
			</div>

			<div class="col-sm-3 boxSidebar">
				<?php echo get_sidebar() ?>
			</div>

		</div>
	
	</div>

	<!-- Newsletter -->
	<?php include('templates/contents/newsletter.php') ?>

</section>

<?php get_footer() ?>
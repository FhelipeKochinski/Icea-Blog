<?php

// Caso tente acessar diretamente o arquivo
if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME'])) {
	die ( __('Por favor, não carregue esta página diretamente. Obrigado!', 'schema' ) );
}

// Caso o post possua senha
if ( post_password_required() ) { ?>
	<p class="nocomments"><?php _e('Este post é protegido por senha. Digite a senha para ver os comentários.', 'schema' ); ?></p>
	<?php return;
}
?>

<span class="tituloComentarios">Deixe seu Comentário</span>

<!-- Lista de comentários -->
<?php if ( have_comments() ) : ?>

	<div id="listaComentarios">
		
		<span class="total-comments">
			<?php comments_number(__('Nunhum comentário', 'schema' ), __('1 comentário', 'schema' ),  __('% Comentários', 'schema' ) );?>
		</span>
		
		<ul class="listaDeComentarios">
			
			<!-- Lista de comentários -->
			<?php wp_list_comments(); ?>
			
			<!-- Paginação dos comnetários -->
			<div class="navigation">
				<div class="alignleft"><?php previous_comments_link() ?></div>
				<div class="alignright"><?php next_comments_link() ?></div>
			</div>
			
		</ul>
		
	</div>

<?php else : // Caso não possua comnetários ?>

	<?php if ('open' == $post->comment_status) : ?>

	<?php else : // Fecha os comentários ?>

	<?php endif; ?>

<?php endif; ?>


<!-- Formulário de cadastro de comentários -->

<!-- Verifica se o usuário esta liberado para comentar -->
<?php if ('open' == $post->comment_status) : ?>

	<div id="boxComentario">
			
		<?php 
		global $aria_req; 
		$comments_args = array(
				'title_reply' => __('Deixe seu Comentário', 'schema' ),
				'comment_notes_before' => '',
				'title_reply_before' => '<span>',
				'title_reply_after' => '</span>',
				'comment_notes_after' => '',
				'label_submit' => __( 'Publicar comentário', 'schema' ),
				'comment_field' => '<textarea required id="comment" name="comment" rows="6" aria-required="true" placeholder="Texto do comentário*"></textarea>',
				'fields' => apply_filters( 'comment_form_default_fields',
					array(
						'author' => '<div class="col-sm-6 campoNome"><input required id="author" name="author" type="text" placeholder="Nome*" value="'.esc_attr( $commenter['comment_author'] ) . '" /></div>',
						'email' => '<div class="col-sm-6 campoEmail"><input required id="email" name="email" type="text" placeholder="E-mail*" value="' . esc_attr(  $commenter['comment_author_email'] ).'" /></div>'
					) 
				)
			); 

		comment_form($comments_args); ?>
		
	</div>

<?php endif;  ?>

<script>
	$(document).ready(function(){
		$('.commentmetadata a').removeAttr('href');
	})
</script>

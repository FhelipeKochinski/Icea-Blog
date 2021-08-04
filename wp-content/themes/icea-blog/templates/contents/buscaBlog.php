<div class="buscaBlog">
	<div class="container">
		<form role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
			<input type="hidden" name="post_type" value="post" />
			<input required itemprop="query-input" type="search" placeholder="O que você procura?" name="s" />
			<button type="submit" class="hoverZoom styleBotao">
				<i class="fa fa-search"></i>
			</button>
		</form>
	</div>
</div>
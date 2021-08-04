<form role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<input type="hidden" name="post_type" value="post" />
	<input required itemprop="query-input" type="search" placeholder="O que você busca?" name="s" />
	<button class="hoverZoom styleBotao" type="submit">
		<i class="fa fa-search"></i>
	</button>
</form>
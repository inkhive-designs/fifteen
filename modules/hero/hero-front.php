<div id="hero">
	<div class="layer"></div>
	<div class="hero-content">
		<div class="container">
			<?php if (get_theme_mod('fifteen_heading')) : ?>
			<h2 class="hero-title"><?php echo get_theme_mod('fifteen_heading') ?></h2>
			<?php endif; ?>
			<?php if (get_theme_mod('fifteen_btn')) : ?>
			<div class="hero-button-wrapper">
				<a class="hero-button hvr-icon-wobble-horizontal" href="<?php echo get_theme_mod('fifteen_h_url') ?>"><?php echo get_theme_mod('fifteen_btn') ?></a>
			</div>
			<?php endif; ?>
			
		</div>
	</div>	
</div>
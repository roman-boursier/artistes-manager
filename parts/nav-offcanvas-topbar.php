<!-- By default, this menu will use off-canvas for small
	 and a topbar for medium-up -->
<?php
$image = get_field('logo_du_site', 'option');
?>
<div class="top-bar" id="top-bar-menu">
	<div class="top-bar-left float-left">
		<ul class="menu">
			<li><a href="<?php echo home_url(); ?>"><img class="logo" src="<?php echo $image['url']; ?>" alt="<?php bloginfo('name'); ?>" /></a></li>
		</ul>
	</div>
	<div class="top-bar-right show-for-medium">
		<?php joints_top_nav(); ?>	
	</div>
	<div class="top-bar-right float-right show-for-small-only">
		<ul class="menu">
			<!-- <li><button class="menu-icon" type="button" data-toggle="off-canvas"></button></li> -->
			<li><a data-toggle="off-canvas"><?php _e( 'Menu', 'jointswp' ); ?></a></li>
		</ul>
	</div>
</div>
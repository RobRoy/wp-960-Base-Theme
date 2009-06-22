<?php
/*
 * Theme Name: 960 Base Theme
 * Theme URI: http://960basetheme.kiuz.it
 * Description: Wordpress theme based on 960 Grid System
 * Author: Domenico Monaco
 * Author URI: http://www.kiuz.it
 * Version: 0.1
 */
?>
</div><!-- end content -->

<div id="sidebars" class="grid_5 right-sidebar">
	<div id="r-sidebar">     
      
      <div class="widget widget_cerca" id="cerca">
      	<h2>Cerca</h2>
	      <form method="get" id="searchform" action="<?php bloginfo('url'); ?>/"><input type="text" name="s" id="s" value="Inserisci testo" onfocus="document.forms['searchform'].s.value='';" onblur="if (document.forms['searchform'].s.value == '') document.forms['searchform'].s.value='Search Keywords';" /><input type="submit" id="searchsubmit" value="Cerca" />
	      </form>
			<br  />
		</div>
      	
		<?php	if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Sidebar 1') ) : ?>		<div class="widget widget_category" id="category">
			<h2>Categories</h2>
			<ul><?php wp_list_categories('show_count=1&title_li='); ?>			</ul>
		</div>

		<div class="widget widget_tags" id="tags">
			<h2>Tags</h2>
			<div class="tags">
			<?php wp_tag_cloud('smallest=8&largest=18&number=100&orderby=name&order=ASC'); ?>
			</div>
		</div>

		<div class="widget widget_meta" id="meta">
			<h2>Meta</h2>
			<ul>
				<li><?php wp_register(); ?></li>				<li><?php wp_loginout(); ?></li>
				<li><?php wp_meta(); ?></li>
			</ul>
		</div>

		<?php endif; ?>

	</div><!-- end #r-sidebar -->
</div><!-- end #sidebars -->

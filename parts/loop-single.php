<article id="post-<?php the_ID(); ?>" <?php post_class(''); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

	<header class="article-header large-12 columns">
		<h1 class="entry-title single-title" itemprop="headline"><?php the_title(); ?></h1>
		<?php get_template_part( 'parts/content', 'byline' ); ?>
    </header> <!-- end article header -->

    <section class="entry-content large-12 columns" itemprop="articleBody">
		<?php
		$slidercat = Kirki::get_option('pftk_opts', 'slider_category');
		if (in_category($slidercat)) { ?>
		<div class="large-3 columns" id="feat_img_col">
		<?php the_post_thumbnail('full'); ?>
	</div>
	<div class="large-9 columns">
		<?php the_content(); ?>
	</div>
	<?php } else { ?>
		<div class="large-12 columns">
			<?php the_content(); ?>
		</div>
		<?php } ?>
	</section> <!-- end article section -->

	<footer class="article-footer large-12 columns">
		<div class="large-offset-3 large-9 columns">
		<p class="tags"><?php the_tags('<span class="tags-title">' . __( 'Tags:', 'pressforward-turnkey-theme' ) . '</span> ', ', ', ''); ?></p>	</footer> <!-- end article footer -->
	</div>
		<?php if (in_category($slidercat)):
									$currentpostdate = get_the_date('Y/m/d');
									$chief = get_post_meta($post->ID, 'editor-in-chief', true);
									$large = get_post_meta($post->ID, 'editors-at-large', true);
									$nomcount = get_post_meta($post->ID, 'nomination_count', true);
								if (in_category($slidercat) && $currentpostdate < '2016/02/22') {
									echo '<div class="large-offset-3 large-9 columns editor"><p>This content was selected for <em>Digital Humanities Now</em> by Editor-in-Chief ' . $chief . ' based on nominations by Editors-at-Large: ' . $large . '</p></div>';
								} elseif (in_category( $slidercat) && $currentpostdate > '2016/02/22') {
									$chief = get_post_meta($post->ID, 'editor-in-chief', true);
									$El_statement = get_post_meta($post->ID, 'editors-at-large-statement');
									echo '<div class="large-offset-3 large-9 columns editor"><p>This content was selected for <em>Digital Humanities Now</em> by Editor-in-Chief ' . $chief . ' based on nominations by Editors-at-Large: ' . implode($El_statement) . '</p></div>';
								}
							endif; ?>

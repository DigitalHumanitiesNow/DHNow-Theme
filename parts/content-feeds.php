<article id="post-<?php the_ID(); ?>" <?php post_class(''); ?> role="article" itemscope itemtype="http://schema.org/WebPage">

	<header class="article-header">
		<h1 class="page-title"><?php the_title(); ?></h1>
	</header> <!-- end article header -->

    <section class="entry-content" itemprop="articleBody">

<!-- to do:
* can't figure out why I keep getting an undefined variable error. - FIXED
* need to queue up the proper js data tables files.
 -->

		<?php echo get_active_pffeeds(); ?>

	</section> <!-- end article section -->

	<footer class="article-footer">

	</footer> <!-- end article footer -->

	<?php comments_template(); ?>

</article> <!-- end article -->

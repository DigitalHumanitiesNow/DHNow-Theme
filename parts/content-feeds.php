<article id="post-<?php the_ID(); ?>" <?php post_class(''); ?> role="article" itemscope itemtype="http://schema.org/WebPage">

	<header class="article-header">
		<h1 class="page-title"><?php the_title(); ?></h1>
	</header> <!-- end article header -->

    <section class="entry-content" itemprop="articleBody">
<?php
      //construct the feeds endpoint url
      $endpoint_url = site_url($path = 'wp-json/pf/v1/feeds');

      //fetch response
      $response = wp_remote_get( $endpoint_url );

      //account for errors
	    if( is_wp_error( $response ) ) {
		      return;
	    }
      //decode response
	    $feeds = json_decode( wp_remote_retrieve_body( $response ) );
      echo $feeds;
	    if( empty( $feeds ) ) {
		      return;
	    }

      //construct a list of each feed.
      if( !empty( $feeds ) ) {
		      echo '<ul>';
		    foreach( $feeds as $feed ) {
			    echo '<li><a href="' . $feed->link. '">' . $feed->title->rendered . '</a></li>';
		    }
		   echo '</ul>';
	    }
?>
	</section> <!-- end article section -->

	<footer class="article-footer">

	</footer> <!-- end article footer -->

	<?php comments_template(); ?>

</article> <!-- end article -->

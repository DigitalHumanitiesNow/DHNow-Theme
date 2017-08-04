<article id="post-<?php the_ID(); ?>" <?php post_class(''); ?> role="article" itemscope itemtype="http://schema.org/WebPage">

	<header class="article-header">
		<h1 class="page-title"><?php the_title(); ?></h1>
	</header> <!-- end article header -->

    <section class="entry-content" itemprop="articleBody">
<?php
      $jsfeedlist = "";
      //construct the feeds endpoint url
      //$endpoint_url = site_url($path = 'wp-json/pf/v1/feeds');
      $endpoint_url = 'http://www.digitalhumanitiesnow.org/wp-json/pf/v1/feeds?per_page=100';
      //fetch response
      $response = wp_remote_get($endpoint_url);
      //account for errors
	    if( is_wp_error( $response ) ) {
		      return;
	    }
      if (is_array($response)) {
        $header = $response['headers'];
      }
      $totalpages = $header['x-wp-totalpages'];
      echo '<script>console.log('.$totalpages.')</script>';
      for($i = 1; $i <= $totalpages; $i++) {
        $endpointpage = $endpoint_url . '&page=' . $i;
        echo '<script>console.log('.$i.')</script>';
        //echo '<script>console.log('.$endpointpage.')</script>';
        //echo '<script>console.log("Getting the following url: "'. $endpointpage . '")</script>"';
        $getpageresponse = wp_remote_get($endpointpage);
        $feeds = json_decode(wp_remote_retrieve_body($response));
        foreach( $feeds as $feed ) {
         //$feedlist[] = '<li><a href="' . $feed->feedUrl . '">' . $feed->title->rendered . '</a></li>';
         $jsfeedlist .= '<tr><td><a href="' . $feed->feedUrl . '">' . $feed->title->rendered . '</a></td><td>' . $feed->ab_alert_msg . '<td></tr>';
      }
    }
?>
<!-- to do:
* can't figure out why I keep getting an undefined variable error. - FIXED
* need to queue up the proper js data tables files.
 -->
<table class="table table-striped display" id="archive_table">
  <thead>
    <th>Feed</th>
    <th>Broken?</th>
  </thead>
  <tbody>
<?php
  echo $jsfeedlist;
 ?>
 </tbody>


	</section> <!-- end article section -->

	<footer class="article-footer">

	</footer> <!-- end article footer -->

	<?php comments_template(); ?>

</article> <!-- end article -->

<div id="twitterbox">
	<h3 class="hidden">My Twitter</h3>
	<p><?php echo $tweet_text; ?></p>
	<p class="footer"><small><a href="http://twitter.com/<?php echo urlencode( Options::get( 'twitter__username' )); ?>"><?php echo date( 'g:ia F j, Y', strtotime( $tweet_time ) ); ?></a></small></p>
</div>
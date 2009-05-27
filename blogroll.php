<?php if ( ! empty( $blogs ) ):?>
<div id="blogroll" class="clearfix">
	<h2><span style="color:#9ed1ce;">Blog</span>sphere</h2>
	<?php $count = $blogs->count(); ?>
	<?php $blogs= iterator_to_array($blogs); ?>
	<ul class="left half-width">
	<?php foreach( array_slice( $blogs, 0, ceil($count/2)) as $blog ) : ?>
		<li><a href="<?php echo $blog->url; ?>" rel="<?php echo $blog->rel; ?>"><?php echo $blog->name; ?></a></li>
	<?php endforeach;  ?>
	</ul>
	<ul class="right half-width">
	<?php foreach( array_slice( $blogs, ceil($count/2)) as $blog ) : ?>
		<li><a href="<?php echo $blog->url; ?>" rel="<?php echo $blog->rel; ?>"><?php echo $blog->name; ?></a></li>
	<?php endforeach;  ?>
	</ul>
</div>
<?php endif; ?>
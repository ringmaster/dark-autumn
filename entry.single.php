<?php $theme->display ( 'header' ); ?>
			<div id="entries">
				<div class="entry">
					<div class="entry-title">
						<h2><a href="<?php echo $post->permalink; ?>" title="<?php printf ( _t( 'Read %s' ), $post->title); ?>"><?php echo $post->title_out; ?></a></h2>
					</div>
					<?php if ( $post->info->summary ) : ?>
					<div class="entry-subtitle">
						<h3><?php echo $post->info->summary; ?></h3>
					</div>
					<?php endif; ?>
					<div class="entry-content clearfix">
						<?php echo $post->content_out; ?>
					</div>
					<div class="entry-footer">
						<p>
<?php
printf( _t( '%1s was published on %2$s, %3$s %4$s, %5$s at %6$s' ), '<strong>' . $post->title . '</strong>', $post->pubdate->get('l'), '<a href="' . $this->base_url . '/' . $post->pubdate->get('Y') . '/' . $post->pubdate->get('m') . '" title="' . _t( 'View articles published on ' ) . $post->pubdate->get('F') . ', ' . $post->pubdate->get('Y') .  '">' . $post->pubdate->get('F') . '</a>', $post->pubdate->get('j'), '<a href="' . $this->base_url . '/' . $post->pubdate->get('Y') . '" title="' . _t( 'View articles published on ' ) . $post->pubdate->get('Y') . '">' . $post->pubdate->get('Y') . '</a>',$post->pubdate->get('g:ia') );
if ($post->tags) printf(_t(' and tagged %s'),$post->tags_out);
_e('.');
if (!$post->info->comments_disabled):
	if ($post->comments->count) printf( _t( ' Share your thoughts by %s'),'<a href="'.$post->permalink.'#comment-box" title="">' . _t('commenting on this article') . '</a>' );
	else printf(' Respond to this article by %s','<a href="'.$post->permalink.'#comment-box" title="">' . _t('writing the first comment') . '</a>');
	_e('.');
endif;
?>
						</p>
						<?php if ( $user ) : ?>
						<p><?php printf( _t('You are logged in as %1$s and you can %2$s.'), $user->displayname, '<a href="' . $post->editlink . '" title="">' . _t('edit this article') . '</a>'); ?></p>
						<?php endif; ?>
					</div>
				</div>
<?php $theme->display ( 'comments' ); ?>
				<div id="entry-pagination">
				<?php if ( $previous= $post->descend() ): ?>
					<small>&laquo;&nbsp;<a style="margin-right:20px;" href="<?php echo $previous->permalink ?>" title="Read <?php echo $previous->slug ?>"><?php echo substr( $previous->title, 0, 20) . '&hellip;'; ?></a></small>
				<?php endif; ?>
				<?php if ( $next= $post->ascend() ): ?>
					<small><a href="<?php echo $next->permalink ?>" title="Read <?php echo $next->slug ?>"><?php echo substr( $next->title, 0, 20) . '&hellip;'; ?></a> &raquo;</small>
				<?php endif; ?>
				</div>
			</div>
<?php $theme->display ( 'sidebar' ); ?>
<?php $theme->display ( 'secondary' ); ?>
<?php $theme->display ( 'footer' ); ?>
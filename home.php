<?php $theme->display ( 'header' ); ?>
			<div id="entries">
			<?php foreach ( $posts as $post ): ?>
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
if ( $post->comments->count) printf( _n(' There is currently %1$s to this article.', ' There are currently %2$s on this article.', $post->comments->approved->count ), '<a href="' . $post->permalink . '#entry-comments" title="' . _t( 'Read comments on ' ) . $post->title . '">one comment</a>', '<a href="' . $post->permalink . '#entry-comments" title="' . _t( 'Read comments on ' ) . $post->title . '">' . $post->comments->moderated->count . ' comments</a>'  );
if (!$post->info->comments_disabled):
	if ($post->comments->count) printf( _t( ' Share your thoughts by %s'),'<a href="'.$post->permalink.'#comment-box" title="' . _t( 'Comment on ' ) . $post->title . '">' . _t('writing your own') . '</a>' );
	else printf(' Respond to this article by %s','<a href="'.$post->permalink.'#comment-box" title="' . _t( 'Comment on ' ) . $post->title . '">' . _t('writing the first comment') . '</a>');
	_e('.');
endif;

?>
						</p>
						<?php if ( $post->get_access()->edit ) : ?>
						<p><?php printf( _t('You are logged in as %1$s and you can %2$s.'), $user->displayname, '<a href="' . $post->editlink . '" title="">' . _t('edit this article') . '</a>'); ?></p>
						<?php endif; ?>
					</div>
				</div>
			<?php endforeach; ?>
				<div id="pagination">
					<?php $theme->prev_page_link(); ?>&nbsp;<?php $theme->page_selector( null, array( 'leftSide' => 2, 'rightSide' => 2 ) ); ?>&nbsp;<?php $theme->next_page_link(); ?>
				</div>
			</div>
<?php $theme->display ( 'sidebar' ); ?>
<?php $theme->display ( 'secondary' ); ?>
<?php $theme->display ( 'footer' ); ?>
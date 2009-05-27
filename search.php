<?php $theme->display ( 'header' ); ?>
			<div id="entries">
			<?php if (isset($post)) : ?>
				<p class="prompt"><?php $theme->search_prompt( htmlspecialchars( $criteria ), true ); ?></p>
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
						<p>&nbsp;<a href="<?php echo $post->permalink; ?>" title="<?php printf ( _t( 'Read %s' ), $post->title); ?>">Read this article&raquo;</a><p>
					</div>
					<?php if ( $user ) : ?>
					<div class="entry-footer">
						<p><?php printf( _t('You are logged in as %1$s and you can %2$s.'), $user->displayname, '<a href="' . URL::get( 'admin', 'page=publish&slug=' . $post->slug) . '" title="">' . _t('edit this article') . '</a>'); ?></p>

					</div>
					<?php endif; ?>
				</div>
			<?php endforeach; ?>
			<?php else: ?>
				<p class="prompt"><?php $theme->search_prompt( htmlspecialchars( $criteria ), false ); ?></p>
			<?php endif; ?>
				<div id="pagination">
					<?php $theme->prev_page_link(); ?>&nbsp;<?php $theme->page_selector( null, array( 'leftSide' => 2, 'rightSide' => 2 ) ); ?>&nbsp;<?php $theme->next_page_link(); ?>
				</div>
			</div>
<?php $theme->display ( 'sidebar' ); ?>
<?php $theme->display ( 'secondary' ); ?>
<?php $theme->display ( 'footer' ); ?>
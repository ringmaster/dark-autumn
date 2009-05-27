<?php // Do not delete these lines
if ( ! defined('HABARI_PATH' ) ) { die( _t('Please do not load this page directly. Thanks!') ); }
?>
			<?php if ( !$post->info->comments_disabled || $post->comments->moderated->count ): ?>
				<?php $count=1; ?>
				<div id="entry-comments">
					<h3><?php echo $post->comments->moderated->count . ' '; _ne('Response','Responses',$post->comments->moderated->count); ?> to <?php echo $post->title_out; ?>&nbsp;<a href="<?php echo $post->comment_feed_link; ?>" title="Subscribe tho this entry's comments feed"><img alt="Article comments Feed" src="<?php echo $this->theme_url; ?>/images/feed_s.png" /></a></h3>
				<?php foreach ( $post->comments->moderated as $comment ) : ?>
					<div id="comment-<?php echo $comment->id; ?>" class="comment-wrapper clearfix <?php echo $theme->da_comment_classes($post, $comment); ?>">
						<div class="comment-number">
						<p><a href="#comment-<?php echo $comment->id; ?>" title="Comment permalink"><?php echo $count; ?></a></p>
						</div>
						<div class="comment">
							<p class="comment-author"><span class="author-name"><?php echo $comment->name ?></span><?php if ( $comment->url !='' ) { ?>&nbsp;<?php echo _t('of'); ?>&nbsp;<em><a href="<?php echo $comment->url; ?>" rel="external"><?php echo $comment->url; ?></a></em><?php } ?></p>
							<div class="comment-content">
							<p><?php echo $comment->content_out ?></p>
							</div>
							<p class="comment-meta"><?php printf('Posted at %1$s on %2$s',$comment->date->get('F j, Y'), $comment->date->get('g:ia')); ?> <?php if ($comment->status == Comment::STATUS_UNAPPROVED) echo '<strong>' . _t('Comment is awaiting moderation') . '</strong>' ?></p>
						</div>
					</div>
				<?php $count++; ?>
				<?php endforeach; ?>
				</div>
<?php $theme->display('commentform'); ?>
			<?php endif; ?>
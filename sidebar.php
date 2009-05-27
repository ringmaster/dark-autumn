			<div id="sidebar">
				<div id="blurb">
				<?php
				if (Plugins::is_loaded('colophon')){
					echo $theme->colophon;
				}
				else {
					echo '<p>' . $da_blurbtext . '</p>';
				}
				?>
				</div>

				<?php $theme->twitter(); ?>

				<?php if ( $sidenotes->count() ): ?>
				<div id="sidenotes">
					<h3><a href="<?php URL::out( 'atom_feed_tag', array( 'tag' => $theme->da_sidenotes_tag ) ); ?>" title="Side Notes Feed"><img alt="Side Notes Feed" src="<?php echo $this->theme_url; ?>/images/feed.png" /></a>&nbsp;Side Notes</h3>
					<ul>
					<?php foreach( $sidenotes as $sidenote ): ?>
						<li><?php echo $sidenote->content_out; ?></li>
					<?php endforeach; ?>
					</ul>
				</div>
				<?php endif; ?>

				<!-- Other modules can go over here -->

			</div>
		</div>
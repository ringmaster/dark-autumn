		<div id="secondary">
			<div class="wrapper">
				<div class="line1">
					<div class="line2 clearfix">
						<div class="secondary-module" id="secondary-module-1">
							<div class="wrapper">
<?php $theme->display ( 'searchform' ); ?>
							<?php if (Plugins::is_loaded( 'TagCloud' ) ): ?>
								<div id="tags">
									<h2 class="hidden">Tags</h2>
									<p>...or browse articles by tags <a href="#"><small>(view all tags)</small></a></p>
									<?php $theme->tag_cloud() ?>
								</div>
							<?php endif; ?>
								<!-- Another module can go here -->
							</div>
						</div>
						<div class="secondary-module" id="secondary-module-2">
							<div class="wrapper">
								<!-- A module can go here (eg. flickrbox) -->
								<!-- Another module can go here -->
							</div>
						</div>
						<div class="secondary-module" id="secondary-module-3">
							<div class="wrapper">
							<?php $theme->show_blogroll(); ?>
							<!-- Another module can go here -->
							</div>
						</div>
					</div>
				</div>
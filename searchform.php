								<div id="search-box">
									<h2 class="hidden">Search</h2>
									<form method="get" id="search-form" action="<?php URL::out('display_search'); ?>">
										<input type="text" name="criteria" id="search" value="<?php if ( isset( $criteria ) ) echo htmlentities($criteria, ENT_COMPAT, 'UTF-8'); else _e("Search"); ?>" onfocus="if (this.value == '<?php _e("Search") ; ?>') this.value = ''; " onblur="if (this.value == '') this.value = '<?php _e("Search"); ?>';" >
									</form>
								</div>
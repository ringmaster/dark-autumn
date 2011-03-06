<?php
class DarkAutumn extends Theme
{
	private $options  =array();

	public function action_init_theme()
	{
		// Apply Format::autop() to post content:
		Format::apply( 'autop', 'post_content_out' );

		// Apply Format::autop() to comment content:
		Format::apply( 'autop', 'comment_content_out' );
/*DELETE ME
		Format::apply( 'nice_date', 'post_updated_date', 'F j, Y' );
		Format::apply( 'nice_date', 'post_updated_time', 'g:ia' );
		Format::apply( 'nice_date', 'post_pubdate_wday', 'l' ); 
		Format::apply( 'nice_date', 'post_pubdate_day', 'j' );
		Format::apply( 'nice_date', 'post_pubdate_month', 'F' );
		Format::apply( 'nice_date', 'post_pubdate_monthno', 'm' );
		Format::apply( 'nice_date', 'post_pubdate_year', 'Y' );
		Format::apply( 'nice_date', 'post_pubdate_time', 'g:ia' );
		// Apply Format::nice_date() to comment date:
		Format::apply( 'nice_date', 'comment_date', 'F j, Y' );
		Format::apply( 'nice_date', 'comment_time', 'g:ia' );
/DELETEME */

		// Apply Format::tag_and_list() to post tags...
		Format::apply( 'tag_and_list', 'post_tags_out' );
		// Truncate content excerpt at "more" or 56 characters:
		//Format::apply_with_hook_params( 'more', 'post_content_excerpt','',600, 0 );

		//Initial options
		$configured= ( Options::get('darkautumn__configured' ) ? true : false);
		if ( ! $configured ){
			$this->set_default_options();
		}
	}

	public function add_template_vars()
	{
		//TODO: Fully support localization;
		//theme configuration

		$this->assign('da_feedtext',$this->options['darkautumn__feedtext']);
		$this->assign('da_maintenancetitle',$this->options['darkautumn__maintenancetitle']);
		$this->assign('da_blurbtext',$this->options['darkautumn__blurbtext']);
		$this->assign('da_sidenotes_tag', $this->options['darkautumn__sidenotestag']);

		$this->base_url = Site::get_url( 'habari' ); //TODO: use assign instead
		$this->theme_url = Site::get_url( 'theme' ); //TODO: use assign instead

		if ( !$this->posts ) {
			$this->posts = Posts::get( array( 'content_type' => 'entry', 'status' => Post::status('published') ) );
		}

		if ( !$this->pages ) {
			$this->assign('pages', Posts::get( array( 'content_type' => 'page', 'status' => Post::status('published'), 'nolimit' => 1 ) ) );
		}

		if ( !$this->sidenotes ){
			$this->assign( 'sidenotes', Posts::get( array( 'tag'=> $this->options['darkautumn__sidenotestag'], 'limit'=>5) ) );
		}

		if ( !$this->page ) {
			$this->page = isset( $page ) ? $page : 1; //TODO: use assign instead
		}

		$this->assign( 'post_id', ( isset($this->post) && $this->post->content_type == Post::type('page') ) ? $this->post->id : 0 );


		parent::add_template_vars();

	}

	public function act_display( $paramarray= array( 'user_filters'=> array() ) )
	{
		//To exclude the sidenotes tag from main content loop
		$this->options = $this->get_options(); //act_display is loaded before add_template_vars. So options are loaded here.
		$paramarray['user_filters']['not:tag']= $this->options['darkautumn__sidenotestag'];
	    parent::act_display( $paramarray  );
	}


	public function filter_theme_config($configurable)
	{
		$configurable = true;
		return $configurable;
	}

	/**
	* Respond to the user selecting 'configure' on the themes page
	*
	*/
	public function action_theme_ui()
	{
		$form = new FormUI( 'darkautumn_theme' );
		$form->append('fieldset', 'colors','Colors');
		$form->colors->append('fieldset', 'colors_wrapper');

		$form->colors_wrapper->append( 'label','bannercolor_label', 'Banner and Highlighs');
		$form->bannercolor_label->class="colorlabel";
		$form->colors_wrapper->append( 'text','bannercolor','option:darkautumn__bannercolor' );
		$form->bannercolor->class='colorbox';


		$form->colors_wrapper->append( 'label','linkscolor_label', 'Links Base');
		$form->linkscolor_label->class="colorlabel";
		$form->colors_wrapper->append( 'text','linkscolor','option:darkautumn__linkscolor' );
		$form->linkscolor->class="colorbox";

		$form->colors_wrapper->append( 'label','hovercolor_label', 'Links Hover');
		$form->colors_wrapper->hovercolor_label->class="colorlabel";
		$form->colors_wrapper->append( 'text','hovercolor','option:darkautumn__hovercolor' );
		$form->colors_wrapper->hovercolor->class="colorbox";

		$form->colors_wrapper->append( 'label','bgcolor_label', 'Background');
		$form->colors_wrapper->bgcolor_label->class="colorlabel";
		$form->colors_wrapper->append( 'text','bgcolor','option:darkautumn__bgcolor' );
		$form->colors_wrapper->bgcolor->class="colorbox";

		$form->colors_wrapper->append( 'label','hint3', '<a href="Javascript:load_defaults()">Load default colors</a>');
		$form->colors_wrapper->hint3->class="clear";

		$form->append('fieldset', 'images','Images');
		$form->images->append('fieldset', 'images_wrapper');

		$form->images_wrapper->append( 'label','hint1', '<em>Absolute paths only. Minimum height is 10px. Will be repeated horizontally.</em>');

		$form->images_wrapper->append('text','bannerimage','option:darkautumn__bannerimage','Banner Image');

		$form->images_wrapper->append('checkbox','showupperimg','option:darkautumn__showupperimg','Show Upper Image');

		$form->images_wrapper->append('checkbox','showlowerimg','option:darkautumn__showlowerimg','Show Lower Image');

		$form->append('fieldset', 'textual','Textual');
		$form->textual->class='clear';
		$form->textual->append('fieldset', 'textual_wrapper');

		$form->textual_wrapper->append('text','sidenotestag','option:darkautumn__sidenotestag','SideNotes Tag');

		$form->textual_wrapper->append('text','feedtext','option:darkautumn__feedtext','Feedlink Label');

		$form->textual_wrapper->append('text','maintenancetitle','option:darkautumn__maintenancetitle','Maintenace Page Title');

		$form->textual_wrapper->append('textarea','blurbtext','option:darkautumn__blurbtext', 'Blurb Text');

		$form->textual_wrapper->append( 'label','hint2', '<em>Overridden by the Colophon plugin.</em>');

		$form->append('submit', 'save', 'Save');
		$form->on_success( array( $this, 'save_config' ) );
		$form->out();
	}

	public function save_config( $form ){
		Session::notice( 'Dark Autumn Settings Updated' );
		$form->save();
		if ( Cache::has('darkautum_options')){
			Cache::expire('darkautum_options');
		}
		return false;
	}
	public function suggest($term)
	{
		$words = explode(' ',$term);
	}

	public function extended_n ( $zero, $singular, $plural, $count, $domain='habari')
	{
		return ( $count == 0 ? _t( $zero, $domain ): _n( $singular, $plural, $count, $domain ) );
	}

	public function action_admin_header( $theme )
	{
		$vars=Controller::get_handler_vars();
		if ($theme->admin_page == 'themes' ) { // This hook is only fired if this theme is active anyway.
			Stack::add('admin_stylesheet', array($this->get_url() . '/css/config.css', 'screen'));
			Stack::add('admin_stylesheet', array($this->get_url() . '/colorpicker/colorpicker.css', 'screen'));
			Stack::add( 'admin_header_javascript', $this->get_url() . '/colorpicker/colorpicker.js', 'colorpicker' );
			Stack::add( 'admin_header_javascript', $this->get_url() . '/js/config.js', 'configjs' );

			$configured= ( Options::get('darkautumn__configured') ? true : false );
			if ( ! $configured ){
				$this->set_default_options();
			}
		}
	}

	public function get_options()
	{
		if ( Cache::has('darkautum_options')){
			return Cache::get('darkautum_options');
		}
		else {
			$options=Options::get(
				array(
					'darkautumn__configured',
					'darkautumn__bannercolor',
					'darkautumn__linkscolor',
					'darkautumn__bgcolor',
					'darkautumn__hovercolor',
					'darkautumn__bannerimage',
					'darkautumn__showupperimg',
					'darkautumn__showlowerimg',
					'darkautumn__sidenotestag',
					'darkautumn__feedtext',
					'darkautumn__maintenancetitle',
					'darkautumn__blurbtext'
				)
			);
			Cache::set('darkautum_options',$options);
			return $options;
		}
	}

	public function set_default_options()
	{
		Options::set( 'darkautumn__bannercolor','#f9683c');
		Options::set( 'darkautumn__linkscolor','#5cc5c9');
		Options::set( 'darkautumn__bgcolor','#fafafa');
		Options::set( 'darkautumn__hovercolor','#1ce0e7');
		Options::set( 'darkautumn__bannerimage','');
		Options::set( 'darkautumn__showupperimg',true);
		Options::set( 'darkautumn__showlowerimg',true);
		Options::set( 'darkautumn__sidenotestag', 'aside');
		Options::set( 'darkautumn__feedtext', 'Atom Feed');
		Options::set( 'darkautumn__maintenancetitle','Site Down For Maintenance');
		Options::set( 'darkautumn__blurbtext','Enter Some text about you, your site, or both here.');
		Options::set( 'darkautumn__configured', true);

		if ( Cache::has('darkautum_options')){
			Cache::expire('darkautum_options');
		}
	}

	public function da_comment_classes( $post, $comment )
	{
		$class='';

		if( $comment->email == $post->author->email ) {
			$class.= 'author-comment';
		}

		return $class;
	}

	public function theme_header( $theme )
	{
		$css='';

		if ( $this->options['darkautumn__bgcolor'] != '#fafafa' ) {
			$css.= 'body{ background-color: ' . $this->options['darkautumn__bgcolor'] . ';}'."\n";
		}

		if ( $this->options['darkautumn__bannerimage'] != '' ) {
			$css.= 'div#banner{ background-image: url(\'' . $this->options['darkautumn__bannerimage'] . '\'); background-repeat: repeat-x; background-position: top center;}'."\n";
		}

		if ( $this->options['darkautumn__bannercolor'] != '#f9683c' ) {
			$css.= 'div#banner{ background-color: ' . $this->options['darkautumn__bannercolor'] . ';}'."\n";
			//add color to the border here as well.
			$css.= 'div.navigation ul li a.active, div.navigation ul li a:hover{ background-color: ' . $this->options['darkautumn__bannercolor'] . ';}'."\n";
		}

		if ( $this->options['darkautumn__linkscolor'] != '#5cc5c9' ) {
			$css.= 'a,a:active{ color: ' . $this->options['darkautumn__linkscolor'] . ';}'."\n";
		}

		if ( $this->options['darkautumn__hovercolor'] != '#1ce0e7' ) {
			$css.= 'a:hover,div.secondary-module li a:hover,{ color: ' . $this->options['darkautumn__hovercolor'] . ';}'."\n";
		}

		if ( ! $this->options['darkautumn__showupperimg'] ) {
			$css.= 'div#branch{ background-image: none;}'."\n";
		}

		if ( ! $this->options['darkautumn__showlowerimg'] ) {
			$css.= 'div#primary{ background-image: none;}'."\n";
			$css.= 'div#sidebar{ margin-bottom: 80px;}'."\n";
		}
		if ( $css != '' ){
			return '<style type="text/css">' . $css . '</style>';
		}
	}

	public function theme_search_prompt( $theme, $criteria, $has_results )
	{
		$out=array();
		$keywords=explode(' ',trim($criteria));
		foreach ($keywords as $keyword) {
			$out[]= '<a href="' . Site::get_url( 'habari', true ) .'search?criteria=' . $keyword . '" title="' . _t( 'Search for ' ) . $keyword . '">' . $keyword . '</a>';
		}

		if ( sizeof( $keywords ) > 1 ) {
			if ( $has_results ) {
				return sprintf( _t( 'Search results for \'%s\'' ), implode(' ',$out) );
				exit;
			}
			return sprintf( _t('No results found for your search \'%1$s\'. You can try searching for \'%2$s\''), $criteria, implode('\' or \'',$out) );
		}
		else {
			return sprintf( _t( 'Search results for \'%s\'' ), $criteria );
			exit;
		}
		return sprintf( _t( 'No results found for your search \'%s\'' ), $criteria );

	}
}
?>

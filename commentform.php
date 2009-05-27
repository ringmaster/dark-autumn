<?php // Do not delete these lines
if ( ! defined('HABARI_PATH' ) ) { die( _t('Please do not load this page directly. Thanks!') ); }
?>

<div id="comment-box">
<?php if ( Session::has_messages() ): ?>
	<div class="messages" id="respond">
	<?php if (Session::has_errors()): ?>
		<h3>Your comment was not submitted for the following reason(s):</h3>
	<?php endif; ?>
		<?php Session::messages_out(); ?>
</div>
<?php endif; ?>

<?php if ( !$post->info->comments_disabled) : ?>
	<h3><?php _e('Write a response'); ?></h3>
	<form  class="clearfix" action="<?php URL::out( 'submit_feedback', array( 'id' => $post->id ) ); ?>" method="post" name="commentform">
		<div id="fields-wrapper">
			<div id="left-wrapper">
				<p>Play nice. Be constructive. Allowed HTML tags are: &lt;a&gt;, &lt;strong&gt;, &lt;em&gt; and &lt;blockquote&gt;</p>
				<input type="text" name="name" id="name" value="<?php echo ($commenter_name? $commenter_name :_t("Your Name")) ; ?>" tabindex="1" onfocus="if (this.value == '<?php _e("Your Name") ; ?>') this.value = ''; " onblur="if (this.value == '') this.value = '<?php _e("Your Name"); ?>';" />
				<input type="text" name="email" id="email" value="<?php echo ($commenter_email? $commenter_email :_t("Your Email (private)")) ; ?>" tabindex="2" onfocus="if (this.value == '<?php _e("Your Email (private)") ; ?>') this.value = ''; " onblur="if (this.value == '') this.value = '<?php _e("Your Email (private)"); ?>';" />
				<input type="text" name="url" id="url" value="<?php echo ($commenter_url? $commenter_url :_t("Your URL")) ; ?>" tabindex="3" onfocus="if (this.value == '<?php _e("Your URL") ; ?>') this.value = ''; " onblur="if (this.value == '') this.value = '<?php _e("Your URL"); ?>';" />
			</div>
			<div id="textarea-wrapper">
				<textarea name="content" id="comment-texarea" tabindex="4" onfocus="if (this.value == '<?php _e("Your Comment") ; ?>') {this.value = ''; }" onblur="if (this.value == '') {this.value = '<?php _e("Your Comment"); ?>';}"><?php echo (isset($details['content'])? $details['content'] :_t("Your Comment")) ; ?></textarea>
				<input name="submit" type="submit" id="comment-submit" tabindex="5" value="<?php _e( "Post" ); ?>" onclick=
				"if (commentform.name.value == '<?php _e("Your Name") ; ?>') commentform.name.value = '';
				if (commentform.email.value == '<?php _e("Your Email (private)") ; ?>') commentform.email.value = '';
				if (commentform.url.value == '<?php _e("Your URL") ; ?>') commentform.url.value = '';
				if (commentform.content.value == '<?php _e("Your Comment") ; ?>') commentform.content.value = '';" />
			</div>
		</div>
	</form>
<?php else: ?>
	<h3><?php _e('Commenting is closed'); ?></h3>
<?php endif; ?>
</div>
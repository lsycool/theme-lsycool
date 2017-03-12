<?php
 
	/**
	 * COMMENTS TEMPLATE
	 */

	// if('comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
	// 	die(esc_html__('Please do not load this page directly.', 'akina'));

	if(post_password_required()){
		return;
	}
?>
	<ul class="commentwrap">
		<?php 
			$args = 'post_id='.get_the_ID();
			wp_list_comments('type=comment&callback=akina_comment_format', get_comments($args)); 
		?>
	</ul>

	<nav id="comments-navi">
		<?php paginate_comments_links('prev_text=<&next_text=>');?>
	</nav>

<?php
	$args = array(
		'id_form'           => 'commentform',
		'id_submit'         => 'submit',
		'title_reply'       => '',
		'title_reply_to'    => '<div class="graybar"><i class="fa fa-comments-o"></i>' . esc_html__('Leave a Reply to', 'akina') . ' %s' . '</div>',
		'cancel_reply_link' => esc_html__('取消回复', 'akina'),
		'label_submit'      => esc_html__('提交评论', 'akina'),
		'comment_field' =>  '<textarea placeholder="' . esc_attr__('快来评论！', 'akina') . '..." name="comment" class="commentbody" id="comment" rows="5" tabindex="4"></textarea>',
		'comment_notes_after' => '',
		'comment_notes_before' => '',
		'fields' => apply_filters( 'comment_form_default_fields', array(
			'author' =>
				'<input type="text" placeholder="' . esc_attr__('昵称', 'akina') . ' ' . ( $req ?  '(' . esc_attr__('必须', 'akina') . ')' : '') . '" name="author" id="author" value="' . esc_attr($comment_author) . '" size="22" tabindex="1" ' . ($req ? "aria-required='true'" : '' ). ' />',

			'email' =>
				'<input type="text" placeholder="' . esc_attr__('邮箱', 'akina') . ' ' . ( $req ? '(' . esc_attr__('必须', 'akina') . ')' : '') . '" name="email" id="email" value="' . esc_attr($comment_author_email) . '" size="22" tabindex="1" ' . ($req ? "aria-required='true'" : '' ). ' />'
			)
		)
	);
	comment_form($args);
?>


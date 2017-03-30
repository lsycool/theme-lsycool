<?php
 
	 // wp_reset_query();
	/**
	 * COMMENTS TEMPLATE
	 */

	// if('comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
	// 	die(esc_html__('Please do not load this page directly.', 'now'));

	if(post_password_required()){
		return;
	}
?>
	<ul class="commentwrap">
		<?php 
			$args = 'post_id='.get_the_ID();
			wp_list_comments('type=comment&callback=now_comment', get_comments($args)); 
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
		'title_reply_to'    => '<div class="graybar"><i class="fa fa-comments-o"></i>' . esc_html__('Leave a Reply to', 'now') . ' %s' . '</div>',
		'cancel_reply_link' => esc_html__('取消回复', 'now'),
		'label_submit'      => esc_html__('提交评论', 'now'),
		'comment_field' =>  '<textarea placeholder="' . esc_attr__('快来评论！', 'now') . '..." name="comment" class="commentbody" id="comment" rows="5" tabindex="4"></textarea>',
		'comment_notes_after' => '',
		'comment_notes_before' => '',
		'fields' => apply_filters( 'comment_form_default_fields', array(
			'author' =>
				'<input type="text" placeholder="' . esc_attr__('昵称', 'now') . ' ' . ( $req ?  '(' . esc_attr__('必须', 'now') . ')' : '') . '" name="author" id="author" value="' . esc_attr($comment_author) . '" size="22" tabindex="1" ' . ($req ? "aria-required='true'" : '' ). ' />',

			'email' =>
				'<input type="text" placeholder="' . esc_attr__('邮箱', 'now') . ' ' . ( $req ? '(' . esc_attr__('必须', 'now') . ')' : '') . '" name="email" id="email" value="' . esc_attr($comment_author_email) . '" size="22" tabindex="1" ' . ($req ? "aria-required='true'" : '' ). ' />'
			)
		)
	);
	comment_form($args);
?>


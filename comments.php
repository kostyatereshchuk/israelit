<?php
if ( post_password_required() ) {
	return;
}

if ( ! function_exists( 'israelit_comment' ) ) {

    function israelit_comment( $comment, $args, $depth ) {

        if ('pingback' == $comment->comment_type || 'trackback' == $comment->comment_type) : ?>

        <li id="comment-<?php comment_ID(); ?>" <?php comment_class('media'); ?>>
            <div class="comment-body">
                <?php _e('Pingback:', 'israelit'); ?><?php comment_author_link(); ?><?php edit_comment_link(__('Edit', 'israelit'), '<span class="edit-link">', '</span>'); ?>
            </div>

        <?php else : ?>

        <li id="comment-<?php comment_ID(); ?>" <?php comment_class(empty($args['has_children']) ? '' : 'parent'); ?>>
            <article id="div-comment-<?php comment_ID(); ?>" class="comment-body media mb-4">
                <a class="pull-left" href="#">
                    <?php if (0 != $args['avatar_size']) echo get_avatar($comment, $args['avatar_size']); ?>
                </a>

                <div class="media-body">
                    <div class="media-body-wrap card">

                        <div class="card-header">
                            <h5 class="mt-0"><?php printf(__('%s <span class="says">says:</span>', 'israelit'), sprintf('<cite class="fn">%s</cite>', get_comment_author_link())); ?></h5>
                            <div class="comment-meta">
                                <a href="<?php echo esc_url(get_comment_link($comment->comment_ID)); ?>">
                                    <time datetime="<?php comment_time('c'); ?>">
                                        <?php printf(_x('%1$s at %2$s', '1: date, 2: time', 'israelit'), get_comment_date(), get_comment_time()); ?>
                                    </time>
                                </a>
                                <?php edit_comment_link(__('<span style="margin-left: 5px;" class="glyphicon glyphicon-edit"></span> Edit', 'israelit'), '<span class="edit-link">', '</span>'); ?>
                            </div>
                        </div>

                        <?php if ( '0' == $comment->comment_approved ) : ?>
                            <p class="comment-awaiting-moderation"><?php _e('Your comment is awaiting moderation.', 'israelit'); ?></p>
                        <?php endif; ?>

                        <div class="comment-content card-block">
                            <?php comment_text(); ?>
                        </div><!-- .comment-content -->

                        <?php comment_reply_link(
                            array_merge(
                                $args, array(
                                    'add_below' => 'div-comment',
                                    'depth' => $depth,
                                    'max_depth' => $args['max_depth'],
                                    'before' => '<footer class="reply comment-reply card-footer">',
                                    'after' => '</footer><!-- .reply -->'
                                )
                            )
                        ); ?>

                    </div>
                </div>

            </article>

        <?php
        endif;
    }

}

?>

<div id="comments" class="comments-area">

    <?php if ( have_comments() ) : ?>

        <h2 class="comments-title">
            <?php
            $comments_number = get_comments_number();
            if ( '1' === $comments_number ) {
                printf(
					/* translators: 1: title. */
					esc_html__( 'One thought on &ldquo;%1$s&rdquo;', 'israelit' ),
					'<span>' . esc_html(get_the_title()) . '</span>'
				);
            } else {
                printf(
					esc_html( _nx( '%1$s thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', $underscore_comment_count, 'comments title', 'israelit' ) ),
					esc_html( number_format_i18n( $underscore_comment_count ) ),
					'<span>' . esc_html( get_the_title() ) . '</span>'
				);
            }
            ?>
        </h2>

        <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
            <nav id="comment-nav-above" class="navigation comment-navigation" role="navigation">
                <h2 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'israelit' ); ?></h2>
                <div class="nav-links">

                    <div class="nav-previous"><?php previous_comments_link( esc_html__( 'Older Comments', 'israelit' ) ); ?></div>
                    <div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments', 'israelit' ) ); ?></div>

                </div>
            </nav>
        <?php endif; ?>

        <ul class="comment-list">
            <?php
            wp_list_comments( array( 'callback' => 'israelit_comment', 'avatar_size' => 50 ));
            ?>
        </ul>

        <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
            <nav id="comment-nav-below" class="navigation comment-navigation" role="navigation">
                <h2 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'israelit' ); ?></h2>
                <div class="nav-links">

                    <div class="nav-previous"><?php previous_comments_link( esc_html__( 'Older Comments', 'israelit' ) ); ?></div>
                    <div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments', 'israelit' ) ); ?></div>

                </div>
            </nav>
            <?php
        endif;

    endif;

    if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>

        <p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'israelit' ); ?></p>
        <?php
    endif; ?>

    <?php comment_form( $args = array(
        'id_form'           => 'commentform',
        'id_submit'         => 'commentsubmit',
        'title_reply'       => __( 'Leave a Reply', 'israelit' ),
		/* translators: 1: Reply Specific User */
        'title_reply_to'    => __( 'Leave a Reply to %s', 'israelit' ),
        'cancel_reply_link' => __( 'Cancel Reply', 'israelit' ),
        'label_submit'      => __( 'Post Comment', 'israelit' ),

        'comment_field' =>  '<p><textarea placeholder="Start typing..." id="comment" class="form-control" name="comment" cols="45" rows="8" aria-required="true"></textarea></p>',

        'comment_notes_after' => '<p class="form-allowed-tags">' .
            __( 'You may use these <abbr title="HyperText Markup Language">HTML</abbr> tags and attributes:', 'israelit' ) .
            '</p><div class="alert alert-info">' . allowed_tags() . '</div>'
    ));

	?>

</div>

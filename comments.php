<!--Start of comments-->
<?php if (is_single()) : ?>
	<?php if (have_comments()) : ?>
		<div class="comment-section-title">
			<?php echo comments_number('No Comments','1 Comment', '% Comments'); ?>
		</div>
	<?php endif; ?>
	<?php
		$args = array(
			'post_id' => get_the_ID()
		);
		$comments = get_comments($args);
		foreach($comments as $comment) : 
	?>
		<div class="comment">
			<div class="comment-inner">
				<div class="grid-container" style="padding: 0px;">
					<div class="comment-header">
						<div class="comment-header-inner">
							<?php echo ($comment->comment_author); ?> | <?php echo get_comment_date(); ?>
							<!--Comment reply link here...-->
						</div>
					</div>
					<div class="comment-content">
						<div class="comment-content-inner">
							<div class="grid-10">
								<?php
									$avatar = get_avatar(get_comment_author_email());
										echo $avatar;
							?>
							</div>
							<div class="grid-90">
								<?php
									echo ($comment->comment_content);
								?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php endforeach; ?>
<br/>
<?php comment_form(); ?>
<?php endif; ?>
<!--End of comments-->
<?php get_header(); ?>
<?php

//=========================
// Define global vars
//=========================
$posts_per_page = get_option('posts_per_page');
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

?>

		<!--Start of hero-->
		<div class="header" align="center">
			<h1><?php echo get_bloginfo('name'); ?></h1>
			<img src="<?php bloginfo('template_url'); ?>/imgs/m-light.png" class="stache"/>
		</div>
		<!--End of hero-->



		<!--Start of portfolio-->
		<?php if (is_single() == false) : ?>
			<div class="container" id="portfolio">
				<div class="grid-container">
					<?php query_posts("posts_per_page=-1"); ?>
					<?php if (have_posts()) : ?>
						<?php while (have_posts()) : the_post(); ?>
							<?php if (get_post_format($post_id) == "image") : ?>
								<div class="post-details" id="details-<?php echo get_the_ID(); ?>">
									<div align="right">
										<div class="post-details-closebox" onClick="hideDetails('details-<?php echo get_the_ID(); ?>');"><div class="post-details-close">&times;</div></div>
									</div>
									<div class="post-details-content-holder" align="center">
										<div class="post-details-content" align="center">
											<div class="grid-60">
												<img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id($post->ID)) ?>" class="post-details-img"/>
											</div>
											<div class="grid-30" align="left">
												<div class="post-cap-title"><?php echo the_post_thumbnail_caption(); ?></div>
												<div class="post-cap-sep">&times;</div>
												<div class="post-cap"><?php the_excerpt(); ?></div>
											</div>
										</div>
									</div>
								</div>
								<div class="grid-25 post-holder" style="margin-bottom: 20px;">
									<div class="post" style="background-image: url('<?php echo wp_get_attachment_url(get_post_thumbnail_id($post->ID)) ?>');" onClick="showDetails('details-<?php echo get_the_ID(); ?>');"></div>
									<div class="arrow-up"></div>
									<div class="post-title">
										<div class="post-title-inner">
											<a href="<?php echo get_permalink();?>" style="text-decoration: none;"><h4><?php the_title(); ?></h4></a>
										</div>
									</div>
								</div>
							<?php endif; ?>
						<?php endwhile; ?>
					<?php endif; ?>
				</div>
			</div>
		<?php endif; ?>
		<?php wp_reset_query(); ?>
		<!--End of portfolio-->

		<!--Start of mobile portfolio-->
		<?php if (is_home()) : ?>
			<div class="mobile-container" id="portfolio" align="center">
				<br/><br/><br/>
				<?php query_posts("posts_per_page=-1"); ?>
				<?php if (have_posts()) : ?>
					<?php while (have_posts()) : the_post(); ?>
						<?php if (get_post_format($post_id) == "image") : ?>
							<div class="mobile-post-holder" style="margin-bottom: 20px;">
								<div class="post" style="background-image: url('<?php echo wp_get_attachment_url(get_post_thumbnail_id($post->ID)) ?>');"></div>
								<div class="post-title">
									<div class="post-title-inner"><?php the_title(); ?></div>
								</div>
							</div>
						<?php endif; ?>
					<?php endwhile; ?>
				<?php endif; ?>
			</div>
		<?php endif; ?>
		<?php wp_reset_query(); ?>
		<!--End of mobile portfolio-->



		<!--Start of blog-->
		<?php //If there are widgets in the sidebar... ?>
		<?php if (is_active_sidebar( 'sidebar-1' )) : ?>
			<div class="floats" id="blog">
				<div class="main">
					<div class="container">
						<?php
							if (is_single() == false) {
								$args = array(
									'paged' => $paged,
  									'tax_query' => array(
    									array(
      										'taxonomy' => 'post_format',
      										'field' => 'slug',
     										'terms' => 'post-format-image',
      										'operator' => 'NOT IN',
   										)
  									)
								);
								query_posts($args);
							};
						?>
						<?php $currentPost = 0; ?>
						<?php if (have_posts()) : ?>
							<?php while (have_posts()) : the_post(); ?>
								<?php if (get_post_format($post_id) == null) : ?>
									<?php $currentPost = $currentPost + 1; ?>
									<?php if (has_post_thumbnail()) : ?>
									<img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id($post->ID)) ?>" style="width: 100%; height: auto; margin-bottom: -5px;"/>
									<?php endif; ?>
									<div class="grid-container text-post">
										<div class="grid-100">
											<?php if ($currentPost == 1 && $_GET['paged'] == null && is_home()) : ?>
												<div class="new">
													<div class="new-inner">
														new
													</div>
												</div>
											<?php endif; ?>
											<?php if (is_single() == false) : ?>
												<a href="<?php echo get_permalink(); ?>" style="text-decoration: none;">
													<h2 style="text-align: center;"><?php the_title(); ?></h2>
												</a>
											<?php else : ?>
												<h2 style="text-align: center;"><?php the_title(); ?></h2>
											<?php endif; ?>
											<div class="text-post-date"><?php echo get_the_date(); ?></div>
											<div class="page-content">
												<?php if (is_single() == false) : ?>
													<?php the_excerpt(); ?>
												<?php else : ?>
													<?php the_content(); ?>
												<?php endif; ?>
											</div>
										</div>
									</div>
								<?php else : ?>
									<img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id($post->ID)) ?>" style="width: 100%; height: auto; margin-bottom: -5px;"/>
									<div class="grid-container text-post">
										<div class="grid-100">
											<h2 style="text-align: center;"><?php the_title(); ?></h2>
											<div class="text-post-date">Portfolio | <?php echo get_the_date(); ?></div>
											<div class="page-content">
												<?php the_content(); ?>
											</div>
										</div>
									</div>
								<?php endif; ?>

								<?php comments_template(); ?>

							<?php endwhile; ?>
						<?php endif; ?>
						<div class="nav-previous alignleft"><?php next_posts_link('Older posts'); ?></div>
						<div class="nav-next alignright"><?php previous_posts_link('Newer posts'); ?></div>
						<?php wp_reset_query(); ?>
					</div>
				</div>
				<div class="side">
					<div class="sidebar">
						<div class="grid-container">
							<div class="grid-100">
								<?php dynamic_sidebar('sidebar-1'); ?>
							</div>
						</div>
					</div>
				</div>
				<!--Clear the floats-->
				<div style="clear: both;"></div>
			</div>

			<?php //If no sidebar... ?>
			<?php else : ?>

				<div class="full">
					<div class="main" style="float: none; width: 100%;">
						<div class="container">
							<div class="grid-container">
								<?php
									if (is_single() == false) {
										$args = array(
											'paged' => $paged,
  											'tax_query' => array(
    											array(
      												'taxonomy' => 'post_format',
      												'field' => 'slug',
     												'terms' => 'post-format-image',
      												'operator' => 'NOT IN'
   												)
  											)
										);
										query_posts($args);
									}
								?>
								<?php $currentPost = 0; ?>
								<?php if (have_posts()) : ?>
									<?php while (have_posts()) : the_post(); ?>
										<?php if (get_post_format($post_id) == null) : ?>
											<?php $currentPost = $currentPost + 1; ?>
											<?php if (has_post_thumbnail()) : ?>
												<img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id($post->ID)) ?>" style="width: 100%; height: auto; margin-bottom: -5px;"/>
											<?php endif; ?>
											<div class="grid-container text-post">
												<div class="grid-100">
													<?php if ($currentPost == 1 && $_GET['paged'] == null && is_home()) : ?>
														<div class="new">
															<div class="new-inner">
																new
															</div>
														</div>
													<?php endif; ?>
													<?php if (is_single() == false) : ?>
														<a href="<?php echo get_permalink(); ?>" style="text-decoration: none;">
															<h2 style="text-align: center;"><?php the_title(); ?></h2>
														</a>
													<?php else : ?>
														<h2 style="text-align: center;"><?php the_title(); ?></h2>
													<?php endif; ?>
													<div class="text-post-date"><?php echo get_the_date(); ?></div>
													<div class="page-content">
														<?php the_content("Read more..."); ?>
													</div>
												</div>
											</div>
										<?php else : ?>
											<img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id($post->ID)) ?>" style="width: 100%; height: auto; margin-bottom: -5px;"/>
											<div class="grid-container text-post">
												<div class="grid-100">
													<h2 style="text-align: center;"><?php the_title(); ?></h2>
													<div class="text-post-date">Portfolio | <?php echo get_the_date(); ?></div>
													<div class="page-content">
														<?php the_content(); ?>
													</div>
												</div>
											</div>
										<?php endif; ?>
									<?php endwhile; ?>
								<?php endif; ?>
							</div>
							<div class="nav-previous alignleft"><?php next_posts_link('Older posts'); ?></div>
							<div class="nav-next alignright"><?php previous_posts_link('Newer posts'); ?></div>
						<?php wp_reset_query(); ?>
						</div>
					</div>
				</div>
		<?php endif; ?>
		<!--End of blog-->

		<!--Start of mobile blog-->
		<div class="mobile-full">
			<div class="mobile-main">
				<div class="mobile-container">
					<?php
									if (is_single() == false) {
										$args = array(
											'paged' => $paged,
  											'tax_query' => array(
    											array(
      												'taxonomy' => 'post_format',
      												'field' => 'slug',
     												'terms' => 'post-format-image',
      												'operator' => 'NOT IN'
   												)
  											)
										);
										query_posts($args);
									}
								?>
								<?php $currentPost = 0; ?>
								<?php if (have_posts()) : ?>
									<?php while (have_posts()) : the_post(); ?>
										<?php if (get_post_format($post_id) == null) : ?>
											<?php $currentPost = $currentPost + 1; ?>
											<?php if (has_post_thumbnail()) : ?>
												<img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id($post->ID)) ?>" style="width: 100%; height: auto; margin-bottom: -5px;"/>
											<?php endif; ?>
											<div class="grid-container text-post">
												<div class="grid-100">
													<?php if (is_single() == false) : ?>
														<a href="<?php echo get_permalink(); ?>" style="text-decoration: none;">
															<h2 style="text-align: center;"><?php the_title(); ?></h2>
														</a>
													<?php else : ?>
														<h2 style="text-align: center;"><?php the_title(); ?></h2>
													<?php endif; ?>
													<div class="text-post-date"><?php echo get_the_date(); ?></div>
													<div class="page-content">
														<?php if (is_single() == false) : ?>
															<?php the_excerpt(); ?>
														<?php else : ?>
															<?php the_content(); ?>
														<?php endif; ?>
													</div>
												</div>
											</div>
										<?php else : ?>
											<img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id($post->ID)) ?>" style="width: 100%; height: auto; margin-bottom: -5px;"/>
											<div class="grid-container text-post">
												<div class="grid-100">
													<h2 style="text-align: center;"><?php the_title(); ?></h2>
													<div class="text-post-date">Portfolio | <?php echo get_the_date(); ?></div>
													<div class="page-content">
														<?php the_content(); ?>
													</div>
												</div>
											</div>
										<?php endif; ?>
									<?php endwhile; ?>
								<?php endif; ?>
					<div class="nav-previous alignleft"><?php next_posts_link('Older posts'); ?></div>
					<div class="nav-next alignright"><?php previous_posts_link('Newer posts'); ?></div>
				</div>
			</div>
		</div>
	</div>
	<!--End of mobile blog-->



<?php get_footer(); ?>
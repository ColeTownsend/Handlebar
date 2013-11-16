		<!-- scroll to top -->
		<!-- put in span to hide if mobile -->
		<span class="toTop-hold">
			<div class="toTop">
				<div class="toTop-inner">
					<div class="toTop-inner-arrow">
						&uarr;
					</div>
				</div>
			</div>
		</span>
		
		<!-- start of bottom widget area -->
		<?php if (is_active_sidebar('bottom')) : ?>
			<div class="bottom">
				<div class="bottom-inner">
					<div class="grid-container">
						<?php dynamic_sidebar('bottom'); ?>
					</div>
				</div>
			</div>
		<?php endif; ?>
		<!-- end of bottom widget area -->

		<!-- start of footer -->
		<div class="footer">
			<div class="grid-container">
				<div class="grid-100">
					<p class="footer-text">&copy; <?php echo get_bloginfo('name'); ?> <?php echo date("Y"); ?><p>
					<p class="footer-text">Handlebar by <a href="http://codingbean.org" style="color: #4D4D4D; text-decoration: none;">Codingbean</a></p>
				</div>
			</div>
		</div>
		<!-- end of footer -->

		<!-- start of mobile footer -->
		<div class="mobile-footer">
			<div class="mobile-footer-textholder">
				<p class="mobile-footer-text">&copy; <?php echo get_bloginfo('name'); ?> <?php echo date("Y"); ?><p>
				<p class="mobile-footer-text">Handlebar by <a href="http://codingbean.org" style="color: #4D4D4D; text-decoration: none;">Codingbean</a></p>
			</div>
		</div>
		<!-- end of mobile footer -->
	</body>
</html>
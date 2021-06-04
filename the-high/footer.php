<?php
// footer template for Basic Theme
?> 		
		
		<footer id="footer">
		
			
			<div class="container foot-container">
				<div id="foot-text" class="row row-eq-height">
				
					<div class="footer-content">
						<a class="button foot-button" href="/contact"> <?php _e('Contact Us', 'the-high'); ?> </a>
						
						<ul class="social-icon">
							<li><a href=" "><i class="linkedin social-link"></i></a></li>
							<li><a href=""><i class="twit social-link"></i></a></li>
							<li><a href=""><i class="face social-link"></i></a></li>
						
						</ul>
					</div>
					
					<div class="footer-content">
						<p class="foot-text"> <?php _e('All Rights Reserved.&copy; Copyright' . date('Y'), 'the-high'); ?>  </p>
					</div>
				</div>
				
			</div>
			
			<?php wp_footer(); ?>
				
		</footer><!-- close footer -->
	</body>
</html>
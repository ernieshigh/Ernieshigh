<?php
/***
	^
	* Template for showing Paralax
	* Template Name: Yoga
	*
***/


global $post;

?>

<?php get_header(); ?>

	
	<main class="yoga-main">

<ul id="nav">
<li><a id="n-intro" href="#intro" title="Next Section" class="active"><img src="../wp-content/themes/the-high/assets/images/button.png" alt="Link"></a></li>
<li><a id="n-mountain" href="#mountain" title="Next Section"><img src="../wp-content/themes/the-high/assets/images/button.png" alt="Link"></a></li>
<li><a id="n-tree" href="#tree" title="Next Section"><img src="../wp-content/themes/the-high/assets/images/button.png" alt="Link"></a></li>
<li><a id="n-warrior" href="#warrior" title="Next Section"><img src="../wp-content/themes/the-high/assets/images/button.png" alt="Link"></a></li>
<li><a id="n-legs" href="#legs" title="Next Section"><img src="../wp-content/themes/the-high/assets/images/button.png" alt="Link"></a></li>
<li><a id="n-child" href="#child" title="Next Section"><img src="../wp-content/themes/the-high/assets/images/button.png" alt="Link"></a></li>
<li><a id="n-corpse" href="#corpse" title="Next Section"><img src="../wp-content/themes/the-high/assets/images/button.png" alt="Link"></a></li>
<li><a id="n-foot" href="#outro" title="Next Section"><img src="../wp-content/themes/the-high/assets/images/button.png" alt="Link"></a></li>
</ul>
<div id="intro">
				 <h1>Can add content or image or background here</h1>
				 <a href="#mountain" style="display: block;"><img alt="Next position" src="../wp-content/themes/the-high/assets/images/down-arrow-white.png"></a>
				 
			</div>
			
			<div id="mountain" class="background">
				
				<div class="para-content">
				
					<h1>MOUNTAIN POSE</h1>
					<h2> "TADASANA" </h2>
					<p>Strengthens your legs and feet. Provides a sense of groundedness and stability while helping improve your posture.</p>
				</div>
				<div class="pose"><div class="bg"></div></div>
				
				<!-- insert mock background for mobiles -->
				<div class="pose-figure">
					<div class="figure">
						<img src="../wp-content/themes/the-high/assets/images/mobile-mtn-person.png " alt="Yoga Postures -Mountain Pose" title="Yoga Postures  - Mountain Pose">
					</div>
				</div>
			</div>
			
			<div id="tree" class="background">
				
				<div class="para-content">
					<h1>TREE POSE</h1>
					<h2>"Vrksasana"</h2>
					<p>Improves your balance while strengthening and stretching areas all along the center of your upper and lower body. Strength, balance and flexibility are key aspects of a healthy life.</p> 
				</div>
				<div class="pose"><div class="bg"></div></div>
					<!-- insert mock background for mobiles -->
				<div class="pose-figure">
					<div class="figure">
						<img src="../wp-content/themes/the-high/assets/images/mobile-tree-person.png" alt="Yoga Postures -Tree Pose" title="Yoga Postures  - Tree Pose">
					</div>
				</div>
			</div>
			
			<div id="warrior" class="background">
				<div class="para-content">
					<h1>WARRIOR POSE</h1> 
					<h2>"Virabhadrasana"</h2>
					<p>Increases overall strength and stability. This is another pose that builds a strong foundation of grounded strength.</p>
				</div>
				<div class="pose"><div class="bg"></div></div>
					<!-- insert mock background for mobiles -->
				<div class="pose-figure">
					<div class="figure">
						<img src="../wp-content/themes/the-high/assets/images/mobile-warrior-person.png" alt="Yoga Postures -Warrior Pose" title="Yoga Postures  - Warrior Pose">
					</div>
				</div>
			</div>
			
			<div id="legs" class="background">
				<div class="para-content">
					<h1>LEGS-UP-THE-WALL POSE</h1> 
					<h2>"Viparita Karani"</h2>
					<p>Provides relief and relaxation for the legs and feet. </p>
				</div>
				<div class="pose"><div class="bg"></div></div>
					<!-- insert mock background for mobiles -->
				<div class="pose-figure">
					<div class="figure">
						<img src="../wp-content/themes/the-high/assets/images/mobile-legs-person.png" alt="Yoga Postures -Legs Wall Pose" title="Yoga Postures  - Legs Wall Pose">
					</div>
				</div>
			</div>
			
			<div id="child" class="background">
				<div class="para-content">
					<h1>CHILD'S POSE</h1> 
					<h2>"Balasana"</h2>
					<p>This resting pose releases tension, calms the mind, and increases feelings of safety and security, which helps reduce stress and fatigue. </p>
				</div>
				<div class="pose"><div class="bg"></div></div>
					<!-- insert mock background for mobiles -->
				<div class="pose-figure">
					<div class="figure">
						<img src="../wp-content/themes/the-high/assets/images/mobile-childs-person.png" alt="Yoga Postures  Child Pose" title="Yoga Postures  - Child Pose">
					</div>
				</div>
			</div>
			
			<div id="corpse" class="background">
				<div class="para-content"> 
					<h1>CORPSE POSE</h1>
					<h2>"Shavasana"</h2>
					<p>Leads to deep relaxation, which can relieve stress and mild depression, lowers blood pressure and reduces fatigue. </p>
				</div>
				<div class="pose"><div class="bg"></div></div>
					<!-- insert mock background for mobiles -->
				<div class="pose-figure">
					<div class="figure">
						<img src="../wp-content/themes/the-high/assets/images/mobile-corpse-person.png" alt="Yoga Postures  Corpse Pose" title="Yoga Postures  - Corpse Pose">
					</div>
				</div>
			</div>
					
			
			
		<footer class="yoga">
			<div id="outro">
				<p class="outro-content">This relaxed and peaceful discipline ultimately leads the practitioner to establish strong self-control over their own thoughts, emotions and actions. </p>
				<h2 class="dark"><a href="">See the source files at Github.</a></h2>
				<h2 class="light">Images and design done by others</h2>
			</div>
		</footer>

		
				<script type="text/javascript">

			jQuery(document).ready(function(){	
			
			
					var window = jQuery(window),
						windowHeight = window.height(),
						windowWidth = window.width();
				
						jQuery('#mountain').parallax("50%", 0.5);
						jQuery('#tree').parallax("50%", 0.5);
						jQuery('#warrior').parallax("50%", 0.5);
						jQuery('#legs').parallax("50%", 0.5);
						jQuery('#corpse').parallax("50%", 0.5);
						jQuery('#child').parallax("50%", 0.5);
						
					
				
			});
			
			 jQuery('#nav li a').click(function(e) {
				jQuery('#nav li a').removeClass('active');
				jQuery(this).next().addClass('active');
			});
	 
	</script>
	</main>

<?php get_footer();
<?php
/*
Template Name: Homepage
*/
?>

<?php get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<!-- Main content -->
		<section id="homepage-content" class="main-content">
		
			<article class="homepage-article main-stage-shows">
				<h1>Current Show</h1>
				<?php 
					// Set up a custom query that pulls show posts in the current-shows category
					$the_query = new WP_Query( array(
						'post_type' => 'show_post',
						'category_name' => 'current-shows'
					) );

					// Use the custom query in the Loop
					if ( $the_query->have_posts() ) :
						while ( $the_query->have_posts() ) : 
							$the_query->the_post() ; ?>
							<a href="<?php the_permalink() ?>"><img class="shows" src="<?php the_field('show_logo'); ?>" alt="<?php the_title(); ?>"></a>
							<h2><?php the_title(); ?></h2>
							<p><?php the_field('description_of_show'); ?></p>
							<p><a href="<?php the_permalink() ?>" class="text-link"><strong>Performances:</strong></a> <?php the_field('performance_dates'); ?></p>
						<? endwhile;
					endif;

					//Reset the query to the default
					wp_reset_postdata() ;
				?>
			</article> <!-- .homepage-article -->

			<article class="homepage-article auditions">
				<h1>Auditions</h1>
				<?php 
					// Set up a custom query that pulls audition posts in the current-auditions category
					$the_query = new WP_Query( array(
						'post_type' => 'audition_post',
						'category_name' => 'current-auditions', 
					) );

					// Use the custom query in the Loop
					if ( $the_query->have_posts() ) :
						while ( $the_query->have_posts() ) : 
							$the_query->the_post() ; ?>
							<a href="<?php the_permalink() ?>"><img class="auditions" src="<?php the_field('audition_logo'); ?>" alt="<?php the_title(); ?>"></a>
							<h2><?php the_title(); ?></h2>
							<p><?php the_field('about_the_play'); ?></p>
							<p><a href="<?php the_permalink() ?>" class="text-link"><strong>Auditions:</strong></a> <?php the_field('audition_dates'); ?></p>
						<? endwhile;
					endif;

					//Reset the query to the default
					wp_reset_postdata() ;
				?>
			</article> <!-- .homepage-article -->
		
<!-- Old code from WordPress; keeping around just in case
			<article class="homepage-article">		
//				<?php 
//					$posts = get_posts(array(
//						'numberposts' => -1,
//						'post_type' => 'show_post',
//					));
//
//					if($posts)
//					{
//						foreach($posts as $post)
//						{
//							echo '<a class="show-image" href="' . get_permalink($post->ID) . '">' . get_the_post_thumbnail($post->ID) . '</a>';
//							echo '<h1><a href="' . get_permalink($post->ID) . '">' . get_field('show_status') . '</a></h1>';
//							echo '<h2><a href="' . get_permalink($post->ID) . '">' . get_the_title($post->ID) . '</a></h2>';
//							echo '<div class="performances"><a class="text-link" href="' . get_permalink($post->ID) . '">' . "Performances:" . '</a>' . "&nbsp;" . get_field('performance_dates') . '</div>' ;
//							echo '<div class="wide">' . get_field('description_of_show') . '</div>' ;
//						}
//					}					 
//				?> 
			</article> .homepage-article -->
			
		</section> <!-- .main-content -->	
			
			<!-- Sidebar (right column) -->
			<section class="custom-sidebar">
				<section class="sidebar-icons clear">
					<section class="social-media">
						<img src="http://taf.leahbateman.com/wp-content/themes/taf/images/facebook.png" alt="Facebook icon">
						<img src="http://taf.leahbateman.com/wp-content/themes/taf/images/twitter.png" alt="Twitter icon">
						<img src="http://taf.leahbateman.com/wp-content/themes/taf/images/youtube.png" alt="YouTube icon">
						<img src="http://taf.leahbateman.com/wp-content/themes/taf/images/googleplus.png" alt="Google+ icon">
					</section>
					<section class="awards">
						<img src="http://taf.leahbateman.com/wp-content/themes/taf/images/phoenix-best2010-ribbon.png" alt="Boston Phoenix Best of 2010 ribbon icon">
					</section>
				</section>
				
				<section class="sidebar-buttons clear">
					<button type="button">Buy Tickets</button>
					<button type="button">Subscribe</button>
					<button type="button">Donate</button>
				</section>
				
				<section class="about-us">
					<h1>About Us</h1>
					<p>Theatre@First is an all-volunteer community theatre based in Somerville, MA. Founded in 2003, we fill a vital niche in the vibrant Davis Square arts scene. We draw upon the talents and support of individuals and organizations throughout the community to provide opportunities for our participants and audiences to experience quality live theatre in a variety of local venues. For more about our recent history, see our In the Press page.</p>
				</section>
			</section>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>

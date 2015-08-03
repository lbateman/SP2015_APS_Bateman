<?php
/*
Template Name: Tickets
*/

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<!-- show information (left column) -->
			<section class="main-content">
				<h1><?php the_title() ; ?></h1>

						<?php

							// info for shows with suggested donations, like Bare Bones and FirstWorks
							$nonticketed = new WP_Query( array ( 
								'post_type' => 'show_post',
								'category_name' => 'non-ticketed', 
								'posts_per_page' => 10 ,
							) ) ;

							if ( $nonticketed->have_posts() ) :
								while ( $nonticketed->have_posts() ) :
									$nonticketed->the_post() ; ?>
									<a href="<?php the_permalink() ?>"><img src="<?php the_field('show_logo'); ?>" alt="<?php the_title(); ?>"></a>
									<h2><?php the_title(); ?></h2>
									<p><strong>ONE NIGHT ONLY!</strong> <?php the_field('performance_dates'); ?></p>
									<p><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a> will be presented at <a href="<?php the_field('venue_url'); ?>"><?php the_field('venue_name'); ?></a>, <?php the_field('venue_address'); ?></p>
									<?php if( have_rows('ticket_prices') ) :
									    while ( have_rows('ticket_prices') ) :
									    	the_row() ; ?>
									        <p><strong>Suggested Donation <?php the_sub_field('ticket_price'); ?></strong> - General Admission - No reservations required</p>
										<?php endwhile ;
									endif; ?>
								<?php endwhile ;
							endif ;

							wp_reset_postdata() ;

							// info for shows that sell tickets, like main stage shows
							$ticketed = new WP_Query( array ( 
								'post_type' => 'show_post',
								'category_name' => 'ticketed', 
								'posts_per_page' => 10 ,
							) ) ;

							if ( $ticketed->have_posts() ) :
								while ( $ticketed->have_posts() ) :
									$ticketed->the_post() ; ?>
									<a href="<?php the_permalink() ?>"><img src="<?php the_field('show_logo'); ?>" alt="<?php the_title(); ?>"></a>
									<h2><?php the_title(); ?></h2>
									<p><?php the_field('description_of_show') ; ?></p>
									<p><a href="<?php the_permalink() ?>" class="text-link"><strong>Performances:</strong></a> <?php the_field('performance_dates'); ?></p>
									
									<h3>Ticket Prices</h3>
									<?php if( have_rows('ticket_prices') ) :
									    while ( have_rows('ticket_prices') ) :
									    	the_row() ; ?>
									        <p><?php the_sub_field('ticket_type');
									        the_sub_field('ticket_price'); ?></p>
										<?php endwhile ;
									endif; ?>

									<p>Group discounts are available for 8 people or more &#8211; email <a href="mailto:groups@theatreatfirst.org">groups@theatreatfirst.org</a></p>

							    	<h3>Buy Tickets in Advance at <?php the_field('ticket_service_name') ?></h3>
							        <p><a href="<?php the_field('ticket_service_url') ; ?>"><img src="<?php the_field('ticket_service_logo') ; ?>" alt="<?php the_field('ticket_service_name') ?>"></a>
							        <?php the_field('ticket_service_description'); ?></p>

							        <p>If you would like to reserve your tickets now and pay at the door, please use the form below. Tickets at the door may be purchased by cash only.</p>

							        <form action="http://formmail.dreamhost.com/cgi-bin/formmail.cgi" method="POST">
        								<input type=hidden name="recipient" value="webmaster@theatreatfirst.org">
        								<input type=hidden name="subject" value="Ticket Reservations for <?php the_field('show_name'); ?>">
        								<table>
											<tr>
												<td><hr></td>
											</tr>
											<tr>
												<td colspan="2"><h3>Reserve Tickets - Pay at Door</h3></td>
											</tr>
											<tr>
												<td colspan="2"><p>When you submit this reservation form, your request is sent directly to the House Manager, who will then contact you via e-mail or phone to confirm your reservation. Payment will be due at the door, by cash only.</p></td>
											</tr>
											<tr>
												<td colspan="2"><hr></td>
											</tr>
											<tr>
												<td>Your Name/Name of Party</td>
												<td><input type="text" name="Name/Name of Party" size="50"></td>
											</tr>
											<tr>
												<td>Contact E-mail&nbsp;</td>
												<td><input type="text" name="E-mail Address" size="50"></td>
											</tr>
											<tr>
												<td>Contact Phone&nbsp;</td>
												<td><input name="Phone #" type="text" size="50"></td>
											</tr>
											<tr>
												<td>Your Town</td>
												<td><input type="text" name="Your Town" size="50"></td>
											</tr>
											<tr>
												<td colspan="2"><hr></td>
											</tr>  
											<tr>
												<td><input name="# of Adult Tickets" type="text" id="# Adult Tickets" size="3"></td>
												<td>Adult ($15 each)</td>
											</tr>
											<tr>
												<td><input name="# Student Tickets" type="text" id="# Student Tickets" size="3"></td>
												<td>Student ($12 each)</td>
											</tr>
											<tr>
												<td><input name="# of Senior Tickets" type="text" id="# of Senior Tickets" size="3"></td>
												<td>Senior ($12 each)</td>
											</tr>
											<tr>
												<td><input name="# of T@F Member/Subscriber Tickets" type="text" id="# of T@F Member/Subscriber Tickets" size="3"></td>
												<td>I am a T@F Member/Subscriber and need this number of tickets from my annual allotment</td>
											</tr>
											<tr>
												<td><input name="# of T@F Subscriber Tickets at the Door" type="text" id="# of T@F Subscriber Tickets at the Door" size="3"></td>
												<td>I am planning on purchasing a T@F Subscription at the door and need this number of tickets from my annual allotment</td>
											</tr>
											<tr>
												<td colspan="2">(click <a href="membership.shtml">here</a> to read more about T@F Subscriber ticket benefits)</td>
											</tr>
											<tr>
												<td><hr colspan="2"></td>
											</tr>  
											<?php if( have_rows('performance_schedule') ) :
											    while ( have_rows('performance_schedule') ) :
											    	the_row() ; ?>
											        <tr>
											        	<td colspan="2"><input type="radio" name="Date" value="<?php the_sub_field('perf_short_version'); ?>"><?php the_sub_field('perf_short_version'); ?></td>
											        </tr>
												<?php endwhile ;
											endif; ?>
											<tr>
												<td><hr colspan="2"></td>
											</tr>
											<tr>
												<td>How did you hear about this production?&nbsp;</td>
												<td><textarea name="How Did You Hear About Us?" cols="56" rows="2" id="How did you hear about us?"></textarea></td>
											</tr>
											<tr>
												<td><hr></td>
											</tr>
											<tr>
												<td colspan="2"><p><input name="submit" type="submit" value="Submit Reservation"><input name="reset" type="reset" value="Reset Form"></td>
											<tr>
												<td colspan="2"><p style="text-align: left"><span>NOTE:</span> Some people have been receiving errors when sending their reservation forms.&nbsp; If your form is rejected by FormMail, please send an e-mail to <a href="mailto:tickets@theatreatfirst.org">tickets@theatreatfirst.org</a> and include your reservation and/or Booster Ad information.&nbsp; If possible, please cut and paste the error message as well so we can use it to isolate the problem.&nbsp; Thank you.</p></td>
											</tr>
        								</table>
      								</form>

							    <?php endwhile ;
							else : ?>
								<p>There are no current main stage shows for which tickets are available. Please check <a href="http://localhost:1337/taf2/">our website</a> or sign up for our <a href="http://localhost:1337/taf2/mailing-list/">mailing list</a> for updates.</p>
							<?php endif ;
						
							wp_reset_postdata() ;
						?>

							<p><strong>Suggested Donation $5</strong> - General Admission - No reservations required</p>
					
			</section> <!-- main-content -->

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

<?php get_footer(); ?>

<?php
/**
 * The template for displaying all audition posts.
 *
 * @package taf
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<!-- show information (left column) -->
			<section class="main-content">
				<section class="show-info">
					<?php if( get_field('audition_logo') ): ?>
						<img src="<?php the_field('audition_logo'); ?>" />
					<?php endif; ?>
					<h1><?php the_title(); ?></h1>
				</section> <!-- End of show-info -->

				<section class="audition-info">
					<h2>General Audition Information</h2>
					<p><strong>Auditions:</strong> <?php the_field('audition_dates'); ?></p>
					<p><strong>Callbacks:</strong> <?php the_field('callback_date'); ?></p>
					<p>Please read all the details on the audition information sheet, and fill in the <a href="#audform">webform at the bottom of this page</a> to make an appointment. You will receive a confirmation email shortly.</p>
					<ul>
						<li><strong>Audition Location:</strong> <?php the_field('audition_venue'); ?></li>
						<li><strong>Audition Information:</strong> <?php the_field('audition_information_blurb'); ?></li>
						<li><strong>Audition Form:</strong> <?php the_field('audition_form_blurb'); ?></li>
						<li><strong>Audition Materials:</strong> <?php the_field('audition_materials'); ?></li>
						<li><strong>Audition Sides:</strong> <?php the_field('audition_sides_blurb'); ?></li>
						<li><strong>Calendar:</strong> <?php the_field('calendar_blurb'); ?></li>
					</ul>
				</section> <!-- End of audition-info -->

				<section class="performance-info">
					<h3>About the Show</h3>
					<p><strong>Performance Info:</strong> <?php the_field('performance_info'); ?></p>
					<p><strong>About the Play:</strong> <?php the_field('about_the_play'); ?></p>
					<p><strong>About the Director:</strong> <?php the_field('about_the_director'); ?></p>
				</section><!-- End of performance-info -->
				
				<section class="character-descriptions">
					<h3>Character Descriptions</h3>
					<?php while (have_rows('character_descriptions')): the_row(); ?>
						<section class="char-desc">
							<strong><?php the_sub_field('character_name'); ?></strong><br />
							<?php the_sub_field('character_description'); ?>
						</section> <!-- End of char-desc -->
					<?php endwhile; ?>
				</section><!-- End of character-descriptions -->
				
				<section class="reservation-form">
					<a name="audform"></a>
					<h2>Audition Reservation Form</h2>
						<form action="http://formmail.dreamhost.com/cgi-bin/formmail.cgi" method="POST">
							<input type=hidden name="recipient" value="auditions@theatreatfirst.org">
        					<input type=hidden name="subject" value="Audition Reservations TROJAN WOMEN">
							<table>
								<tr>
									<td>Name</td>
									<td><input type="text" name="Name" size="50"></td>
								</tr>
								<tr>
									<td>E-mail</td>
									<td><input type="text" name="E-mail Address" size="50"></td>
								</tr>
								<tr>
									<td>Preferred Timeslot</td>
								</tr>
								<tr>
									<td><input type="radio" name="Date" value="9/2 7pm"></td>
									<td>Tuesday, September 2, 7pm</td>
								</tr>
								<tr>
									<td><input type="radio" name="Date" value="9/2 8pm"></td>
									<td>Tuesday, September 2, 8pm</td>
								</tr>
								<tr>
									<td><input type="radio" name="Date" value="9/2 9pm"></td>
									<td>Tuesday, September 2, 9pm</td>
								</tr>
								<tr>
									<td>&nbsp;</td>
									<td></td>
									<td></td>
								</tr>
								<tr>
									<td>Second Choice</td>
								</tr>
								<tr>
									<td><input type="radio" name="Date" value="9/2 7pm"></td>
									<td>Tuesday, September 2, 7pm</td>
								</tr>
								<tr>
									<td><input type="radio" name="Date" value="9/2 8pm"></td>
									<td>Tuesday, September 2, 8pm</td>
								</tr>
								<tr>
									<td><input type="radio" name="Date" value="9/2 9pm"></td>
									<td>Tuesday, September 2, 9pm</td>
								</tr>
								<tr>
									<td width="663" height="123" colspan="3">
										<div align="center">
											<p><input name="submit" type="submit" value="Submit">
		               							<input name="reset" type="reset" value="Reset Form"></p>
										</div>
									</td>
								</tr>
							</table>
						</form>
					<p>NOTE: Some people have been receiving errors when sending their forms. If your form is rejected by FormMail, please send an e-mail to <a href="mailto:auditions@theatreatfirst.org">auditions@theatreatfirst.org</a> and include your information. If possible, please cut and paste the error message as well so we can use it to isolate the problem. Thank you.</p>					
				</section><!-- End of reservation-form -->
				
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
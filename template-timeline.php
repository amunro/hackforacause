<?php
/**
 * Template Name: Timeline
 *
 * @author Conrad Muan <con.muan@gmail.com>
 * @package hack_theme
 * @subpackage templates
 **/
?>
<?php get_header(); ?>

        <?php if(have_posts()) : while(have_posts()) : the_post(); ?>
        
        <article <?php post_class(); ?>>
            <header>
                <h1 class="the-title"><?php the_title(); ?></h1>
            </header>
            
            <?php the_content(); ?>
        
        <ul class="build-task-list">
            <h4 class="build-task-list-title">Checklist</h4>
                <li>Startup Tech Entrepreneurs > <span>They move fast, build things.</span></li>
                <li>One Night Only > <span>Everyone is busy. Focus.</span></li>
                <li>Build a Dream Team</li>
                <li>Overnight (6pm to 6am) > <span>Because cramming works.</span></li>
                <li>One Cause per Hack > <span>So we can go deep and truly understand their challenges.</span></li>
                <li>Social Technology > <span>Boost and amplify the efforts of the non-profits.</span></li>
                <li>Ship > <span>Must turn ideas into actions. Present products at 6am.</span></li>
                <li>Open > <span>Open source code to benefit all future Causes.</span></li>
        </ul>    
            
        <div id="timeline">
			<h4 class="timeline-title">Timeline</h4>
			
			<div class="parent step-conception">
				<h5 class="parent-title">Conception</h5>

						<div class="child">
							<span class="child-description">Develop the idea.</span>
						
								<div class="grand-child">
							
									<ul class="task-list">
										<li>Find a Cause</li>
										<li>Create a Facebook Group</li>
										<li>Build a Dream Team</li>
									</ul>
									
								</div><!-- end .grand-child -->
								
						</div><!-- end .child -->
						
			</div><!-- end .ste-conception -->
			
			
			<div class="parent step-groundwork">
				<h5 class="parent-title">Groundwork</h5>

						<div class="child">
							<span class="child-description">Plan. Organize. Make decisions.</span>
						
								<div class="grand-child">
									
									<ul class="task-list">
										<li>Find a Venue</li>
										<li>Cause digital property framework</li>
										<li>Cause objectives and challenges</li>
										<li>Install industrial grade WiFi network</li>
										<li>Set up Apple iOS Developer account</li>
										<li>Set up Android Developer account</li>
										<li>Access to Cause's FTP account</li>
										<li>Access to Cause's SQL databases</li>
									</ul>
									
								</div><!-- end .grand-child -->
								
						</div><!-- end .child -->
						
			</div><!-- end .step-groundwork -->
			
			
			
			<div class="parent step-prehack">
				<h5 class="parent-title">Pre-Hack</h5>

						<div class="child">
							<span class="child-description">Finalize the details.</span>
						
								<div class="grand-child">

									<ul class="task-list">
										<li>People + Skills matrix</li>
										<li>Registration Tool</li>
										<li>Access to Cause's creative asset repository</li>
										<li>Set up Github repository</li>
										<li>Create Dropbox folder</li>
										<li>Wiki to store required credentials</li>
										<li>Set up staging servers</li>
										<li>Organize food throughout the night and breakfast</li>
										<li>Facebook Developer AppID, Secret, and API Keys</li>
									</ul>
									
								</div><!-- end .grand-child -->
								
						</div><!-- end .child -->
						
			</div><!-- end .step-prehack -->
			
			
			
			<div class="parent step-hack">
				<h5 class="parent-title">Hack</h5>

						<div class="child">
							<span class="child-description">Build and ship.</span>
						
								<div class="grand-child">
									
									<ul class="task-list">
										<li>6pm: Registration</li>
										<li>7pm: Opening from organizers and cause leads</li>
										<li>8pm: Team Lead Huddle: get aligned</li>
										<li>10pm: Team Lead Huddle: 1st progress report</li>
										<li>12am: Product show and tell: get inspired, and midnight snack</li>
										<li>2am: Team Lead Huddle: Midway point - refine the MVP</li>
										<li>4am: Team Lead Huddle: Smash roadblocks and reallocate talent</li>
										<li>5am: QA</li>
										<li>6am: Ship and Demo.</li>
										<li>7am: Breakfast</li>
									</ul>
									
								</div><!-- end .grand-child -->
								
						</div><!-- end .child -->
						
			</div><!-- end .step-hack -->


			<div class="parent step-posthack">
				<h5 class="parent-title">Post-Hack</h5>

						<div class="child">
							<span class="child-description">Share shipped products. Iterate. Grow.</span>
						
								<div class="grand-child">

									<ul class="task-list">
										<li>Demo products</li>
										<li>Iterate products</li>
										<li>Share learnings</li>
										<li>Open Source Code.</li>
									</ul>
									
								</div><!-- end .grand-child -->
								
						</div><!-- end .child -->
						
			</div><!-- end .step-hack -->			
			
			
		</div><!-- end #timeline -->
            
            
        </article>
        
        <?php endwhile; else: ?>
        
        <article <?php post_class(); ?>>
            <h1>404 - Not Found</h1>
            <p>The content you were looking for was not found.</p>
            <p><?php get_search_form(); ?></p>
        </article>
        
        <?php endif; ?>

<?php get_footer(); ?>
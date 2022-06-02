<?php
			/* Start the Loop */
			//while ( have_posts() ) :
                ?>
<div class="main-content" style="text-align:center;">
    <h1 style="text-align:center;"> <?php echo get_the_title() ?></h1>
    <p><?php the_content() ?></p>
    <?php
				get_template_part( 'template-parts/content/content-singular' );
				


			//endwhile; // End of the loop.
			?>
</div>
<?php
			/* Start the Loop */
			while ( have_posts() ) :
                ?>
<div>
    <h1> <?php echo get_the_title(); ?></h1>
    <div><?php the_post(); ?></div>
    <?php
				get_template_part( 'template-parts/content/content-singular' );
				


			endwhile; // End of the loop.
			?>
</div>
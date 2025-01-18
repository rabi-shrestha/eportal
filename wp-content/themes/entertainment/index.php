<?php
get_header(); // Include header.php

// Start the Loop
if (have_posts()) :
    while (have_posts()) : the_post();
        ?>
        <article>
            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
            <div>
                <?php the_content(); ?>
            </div>
        </article>
        <?php
    endwhile;
endif;

get_footer(); // Include footer.php
?>

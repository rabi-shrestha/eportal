<?php
get_header();
?>

<article>
    <h2><?php the_title(); ?></h2>
    <div>
        <?php the_content(); ?>
    </div>
</article>

<?php
get_footer();
?>

<?php get_header(); ?>

<main>
    <h1>Search Results for: "<?php echo get_search_query(); ?>"</h1>

    <?php if ( have_posts() ) : ?>
        <div class="search-results">

            <?php while ( have_posts() ) : the_post(); ?>
                <article>
                    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                    <div><?php the_excerpt(); ?></div>
                </article>
            <?php endwhile; ?>
        </div>

        <div class="pagination">
            <?php
            // Display pagination if there are more results
            echo paginate_links();
            ?>
        </div>

    <?php else : ?>
        <p>No results found for "<?php echo get_search_query(); ?>"</p>
    <?php endif; ?>
</main>

<?php get_footer(); ?>

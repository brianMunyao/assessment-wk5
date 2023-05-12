<?php get_header(); ?>

<div class="opened-food">

    <?php

    $taxonomies = get_taxonomies(['object_type' => ['foods']]);

    $taxonomyTerms = [];

    // loop over your taxonomies
    foreach ($taxonomies as $taxonomy) {
        // retrieve all available terms, including those not yet used
        $terms    = get_terms(['taxonomy' => $taxonomy, 'hide_empty' => false]);

        // make sure $terms is an array, as it can be an int (count) or a WP_Error
        $hasTerms = is_array($terms) && $terms;

        if ($hasTerms) {
            $taxonomyTerms[$taxonomy] = $terms;
        }
    }
    ?>

    <p class="food-title">
        <?php the_title(); ?>

        <span class="edit">
            <?php if (current_user_can('manage_options')) {
                edit_post_link('Edit');
            } ?>
        </span>
    </p>

    <p class="food-categories">
        <?php the_taxonomies(); ?>
    </p>

    <div class="img">
        <?php
        the_post_thumbnail();
        ?>
    </div>

    <p class="desc">
        <?php the_content(); ?>
    </p>

    <p class="time">Posted on <?php the_time(); ?></p>

    <div class="nav_links">

        <span><?php echo get_previous_post_link(); ?></span>
        <span><?php echo get_next_post_link(); ?></span>
    </div>

</div>
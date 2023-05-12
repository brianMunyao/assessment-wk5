<?php get_header(); ?>


<?php
$args = array('post_type' => 'foods');

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

foreach ($taxonomyTerms as $t) {
}




$foods = new WP_Query($args);
?>
<div class="foods">


    <?php

    if ($foods->have_posts()) :
        while ($foods->have_posts()) : $foods->the_post(); ?>
            <div class="food">
                <div class="img">
                    <?php
                    the_post_thumbnail();
                    ?>
                </div>



                <p class="food-title"><?php the_title(sprintf('<a href= "%s">', esc_url(get_permalink())), '</a>'); ?></p>

                <div class="food-categories">
                    <?php the_taxonomies(); ?>
                </div>

                <p class="food-subtitle">
                    <?php the_content(); ?>
                </p>



            </div>

        <?php
        endwhile;


        ?>
        <div>

        </div>

</div>

<?php

    endif;
    wp_reset_postdata();
?>
<?php get_footer(); ?>
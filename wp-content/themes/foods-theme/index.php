<?php get_header(); ?>


<?php
$args = array('post_type' => 'foods');


$foods = new WP_Query($args);



?>
<div class="foods">


    <?php

    if ($foods->have_posts()) :
        while ($foods->have_posts()) : $foods->the_post(); ?>
            <div class="food">


                <p class="food-title"><?php the_title(sprintf('<a href= "%s">', esc_url(get_permalink())), '</a>'); ?></p>


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
<?php get_header(); ?>

<div class="opened-food">



    <p class="food-title"><?php the_title(); ?></p>

    <p class="desc">

        <?php the_content(); ?>
    </p>

    <p class="time">Posted on <?php the_time(); ?></p>

</div>
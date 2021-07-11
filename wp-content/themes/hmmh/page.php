<?php get_header(); ?>

<div class="container" id="content">
    <?php $loop = new WP_Query( array( 'post_type' => 'page', 'post_status'=>'publish' )); ?>
    <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
    <?php the_content(); ?>
    <?php endwhile; wp_reset_query(); ?>
</div>

<?php get_footer(); ?>
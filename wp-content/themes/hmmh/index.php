<?php get_header(); ?>

<?php $loop = new WP_Query( array( 'post_type' => 'case_study', 'post_status'=>'publish', 'order' => 'ASC', 'posts_per_page' => -1 )); ?>

<div class="container" id="content">
    <div class="case-study-filters">
        <div class="case-study-filters__wrapper">
            <button class="case-study-filters__button case-study-filters__button--active" data-type="all">All</button>

            <!-- hardcoded structure to keep buttons order from graphic design -->
            <button class="case-study-filters__button" data-type="E-Commerce">E-Commerce</button>
            <button class="case-study-filters__button" data-type="Websites">Websites</button>
            <button class="case-study-filters__button" data-type="Design">Design</button>
            <button class="case-study-filters__button" data-type="SEO">SEO</button>

            <!-- loop for dynamic buttons render
            <?php while ( $loop->have_posts() ) : $loop->the_post();
                $type = get_field('type');
                if( !empty( $type ) )
                    foreach (array_reverse($type) as $name) {
                        echo '<button class="case-study-filters__button" data-type="'. $name->name .'">'. $name->name .'</button>';
                    }
            endwhile; wp_reset_query(); ?>
            -->
        </div>
    </div>

    <div class="row">
        <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
            <div class="col col-6 case-study case-study--active">
                <?php
                    $image = get_field('image');
                    $type = get_field('type');
                    $title = get_field('title');
                    $link = get_field('link');

                    if( !empty( $image ) )
                        echo '<img class="case-study__image" src="'. $image['url'] .'">';

                    echo '<div class="case-study__content">';
                    
                        echo '<div class="case-study__types">';
                        if( !empty( $type ) )
                            foreach (array_reverse($type) as $name) {
                                echo '<span>'. $name->name .'</span>';
                            }
                        echo '</div>';

                        if( !empty( $title ) )
                            echo '<h3 class="case-study__title">'.$title.'</h3>';

                        if( !empty( $link ) )
                            echo '<a class="case-study__link" href="'. $link['url'] .'" target="'. $link['target'] .'">' . $link['title'] . '</a>';

                    echo '</div>';
                ?>
            </div>
        <?php endwhile; wp_reset_query(); ?>
    </div>
</div>

<?php get_footer(); ?>
<div class="custom-header" class="row">
    <?php

    function custom_header_image() {
        if (is_post_type_archive('agenda')) {
            echo '/wp-content/uploads/2017/02/Chagall_Coupe36CoupoleOpera_hd-1-1024x1024.jpg';
        } else {
            return the_post_thumbnail_url('large');
        }
    }
    ?>
    <h1>
        <?php if (is_archive()) : ?> 
            <?php post_type_archive_title(); ?>
        <?php else: ?>
            <?php the_title(); ?>
        <?php endif ?>
        
        <?php
        $position = (get_field('position_de_limage') !== '') ? get_field('position_de_limage') . '%' : '50%' ;
        
        ?>
        
        <div class="overlay" style="background-image: url(<?php custom_header_image() ?>); background-position: 50% <?php echo $position ?>; "></div>
    </h1>
</div> <!-- end article header -->

<?php

function fonts() {
    ob_start();
    ?>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700|Playfair+Display:400i" rel="stylesheet">
    <?php
    echo ob_get_clean();
}

add_action('wp_head', 'fonts');

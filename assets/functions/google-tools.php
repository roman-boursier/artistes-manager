<?php
/* Google map */

function my_acf_init() {
    acf_update_setting('google_api_key', 'AIzaSyA1LCRpJecyabZFloC_VKOBYeoPpZTYtFw');
}
add_action('acf/init', 'my_acf_init');

/* Google fonts */

function fonts() {
    ob_start();
    ?>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700|Playfair+Display:400i" rel="stylesheet">
    <?php
    echo ob_get_clean();
}

add_action('wp_head', 'fonts');



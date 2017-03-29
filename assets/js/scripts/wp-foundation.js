/*
 These functions make sure WordPress
 and Foundation play nice together.
 */

jQuery(document).ready(function () {

    // Remove empty P tags created by WP inside of Accordion and Orbit
    jQuery('.accordion p:empty, .orbit p:empty').remove();
    
    // Makes sure last grid item floats left
    jQuery('.archive-grid .columns').last().addClass('end');

});



   


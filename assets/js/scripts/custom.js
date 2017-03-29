/*Reveal content module*/
jQuery('a.more').click(function (event) {
    event.preventDefault();
    jQuery('.hide').toggleClass("show");
});



/*-----------------YOUTUBE------------------------------*/
/*Met en pause la video youtube à chaques changement de slides*/
jQuery('.orbit').on('slidechange.zf.orbit', function (e, orbit_info) {
    jQuery('iframe[src*="youtube.com"]').each(function () {
        this.contentWindow.postMessage('{"event":"command","func":"' + 'pauseVideo' + '","args":""}', '*');
    });
});

/*Permet d'optimiser le chargement de la page*/
jQuery(".youtube").each(function () {

    jQuery(this).width('100%');
    jQuery(this).height(jQuery(this).parent().innerHeight());

    // Based on the YouTube ID, we can easily find the thumbnail image
    jQuery(this).css('background-image', 'url(http://i.ytimg.com/vi/' + this.id + '/sddefault.jpg)');


    // Overlay the Play icon to make it look like a video player
    jQuery(this).append(jQuery('<div/>', {'class': 'play'}));

    jQuery(document).delegate('#' + this.id, 'click', function () {
        // Create an iFrame with autoplay set to true
        var iframe_url = "https://www.youtube.com/embed/" + this.id + "?autoplay=1&autohide=1&enablejsapi=1&version=3";
        if (jQuery(this).data('params'))
            iframe_url += '&' + jQuery(this).data('params');

        // The height and width of the iFrame should be the same as parent
        var iframe = jQuery('<iframe/>', {'frameborder': '0', 'src': iframe_url, 'width': '100%', 'height': '100%'});

        // Replace the YouTube thumbnail with YouTube HTML5 Player
        jQuery(this).replaceWith(iframe);
    });
});





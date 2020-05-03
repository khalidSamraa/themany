/*
 * The Many v1.0
 * Copyright (c) 2020 The Many LLC
 * Author: DaveVSDave
 * Author URI: https://davevsdave.com
 */

(function($){
    'use strict';

    /**
     * initializeBlock
     *
     * Adds custom JavaScript to the block HTML.
     *
     * @date    03/21/20
     * @since   1.0.0
     *
     * @param   object $block The block jQuery element.
     * @param   object attributes The block attributes (only available when editing).
     * @return  void
     */
    var initializeBlock = function( $block ) {
        console.log('initializer runs');
        $block.find('.slider').slick({
            dots: true,
            infinite: true,
            speed: 300,
            slidesToShow: 1,
			focusOnSelect: true
        });     
    }
    


    // Initialize each block on page load (front end).
    $(document).ready(function(){
        console.log('page initialized');
        $('.feature, .news').imagesLoaded(function(){
            console.log('imagesloaded');
            $('.feature, .news').each(function(){
                console.log('each runs');
                
                initializeBlock( $(this) );
            });
        });
    });

    // Initialize dynamic block preview (editor).
    if( window.acf ) {
        window.acf.addAction( 'render_block_preview/type=feature', initializeBlock );
    }

})(jQuery);
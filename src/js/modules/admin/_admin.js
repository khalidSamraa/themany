/*
 * The Many v1.0
 * Copyright (c) 2020 The Many LLC
 * Author: DaveVSDave
 * Author URI: https://davevsdave.com
 */

(function($){
    'use strict';
    //console.log('v 0.0.2');
    addHandle();
    function addHandle() {
        if(!$('.edit-post-sidebar').length) {
            setTimeout(function(){
                addHandle();
            },200);
        }
        else {
            $(' .edit-post-sidebar').append('<div class="handle ui-resizable-w"></div>');       
            initResize();
        }
    }

    
    function updatedEditorWidth() {
        //console.log('updatedEditorWidth runs');
        if($(window).width() > 782) {
            //console.log('window 782 or greater')
            var menuWidth = $('#adminmenuback').width() + 'px';
            var editorWidth = 'calc(65% - '+ menuWidth + ')';
            //console.log('editorWidth is ' + editorWidth)
            $('.edit-post-layout__content').css('width', editorWidth);
        } 
        else {
            $('.edit-post-layout__content').css('width', '');
        }
    }
    $('.collapse-button').on('click', function() {
        updatedEditorWidth();
    });
    $(window).on('load resize',function(e){
        //console.log('window resized')
        updatedEditorWidth();
    });
    
    function initResize() {
        $( ".edit-post-sidebar" ).resizable({
            handles: {'w': '.handle'},
            resize: function(e, ui) {
                editorResized();
            },
        });
    }
    
    function editorResized() {
        var menuWidth = $('#adminmenuback').width();
        var sideBarWidth = $('.edit-post-sidebar').width();
        var screenWidth = $(window).width();
        var newWidth = screenWidth - (menuWidth + sideBarWidth) + 'px';
        $('.edit-post-layout__content').css('width', newWidth);
        
    };
    
    



    
})(jQuery);
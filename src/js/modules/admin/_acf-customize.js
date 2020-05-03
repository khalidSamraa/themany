/*
 * The Many v1.0
 * Copyright (c) 2020 The Many LLC
 * Author: DaveVSDave
 * Author URI: https://davevsdave.com
 */

(function($){
    'use strict';
    //console.log('v 0.0.2');
    
    //CUSTOM COLOR PICKER VALS FOR PALLETE
    acf.add_filter('color_picker_args', function( args, field ){

        // do something to args
        args.palettes = ['#18315C', '#fcdef0', '#35A56F', '#5797AD', '#F6F6F6', '#e8b031', '#CC443E', '#F05347', '#24CCFF', '#FFE133', '#EF5347', '#EAC5C5', '#FFDF32', '#FAF8EE', '#7AD1F6', '#7AD1F6', '#A8C4C8', '#208450', '#A5E1D5', '#EDB2C6', '#C695A3',  ];


        // return
        return args;

    });
    


    
})(jQuery);
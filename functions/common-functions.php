<?php
/**
 * Common functions and filters used through the theme
 *
 * @package Plus Plus Productions
 * @since 1.0
 */



// Utils

// Convert hexadecimal to rgb
function hex2rgb( $hex ) {

    $hex = str_replace( '#' , '' , $hex );

    if( strlen( $hex ) == 3) {
        $r = hexdec( substr( $hex , 0 , 1 ).substr( $hex , 0 , 1 ) );
        $g = hexdec( substr( $hex , 1 , 1 ).substr( $hex , 1 , 1 ) );
        $b = hexdec( substr( $hex , 2 , 1 ).substr( $hex , 2 , 1 ) );
    } else {
        $r = hexdec( substr( $hex , 0 , 2 ) );
        $g = hexdec( substr( $hex , 2 , 2 ) );
        $b = hexdec( substr( $hex , 4 , 2 ) );
    }

    $rgb = array( $r , $g , $b );

    return implode( ',' , $rgb );
}


?>
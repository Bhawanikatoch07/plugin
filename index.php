<?php
/*
Plugin Name: Custom Popup
Plugin URI: https://greenup1.000webhostapp.com/
Description: A plugin to dispaly modal box with information on a click of button. Add shortcode [modal_box content="message"] in any page.
Author: Bhawani Admin 
Version: 1.0
License:     GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Author URI:https://greenup1.000webhostapp.com/
*/

function create_popup_function( $atts, $content = null ) {
  
    // set up default parameters
    extract(shortcode_atts(array(
        'content' => ''
    ), $atts));

    $output .= '<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Click Here</button>';
    $output .= '<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog" style="margin-top:20%">
    <div class="modal-content">
        <div class="modal-body">
          <h3 style="color:#000 !important">'.$content.'</h3>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>';
            
    return $output;
}
add_shortcode('modal_box', 'create_popup_function');


function wptuts_scripts_basic()
{
  
        wp_register_style('bootstrap_css', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css',__FILE__ );
    wp_enqueue_style('bootstrap_css');


    wp_register_script( 'jquery.min', 'https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js', __FILE__ ) ;
    wp_register_script( 'bootstrap_js', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js', __FILE__  );
    wp_enqueue_script( 'jquery.min' );
    wp_enqueue_script( 'bootstrap_js' );

    wp_register_script( 'custom-js', plugins_url( '/custom.js', __FILE__ ));
    wp_enqueue_script( 'custom-js' );
}
add_action( 'wp_enqueue_scripts', 'wptuts_scripts_basic' );
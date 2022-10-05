<?php 
/**
 * Plugin Name:       WordCounter
 * Plugin URI:        https://github.com/codingbysaikat/WordCounter.git
 * Description:       WordPress post counter plugin
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:           saikat mondal
 * Author URI:        https://author.example.com/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Update URI:        https://example.com/my-plugin/
 * Text Domain:       counter
 * Domain Path:       /languages
 */

// function counter_activation_to_run(){
// }

// register_activation_hook( __FILE__, 'counter_activation_to_run' );

// function counter_deactivation_to_run(){  
// }
// register_deactivation_hook( __FILE__, 'counter_deactivation_to_run' );


function counter_loaded_textdomin(){
    load_plugin_textdomain('counter',false,dirname(__FILE__.'languages'));

}
add_action('plugin_loaded','counter_loaded_textdomin');

function counter_postwordcount($content){
    $strriped_content = strip_tags($content);
    $count = str_word_count($strriped_content);
    $label = __('total number of wors is','counter');
    $content.= sprintf('<h2> %s : %s </h2>', $label, $count);
    return $content;

}
add_filter( 'the_content', 'counter_postwordcount');
<?php
/**
 * @package BPSonglinkStorage
 */
/*
Plugin Name: Black Paper Songlink Plugin
Plugin URI: https://blackpaper.net
Description: Black Paper Songlink Plugin for storing data from the songlink API
Version: 1.0
Author: Black Paper
Author URI: https://blackpaper.net
License: GPLv2 or later
Text Domain: bp-songlink-storage
*/

defined('ABSPATH') or die('No access here.');

define( 'PLUGIN_PATH', plugin_dir_path( __FILE__ ) );

class BPSonglinkStorage extends WP_Widget
{

    // Main constructor
	public function __construct() {
		parent::__construct(
            'bp_song_link_widget',
            __( 'BP Songlink Widget', 'text_domain' ),
            array(
                'customize_selective_refresh' => true,
            )
        );
	}

	// The widget form (for the backend )
	public function form( $instance ) {

        // Set widget defaults
        $defaults = array(
            'title'    => '',
            'spotifyuri'     => '',
            'beatport' => '',
            'juno' => '',
            'traxsource'   => '',
            'size' => '8',
            'class' => '',
            'path' => '/plugins/bp-songlink-storage/images'
        );
        
        // Parse current settings with defaults
        extract( wp_parse_args( ( array ) $instance, $defaults ) ); ?>
    
        <?php // Widget Title ?>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php _e( 'Widget Title', 'text_domain' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>
    
        <?php // spotifyuri Field ?>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'spotifyuri' ) ); ?>"><?php _e( 'spotifyuri:', 'text_domain' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'spotifyuri' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'spotifyuri' ) ); ?>" type="text" value="<?php echo esc_attr( $spotifyuri ); ?>" />
        </p>
    
        <?php // beatport Field ?>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'beatport' ) ); ?>"><?php _e( 'beatport:', 'text_domain' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'beatport' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'beatport' ) ); ?>" type="text" value="<?php echo esc_attr( $beatport ); ?>" />
        </p>
        
        <?php // juno Field ?>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'juno' ) ); ?>"><?php _e( 'juno:', 'text_domain' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'juno' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'juno' ) ); ?>" type="text" value="<?php echo esc_attr( $juno ); ?>" />
        </p>
    
        <?php // traxsource Field ?>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'traxsource' ) ); ?>"><?php _e( 'traxsource:', 'text_domain' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'traxsource' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'traxsource' ) ); ?>" type="text" value="<?php echo esc_attr( $traxsource ); ?>" />
        </p>

        <?php // size Field ?>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'size' ) ); ?>"><?php _e( 'size:', 'text_domain' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'size' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'size' ) ); ?>" type="number" value="<?php echo esc_attr( $size ); ?>" />
        </p>
        
        <?php // class Field ?>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'class' ) ); ?>"><?php _e( 'class:', 'text_domain' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'class' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'class' ) ); ?>" type="number" value="<?php echo esc_attr( $class ); ?>" />
        </p>

        <?php // path Field ?>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'path' ) ); ?>"><?php _e( 'path to store images: (e.g. /uploads/2020/01 or any custom folder in wp_content)', 'text_domain' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'path' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'path' ) ); ?>" type="text" value="<?php echo esc_attr( $path ); ?>" />
        </p>
    
    <?php }

	// Update widget settings
	public function update( $new_instance, $old_instance ) {
        $instance = $old_instance;
        $instance['title']    = isset( $new_instance['title'] ) ? wp_strip_all_tags( $new_instance['title'] ) : '';
        $instance['spotifyuri']    = isset( $new_instance['spotifyuri'] ) ? wp_strip_all_tags( $new_instance['spotifyuri'] ) : '';
        $instance['beatport']    = isset( $new_instance['beatport'] ) ? wp_strip_all_tags( $new_instance['beatport'] ) : '';
        $instance['juno']    = isset( $new_instance['juno'] ) ? wp_strip_all_tags( $new_instance['juno'] ) : '';
        $instance['traxsource']    = isset( $new_instance['traxsource'] ) ? wp_strip_all_tags( $new_instance['traxsource'] ) : '';
        $instance['size']    = isset( $new_instance['size'] ) ? wp_strip_all_tags( $new_instance['size'] ) : '';
        $instance['class']    = isset( $new_instance['class'] ) ? wp_strip_all_tags( $new_instance['class'] ) : '';
        $instance['path']    = isset( $new_instance['path'] ) ? wp_strip_all_tags( $new_instance['path'] ) : '';
        return $instance;
    }

	// Display the widget
	public function widget( $args, $instance ) {

        extract( $args );
    
        // Check the widget options
        $title    = isset( $instance['title'] ) ? apply_filters( 'widget_title', $instance['title'] ) : '';
        $spotifyuri     = isset( $instance['spotifyuri'] ) ? $instance['spotifyuri'] : '';
        $beatport     = isset( $instance['beatport'] ) ? $instance['beatport'] : '';
        $juno     = isset( $instance['juno'] ) ? $instance['juno'] : '';
        $traxsource     = isset( $instance['traxsource'] ) ? $instance['traxsource'] : '';
        $size     = isset( $instance['size'] ) ? $instance['size'] : '';
        $class     = isset( $instance['class'] ) ? $instance['class'] : '';
        $path     = isset( $instance['path'] ) ? $instance['path'] : '';

        // Prepare to save to file
        $json = file_get_contents('https://api.song.link/v1-alpha.1/links?url='.$spotifyuri);
        $txt = /*json_decode(*/$json/*)*/;

        $txto_json->beatport = $beatport;
        $txto_json->juno = $juno;
        $txto_json->traxsource = $traxsource;
        $txto_json->size = $size;
        $txto_json->class = $class;
        $txto_json->path = $path;
        $txto = json_encode($txto_json);


        //save to file

        if (file_exists(dirname(__DIR__, 2).'/plugins/bp-songlink-storage/files/' . $title . '.txt'))
        {
            $fp = fopen(dirname(__DIR__, 2).'/plugins/bp-songlink-storage/files/' . $title . '.txt', "w");
            fwrite ($fp, $txt);
            fclose ($fp);
            $fpo = fopen(dirname(__dir__, 2).'/plugins/bp-songlink-storage/files/' . $title . '.other.txt', "w");
            fwrite ($fpo, $txto);
            fclose ($fpo);
        } 
        
        else 
        {
            $fh = fopen(dirname(__dir__, 2).'/plugins/bp-songlink-storage/files/' . $title . '.txt', "w");
            if($fh){
                fwrite ($fh, $txt);
                fclose ($fh);
            }
            $fho = fopen(dirname(__dir__, 2).'/plugins/bp-songlink-storage/files/' . $title . '.other.txt', "w");
            if($fho){
                fwrite ($fho, $txto);
                fclose ($fho);
            }
        }
    
        // WordPress core before_widget hook (always include )
        echo $before_widget;
    
       // Display the widget
       echo '<div class="widget-text wp_widget_plugin_box">';
    
            // Display widget title if defined
            if ( $title ) {
                echo $before_title . $title . $after_title;
                echo '--<br>'.file_get_contents(dirname(__dir__, 2).'/plugins/bp-songlink-storage/files/' . $title . '.txt').'<br>--';
                echo '--<br>'.file_get_contents(dirname(__dir__, 2).'/plugins/bp-songlink-storage/files/' . $title . '.other.txt').'<br>--';
            }
    
            // Display spotifyuri field
            if ( $spotifyuri ) {
                echo '<p>' . $spotifyuri . '</p>';
            }
    
            // Display beatport field
            if ( $beatport ) {
                echo '<p>' . $beatport . '</p>';
            }
    
            // Display juno field
            if ( $juno ) {
                echo '<p>' . $juno . '</p>';
            }
    
            // Display traxsource field
            if ( $traxsource ) {
                echo '<p>' . $traxsource . '</p>';
            }

            // Display size field
            if ( $size ) {
                echo '<p>' . $size . '</p>';
            }

            // Display class field
            if ( $class ) {
                echo '<p>' . $class . '</p>';
            }

            // Display path field
            if ( $path ) {
                echo '<p>' . $path . '</p>';
            }
    
        echo '</div>';
    
        // WordPress core after_widget hook (always include )
        echo $after_widget;
    
    }
}

/*
if(class_exists('BPSonglinkStorage')){
    $bpPlugin = new BPSonglinkStorage();
}
//*/

// Register the widget
function bp_songlink_custom_widget() {
	register_widget( 'BPSonglinkStorage' );
}
add_action( 'widgets_init', 'bp_songlink_custom_widget' );

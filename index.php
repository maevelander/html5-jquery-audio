<?php

/*
Plugin Name: HTML5 jQuery Audio Player
Plugin URI: http://wordpress.org/extend/plugins/html5-jquery-audio-player/
Description: The trendiest audio player plugin for WordPress. Works on iPhone/iPad and other mobile devices. Insert with shortcode [hmp_player]
Author: Enigma Plugins
Version: 2.6.1
Author URI: http://enigmaplugins.com.au
*/

error_reporting(0);
ini_set('display_errors', 0);

//function add script
load_plugin_textdomain('hmpf', false, dirname(plugin_basename(__FILE__)) . '/languages/');

require 'includes/db-settings.php';
register_activation_hook( __FILE__, 'hmp_db_create' );

add_action( 'admin_menu', 'my_plugin_menu' );
function my_plugin_menu() {
    add_menu_page( 'HTML5 MP3 Player', 'HTML5 Player', 'manage_options', 'hmp-options', 'wp_hmp_options',plugin_dir_url( __FILE__ )."/music-beam.png" );
    add_submenu_page('hmp-options','','','manage_options','hmp-options','wp_hmp_options');
    add_submenu_page('hmp-options','Display Settings','Display Settings','manage_options','display_settings','wp_hmp_options');
    add_submenu_page( 'hmp-options', 'Manage Songs', 'Manage Songs', 'manage_options', 'hmp_palylist', 'wp_hmp_playlist' );	
}

function hmp_scripts_method() {
    $query = $_SERVER['PHP_SELF'];
    wp_enqueue_script('jquery');
    
    wp_deregister_script( 'hmp-custom-js' );
    wp_register_script( 'hmp-custom-js', plugin_dir_url( __FILE__ )."player/js/hmp-custom.js");
    wp_enqueue_script('media-upload');
    wp_enqueue_script('thickbox');
    
    if(strpos($query,'admin.php')!==false){
	wp_enqueue_script( 'hmp-custom-js' );
    }
    wp_enqueue_style('thickbox');
}
add_action('admin_enqueue_scripts', 'hmp_scripts_method');

add_action( 'admin_init', 'register_mysettings' );
function register_mysettings() {
    register_setting( 'baw-settings-group', 'buy_text' );
    register_setting( 'baw-settings-group', 'color' );
    register_setting( 'baw-settings-group', 'showlist' );
    register_setting( 'baw-settings-group', 'showbuy' );
    register_setting( 'baw-settings-group', 'hmp_description' );
    register_setting( 'baw-settings-group', 'currency' );
    register_setting( 'baw-settings-group', 'tracks' );
    register_setting( 'baw-settings-group', 'tcolor' );
    register_setting( 'baw-settings-group', 'autoplay' );	
}

function wp_hmp_options() {
    include 'player/settings.php';
}

function wp_hmp_playlist(){
    include('playlist/add_playlist.php');		
}

function wp_hmp_player(){
    if(get_option('showbuy')==1){ 
	$bt	=	get_option('buy_text');
    }else{
	$bt	=	'';
    }
        $ap	=	get_option('autoplay');
    if(!$ap){
	$ap	=	0;	
    }
    
    $desc	=	get_option('hmp_description');
    $sb		=	get_option('showbuy');
    $nt		=	get_option('tracks');
    
    if(empty($nt)){
	$nt	=	1;
    }
	
    $cr		=	get_option('currency');
    $sl		=	get_option('showlist');
    $cl		=	get_option('color');
    
    $tc		=	get_option('tcolor'); 
    
    if(empty($tc)){
	$tc	=	'#cccccc';
    }	
	
    if($sb==0){
?>
    <style type="text/css">
        .buy{ display:none !important;}
        .rating{ right:10px !important;}
    </style>
<?php
    }
    
    if(!empty($cl)){
?>
    <style type="text/css">
        .ttw-music-player{ background:<?php echo $cl; ?>; !important;}
    </style>
<?php
    }
    
    if(!empty($tc)){
?>
    <style type="text/css">
        .ttw-music-player .tracklist, .ttw-music-player .buy, .ttw-music-player .description, .ttw-music-player
        .player .title, .ttw-music-player .artist, .ttw-music-player .artist-outer{ color:<?php echo $tc; ?>; !important;}
    </style>
<?php
    }
    
    if($tc=='black'){
?>
    <style type="text/css">
        .ttw-music-player .player .title, .ttw-music-player .description, .ttw-music-player .tracklist li{ text-shadow:none !important;}
    </style>
<?php
    }
    
    if($sl==0){
?>  <style type="text/css">
        .tracklist{ display:none !important;}
    </style>
<?php
    }
		  
    $pluginurl	=   plugin_dir_url( __FILE__ );
?>
    <link href="<?php echo $pluginurl ; ?>includes/css/style.css" type="text/css" rel="stylesheet" media="screen" />
    <script type="text/javascript" src="<?php echo $pluginurl ; ?>includes/jquery-jplayer/jquery.jplayer.js"></script>
    <?php require_once 'includes/ttw-music-player.php'; ?>
   
    <script type="text/javascript">
	var myPlaylist = [
        <?php
            global $wpdb;
            $table	=	$wpdb->prefix.'hmp_playlist';	
            $lsql	=	"SELECT * FROM $table";

            $songs 	= 	$wpdb->get_results( $lsql  );
	
    if(!empty($songs)):
        foreach($songs as $song): ?>
        {
            mp3:'<?php echo $song->mp3; ?>',
            oga:'<?php echo $song->ogg; ?>',
            title:'<?php echo $song->title; ?>',
            artist:'<?php echo $song->artist; ?>',
            rating:'<?php echo $song->rating; ?>',
            buy:'<?php echo $song->buy; ?>',
            price:'<?php echo $song->price; ?>',
            duration:'<?php echo $song->duration; ?>',
            cover:'<?php echo $song->cover; ?>'
        },
<?php
        endforeach;
    else:
?>	
	{
            mp3:'<?php echo $pluginurl; ?>player/mix/1.mp3',
            oga:'<?php echo $pluginurl; ?>player/mix/1.ogg',
            title:'<?php __('Sample Track','hmpf') ?>',
            artist:'<?php __('Sample', 'hmpf') ?>',
            rating:4,
            buy:'#',
            price:'1.00',
            duration:'4:50',
            cover:'<?php echo $pluginurl; ?>player/mix/1.png'
        }
<?php
    endif;
?>
        ];
	jQuery(document).ready(function(){
            jQuery('#myplayer').ttwMusicPlayer(myPlaylist, {
                    currencySymbol:'<?php echo $cr; ?>',
                    description:"<?php echo $desc; ?>",
                    buyText:'<?php echo $bt; ?>',
                    tracksToShow:<?php echo $nt; ?>,
                    <?php if($ap==0): ?>
                        autoplay:false,
                    <?php else: ?>
                        autoplay:true,
                    <?php endif; ?>
            });
        });
 
    </script>
 <?php
    $palyer_div	=	'<div id="myplayer"></div>';
    return $palyer_div;
}
add_shortcode('hmp_player','wp_hmp_player');

function my_admin_scripts() {
    wp_enqueue_style( 'farbtastic' );
    wp_enqueue_script( 'farbtastic' );
    wp_enqueue_script( 'my-theme-options', get_template_directory_uri() . '/js/theme-options.js', array( 'farbtastic', 'jquery' ) );
}

function implement_ajax5(){

global $wpdb;
$table		=	$wpdb->prefix."hmp_playlist";
$table1		=	$wpdb->prefix."hmp_rating";

$song_title	=	strip_tags($_POST['trackname']);
$rating_value	=	strip_tags($_POST['rating']);

$songres	=	$wpdb->get_row("SELECT * FROM $table WHERE `title`='$song_title'") or die(mysql_error());
$song_id	=	$songres->id;
$total_votes    =	$songres->total_votes;
$total_votes    =	$total_votes+1;

$ip		=	$_SERVER['REMOTE_ADDR'];

$data           =	array(
                            'song_id' => $song_id,
                            'rating_value' => $rating_value,
                            'user_ip' => $ip
                        );

$check	=	$wpdb->get_results("SELECT * FROM $table1 WHERE song_id='$song_id' AND user_ip='$ip'");
if(!$check){

$insert	=	$wpdb->insert($table1,$data);
	
$wpdb->update( 
	$table, 
	array(
            'total_votes'   =>  $total_votes,
	), 
	array( 'ID' => $song_id )
) or die(mysql_error());
echo __('Thank You', 'hmpf');
}else{
    echo __('Already rated', 'hmpf');
}
	
die();
   
}

add_action('wp_ajax_my_special_ajax_call5', 'implement_ajax5');
add_action('wp_ajax_nopriv_my_special_ajax_call5', 'implement_ajax5');//for users that are not logged in.
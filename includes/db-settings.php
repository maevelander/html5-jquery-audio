<?php
function hmp_script(){
    wp_enqueue_script('jquery');	
}
add_action( 'wp_enqueue_scripts', 'hmp_script' );

//Database table versions
global $hmp_player_db_table_version;
$hmp_player_db_table_version = "2.1";

//Create database tables needed by the DiveBook widget
function hmp_db_create () {
    hmp_create_table_player();
    hmp_create_table_rating();
}

//Create dive table
function hmp_create_table_player(){
    //Get the table name with the WP database prefix
    global $wpdb;
    $table_name = $wpdb->prefix . "hmp_playlist";
    global $hmp_player_db_table_version;
    $installed_ver = get_option( "hmp_player_db_table_version" );
     //Check if the table already exists and if the table is up to date, if not create it
    if($wpdb->get_var("SHOW TABLES LIKE '$table_name'") != $table_name ||  $installed_ver != $hmp_player_db_table_version ) {
        $sql =  "CREATE TABLE " . $table_name . " (
                    `id` INT( 9 ) NOT NULL AUTO_INCREMENT PRIMARY KEY,
                    `mp3` TEXT NOT NULL,
                    `ogg` TEXT NOT NULL,
                    `rating` TEXT NOT NULL,
                    `title` TEXT NOT NULL,
                    `buy` TEXT NOT NULL,
                    `price` TEXT NOT NULL,
                    `cover` TEXT NOT NULL,
                    `duration` VARCHAR( 20 ) NOT NULL,
                    `artist` VARCHAR( 50 ) NOT NULL,
                    `total_votes` INT(5) NOT NULL,
                    `secure` VARCHAR( 55 ) NOT NULL,
                    UNIQUE KEY id (id)
                );";

        require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
        dbDelta($sql);
        update_option( "hmp_player_db_table_version", $hmp_player_db_table_version );
}
    //Add database table versions to options
    add_option("hmp_player_db_table_version", $hmp_player_db_table_version);
}
//Database table versions
global $hmp_player_db_table_rating_version;
$hmp_player_db_table_rating_version = "2.0";

//Create ratings table
function hmp_create_table_rating(){
    //Get the table name with the WP database prefix
    global $wpdb;
    $table_name = $wpdb->prefix . "hmp_rating";
    global $hmp_player_db_table_rating_version;
    $installed_ver1 = get_option( "hmp_player_db_table_rating_version" );
     //Check if the table already exists and if the table is up to date, if not create it
    if($wpdb->get_var("SHOW TABLES LIKE '$table_name'") != $table_name ||  $installed_ver1 != $hmp_player_db_table_rating_version ) {
        $sql =  "CREATE TABLE " . $table_name . " (
                    `id` INT( 9 ) NOT NULL AUTO_INCREMENT PRIMARY KEY,
                    `song_id` TEXT NOT NULL,
                    `rating_value` TEXT NOT NULL,
                    `user_ip` TEXT NOT NULL,
                    UNIQUE KEY id (id)
                );";

        require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
        dbDelta($sql);
        update_option( "hmp_player_db_table_rating_version", $hmp_player_db_table_rating_version );
}
    //Add database table versions to options
    add_option("hmp_player_db_table_rating_version", $hmp_player_db_table_rating_version);
}
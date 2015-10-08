<div id="wpbody">
    <div id="wpbody-content">
		
        <div class="wrap">
            <h2><?php _e('Manage Songs', 'html5-jquery-audio-player') ?></h2>
        <?php
            global $wpdb;
            $table = $wpdb->prefix."hmp_playlist"; // add quote marks //
                
            if(isset($_GET['id'])){
                $id = strip_tags(urlencode($_GET['id']));
            }

            $action = "add";
            if(isset($_GET['action'])){
                $action = strip_tags(urlencode($_GET['action']));
            }

            $mp3Sql = "Select * From ".$wpdb->prefix."hmp_playlist";
            $mp3Qry = mysql_query($mp3Sql);
            $mp3Obj = mysql_fetch_object($mp3Qry);

            $mp3Id = $mp3Obj->id;

            if(($mp3Id == 0) || ($mp3Id == "") || ($mp3Id == NULL)){
                $maxSql = "Select * From ".$wpdb->prefix."hmp_playlist";
            }else{
                $maxSql = "Select Max(id) As maxId From ".$wpdb->prefix."hmp_playlist";
            }
            
            $maxQry = mysql_query($maxSql);
            $maxObj = mysql_fetch_object($maxQry);

            $maxId = $maxObj->maxId;

            (($maxId == "") || ($maxId == NULL) ? $maxId = 0 : $maxId);

            $secureId = $maxId + 1;

            $md5Secure = md5($secureId);

            switch($action){

                case "add";
                    if($_POST['submit']){
                        $mp3        =	strip_tags($_POST['mp3']);
                        $ogg        =	strip_tags($_POST['ogg']);
                        $rating     =	strip_tags($_POST['rating']);
                        $title      =	strip_tags($_POST['title']);
                        $buy        =	strip_tags($_POST['buy']);
                        $price      =	strip_tags($_POST['price']);
                        $cover      =	strip_tags($_POST['cover']);
                        $duration   =	strip_tags($_POST['duration']);
                        $artist     =	strip_tags($_POST['artist']);
                        $secure     =	strip_tags($md5Secure);

                        $data	=   array(
                                        'ogg' 		=> $ogg,
                                        'mp3' 		=> $mp3,
                                        'rating' 	=> $rating,
                                        'title' 	=> $title,
                                        'buy' 		=> $buy,
                                        'price' 	=> $price,
                                        'cover' 	=> $cover,
                                        'duration' 	=> $duration,
                                        'artist' 	=> $artist,
                                        'secure' 	=> $secure

                                    );

                        if(!empty($_POST['mp3']) and !empty($_POST['ogg']) and !empty($_POST['title']) and !empty($_POST['cover'])){
                            $insert = $wpdb->insert($table,$data) or die(mysql_error());
                            $isuccess = __("Song added successfully to the playlist", "html5-jquery-audio-player");
                        }else{
                            $ierror = __("Please fill all fields marked 'required'", "html5-jquery-audio-player");
                        }
                    }
                break;
                case "update";
                    if($_POST['update']){
                        $mp3        =	strip_tags($_POST['mp3']);
                        $ogg        =	strip_tags($_POST['ogg']);
                        $rating     =	strip_tags($_POST['rating']);
                        $title      =	strip_tags($_POST['title']);
                        $buy        =	strip_tags($_POST['buy']);
                        $price      =	strip_tags($_POST['price']);
                        $cover      =	strip_tags($_POST['cover']);
                        $duration   =	strip_tags($_POST['duration']);
                        $artist     =	strip_tags($_POST['artist']);

                        $data	=   array(
                                        'ogg' 		=>  $ogg,
                                        'mp3' 		=>  $mp3,
                                        'rating' 	=>  $rating,
                                        'title' 	=>  $title,
                                        'buy' 		=>  $buy,
                                        'price' 	=>  $price,
                                        'cover' 	=>  $cover,
                                        'duration' 	=>  $duration,
                                        'artist' 	=>  $artist
                                    );

                        $ID     =   array( 'secure'	=>  $id );

                        if(!empty($_POST['mp3']) and !empty($_POST['ogg']) and !empty($_POST['title']) and !empty($_POST['cover'])){
                            $update     =   $wpdb->update($table,$data,$ID);
                            $usuccess	=   __("Song updated successfully ", "html5-jquery-audio-player");
                        }else{
                            $uerror	=   __("Please fill all fields marked 'required'", "html5-jquery-audio-player");
                        }
                    }
                break;
                case "delete";
                    $delete     =   $wpdb->query( "DELETE FROM $table WHERE secure='$id'" );
                    if($delete){
                        $dsuccess	=   __("Song delete successfully ", "html5-jquery-audio-player");
                    }else{
                        $derror	=   __("Something went wrong", "html5-jquery-audio-player");
                    }
                break;	
            }

            $usql	=   "SELECT * FROM $table WHERE secure='$id'";
            $uresults 	=   $wpdb->get_row( $usql  );

            if($action=='update'):
        ?>

            <table class="form-table">
            <?php
                if(!empty($usuccess)):
            ?>
                <tr valign="top">
                    <td width="25%">
                        <span style="color:green;">
                            <?php echo $usuccess; ?>
                        </span>
                    </td>
                </tr>
            <?php
                elseif(!empty($uerror)):
            ?>
                <tr valign="top">
                    <td width="25%">
                        <span style="color:red;">
                            <?php echo $uerror; ?>
                        </span>
                    </td>
                </tr>
            <?php
                endif;
            ?>
                <tr valign="top">
                    <th scope="row"></th>
                    <td width="25%"></td>
                    <td></td>
                    <td rowspan="9" width="25%">
                    <table cellpadding="0" class="widefat donation" style="margin-bottom:10px; border:solid 2px #008001;" width="50%">
                        <thead>
                            <th scope="col">
                                <strong style="color:#008001; margin-left: 10px;">
                                    <?php _e("Help Improve This Plugin!", "html5-jquery-audio-player") ?>
                                </strong>
                            </th>
                        </thead>
                        <tbody>
                            <tr>
                                <td style="border:0;">
                                    <?php _e("Enjoyed this plugin? All donations are used to improve and further develop this plugin. Thanks for your contribution.", "html5-jquery-audio-player") ?>
                                </td>
                            </tr>
                            <tr>
                                <td style="border:0;">
                                <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_blank">
                                    <input type="hidden" name="cmd" value="_s-xclick">
                                    <input type="hidden" name="hosted_button_id" value="A74K2K689DWTY">
                                    <input type="image" src="https://www.paypalobjects.com/en_AU/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal — The safer, easier way to pay online.">
                                    <img alt="" border="0" src="https://www.paypalobjects.com/en_AU/i/scr/pixel.gif" width="1" height="1">
				</form>
                                </td>
                            </tr>
                            <tr>
                                <td style="border:0;">
                                    <?php _e('You can also help by','html5-jquery-audio-player') ?>
                                    <a href="http://wordpress.org/extend/plugins/html5-jquery-audio-player/" target="_blank">
                                        <?php _e("rating this plugin on wordpress.org", "html5-jquery-audio-player") ?>
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <table cellpadding="0" class="widefat donation" style="margin-bottom:10px;">
                        <thead>
                            <th scope="col" style="margin-left: 10px;">
                                <?php _e("Pro Version Features", "html5-jquery-audio-player") ?>
                            </th>
                        </thead>
                        <tbody>
                            <tr>
                                <td style="border:0;">
                                    <ul>
                                        <li>
                                            <?php _e("Mulitple Playlists", "html5-jquery-audio-player") ?>
                                        </li>
					<li>
                                            <?php _e("Drag n Drop playlist manager so you can reorder tracks", "html5-jquery-audio-player") ?>
                                        </li>
					<li>
                                            <?php _e("Fully Responsive", "html5-jquery-audio-player") ?>
                                        </li>
                                        <li>
                                            <?php _e("More customisation options", "html5-jquery-audio-player") ?>
                                        </li>
					<li>
                                            <?php _e("On/off option for ratings, artwork, artist field, auto-repeat, and cover art", "html5-jquery-audio-player") ?>
                                        </li>
                                        <li>
                                            <?php _e("Widget support", "html5-jquery-audio-player") ?>
                                        </li>
					<li>
                                            <?php _e("3 buy/download buttons (optional)", "html5-jquery-audio-player") ?>
                                        </li>
                                    </ul>
                                    <br />		
                                    <a href="http://enigmaplugins.com/plugins/html5-jquery-audio-pro/" target="_blank">
                                        <?php _e("Get Pro", "html5-jquery-audio-player") ?>
                                    </a>
				</td>
                            </tr>
                        </tbody>
                    </table>
                    <table cellpadding="0" class="widefat" border="0">
                        <thead>
                            <th scope="col" style="margin-left: 10px;">
                                <?php _e("Need Support?", "html5-jquery-audio-player") ?>
                            </th>
                        </thead>
                        <tbody>
                            <tr>
                                <td style="border:0;">
                                    <?php _e("If you are having problems with this plugin please visit the", "html5-jquery-audio-player") ?>
                                    <a href="http://wordpress.org/support/plugin/html5-jquery-audio-player" target="_blank">
                                        <?php _e("Support Forum", "html5-jquery-audio-player") ?>
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    </td>
                </tr>
                <form name="addplaylist" action="" method="post" enctype="multipart/form-data">
                <tr valign="top">
                    <th scope="row">
                        <strong>
                            <?php _e("MP3 Link update", "html5-jquery-audio-player") ?>
                        </strong>
                    </th>
                    <td width="29%">
                        <input type="text" size="50" name="mp3" value="<?php echo $uresults->mp3 ; ?>" class="upload-url" />
                        <input id="st_upload_button" class="st_upload_button" type="button" name="upload_button" value="Upload" style="background: white;border: solid 1px #CCC;cursor: pointer;">
                    </td>
                    <td>
                        <span style="font-size:11px; color:#b2b2b2; font-style:italic;">
                            <strong>
                                <?php _e("Required", "html5-jquery-audio-player") ?>
                            </strong>
                            <?php _e("Full File Path of mp3 file", "html5-jquery-audio-player") ?>
                        </span>
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row">
                        <strong>
                            <?php _e("Ogg Link", "html5-jquery-audio-player") ?>
                        </strong>
                    </th>
                    <td>
                        <input type="text" size="50" name="ogg" value="<?php echo $uresults->ogg ; ?>" class="upload-url" />
                        <input id="st_upload_button" class="st_upload_button" type="button" name="upload_button" value="Upload" style="background: white;border: solid 1px #CCC;cursor: pointer;">
                    </td>
                    <td>
                        <span style="font-size:11px; color:#b2b2b2; font-style:italic;">
                            <strong>
                                <?php _e("Required", "html5-jquery-audio-player") ?>
                            </strong>
                            <?php _e("Full File Path of ogg file", "html5-jquery-audio-player") ?>
                        </span>
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row">
                        <strong>
                            <?php _e("Rating", "html5-jquery-audio-player") ?>
                        </strong>
                    </th>
                    <td>
                        <input type="text" size="50" name="rating" value="<?php echo $uresults->rating ; ?>" />
                    </td>
                    <td>
                        <span style="font-size:11px; color:#b2b2b2; font-style:italic;">
                            <?php _e("Plz put digit 1 to 5", "html5-jquery-audio-player") ?>
                        </span>
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row">
                        <strong>
                            <?php _e("Song Title", "html5-jquery-audio-player") ?>
                        </strong>
                    </th>
                    <td>
                        <input type="text" size="50" name="title" value="<?php echo stripslashes($uresults->title); ?>" />
                    </td>
                    <td>
                        <span style="font-size:11px; color:#b2b2b2; font-style:italic;">
                            <strong>
                                <?php _e("Required", "html5-jquery-audio-player") ?>
                            </strong>
                            <?php _e("Title of the song", "html5-jquery-audio-player") ?>
                        </span>
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row">
                        <strong>
                            <?php _e("Link Buy Text", "html5-jquery-audio-player") ?>
                        </strong>
                    </th>
                    <td>
                        <input type="text" size="50" name="buy" value="<?php echo $uresults->buy ; ?>" />
                    </td>
                    <td>
                        <span style="font-size:11px; color:#b2b2b2; font-style:italic;">
                            <?php _e("This will link BUY button", "html5-jquery-audio-player") ?>
                        </span>
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row">
                        <strong>
                            <?php _e("Song Price" ,"html5-jquery-audio-player") ?>
                        </strong>
                    </th>
                    <td>
                        <input type="text" size="50" name="price" value="<?php echo $uresults->price ; ?>" />
                    </td>
                    <td>
                        <span style="font-size:11px; color:#b2b2b2; font-style:italic;">
                            <?php _e("Price of the song", "html5-jquery-audio-player") ?>
                        </span>
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row">
                        <strong>
                            <?php _e("Cover Image", "html5-jquery-audio-player") ?>
                        </strong>
                    </th>
                    <td>
                        <input type="text" size="50" name="cover" value="<?php echo $uresults->cover ; ?>" class="upload-url" />
                        <input id="st_upload_button" class="st_upload_button" type="button" name="upload_button" value="Upload" style="background: white;border: solid 1px #CCC;cursor: pointer;">
                    </td>
                    <td>
                        <span style="font-size:11px; color:#b2b2b2; font-style:italic;">
                            <strong>
                                <?php _e("Required", "html5-jquery-audio-player") ?>
                            </strong>
                            <?php _e("Full File Path to cover image ( 125*125 )", "") ?>
                        </span>
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row">
                        <strong>
                            <?php _e("Duration", "html5-jquery-audio-player") ?>
                        </strong>
                    </th>
                    <td>
                        <input type="text" size="50" name="duration" value="<?php echo $uresults->duration ; ?>" />
                    </td>
                    <td>
                        <span style="font-size:11px; color:#b2b2b2; font-style:italic;">
                            <?php _e("Duration of the song", "html5-jquery-audio-player") ?>
                        </span>
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row">
                        <strong>
                            <?php _e("Artist", "html5-jquery-audio-player") ?>
                        </strong>
                    </th>
                    <td>
                        <input type="text" size="50" name="artist" value="<?php echo stripslashes($uresults->artist); ?>" />
                    </td>
                    <td>
                        <span style="font-size:11px; color:#b2b2b2; font-style:italic;">
                            <?php _e("Artist of the song", "html5-jquery-audio-player") ?>
                        </span>
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row">
                        <input type="submit" class="button-primary" value="<?php _e('Update Song') ?>" name="update" />
                    </th>
                    <td>
                        <a href="<?php bloginfo('url'); ?>/wp-admin/admin.php?page=hmp_palylist&action=add">
                            <input type="button" class="button-primary" value="<?php _e("Add New Song", "html5-jquery-audio-player") ?>" name="update" />
                        </a>
                    </td>
                    <td></td>
                </tr>
            </table>	
            </form>
        <?php
            elseif($action=='delete'):
        ?>
            <table class="form-table">
            <?php
                if(!empty($dsuccess)):
            ?>
                <tr valign="top">

                    <td width="25%">
                        <span style="color:green;">
                            <?php echo $dsuccess; ?>
                        </span>
                    </td>
                </tr>
            <?php
                elseif(!empty($derror)):
            ?>
                <tr valign="top">
                    <td width="25%">
                        <span style="color:red;">
                            <?php echo $derror; ?>
                        </span>
                    </td>
                </tr>
            <?php
                endif;
            ?>
                <tr>
                    <td>
                        <a href="<?php bloginfo('url'); ?>/wp-admin/admin.php?page=hmp_palylist">
                            <input type="button" class="button-primary" value="<?php _e("Add New Song", "html5-jquery-audio-player") ?>" name="update" />
                        </a>
                    </td>
                </tr>
            </table>
        <?php
            else:
        ?>
            <table class="form-table">
            <?php
                if(!empty($isuccess)):
            ?>
                <tr valign="top">
                    <td width="25%">
                        <span style="color:green;">
                            <?php echo $isuccess; ?>
                        </span>
                    </td>
                </tr>
            <?php
                elseif(!empty($ierror)):
            ?>
                <tr valign="top">
                    <td width="25%">
                        <span style="color:red;">
                            <?php echo $ierror; ?>
                        </span>
                    </td>
                </tr>
            <?php
                endif;
                
                if(!empty($dsuccess)):
            ?>
                <tr valign="top">
                    <td width="25%">
                        <span style="color:green;">
                            <?php echo $dsuccess; ?>
                        </span>
                    </td>
                </tr>
            <?php
                elseif(!empty($derror)):
            ?>
                <tr valign="top">
                    <td width="25%"><span style="color:red;"><?php echo $derror; ?></span></td>
                </tr>
            <?php
                endif;
            ?>
                <tr valign="top">
                    <th scope="row"></th>
                    <td width="25%"></td>
                    <td></td>
                    <td rowspan="9" width="25%">
                    <table cellpadding="0" class="widefat donation" style="margin-bottom:10px; border:solid 2px #008001;" width="50%">
                        <thead>
                            <th scope="col">
                                <strong style="color:#008001; margin-left: 10px;">
                                    <?php _e("Help Improve This Plugin!", "html5-jquery-audio-player") ?>
                                </strong>
                            </th>
                        </thead>
                        <tbody>
                            <tr>
                                <td style="border:0;">
                                    <?php _e("Enjoyed this plugin? All donations are used to improve and further develop this plugin. Thanks for your contribution.", "html5-jquery-audio-player") ?>
                                </td>
                            </tr>
                            <tr>
                                <td style="border:0;">
                                <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_blank">
                                    <input type="hidden" name="cmd" value="_s-xclick">
                                    <input type="hidden" name="hosted_button_id" value="A74K2K689DWTY">
                                    <input type="image" src="https://www.paypalobjects.com/en_AU/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal — The safer, easier way to pay online.">
                                    <img alt="" border="0" src="https://www.paypalobjects.com/en_AU/i/scr/pixel.gif" width="1" height="1">
                                </form>
                                </td>
                            </tr>
                            <tr>
                                <td style="border:0;">
                                    <?php _e("You can also help by", "html5-jquery-audio-player") ?>
                                    <a href="http://wordpress.org/extend/plugins/html5-jquery-audio-player/" target="_blank">
                                        <?php _e("rating this plugin on wordpress.org", "html5-jquery-audio-player") ?>
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <table cellpadding="0" class="widefat donation" style="margin-bottom:10px;">
                        <thead>
                            <th scope="col" style="padding-left: 12px;">
                                <?php _e("Pro Version", "html5-jquery-audio-player") ?>
                            </th>
                        </thead>
                        <tbody>
                            <tr>
                                <td style="border:0;">
                                    <ul>
                                        <li>
                                            <?php _e("Mulitple Playlists", "html5-jquery-audio-player") ?>
                                        </li>
                                        <li>
                                            <?php _e("Drag n Drop playlist manager so you can reorder tracks", "html5-jquery-audio-player") ?>
                                        </li>
                                        <li>
                                            <?php _e("Fully Responsive", "html5-jquery-audio-player") ?>
                                        </li>
                                        <li>
                                            <?php _e("More customisation options", "html5-jquery-audio-player") ?>
                                        </li>
                                        <li>
                                            <?php _e("On/off option for ratings, artwork, artist field, auto-repeat, and cover art", "html5-jquery-audio-player") ?>
                                        </li>
                                        <li>
                                            <?php _e("Widget support", "html5-jquery-audio-player") ?>
                                        </li>
                                        <li>
                                            <?php _e("3 buy/download buttons (optional)", "") ?>
                                        </li>
                                    </ul>
                                    <br />		
                                    <a href="http://enigmaplugins.com/plugins/html5-jquery-audio-pro/" target="_blank">
                                        <?php _e("Get Pro", "html5-jquery-audio-player") ?>
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <table cellpadding="0" class="widefat" border="0">
                        <thead>
                            <th scope="col" style="padding-left: 12px;">
                                <?php _e("Need Support?" ,"html5-jquery-audio-player") ?>
                            </th>
                        </thead>
                        <tbody>
                            <tr>
                                <td style="border:0;">
                                    <?php _e("If you are having problems with this plugin please visit the", "html5-jquery-audio-player") ?>
                                    <a href="http://wordpress.org/support/plugin/html5-jquery-audio-player" target="_blank">
                                        <?php _e("Support Forum", "html5-jquery-audio-player") ?>
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    </td>
                </tr>
                <form name="addplaylist" action="" method="post" enctype="multipart/form-data">
                <tr valign="top">
                    <th scope="row">
                        <strong>
                            <?php _e("MP3 Link", "html5-jquery-audio-player") ?>
                        </strong>
                    </th>
                    <td width="29%">
                        <input type="text" size="50" name="mp3" class="upload-url" />
                        <input id="st_upload_button" class="st_upload_button" type="button" name="upload_button" value="Upload" style="background: white;border: solid 1px #CCC;cursor: pointer;">
                    </td>
                    <td>
                        <span style="font-size:11px; color:#b2b2b2; font-style:italic;">
                            <strong>
                                <?php _e("Required", "html5-jquery-audio-player") ?>
                            </strong>
                            <?php _e("Full File Path of mp3 file", "html5-jquery-audio-player") ?>
                        </span>
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row">
                        <strong>
                            <?php _e("Ogg Link", "html5-jquery-audio-player") ?>
                        </strong>
                    </th>
                    <td>
                        <input type="text" size="50" name="ogg" class="upload-url" />
                        <input id="st_upload_button" class="st_upload_button" type="button" name="upload_button" value="Upload" style="background: white;border: solid 1px #CCC;cursor: pointer;">
                    </td>
                    <td>
                        <span style="font-size:11px; color:#b2b2b2; font-style:italic;">
                            <strong>
                                <?php _e("Required", "html5-jquery-audio-player") ?>
                            </strong>
                            <?php _e("Full File Path of ogg file", "html5-jquery-audio-player") ?>
                        </span>
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row">
                        <strong>
                            <?php _e("Rating", "html5-jquery-audio-player") ?>
                        </strong>
                    </th>
                    <td>
                        <input type="text" size="50" name="rating" />
                    </td>
                    <td>
                        <span style="font-size:11px; color:#b2b2b2; font-style:italic;">
                            <?php _e("Please put digit 1 to 5", "html5-jquery-audio-player") ?>
                        </span>
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row">
                        <strong>
                            <?php _e("Song Title", "html5-jquery-audio-player") ?>
                        </strong>
                    </th>
                    <td>
                        <input type="text" size="50" name="title" />
                    </td>
                    <td>
                        <span style="font-size:11px; color:#b2b2b2; font-style:italic;">
                            <strong>
                                <?php _e("Required", "html5-jquery-audio-player") ?>
                            </strong>
                            <?php _e("Title of the song", "html5-jquery-audio-player") ?>
                        </span>
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row">
                        <strong>
                            <?php _e("Link Buy Text", "html5-jquery-audio-player") ?>
                        </strong>
                    </th>
                    <td>
                        <input type="text" size="50" name="buy" />
                    </td>
                    <td>
                        <span style="font-size:11px; color:#b2b2b2; font-style:italic;">
                            <?php _e("This will link BUY button" ,"html5-jquery-audio-player") ?>
                        </span>
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row">
                        <strong>
                            <?php _e("Song Price", "html5-jquery-audio-player") ?>
                        </strong>
                    </th>
                    <td>
                        <input type="text" size="50" name="price" />
                    </td>
                    <td>
                        <span style="font-size:11px; color:#b2b2b2; font-style:italic;">
                            <?php _e("Price of the song", "html5-jquery-audio-player") ?>
                        </span>
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row">
                        <strong>
                            <?php _e("Cover Image", "html5-jquery-audio-player") ?>
                        </strong>
                    </th>
                    <td>
                        <input type="text" size="50" name="cover" class="upload-url" />
                        <input id="st_upload_button" class="st_upload_button" type="button" name="upload_button" value="Upload" style="background: white;border: solid 1px #CCC;cursor: pointer;">
                    </td>
                    <td>
                        <span style="font-size:11px; color:#b2b2b2; font-style:italic;">
                            <strong>
                                <?php _e("Required", "html5-jquery-audio-player") ?>
                            </strong>
                            <?php _e("Full File Path to cover image ( 125*125 )", "html5-jquery-audio-player") ?>
                        </span>
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row">
                        <strong>
                            <?php _e("Duration", "html5-jquery-audio-player") ?>
                        </strong>
                    </th>
                    <td>
                        <input type="text" size="50" name="duration" />
                    </td>
                    <td>
                        <span style="font-size:11px; color:#b2b2b2; font-style:italic;">
                            <strong>
                                <?php _e("Format: 10:00", "html5-jquery-audio-player") ?>
                            </strong>
                            <?php _e("Duration of the song", "html5-jquery-audio-player") ?>
                        </span>
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row">
                        <strong>
                            <?php _e("Artist", "html5-jquery-audio-player") ?>
                        </strong>
                    </th>
                    <td>
                        <input type="text" size="50" name="artist" />
                    </td>
                    <td>
                        <span style="font-size:11px; color:#b2b2b2; font-style:italic;">
                            <?php _e("Artist of the song", "html5-jquery-audio-player") ?>
                        </span>
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row">
                        <input type="submit" class="button-primary" value="<?php _e('Add Song', 'html5-jquery-audio-player') ?>" name="submit" />
                    </th>
                    <td></td>
                    <td></td>
                </tr>
                </form>
            </table>	

        <?php
            endif;
        ?>
            <table class="wp-list-table widefat fixed" cellspacing="0" style=" margin-top:20px;">
                <thead>
                    <tr>
                        <th scope="col">
                            <a href="javascrip:;">
                                <?php _e("Title", "html5-jquery-audio-player") ?>
                            </a>
                        </th>
                        <th scope="col" width="25%">
                            <a href="javascrip:;">
                                <?php _e("Artist", "html5-jquery-audio-player") ?>
                            </a>
                        </th>
                        <th scope="col" width="10%">
                            <a href="javascrip:;">
                                <?php _e("Price", "html5-jquery-audio-player") ?>
                            </a>
                        </th>
                        <th scope="col" width="10%">
                            <a href="javascrip:;">
                                <?php _e("Rating", "html5-jquery-audio-player") ?>
                            </a>
                        </th>
                        <th scope="col" width="10%">
                            <a href="javascrip:;">
                                <?php _e("Duration", "html5-jquery-audio-player") ?>
                            </a>
                        </th>
                        <th scope="col" width="10%">
                            <a href="javascrip:;">
                                <?php _e("Edit", "html5-jquery-audio-player") ?>
                            </a>
                        </th>	
                        <th scope="col" width="10%">
                            <a href="javascrip:;">
                                <?php _e("Delete", "html5-jquery-audio-player") ?>
                            </a>
                        </th>	
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th scope="col">
                            <a href="javascrip:;">
                                <?php _e("Title", "html5-jquery-audio-player") ?>
                            </a>
                        </th>
                        <th scope="col" width="25%">
                            <a href="javascrip:;">
                                <?php _e("Artist", "html5-jquery-audio-player") ?>
                            </a>
                        </th>
                        <th scope="col" width="10%">
                            <a href="javascrip:;">
                                <?php _e("Price", "html5-jquery-audio-player") ?>
                            </a>
                        </th>
                        <th scope="col" width="10%">
                            <a href="javascrip:;">
                                <?php _e("Rating", "html5-jquery-audio-player") ?>
                            </a>
                        </th>
                        <th scope="col" width="10%">
                            <a href="javascrip:;">
                                <?php _e("Duration", "html5-jquery-audio-player") ?>
                            </a>
                        </th>
                        <th scope="col" width="10%">
                            <a href="javascrip:;">
                                <?php _e("Edit", "html5-jquery-audio-player") ?>
                            </a>
                        </th>	
                        <th scope="col" width="10%">
                            <a href="javascrip:;">
                                <?php _e("Delete", "html5-jquery-audio-player") ?>
                            </a>
                        </th>		
                     </tr>
                </tfoot>
                <tbody id="the-list">
                <?php
                    $sql = "SELECT * FROM $table";

                    $results = $wpdb->get_results( $sql );
                    
                    if( !empty( $results ) ) :
                        foreach( $results as $result ):
                ?>
                            <tr>
                                <td>
                                    <?php echo stripslashes($result->title); ?>
                                </td>
                                <td width="25%">
                                    <?php echo stripslashes($result->artist); ?>
                                </td>
                                <td width="10%">
                                    <?php echo $result->price; ?>
                                </td>
                                <td width="10%">
                                    <?php echo $result->rating; ?>
                                </td>
                                <td width="10%">
                                    <?php echo $result->duration; ?>
                                </td>
                                <td width="10%">
                                    <a href="<?php bloginfo('url'); ?>/wp-admin/admin.php?page=hmp_palylist&action=update&id=<?php echo $result->secure; ?>">
                                        <?php _e("Update", "html5-jquery-audio-player") ?>
                                    </a>
                                </td>
                                <td width="10%">
                                    <a href="<?php bloginfo('url'); ?>/wp-admin/admin.php?page=hmp_palylist&action=delete&id=<?php echo $result->secure; ?>">
                                        <?php _e("Delete", "html5-jquery-audio-player") ?>
                                    </a>
                                </td>
                            </tr>
                <?php
                        endforeach;
                    else:
                ?>
                        <td class="posts column-posts num" colspan="7">
                            <?php _e("Please Add Songs No Songs Listed Yet", "html5-jquery-audio-player") ?>
                        </td>
                <?php
                    endif;
                ?>

                </tbody>
            </table>
        </div>

        <div class="clear"></div>
    </div><!-- wpbody-content -->
    
    <div class="clear"></div>
</div>
<div id="wpbody">
    <div id="wpbody-content">
			
        <div class="wrap">
            <h2><?php _e("Display Settings", "hmpf") ?></h2>

            <table class="form-table">
                <tr valign="top">
                    <th scope="row"></th>
                    <td></td>
                    <td rowspan="9" width="25%">
                    <table cellpadding="0" class="widefat donation" style="margin-bottom:10px; border:solid 2px #008001;" width="50%">
                        <thead>
                            <th scope="col">
                                <strong style="color:#008001; margin-left: 10px;">
                                    <?php _e("Help Improve This Plugin!", "hmpf") ?>
                                </strong>
                            </th>
                        </thead>
                        <tbody>
                            <tr>
                                <td style="border:0;">
                                    <?php _e("Enjoyed this plugin? All donations are used to improve and further develop this plugin. Thanks for your contribution.", "hmpf") ?>
                                </td>
                            </tr>
                            <tr>
                                <td style="border:0;">
                                    <!--<img src="<?php //echo plugin_dir_url( __FILE__ )."donate.png" ; ?>"  align="middle" />-->
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
                                    You can also help by 
                                    <a href="http://wordpress.org/extend/plugins/html5-jquery-audio-player/" target="_blank">
                                        <?php _e("rating this plugin on wordpress.org", "hmpf") ?>
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                        
                    <table cellpadding="0" class="widefat donation" style="margin-bottom:10px;">
                        <thead>
                            <th scope="col" style="padding-left: 12px;">
                                <?php _e("Pro Version","hmpf") ?>
                            </th>
                        </thead>
                        <tbody>
                            <tr>
                                <td style="border:0;">
                                    <ul>
                                        <li>
                                            <?php _e("Mulitple Playlists", "hmpf") ?>
                                        </li>
					<li>
                                            <?php _e("Drag n Drop playlist manager so you can reorder tracks", "hmpf") ?>
                                        </li>
					<li>
                                            <?php _e("Fully Responsive", "hmpf") ?>
                                        </li>
					<li>
                                            <?php _e("More customisation options", "hmpf") ?>
                                        </li>
					<li>
                                            <?php _e("On/off option for ratings, artwork, artist field, auto-repeat, and cover art", "hmpf") ?>
                                        </li>
					<li>
                                            <?php _e("Widget support", "hmpf") ?>
                                        </li>
					<li>
                                            <?php _e("3 buy/download buttons (optional)", "hmpf") ?>
                                        </li>
                                    </ul>
                                    <br />		
                                    <a href="http://enigmaplugins.com/plugins/html5-jquery-audio-pro/" target="_blank">
                                        <?php _e("Get Pro", "hmpf") ?>
                                    </a>
				</td>
                            </tr> 
                        </tbody>
                    </table>
                        
                    <table cellpadding="0" class="widefat" border="0">
                        <thead>
                            <th scope="col" style="padding-left: 12px;">
                                <?php _e("Need Support?", "hmpf") ?>
                            </th>
                        </thead>
                        <tbody>
                            <tr>
                                <td style="border:0;">
                                    <?php _e("If you are having problems with this plugin please visit the", "hmpf") ?>
                                    <a href="http://wordpress.org/support/plugin/html5-jquery-audio-player" target="_blank">
                                        <?php _e("Support Forum", "hmpf") ?>
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    </td>
                </tr>
                <form method="post" action="options.php">
                    <?php settings_fields( 'baw-settings-group' ); ?>
                <tr valign="top">
        <th scope="row"><strong><?php _e("Show Buy Text", "hmpf") ?></strong></th>
        <td><?php _e("Yes", "hmpf") ?> <input id="rd1" type="radio" name="showbuy" value="1" <?php  if(get_option('showbuy')==1){ echo 'checked="checked"';} ?> />  <?php _e("No", "hmpf") ?> <input id="rd0" type="radio" name="showbuy" value="0" <?php  if(get_option('showbuy')==0){ echo 'checked="checked"';} ?> /></td>
        </tr>
                <tr valign="top" class="buy_text">	
        <th scope="row"><strong><?php _e("Buy Text", "hmpf") ?></strong></th>
        <td><input type="text" name="buy_text" value="<?php echo get_option('buy_text'); ?>" size="50" id="omer"  /><span style="font-size:11px; color:#b2b2b2; font-style:italic; display:block;"><?php _e("works only if you have selected show buy text to 'YES'", "hmpf") ?></span></td>
        </tr>
                <tr valign="top">
        <th scope="row"><strong><?php _e("Show Track List", "hmpf") ?></strong></th>
        <td><?php _e("Yes", "hmpf") ?> <input id="rd3" type="radio" name="showlist" value="1" <?php  if(get_option('showlist')==1){ echo 'checked="checked"';} ?> />  <?php _e("No", "hmpf") ?> <input id="rd4" type="radio" name="showlist" value="0" <?php  if(get_option('showlist')==0){ echo 'checked="checked"';} ?> /></td>
      </tr>
                <tr valign="top">
        <th scope="row"><strong><?php _e("Auto Play", "hmpf") ?></strong></th>
        <td><?php _e("Yes", "hmpf") ?> <input id="rd3" type="radio" name="autoplay" value="1" <?php  if(get_option('autoplay')==1){ echo 'checked="checked"';} ?> />  <?php _e("No", "hmpf") ?> <input id="rd4" type="radio" name="autoplay" value="0" <?php  if(get_option('autoplay')==0){ echo 'checked="checked"';} ?> /></td>
        </tr>
                <tr valign="top">
        <th scope="row"><strong><?php _e("Number Of Tracks", "hmpf") ?></strong></th>
        <td><input type="text" name="tracks" value="<?php echo get_option('tracks'); ?>" size="50" /><span style="font-size:11px; color:#b2b2b2; font-style:italic; display:block;"><?php _e("works only if you have selected show track list to 'YES'", "hmpf") ?></span></td>
        </tr>
                <tr valign="top">
        <th scope="row"><strong><?php _e("Currency Symbol", "hmpf") ?></strong></th>
        <td><input type="text" name="currency" value="<?php echo get_option('currency'); ?>" size="50" /></td>
        </tr>
                <tr valign="top">
        <th scope="row"><strong><?php _e("Background Colour", "hmpf") ?></strong></th>
        <td><?php $color	=	get_option('color'); ?>
        	<input type="text" name="color" value="<?php echo get_option('color'); ?>" size="50" /><span style="font-size:11px; color:#b2b2b2; font-style:italic; display:block;"><?php _e("Insert colour code in the format #000000 or use 'transparent'", "hmpf") ?></span>
        </td>
        </tr>
                <tr valign="top">
        <th scope="row"><strong><?php _e("Text Colour", "hmpf") ?></strong></th>
        <td><?php $tcolor	=	get_option('tcolor'); ?>
        	<input type="text" name="tcolor" value="<?php echo get_option('tcolor'); ?>" size="50" /><span style="font-size:11px; color:#b2b2b2; font-style:italic; display:block;"><?php _e("Insert colour code in the format #cccccc", "hmpf") ?></span>
       
        </tr>
            </table>
    
    <p class="submit">
    <input type="submit" class="button-primary" value="<?php _e('Save Changes', "hmpf") ?>" />
    </p>

</form>
        </div>

        <div class="clear"></div>
        
    </div><!-- wpbody-content -->
    
    <div class="clear"></div>
</div>
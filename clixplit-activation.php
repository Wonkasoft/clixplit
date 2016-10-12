<div class="content-wrap">

    <div class="container">
        <div class="row">
            <div class="col-xs-4 col-xs-offset-4 vertical-space">
                <img class="img-responsive" src="<?php echo plugins_url( '/img/clixplit-logo.png', __FILE__ ) ?>" />
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12 text-center bottom-space">
                <div class="col-xs-12">
                    <ul class="nav-menu">
                        <li class="nav-item">
                            <a class="nav-buttons" href="?page=clixplit/clixplit-home.php"><span class="nav-text">home</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-buttons" href="?page=clixplit/clixplit-tutorials.php"><span class="nav-text">tutorials</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-buttons" href="?page=clixplit/clixplit-global-campaigns.php"><span class="nav-text">global campaigns</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-buttons" href="?page=clixplit/clixplit-resources.php"><span class="nav-text">resources</span></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid clixplit-panel">
        <div class="row">
            <div class="col-xs-12 col-md-6">

                <?php 
                echo '<div class="wrap">';
    echo '<h2>Clixplit License Registration</h2>';

    /*** License activate button was clicked ***/
    if (isset($_REQUEST['activate_license'])) {
        $license_key = $_REQUEST['clixplit_license_key'];

        // API query parameters
        $api_params = array(
            'slm_action' => 'slm_activate',
            'secret_key' => CLIXPLIT_SECRET_KEY,
            'license_key' => $license_key,
            'registered_domain' => $_SERVER['SERVER_NAME'],
            'item_reference' => urlencode(CLIXPLIT_REFERENCE),
        );

        // Send query to the license manager server
        $query = esc_url_raw(add_query_arg($api_params, CLIXPLIT_LICENSE_SERVER_URL));
        $response = wp_remote_get($query, array('timeout' => 20, 'sslverify' => false));

        // Check for error in the response
        if (is_wp_error($response)){
            echo "Unexpected Error! The query returned with an error.";
        }

        //var_dump($response);//uncomment it if you want to look at the full response
        
        // License data.
        $license_data = json_decode(wp_remote_retrieve_body($response));
        
        // TODO - Do something with it.
        //var_dump($license_data);//uncomment it to look at the data
        
        if($license_data->result == 'success'){//Success was returned for the license activation
            
            //Uncomment the followng line to see the message that returned from the license server
            echo '<br />The following message was returned from the server: '.$license_data->message;
            
            //Save the license key in the options table
            update_option('clixplit_license_key', $license_key); 
        }
        else{
            //Show error to the user. Probably entered incorrect license key.
            
            //Uncomment the followng line to see the message that returned from the license server
            echo '<br />The following message was returned from the server: '.$license_data->message;
        }

    }
    /*** End of license activation ***/
    
    /*** License activate button was clicked ***/
    if (isset($_REQUEST['deactivate_license'])) {
        $license_key = $_REQUEST['clixplit_license_key'];

        // API query parameters
        $api_params = array(
            'slm_action' => 'slm_deactivate',
            'secret_key' => CLIXPLIT_SECRET_KEY,
            'license_key' => $license_key,
            'registered_domain' => $_SERVER['SERVER_NAME'],
            'item_reference' => urlencode(CLIXPLIT_REFERENCE),
        );

        // Send query to the license manager server
        $query = esc_url_raw(add_query_arg($api_params, CLIXPLIT_LICENSE_SERVER_URL));
        $response = wp_remote_get($query, array('timeout' => 20, 'sslverify' => false));

        // Check for error in the response
        if (is_wp_error($response)){
            echo "Unexpected Error! The query returned with an error.";
        }

        //var_dump($response);//uncomment it if you want to look at the full response
        
        // License data.
        $license_data = json_decode(wp_remote_retrieve_body($response));
        
        // TODO - Do something with it.
        //var_dump($license_data);//uncomment it to look at the data
        
        if($license_data->result == 'success'){//Success was returned for the license activation
            
            //Uncomment the followng line to see the message that returned from the license server
            echo '<br />The following message was returned from the server: '.$license_data->message;
            
            //Remove the licensse key from the options table. It will need to be activated again.
            update_option('clixplit_license_key', '');

            // Deactivate plugin
        }
        else{
            //Show error to the user. Probably entered incorrect license key.
            
            //Uncomment the followng line to see the message that returned from the license server
            echo '<br />The following message was returned from the server: '.$license_data->message;
        }
        
    }
    /*** End of Clixplit License deactivation ***/
    
    ?>
    <p>Please enter the license key for this product to activate it. You were given a license key when you purchased this item.</p>
    <form action="" method="post">
        <table class="form-table">
            <tr>
                <th style="width:100px;"><label for="clixplit_license_key">License Key</label></th>
                <td ><input class="regular-text" type="text" id="clixplit_license_key" name="clixplit_license_key"  value="<?php echo get_option('clixplit_license_key'); ?>" ></td>
            </tr>
        </table>
        <p class="submit">
            <input type="submit" name="activate_license" value="Activate" class="button-primary" />
            <input type="submit" name="deactivate_license" value="Deactivate" class="button" />
        </p>
    </form>
    </div>

</div> <!-- end content-wrap -->

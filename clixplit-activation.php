<?php 
    include_once('clixplit_validation_class.php'); 
    $checkkey = new clixplit_validation();

if (isset($_REQUEST['activate_license'])) {
    $license_key_input = $_REQUEST['clixplit_license_key'];
    $validkey = $checkkey->clixplit_activate($license_key_input);
    update_option('clixplit_license_key',$license_key_input);
    if ($checkkey->clixplit_check($license_key_input) =='active') {
    update_option('clixplit_license_active','active');
    }
}

if (isset($_REQUEST['deactivate_license'])) {
    $license_key_input = $_REQUEST['clixplit_license_key'];
    $validkey = $checkkey->clixplit_deactivate($license_key_input);
    update_option('clixplit_license_key','');
    update_option('clixplit_license_active','inactive');

    
}
?>
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

    <div class="vertical-space">
    <?php
    if (!empty($validkey)) {
     echo $validkey;
    } else {
        $localhostdbkey = get_option('clixplit_license_key');
        $activeoption = get_option('clixplit_license_active');

        if (($activeoption =='active') && ($checkkey->clixplit_check($localhostdbkey) == 'active')) {
            echo "Your product is activated. Use this page for deactivation only.";
        } else {
        echo "Please enter the license key for this product to activate it. You were given a license key when you purchased this item.";
            }
        }
    ?>
    </div>
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
</div>
</div> <!-- end content-wrap -->
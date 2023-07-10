<h1> Webaiid Theme Options</h1>

<?php

$profile = esc_attr( get_option('profile_picture'));

?>

<?php  settings_errors(); ?>

<div class="webaiid_admin_sidebar_preview">
    <div class="profile-pic">
         
         <div  class="profile-pic" id="profile_preview" style="background-image:url(<?php print $profile ?>)"></div>
    </div>
</div>
<form action="options.php" method="post">
    <?php settings_fields( 'webaiid_settings_group' ); ?>
    <?php do_settings_sections( 'webaiid_settings' ); ?>
    <?php submit_button(); ?>
</form>
<?php
add_action('admin_menu', 'af_p4_my_admin_menu');

function af_p4_my_admin_menu () {
  add_menu_page(
  'P4 option 1',
  'Spotify Plugin',
  'manage_options',
  'af_p4_menuparent',
  'af_p4_fct_panel_options');

  add_submenu_page( 'af_p4_menuparent',
  'Options',
  'Informations',
  'manage_options',
  'af_p4_menuenfant1',
  'af_p4_settings_page2');
}

//ETAPE 1 : 1 function -> 1 page
function af_p4_fct_panel_options () {
	include_once('panel-options.php');
}


function af_p4_settings_page2() {
	include_once('informations.php');
}

function af_p4_pieddepage() {
   echo "<div style='color: red;
    font-size: 30px;
    margin: 20px;'>".get_option('af_p4_footer_text')."</div>"; // in database
}
add_action( 'wp_footer', 'af_p4_pieddepage' );
?>

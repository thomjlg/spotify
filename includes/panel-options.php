<?php
require_once('db-select.php');

    global $chk;
    if(isset($_POST['wp_submit'])){
            af_p4_wphw_opt();
    }
    function af_p4_wphw_opt(){
        $footertxt = $_POST['footertextname'];
        global $chk;
        if( get_option('af_p4_footer_text') != trim($footertxt)){
			// in database
            $chk = update_option( 'af_p4_footer_text', trim($footertxt));
        }
    }
?>


<div class="wrap">

  <h2>Options du plugin Spotify</h2>
  
  <?php if(isset($_POST['wp_submit']) && $chk):?>
  <div id="message" class="updated below-h2">
    <p>Mise à jour effectuée avec succès.</p>
  </div>
  <?php endif;?>

  <div class="metabox-holder">
    <div class="postbox">
      <h3><strong>Recherche :</strong></h3>
      <form method="post" action="db-select.php?artist=<?php echo get_option('af_p4_footer_text');?>">
        <table class="form-table">
          <tr>
            <th scope="row">Element à rechercher dans la base :</th>
            <td><input type="text" name="footertextname"
				value="<?php echo get_option('af_p4_footer_text');?>" style="width:350px;" /></td>
          </tr>
          <tr>
            <th scope="row">&nbsp;</th>
            <td style="padding-top:10px;  padding-bottom:10px;">
				<input type="submit" name="wp_submit" value="Rechercher" class="button-primary" />
			</td>
          </tr>
        </table>
      </form>
    </div>
  </div>

  <div class="metabox-holder">
    <div class="postbox">
      <h3><strong>Suppression d'un enregistrement : <span style='color:red'>(attention, cette action est irrévocable)</span></strong></h3>
      <form method="post" action="db-delete.php?artist=<?php echo get_option('af_p4_footer_text');?>">
        <table class="form-table">
          <tr>
            <th scope="row">Element à supprimer de la base :</th>
            <td><input type="text" name="footertextname"
				value="<?php echo get_option('af_p4_footer_text');?>" style="width:350px;" /></td>
          </tr>
          <tr>
            <th scope="row">&nbsp;</th>
            <td style="padding-top:10px;  padding-bottom:10px;">
				<input type="submit" name="wp_submit" value="Supprimer les éléments concernés" class="button-primary" />
			</td>
          </tr>
        </table>
      </form>
    </div>
  </div>

  <div class="metabox-holder">
    <div class="postbox">
      <h3><strong>Suppression de tous les enregistrements : <span style='color:red'>(attention, cette action est irrévocable)</span></strong></h3>
      <form method="post" action="db-delete-all-rows.php">
        <table class="form-table">
          <tr>
            <th scope="row">&nbsp;</th>
            <td style="padding-top:10px;  padding-bottom:10px;">
				<input type="submit" name="wp_submit" value="Supprimer tous les élements" class="button-primary"  />
			</td>
          </tr>
        </table>
      </form>
    </div>
  </div>

</div>

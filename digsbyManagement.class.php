<?php
if(!class_exists("DigsbyManagement")):

class DigsbyManagement {

  function widgetControl() {
    $options = get_option('digsbyWidgetOptions');
    if(!is_array($options)) {
      $options = array();
      $options['title'] = 'Digsby';
      $options['height'] = '350';
    }
    if($_POST['wpdigsby']['submit']) {
      unset($_POST['wpdigsby']['submit']);
      foreach($_POST['wpdigsby'] as $key => $option) {
        $options[$key] = strip_tags(stripslashes($option));
      }      
      update_option('digsbyWidgetOptions', $options);
    }
    $title = htmlspecialchars($options['title'], ENT_QUOTES);
    $height = htmlspecialchars($options['height'], ENT_QUOTES);
    ?>
    <p style="text-align:center;">
    <label for="wpdigsby-title">
    <?php _e('Digsby', 'wp-digsby');?>: <input style="width: 200px;" id="wpdigsby-title" name="wpdigsby[title]" type="text" value="<?php echo $title;?>" />
    </label>
    </p>
    <p style="text-align:center;">
    <label for="wpdigsby-height">
    <?php _e('Widget Height (in pixels)', 'wp-digsby');?>: <input style="width: 200px;" id="wpdigsby-height" name="wpdigsby[height]" type="text" value="<?php echo $height;?>" />
    </label>
    </p>
    <input type="hidden" id="wpdigsby-submit" name="wpdigsby[submit]" value="1" />
    <?php
  }
  
  function optionsPage() {
    $options = get_option('digsbyPluginOptions');
    if(!is_array($options)) {
      $options = array();
      $options['url'] = "http://";
      $options['title'] = "Chatting with Digsby";
      $options['popUpWidth'] = '300px';
      $options['popUpHeight'] = '300px';
      $options['postHeight'] = '500px';
    }
    if($_POST['wpdigsbysubmitted']) {
      $options['url'] = $_POST['wpdigsbyurl'];
      $options['title'] = $_POST['wpdigsbytitle'];
      $options['popUpWidth'] = $_POST['wpdigsbypopupwidth'];
      $options['popUpHeight'] = $_POST['wpdigsbypopupheight'];
      $options['postHeight'] = $_POST['wpdigsbypostheight'];
      update_option('digsbyPluginOptions', $options);
    }
    $url = htmlspecialchars($options['url'], ENT_QUOTES);
    $title = htmlspecialchars($options['title'], ENT_QUOTES);
    $popUpWidth = htmlspecialchars($options['popUpWidth'], ENT_QUOTES);
    $popUpHeight = htmlspecialchars($options['popUpHeight'], ENT_QUOTES);
    $postHeight = htmlspecialchars($options['postHeight'], ENT_QUOTES);
    ?>
    <h2>Digsby Options</h2>
    <form name="digsbyPluginOptions" method="post" action="?page=wp-digsby-options">
    <p class="submit"><input type="submit" name="submit" value="Update Opions &raquo;"></p>
    <table class="editform" width="100%" cellspacing="2" cellpadding="5">
    <tr>
    <th width="33%" scope="row" valign="top" style="text-align:right;"><label for="wpdigsbyurl"><?php _e('Digsby URL', 'wp-digsby');?></label></th>
    <td width="67%"><input type="text" name="wpdigsbyurl" id="wpdigsbyurl" value="<?php echo $url;?>" /></td>
    </tr>
    <tr>
    <th width="33%" scope="row" valign="top" style="text-align:right;"><label for="wpdigsbytitle"><?php _e('Digsby Page Title', 'wp-digsby');?></label></th>
    <td width="67%"><input type="text" name="wpdigsbytitle" id="wpdigsbytitle" value="<?php echo $title;?>" /></td>
    </tr>
    <tr>
    <th width="33%" scope="row" valign="top" style="text-align:right;"><label for="wpdigsbypopupwidth"><?php _e('Pop Up Width', 'wp-digsby');?></label></th>
    <td width="67%"><input type="text" name="wpdigsbypopupwidth" id="wpdigsbypopupwidth" value="<?php echo $popUpWidth;?>" /></td>
    </tr>
    <tr>
    <th width="33%" scope="row" valign="top" style="text-align:right;"><label for="wpdigsbypopupheight"><?php _e('Pop Up Height', 'wp-digsby');?></label></th>
    <td width="67%"><input type="text" name="wpdigsbypopupheight" id="wpdigsbypopupheight" value="<?php echo $popUpHeight;?>" /></td>
    </tr>
    <tr>
    <th width="33%" scope="row" valign="top" style="text-align:right;"><label for="wpdigsbypostheight"><?php _e('Post Height', 'wp-digsby');?></label></th>
    <td width="67%"><input type="text" name="wpdigsbypostheight" id="wpdigsbypostheight" value="<?php echo $postHeight;?>" /></td>
    </tr>
    </table>
    <input type="hidden" name="wpdigsbysubmitted" value="1" />
    <p class="submit"><input type="submit" name="submit" value="Update Opions &raquo;"></p>
    </form>
    <?php
  }    
}
endif;
?>
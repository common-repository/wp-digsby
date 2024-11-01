<?php
if(!class_exists("Digsby")):

class Digsby {

  function displayLink($title) {
    echo "<a href=\"" . get_option('siteurl') . "?digsby=activate\" target=\"_blank\" class=\"digsbyLink\">$title</a>";
  }

  function displayPopUp($height="100%") {
    $pluginOptions = get_option('digsbyPluginOptions');
  ?>
    <html>
    <head>
    <title><?php echo $pluginOptions['title'];?></title>
    </head>
    <body>
    <embed src="<?php echo $pluginOptions['url'];?>" type="application/x-shockwave-flash" wmode="transparent" width="100%" height="<?php echo $height;?>"></embed>
    </body>
    </html>
  <?php
  }
  
  function displayWidget($args) {
    extract($args);
    $pluginOptions = get_option('digsbyPluginOptions');
    $widgetOptions = get_option('digsbyWidgetOptions');
    echo $before_widget;
    if(isset($widgetOptions['title']) && !empty($widgetOptions['title']))
      echo $before_title . $widgetOptions['title'] . $after_title;
    echo "<embed src=\"" . $pluginOptions['url'] . "\"";
    echo " wmode=\"transparent\"";
    echo " type=\"application/x-shockwave-flash\"";
    echo " width=\"100%\" height=\"" . $widgetOptions['height'] . "\"></embed>";
    echo $after_widget;
  }
  
  function displayManual($width, $height) {
    $pluginOptions = get_option('digsbyPluginOptions');
    ?>
    <embed src="<?php echo $pluginOptions['url'];?>" type="application/x-shockwave-flash" wmode="transparent" width="<?php echo $width;?>" height="<?php echo $height;?>"></embed>
    <?php
  }
}
endif;
?>
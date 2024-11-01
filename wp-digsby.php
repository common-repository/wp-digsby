<?php
/*
Plugin Name: Wordpress Digsby
Plugin URI: http://www.lukehowell.com/
Description: Use a Digsby widget in your sidebar, on a page or post or by a link to use a pop up with the Digsby widget inside.
Version: 1.0.1
Author: Luke Howell
Author URI: http://www.lukehowell.com/

---------------------------------------------------------------------
This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You can see a copy of GPL at <http://www.gnu.org/licenses/>
---------------------------------------------------------------------
*/

if(!function_exists('get_option'))
  require_once('../../../wp-config.php');
define('DIGSBYPATH', ABSPATH.'wp-content/plugins/wp-digsby');
define('DIGSBYURL', get_option('siteurl').'/wp-content/plugins/wp-digsby');
require_once(DIGSBYPATH . "/digsby.class.php");
require_once(DIGSBYPATH . "/digsbyManagement.class.php");

$pluginOptions = get_option('digsbyPluginOptions');

if(isset($_GET['digsby']) && $_GET['digsby'] == 'activate') {
  $digsby = new Digsby();
  $digsby->displayPopUp();
  exit();
}

if(isset($_GET['ver']) && $_GET['ver'] == 'digsbyJS') {
  ?>
  jQuery(document).ready(function() {
    jQuery(".digsbyLink").click(function() {
      popWidth = <?php echo $pluginOptions['popUpWidth'];?>;
      popHeight = <?php echo $pluginOptions['popUpHeight'];?>;
      popLeft = screen.availWidth/2 - popWidth/2;
      popTop = screen.availHeight/2 - popHeight/2;
      window.open(this.href,"<?php echo $pluginOptions['title'];?>", "toolbar=0,resizable=0,menubar=0,status=0,top="+popTop+",left="+popLeft+",width="+popWidth+",height="+popHeight);
      return false;
    });
  });
  <?php
  exit();
}

function wpDigsbyINIT() {
  $widgetOptions = get_option('digsbyWidgetOptions');
  $pluginOptions = get_option('digsbyPluginOptions');
  if(!is_array($widgetOptions)) {
    $widgetOptions = array();
    $widgetOptions['title'] = 'Digsby';
    $widgetOptions['height'] = '350';
    update_option('digsbyWidgetOptions', $widgetOptions);
  }
  if(!is_array($pluginOptions)) {
    $pluginOptions = array();
    $pluginOptions['url'] = "";
    $pluginOptions['title'] = "Chatting with Digsby";
    $pluginOptions['popUpWidth'] = '300';
    $pluginOptions['popUpHeight'] = '300';
    update_option('digsbyPluginOptions', $pluginOptions);
  }
  wp_enqueue_script('wpdigsby', '/wp-content/plugins/wp-digsby/wp-digsby.php', array('jquery'), "digsbyJS");
  if(!function_exists('register_sidebar_widget')) return;
  $digsby = new Digsby();
  $management = new DigsbyManagement();
  register_sidebar_widget(__('Digsby','wp-digsby'), array(&$digsby, 'displayWidget'));
  register_widget_control(__('Digsby','wp-digsby'), array(&$management, 'widgetControl'));
}

function wpDigsbyManagementINIT() {
  $management = new DigsbyManagement();
  add_options_page(
						__('Digsby Options', 'wp-digsby'), //page title
						__('Digsby', 'wp-digsby'),  //sub-menu title
						'manage_options', //access capability
						'wp-digsby-options', //file
						array(&$management, 'optionsPage') //function
					);
}

function wpDigsbyLink($title) {
  $digsby = new Digsby();
  $digsby->displayLink($title);
}

function wpDigsbyDisplay($width, $height) {
  $digsby = new Digsby();
  $digsby->displayManual($width, $height);
}  

function insertDigsby($content) {
  if(preg_match("[DIGSBY]", $content)) {
    $digsby = new Digsby();
    $pluginOptions = get_option('digsbyPluginOptions');
    $content = str_replace("[DIGSBY]", $digsby->displayManual("100%", $pluginOptions['postHeight']), $content);
  }
  return $content;
}

add_action('plugins_loaded', 'wpDigsbyINIT');
add_action('admin_menu', 'wpDigsbyManagementINIT');
add_filter('the_content', 'insertDigsby');
?>
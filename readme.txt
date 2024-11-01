=== WP Digsby ===
Contributors: snumb130, bbodine1
Donate Link: http://www.lukehowell.com/donate
Tags: chat, communicate, widget, live, digsby 
Version: 1.0.1
Requires at least: 2.3
Tested up to: 2.5.1
Stable tag: 1.0.1

Use a Digsby widget in your sidebar, on a page or post or by a link to use a pop up with the Digsby widget inside.

== Description ==

Digsby is a multiprotocol IM client that lets you chat with all your friends on AIM, MSN, Yahoo, ICQ, Google Talk, and Jabber with one simple to manage buddy list. Digsby also includes options to check email and stay in touch with your favorite social networks like Myspace and Facebook.

With Wordpress Digsby you can place a widget on your WordPress site so you can chat with visitors right from Digsby. Digsby is required to be installed on your local computer for you to be able to chat with users on you website.

== Screenshots ==
1. Digsby Chat Window in PopUp (New window if javascript is disabled).
2. Digsby Chat Window in Sidebar.
3. Digsby Chat Window in Post.

== Changelog ==
<pre>
Version 1.0.1
  Added option for height of chat window when included in post.
  Adding language support.
Version 1.0
  Initial release.
</pre>

== Installation ==
= Digsby Download and Install =
1. Visit http://www.digsby.com
2. Click Download
3. Select your operating system (Mac, Windows, Linux)
4. Install Digsby on your computer

= Digsby Setup =
1.  Click "Tools"
2.  Click "Preferences"
3.  Click "Widgets"
4.  Click "New Widget"
5.  You will be taken to http://widget.digsby.com
6.  Enter the title that you wish to show up in your chat window.
      You can disregard the size as it will be set by the plugin.
7.  Click "Next"
8.  If required, login into the digsby site or create your new account.
9.  You can then close the page and return to your Digsby program.
10. In the Digsby Preference window you will now see your widget listed.
11. Click on the widget and code will appear in the box at the bottom of the window
12. Copy the URL between the quotes for the src attribute.
13. This URL will be placed in the Digsby URL text box in the Digsby options page.


= Plugin Setup =
1. Upload `wp-digsby` folder to the `/wp-content/plugins/ directory`.
2. Activate the plugin through the 'Plugins' menu in WordPress.
3. Click "Settings" in the Wordpress admin section.
4. Click "Digsby" under settings.
5. Set the options to the approprite values.

== Options ==
= Types of Display =
1. You can add the digsby widget to a sidebar if you theme supports widgets
2. If your theme does not support widgets you can add it manually by using <pre>&lt;?php wpDigsbyDisplay("width", "height");?&gt;</pre> (Width and Height can be px or %).
3. You can add the chat window to a page or post ([[DIGSBY]]).
4. You can add a link anywhere by using the code <pre>&lt;?php wpDigsbyLink("YourTitle");?&gt;</pre> where YourTitle is the title of the window that will open with your chat window.

== Frequently Asked Questions ==

= The plugin did not activate and gives a fatal error "failed to open stream: No such file or directory"  =

All plugin files must be in the wordpress plugin file directory wp-content/plugins in folder "wp-digsby". Spelled exactly. Can not change this name.
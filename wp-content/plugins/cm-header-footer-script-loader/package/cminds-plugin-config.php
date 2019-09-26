<?php

$cminds_plugin_config = array(
	'plugin-is-pro'				 => FALSE,
	'plugin-is-addon'			 => FALSE,
	'plugin-version'			 => '1.0.10',
	'plugin-abbrev'				 => 'cmhandfsl',
	'plugin-file'				 => CMHeaderAndFooterSL::$plugin_file,
	'plugin-dir-path'			 => plugin_dir_path( CMHeaderAndFooterSL::$plugin_file ),
	'plugin-dir-url'			 => plugin_dir_url( CMHeaderAndFooterSL::$plugin_file ),
	'plugin-basename'			 => plugin_basename( CMHeaderAndFooterSL::$plugin_file ),
    'plugin-show-guide'                 => TRUE,
     'plugin-guide-text'                 => '    <div style="display:block">
        <ol>
         <li>Go to the plugin <strong>"Setting"</strong></li>
         <li>Add JavaScript or CSS code and choose if this will appear in the header or footer. </li>
         <li>You can also restrict if to choose this on pages or posts only</li>
        <li> You can add additional codes or pause specific code based on your needs.</li>
         </ol>
    </div>',
     'plugin-guide-video-height'         => 240,
     'plugin-guide-videos'               => array(
          array( 'title' => 'Installation tutorial', 'video_id' => '162714982' ),
     ),
         'plugin-upgrade-text'           => 'Good Reasons to Upgrade to Pro',
    'plugin-upgrade-text-list'      => array(
        array( 'title' => 'Support custom posts type', 'video_time' => 'More' ),
        array( 'title' => 'Target by post type', 'video_time' => 'More' ),
        array( 'title' => 'Manually approve each script and style', 'video_time' => 'More' ),
        array( 'title' => 'Ability to override default settings in each post', 'video_time' => 'More' ),
        array( 'title' => 'Load in header or in footer', 'video_time' => 'More' ),
        array( 'title' => 'Target script by specific URL', 'video_time' => 'More' ),
        array( 'title' => 'Set script for specific post', 'video_time' => 'More' ),
     ),
    'plugin-upgrade-video-height'   => 240,
    'plugin-upgrade-videos'         => array(
        array( 'title' => 'Script Loader Premium Features', 'video_id' => '141020978' ),
    ),

	'plugin-icon'				 => '',
    'plugin-affiliate'               => '',
    'plugin-redirect-after-install'  => admin_url( 'admin.php?page=cm-handfsl' ),
	'plugin-name'				 => CMHeaderAndFooterSL::$plugin_name,
	'plugin-license-name'		 => CMHeaderAndFooterSL::$plugin_name,
	'plugin-slug'				 => '',
	'plugin-short-slug'			 => 'ecommerce-tracking',
	'plugin-menu-item'			 => CMHeaderAndFooterSL::$plugin_slug,
	'plugin-textdomain'			 => CMHeaderAndFooterSL::$plugin_text_domain,
	'plugin-userguide-key'		 => '452-header-and-footer-script-loader',
	'plugin-store-url'			 => 'https://www.cminds.com/wordpress-plugins-library/cm-header-and-footer-script-loader-plugin-for-wordpress',
	'plugin-support-url'		 => 'https://wordpress.org/support/plugin/cm-header-footer-script-loader',
	'plugin-review-url'			 => 'https://wordpress.org/support/view/plugin-reviews/cm-header-footer-script-loader',
	'plugin-changelog-url'		 => 'https://www.cminds.com/wordpress-plugins-library/cm-header-and-footer-script-loader-plugin-for-wordpress/#changelog',
	'plugin-licensing-aliases'	 => array(),
	'plugin-compare-table'	 => '
            <div class="pricing-table" id="pricing-table"><h2 style="padding-left:10px;">Upgrade The Header and Footer Script Loader Plugin:</h2>
                <ul>
                    <li class="heading" style="background-color:red;">Current Edition</li>
                    <li class="price">FREE<br /></li>
                     <li style="text-align:left;"><span class="dashicons dashicons-yes"></span>Unlimited scripts and styles</li>
                     <li style="text-align:left;"><span class="dashicons dashicons-yes"></span>Support Post and pages</li>
                   <hr>
                    Other CreativeMinds Offerings
                    <hr>
                 <a href="https://www.cminds.com/wordpress-plugins-library/seo-keyword-hound-wordpress/" target="blank"><img src="' . plugin_dir_url( __FILE__ ). 'views/Hound2.png"  width="220"></a><br><br><br>
                <a href="https://www.cminds.com/store/cm-wordpress-plugins-yearly-membership/" target="blank"><img src="' . plugin_dir_url( __FILE__ ). 'views/banner_yearly-membership_220px.png"  width="220"></a><br>
                 </ul>

                <ul>
                    <li class="heading">Pro<a href="https://www.cminds.com/wordpress-plugins-library/cm-header-and-footer-script-loader-plugin-for-wordpress" style="float:right;font-size:11px;color:white;" target="_blank">More</a></li>
                    <li class="price">$29.00<br /> <span style="font-size:14px;">(For one Year / 2 Sites)<br />Additional pricing options available <a href="https://www.cminds.com/wordpress-plugins-library/cm-header-and-footer-script-loader-plugin-for-wordpress" target="_blank"> >>> </a></span> <br /></li>
                    <li class="action"><a href="https://www.cminds.com/?edd_action=add_to_cart&download_id=59678&wp_referrer=https://www.cminds.com/checkout/&edd_options[price_id]=1" style="font-size:18px;" target="_blank">Upgrade Now</a></li>
                     <li style="text-align:left;"><span class="dashicons dashicons-yes"></span>All Free Version Features <span class="dashicons dashicons-admin-comments cminds-package-show-tooltip" style="color:green" title="All free features are supported in the pro"></span></li>
 <li style="text-align:left;"><span class="dashicons dashicons-yes"></span>Supports custom post types <span class="dashicons dashicons-admin-comments cminds-package-show-tooltip" style="color:green" title="Support post pages and also custom posts"></span></li>
 <li style="text-align:left;"><span class="dashicons dashicons-yes"></span>Target by post type  <span class="dashicons dashicons-admin-comments cminds-package-show-tooltip" style="color:green" title="You can target script and styles to specific group of post by post type"></span></li>
 <li style="text-align:left;"><span class="dashicons dashicons-yes"></span>Manually approve each script and style <span class="dashicons dashicons-admin-comments cminds-package-show-tooltip" style="color:green" title="In each post you have a metabox from which you can control which script or style is loaded."></span></li>
 <li style="text-align:left;"><span class="dashicons dashicons-yes"></span>Ability to override default settings  <span class="dashicons dashicons-admin-comments cminds-package-show-tooltip" style="color:green" title="In each post you can override global setting for a specific style or script and decide if to upload the script or not "></span></li>
 <li style="text-align:left;"><span class="dashicons dashicons-yes"></span>Load in header or in footer <span class="dashicons dashicons-admin-comments cminds-package-show-tooltip" style="color:green" title="Per each script or style you can decide if to upload it on the header or the footer"></span></li>
 <li style="text-align:left;"><span class="dashicons dashicons-yes"></span>Target script by URL <span class="dashicons dashicons-admin-comments cminds-package-show-tooltip" style="color:green" title="You can target a script or style to load on a specific URL or a group of URLs even if you can not edit the page of this URL"></span></li>
 <li style="text-align:left;"><span class="dashicons dashicons-yes"></span>Target script by device type (mobile or desktop) <span class="dashicons dashicons-admin-comments cminds-package-show-tooltip" style="color:green" title="You can target a script to load on mobile devices, desktop or both"></span></li>
               <li class="support" style="background-color:lightgreen; text-align:left; font-size:14px;"><span class="dashicons dashicons-yes"></span> One year of expert support <span class="dashicons dashicons-admin-comments cminds-package-show-tooltip" style="color:grey" title="You receive 365 days of WordPress expert support. We will answer questions you have and also support any issue related to the plugin. We will also provide on-site support."></span><br />
                         <span class="dashicons dashicons-yes"></span> Unlimited product updates <span class="dashicons dashicons-admin-comments cminds-package-show-tooltip" style="color:grey" title="During the license period, you can update the plugin as many times as needed and receive any version release and security update"></span><br />
                        <span class="dashicons dashicons-yes"></span> Plugin can be used forever <span class="dashicons dashicons-admin-comments cminds-package-show-tooltip" style="color:grey" title="Once license expires, If you choose not to renew the plugin license, you can still continue to use it as long as you want."></span><br />
                        <span class="dashicons dashicons-yes"></span> Save 40% once renewing license <span class="dashicons dashicons-admin-comments cminds-package-show-tooltip" style="color:grey" title="Once license expires, If you choose to renew the plugin license you can do this anytime you choose. The renewal cost will be 35% off the product cost."></span></li>
                   </ul>

            </div>',
);
<?php
defined('_VALID_AI') or die('Direct Access to this location is not allowed.');
?>
<br />
<div>
    <div id="icon-options-general" class="icon_ai">
    <br>
    </div>
	<h2 class="default-h2-text"><?php _e('Advanced Settings', 'advanced-iframe') ?></h2>  
<?php
    _e('<p class="default-h2-p">The following options are already features which are not html standard anymore. All the options do already require additional Javascript, css or dynamic processing.<br>', 'advanced-iframe'); _e('Please note that some of the advanced features require basic html/css knowhow!</p>', 'advanced-iframe');

    aiPostboxOpen("id-advanced-features", "General advanced features", $closedArray); 
?>    
    <table class="form-table">
    <?php               
        printTrueIframeFalse($devOptions, __('Scrolls the parent window/iframe to the top', 'advanced-iframe'), 'onload_scroll_top', __('If you like that if you click on a link in the iframe the parent page should scroll to the top of the whole page you should set this to \'Yes\'. Please note that this is done by Javascript! So if a user has Javascript deactivated no scrolling is done. This setting generates the code onload="aiScrollToTop("id","true");" to the iframe. If you select the resize iframe as well then onload="aiResizeIframe(this);aiScrollToTop("your_id","true");" is generated. If you like a different order please enter the Javascript functions directly in the onload parameter in the order you like. You can also scroll to the top of the iframe by selecting \'Iframe\'. Then this setting generates the code onload="aiScrollToTop("your_id","iframe");". Shortcode attribute: onload_scroll_top="true", onload_scroll_top="iframe" or onload_scroll_top="false" ', 'advanced-iframe'));

        printTrueFalse(false,$devOptions, __('Hide the iframe until it is loaded', 'advanced-iframe'), 'hide_page_until_loaded', __('This setting hides the iframe until it is loaded. This prevents the iframe white flash issue while loading and also if you modify the iframe only the final result is visible. Since 7.5.6. this also works for following pages in the iframe as the iframe is hidden again when the url changes. When you use the external workaround please check the setting for the "<a id="external-workaround-link" href="#xss">External workaround</a>". The setting there overwrites this setting because otherwise the iframe is maybe shown too early! Shortcode attribute: hide_page_until_loaded="true" or hide_page_until_loaded="false" ', 'advanced-iframe'));
    if ($evanto || $isDemo) {        
        printTrueFalse(true,$devOptions, __('Show loading icon', 'advanced-iframe'), 'show_iframe_loader', __('You can show a loading icon until the page in the iframe is fully loaded. You can use your own image with the size of 66 x 66 px by replacing the file img/loader.gif. You can also place a loader.gif into the advanced-iframe-custom folder to show your own icon. There also the size is detected automatically! Shortcode attribute: show_iframe_loader="true" or show_iframe_loader="false" ', 'advanced-iframe'),'false','//www.tinywebgallery.com/blog/advanced-iframe/advanced-iframe-pro-demo/zoom-iframe-content');
        printTextInput(true,$devOptions, __('Hide the content until iframe is loaded', 'advanced-iframe'), 'hide_content_until_iframe_color', __('If you define a color here (e.g. #ffffff) the content of the main page is hidden until the iframe is loaded. Especially if the iframe does cover most of your page the iframe looks more integrated. If you use fullscreen iframes sometimes it is better to keep this additional layer as the full screen iframe is on top of this. Add |keep to your color then. E.g. #ffffff|keep. Shortcode attribute: hide_content_until_iframe_color=""', 'advanced-iframe'));
 
        printTrueFalse(true,$devOptions, __('Enable responsive iframe', 'advanced-iframe'), 'enable_responsive_iframe', __('You can enable that the width of the iframe is responsive. This features adds a max-width:100% to the iframe. So the defined width is the maximum width of the iframe. IOS does ignore the width setting. So use this also if you have width problems with IOS. If the surrounding element gets smaller than this, the iframe is responsive and does shrink! When you enable this feature <strong>AND also the resize the iframe to the content height (direct or by external workaround)</strong>, the height does get responsive too! All resize methods are also triggered when you change the browser size or rotate your device. And this is the big difference to any other pure css solution (see the next setting) which only work for iframes with a certain ratio e.g. for videos. Please read <a href="//www.tinywebgallery.com/blog/responsive-iframes-with-advanced-iframe-pro" target="_blank">this post</a> for details and take a look <a href="//www.tinywebgallery.com/blog/advanced-iframe/advanced-iframe-pro-demo/responsive-iframes" target="_blank">pro demo</a>. Please note that this feature does NOT work together with "Show only a part of an iframe" and "Hidden tabs". Shortcode attribute: enable_responsive_iframe="true" or enable_responsive_iframe="false" ', 'advanced-iframe'), 'false', '//www.tinywebgallery.com/blog/advanced-iframe/advanced-iframe-pro-demo/responsive-iframes', true);
    }       
       printNumberInput(false,$devOptions, __('Set Iframe height by ratio', 'advanced-iframe'), 'iframe_height_ratio', __('This setting enables you to set the height of an iframe depending on the width with a given ratio. This is the optimal way to include video iframes as used by youtube.  Using auto height does solve this too but there you would need access to the other domain. You have 2 options to define this option: <span>width:height. e.g. 16:9 or 4:3. Please use : as separator.</span><span>The calculated ratio where height = ratio * width: e.g. 0.5 means that if you have a width of 1000 you have a height of 500. If the width changes to 800 the height changes to 400. When using : this would be 2:1. Please use a . as decimal separator. The 2nd setting is still available because of backward compatibility.</span>This setting does also work together with "Enable responsive iframe" of the pro version. Scaling the browser does change the height also if you enable the setting above. If you enable this setting the local resize settings are disabled! Shortcode attribute: iframe_height_ratio=""</span>', 'advanced-iframe'), 'text', '', '//www.tinywebgallery.com/blog/advanced-iframe/advanced-iframe-pro-demo/responsive-videos', false);
     if ($evanto || $isDemo) {   
        printTextInput(true,$devOptions, __('Reload iframe', 'advanced-iframe'), 'reload_interval', __('You can reload the iframe in a given interval. Enter the interval in ms or leave the field blank for no reload. If you put a "t" before the time then a timeout is set only. Then the iframe is exactly reloaded once. t100 does reload the iframe  after 100ms. You can also reload iframes when you resize the browser or rotate your mobile device. To enable this put a "r" before the time. If you want to reload the whole page and not only the iframe you can put a p at the end. So if you like to reload the whole page after a resize/orientation change of the browser after 100ms you have to use r100p. Shortcode attribute: reload_interval=""', 'advanced-iframe'));    
 
        printTextInput(false,$devOptions, __('Safari cookie fix', 'advanced-iframe'), 'safari_fix_url', __('If you need cookies in the page in the iframe to work properly you have a problem with Safari because Safari blocks 3rd party cookies by default! Therefore such pages will not work in iframes in Safari and browsers that are configured the same way. Please read about the problem and the basic solution here: <a href="https://vitr.github.io/safari-cookie-in-iframe/" target="_blank">https://vitr.github.io/safari-cookie-in-iframe/</a>. the solution in this plugin has even more features like full browser and message support. Please go <a href="//www.tinywebgallery.com/blog/advanced-iframe/advanced-iframe-pro-demo/3rd-party-cookie-in-iframe-workaround" target="_blank">my example pages</a> for the different options and how you can configure this. Shortcode attribute: safari_fix_url=""', 'advanced-iframe'), 'text', '//www.tinywebgallery.com/blog/advanced-iframe/advanced-iframe-pro-demo/3rd-party-cookie-in-iframe-workaround');
    
	    printTextInput(false,$devOptions, __('SameSite cookie fix', 'advanced-iframe'), 'cookie_samesite_filter', __('Many browsers do not create cookies anymore in an iframe if they are not secure and the cookies have not the value SameSite=None set. Normally this should be fixed by changing the cookies of the application! But is seems not all developers of other plugins do optimize their code to be used in an iframe. Enabling this feature will check all cookies before they are sent and add Secure; SameSite=None to them. You can add "ALL" or a comma seperated list of the cookie names here. The specified cookies will then be changed. Please go <a target="blank" href=" //www.tinywebgallery.com/blog/advanced-iframe/advanced-iframe-pro-demo/how-to-use-the-samesite-cookie-fix">here</a> where the usage of this feature is described in detail and also how you can use it, if your page in the iframe is not WordPress. Also there is a server solution described that you need if Ajax calls set cookies.', 'advanced-iframe'), 'text', '//www.tinywebgallery.com/blog/advanced-iframe/advanced-iframe-pro-demo/how-to-use-the-samesite-cookie-fix');
    
	?> 
     
     <tr <?php if ($isDemo) { echo 'class="ai-pro"'; } ?>>
        
        <th scope="row"><strong><?php _e('Browser detection', 'advanced-iframe'); ?></strong>
        </th><td>
          <?php _e('You can specify browser specific iframes. This is important especially for the "Show only part of the iframe" feature where browser differences of a few pixels can matter. But you can use this for other things as well because mobile, iphone, ipad can also be detected. Please read the <a id="browser-detection-link" href="#">browser detection</a> section for details. Shortcode: browser=""', 'advanced-iframe'); ?></td>
    </tr> 
    <?php } ?>   
    </table>    
<?php
    aiPostboxClose();
?>

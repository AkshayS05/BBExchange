<?php

/*
  Plugin Name: Word Filter Plugin
  Description: Replaces a list of words.
  Version: 1.0
Author: Akshay
Author URI: https://www.akshaysharma.com/user/akshays/

*/

if( ! defined('ABSPATH') ) exit; //Exit if accessed directly.

class WordFilterPlugin {
function __construct() {
  //menu bar
  add_action('admin_menu', array($this, 'FilterMenu'));
}
  function FilterMenu() {
    // will get 7 arguments --> 1. document title shows in browser window, 2 -> text shown up in admin sidebar, 3-> Permission or capability that user has to see the page, 4-> short term or slug variable name for this, 5-> function that output the html itself. 6-> icon appear in admin menu, 7-> number we give it to show where it will be in our menu bar
  
    // this also recieves 6 args --> menu you want to add this subpage to --> probvide slug name, 2-> actual document title you will see in tab, 3-> Text you will see in admin sidebar, 4-> capability, 5 -> slug name for this page, 6 -> html for the page
    $mainPageHook = add_menu_page('Words To Filter', 'Word Filter', 'manage_options', 'ourwordfilter', array($this, 'wordFilterPage'), 'data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjAiIGhlaWdodD0iMjAiIHZpZXdCb3g9IjAgMCAyMCAyMCIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPHBhdGggZmlsbC1ydWxlPSJldmVub2RkIiBjbGlwLXJ1bGU9ImV2ZW5vZGQiIGQ9Ik0xMCAyMEMxNS41MjI5IDIwIDIwIDE1LjUyMjkgMjAgMTBDMjAgNC40NzcxNCAxNS41MjI5IDAgMTAgMEM0LjQ3NzE0IDAgMCA0LjQ3NzE0IDAgMTBDMCAxNS41MjI5IDQuNDc3MTQgMjAgMTAgMjBaTTExLjk5IDcuNDQ2NjZMMTAuMDc4MSAxLjU2MjVMOC4xNjYyNiA3LjQ0NjY2SDEuOTc5MjhMNi45ODQ2NSAxMS4wODMzTDUuMDcyNzUgMTYuOTY3NEwxMC4wNzgxIDEzLjMzMDhMMTUuMDgzNSAxNi45Njc0TDEzLjE3MTYgMTEuMDgzM0wxOC4xNzcgNy40NDY2NkgxMS45OVoiIGZpbGw9IiNGRkRGOEQiLz4KPC9zdmc+Cg==', 100);
    add_submenu_page('ourwordfilter', 'Words To Filter', 'Words List', 'manage_options', 'ourwordfilter', array($this, 'wordFilterPage'));
    add_submenu_page('ourwordfilter', 'Word Filter Options', 'Options', 'manage_options', 'word-filter-options', array($this, 'optionsSubPage'));
    // to load specific file, assets
    add_action("load-{$mainPageHook}", array($this, 'mainPageAssets'));
  }
  function mainPageAssets(){
    wp_enqueue_style('filterAdminCss', plugin_dir_url(__FILE__) . 'styles.css');
  }

  function handleForm(){
    if (wp_verify_nonce($_POST['ourNonce'], 'saveFilterWords') AND current_user_can('manage_options')) {
     // 1-> name of the option in DB that we want to store this value as.
     // 2-> value that we want to store in the DB
    update_option('plugin_words_to_filter', sanitize_text_field($_POST['plugin_words_to_filter'])); ?>
    <!-- updated class is given by wordpress for green success -->
    <div class="updated">
      <p>Your filtered words were saved.</p>
    </div>
   <?php }
   else{ ?>
<div class="error"><p>Sorry, you do not have permisison to perform that action.</p></div>
   <?php }

  }

  function wordFilterPage() { ?>
    <div class="wrap">
    <h1>Word Filter</h1>
    <?php if (isset($_POST['justsubmitted']) && $_POST['justsubmitted'] =="true") $this-> handleForm() ?>
    <form action="" method="POST">
      <input type="hidden" name="justsubmitted" value="true">
      <!-- //to protect from cross-site attack "csrf attack" -->
      <?php wp_nonce_field('saveFilterWords', 'ourNonce'); ?>
      <label for="plugin_words_to_filter">
        <p>Enter a <strong>comma-separated</strong> list of words to filter from your site's content.</p>
        <div class="word-filter__flex-container">
          <textarea name="plugin_words_to_filter" id="" placeholder="bad, mean, awful, horrible"><?php echo esc_textarea(get_option('plugin_words_to_filter')) ?></textarea>
        </div>
        <input type="submit" name="submit" id="submit" class="button button-primary" value="Save Changes">
      </label>
    </form>
    </div>
  <?php }

  function optionsSubPage() { ?>
    Hello world from the options page.
  <?php }
}
//instance of the class
$wordFilterPlugin = new WordFilterPlugin();

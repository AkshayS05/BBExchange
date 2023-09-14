<?php
function university_post_types(){
  //register a new post type
  register_post_type('event',array(
    // with this now, the event post type is not a default post type.
// with this, it will only give access to events as it will show that as an option in a plugin named: Members
    'capability_type' => 'event',
    'map_meta_cap' => true,
    //supports--> can provide all the additional functionalities our custom post type can handle like excerpt, editor
    'supports' => array('title', 'editor', 'excerpt'),
    //to convert our post to block editor in the backend
    'show_in_rest' => true,
    //to use plural for archive page
    'rewrite' => array('slug' => 'events'),
    'has_archive' => true,
    //type of post we want
    'public'=> true,
    'labels' => array(
      // if name is not added, it will use the default.
      'name' => 'Events',
      // to rename default "Add New Post"
      'add_new_item' => "Add New Event",
      'edit_item'=> 'Edit Event',
      'all_items' => 'All Events',
      'singlular_name' => 'Event'
    ),
    'menu_icon' => 'dashicons-calendar-alt'
  ));

  // Program Post type
  register_post_type('program',array(
  'supports' => array('title', 'editor', 'excerpt'),
  //to convert our post to block editor in the backend
  'show_in_rest' => true,
  //to use plural for archive page
  'rewrite' => array('slug' => 'programs'),
  'has_archive' => true,
  //type of post we want
  'public'=> true,
  'labels' => array(
    // if name is not added, it will use the default.
    'name' => 'Programs',
    // to rename default "Add New Post"
    'add_new_item' => "Add New Program",
    'edit_item'=> 'Edit Program',
    'all_items' => 'All Programs',
    'singlular_name' => 'Program'
  ),
  'menu_icon' => 'dashicons-awards'
));
  // Program Post type
  register_post_type('program',array(
    // editor is the main default content block
  'supports' => array('title', 'excerpt'),
  //to convert our post to block editor in the backend
  'show_in_rest' => true,
  //to use plural for archive page
  'rewrite' => array('slug' => 'programs'),
  'has_archive' => true,
  //type of post we want
  'public'=> true,
  'labels' => array(
    // if name is not added, it will use the default.
    'name' => 'Programs',
    // to rename default "Add New Post"
    'add_new_item' => "Add New Program",
    'edit_item'=> 'Edit Program',
    'all_items' => 'All Programs',
    'singlular_name' => 'Program'
  ),
  'menu_icon' => 'dashicons-awards'
));
  // Professor Post type
  register_post_type('instructor',array(
  'show_in_rest' => true,
    //thumbnail is not present by default.
  'supports' => array('title', 'editor', 'excerpt','thumbnail'),
  //to convert our post to block editor in the backend
  'show_in_rest' => true,

  //type of post we want
  'public'=> true,
  'labels' => array(
    // if name is not added, it will use the default.
    'name' => 'Instructors',
    // to rename default "Add New Post"
    'add_new_item' => "Add New Instructor",
    'edit_item'=> 'Edit Instructor',
    'all_items' => 'All Instructors',
    'singlular_name' => 'Instructor'
  ),
  'menu_icon' => 'dashicons-welcome-learn-more'
));

  //register a new campus type

  register_post_type('campus',array(
  'capability_type' => 'campus',
  'map_meta_cap' => true,
    //supports--> can provide all the additional functionalities our custom post type can handle like excerpt, editor
    'supports' => array('title', 'editor', 'excerpt'),
    //to convert our post to block editor in the backend
    'show_in_rest' => true,
    //to use plural for archive page
    'rewrite' => array('slug' => 'campuses'),
    'has_archive' => true,
    //type of post we want
    'public'=> true,
    'labels' => array(
      // if name is not added, it will use the default.
      'name' => 'Campuses',
      // to rename default "Add New Post"
      'add_new_item' => "Add New Campus",
      'edit_item'=> 'Edit Campus',
      'all_items' => 'All Campus',
      'singlular_name' => 'Campus'
    ),
    'menu_icon' => 'dashicons-location-alt'
    ));
// Notes Post type
register_post_type('note',array(
  // not required to be named note, just a unique for this post type
  'capability_type' => 'note',
  //enforce and require the permissions at the right place and time.
    'map_meta_cap' => true,
    'show_in_rest' => true,
    //thumbnail is not present by default.
  'supports' => array('title', 'editor'),
  //to convert our post to block editor in the backend
  'show_in_rest' => true,
  //false as we want notes for a particular user to be private
  'public'=> false,
  //to not hide from a admin dashboard
  'show_ui' => true,
  'labels' => array(
    // if name is not added, it will use the default.
    'name' => 'Notes',
    // to rename default "Add New Post"
    'add_new_item' => "Add New Note",
    'edit_item'=> 'Edit Note',
    'all_items' => 'All Notes',
    'singlular_name' => 'Note'
  ),
  'menu_icon' => 'dashicons-welcome-write-blog'
));
// Like instructor type
register_post_type('like',array(
    //thumbnail is not present by default.
  'supports' => array('title'),
  //to convert our post to block editor in the backend
  'show_in_rest' => true,
  //false as we want notes for a particular user to be private
  'public'=> false,
  //to not hide from a admin dashboard
  'show_ui' => true,
  'labels' => array(
    // if name is not added, it will use the default.
    'name' => 'Likes',
    // to rename default "Add New Post"
    'add_new_item' => "Add New Like",
    'edit_item'=> 'Edit Like',
    'all_items' => 'All Likes',
    'singlular_name' => 'Like'
  ),
  'menu_icon' => 'dashicons-heart'
));
// like content type
register_post_type('PostLikes',array(
  
    //thumbnail is not present by default.
  'supports' => array('title'),
  //false as we want notes for a particular user to be private
  'public'=> false,
  //to not hide from a admin dashboard
  'show_ui' => true,
  'labels' => array(
    // if name is not added, it will use the default.
    'name' => 'Post Likes',
    // to rename default "Add New Post"
    'add_new_item' => "Add New Post Like",
    'edit_item'=> 'Edit Post Like',
    'all_items' => 'All Post Likes',
    'singlular_name' => 'Post Like'
  ),
  'menu_icon' => 'dashicons-thumbs-up'
));
}

// to add a new post type
add_action('init','university_post_types');
?>


<?php
/* This is a convention in wordpress to create a file name single.php which will hold the single page details whenever use visits any of the exisiting posts */
get_header();
// this is a wordpress function to loop until there are posts
while(have_posts()) {
// this function will keep track of all the posts
  the_post(); 
  //  calling function 
  pageBanner();
  ?>
    <div class="container container--narrow page-section">
    <div class="generic-content">
    <div class="row group">
      <div class="one-third">
      <?php the_post_thumbnail('instructorPortrait'); ?>
    </div>
    <div class="two-thirds">
      <?php 
        $likeCount = new WP_Query(array(
          'post_type' => "like",
          'meta_query'=> array(
            array(
              'key' => "liked_instructor_id",
              'compare'=>'=',
              'value' => get_the_ID()
            )
          )
        ));
        $existStatus ='no';
        if(is_user_logged_in()){

          $existQuery = new WP_Query(array(
            'author' => get_current_user_id(),
            'post_type' => "like",
            'meta_query'=> array(
              array(
                'key' => "liked_instructor_id",
                'compare'=>'=',
                'value' => get_the_ID()
              )
            )
          ));
          if($existQuery ->found_posts){
            $existStatus = 'yes';
          }
        }
      ?>
      <span class="like-box" data-like="<?php if(isset($existQuery->posts[0]->ID)) echo $existQuery-> posts[0]-> ID; ?>" data-instructor ="<?php the_ID(); ?>" data-exists ="<?php echo $existStatus ?>">
        <i class="fa fa-heart-o" aria-hidden="true"> </i>
        <i class="fa fa-heart" aria-hidden="true"> </i>
        &nbsp;<span class="like-count"><?php echo $likeCount->found_posts; ?></span>
</span>
      <?php the_content(); ?>
      </div>
  
</div>
<?php 
// to show related events
$relatedPrograms = get_field('related_programs');
//only run if there is any related program
if($relatedPrograms){

  echo '<hr class ="section-break" >';
  echo '<h2 class="headline headline--medium">Subject(s) Taught </h2>';
  echo '<ul class="link-list min-list">';
  
  foreach($relatedPrograms as $program){ ?>
    <!-- the_title will only work for wordpress default. -->
    <li><a href="<?php echo get_the_permalink($program); ?>"><?php echo get_the_title($program); ?></a></li>
    
    <?php }
echo '</ul>';
}

?>
  </div>


<?php }
get_footer();
?>
<?php
/*This is a convention in wordpress to create a file name single.php which will hold the single page details whenever use visits any of the exisiting posts */
get_header();

// this is a wordpress function to loop until there are posts
while(have_posts()) {
// this function will keep track of all the posts
 the_post(); 
  pageBanner();
  ?>
  <!-- container -->

    <div class="container container--narrow page-section">

    <div class="metabox metabox--position-up metabox--with-home-link">
          <!-- get_the_title to get the title of the post we provide and as a link we use get_permalink -->
      <p><a class="metabox__blog-home-link" href="<?php echo site_url('/blog'); ?>"><i class="fa fa-home" aria-hidden="true"></i> Blog Home</a> <span class="metabox__main"> Posted By <?php the_author_posts_link(); ?> on <?php the_time('n.j.y'); ?> in <?php echo get_the_category_list(', '); ?> </span></p>
    </div>

    <div class="generic-content-post">
      <?php 
      // for generic-post content
      $postLikeCount = new WP_Query(array(
        'post_type' => 'post_like',
        'meta_query' => array(
          array(
            'key' => 'liked_post_id',
            'compare' => 'equal',
            'value' => get_the_ID()
          )
        )
          ));
          $existCountStatus = 'no';
          // if user is logged in
          if(is_user_logged_in()){
            $existCountQuery = new WP_Query(array(
              'author' => get_current_user_id(),
              'post_type' => 'post_like',
              'meta_query' => array(
                array(
                  'key' => 'liked_post_id',
                  'compare' => 'equal',
                  'value' => get_the_ID()
                )
              )
                ));
                if ($existCountQuery -> found_posts) {
                    $existCountStatus = 'yes';
                }
          }
      ?>
      <span class="post-like-box" data-postLike="<?php if(isset($existCountQuery ->posts[0]-> ID)) echo $existCountQuery-> posts[0] -> ID; ?>" data-post="<?php the_ID(); ?>" data-present ="<?php echo $existCountStatus?>">
        <i class="fa fa-thumbs-up" aria-hidden="true"></i>
        <i class="fa fa-thumbs-o-up" aria-hidden="true"></i>
        <span class="post-like-count"><?php echo $postLikeCount -> found_posts; ?></span>
      </span>
  <?php the_content(); ?>
</div>
  </div>


<?php }
get_footer();
?>
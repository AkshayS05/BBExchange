<div class="post-item">
          <h2 class="headline headline--medium headline--post-title"> <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
          </h2>
          <!-- to display author and other relevant information -->
          <div class="metabox">
            <!-- n.j.s => Month, date, year -->
            <p>Posted By <?php the_author_posts_link(); ?> on <?php the_time('n.j.y'); ?> in <?php echo get_the_category_list(', '); ?> </p>
        </div>
        <div class ="generic-content">
          <?php the_excerpt(); ?>
          <!-- taking to the full page -->
          <p><a class="btn btn--blue" href="<?php the_permalink(); ?>">Continue Reading &raquo;</a></p>
        </div>
      </div>
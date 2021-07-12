<?php global $mobile_browser; ?>
<?php get_header(); ?>
<?php get_sidebar('top'); ?>
<main class="is-partner">
  <section class='key'>
    <?php get_sidebar("banner"); ?>
  </section>
  <section class='partner'>
    <div class="wrap-content">
      <h2 class="heading"><?php the_title(); ?></h2>
      <ul class="partner-list">
        <?php
				$arg = array(
					'post_type' => 'doi-tac',
					'orderby' => 'date',
					'order' => 'asc',
					'posts_per_page' => -1,
					'taxonomy' => $tax,
					'term' => $terms->slug,
					'status' => array('publish', 'private')
				);
				$the_query = new WP_Query($arg);
				while ($the_query->have_posts()) : $the_query->the_post();
        $url = get_post_meta($post->ID,'web-url',true);
				?>
        <li class="partner-item">
          <a href="<?php echo $url;?>" target="_blank" class="partner-link">
            <?php the_post_thumbnail('featured_medium', array('class' => 'img-responsive')); ?>
          </a>
        </li>
        <?php endwhile;wp_reset_query(); ?>
      </ul>
      <?php if ($mobile_browser > 0) { 
        echo '<div class="side">';
        include("sidebar-left-menu.php");
        include('sidebar-support.php');
        echo '</div>';
      }
      ?>
    </div>
  </section>
</main>
<?php get_footer(); ?>

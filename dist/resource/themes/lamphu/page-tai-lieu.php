<?php global $mobile_browser; ?>
<?php get_header(); ?>
<?php get_sidebar('head'); ?>
<main class="is-document">
  <section class='key'>
    <?php get_sidebar("banner"); ?>
  </section>
  <section class='doc'>

    <div class="wrap-content">
      <h2 class="heading-detail"><?php the_title(); ?></h2>
      <ul class="doc-list">
        <?php
				$arg = array(
					'post_type' => 'tai-lieu',
					'orderby' => 'date',
					'order' => 'asc',
					'posts_per_page' => -1,
					'taxonomy' => $tax,
					'term' => $terms->slug,
					'status' => array('publish', 'private')
				);
				$the_query = new WP_Query($arg);
				while ($the_query->have_posts()) : $the_query->the_post();
        $file = get_post_meta($post->ID,'file-pdf',true);
				?>
        <li clas="doc-item">
          <a href='<?php echo $file;?>' class="doc-link" target="_blank">
            <div class='doc-icon'><i class="far fa-file-pdf"></i></div>
            <span class='doc-title'><?php the_title(); ?></span>
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
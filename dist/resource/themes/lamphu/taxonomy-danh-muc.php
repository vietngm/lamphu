<?php
$tax = 'danh-muc';
$slug = get_query_var($tax);
$term = get_term_by('slug', $slug, $tax);
$name = $term->name;
get_header();
get_sidebar('head');
?>
<main class="is-product">
  <section>
    <?php get_sidebar("banner"); ?>
  </section>

  <section class="prods">
    <div class="wrap-content">
      <h3 class="heading-detail"><?php echo $name; ?></h3>
      <ul class="prods-list">
        <?php
$query = array(
'post_type' => 'san-pham',
'posts_per_page' => -1,
'orderby' => 'post_date',
'taxonomy' => $tax,
'term' => $slug,
'order' => 'asc'
);
$the_query = null;
$the_query = new WP_Query($query);
while ($the_query->have_posts()):$the_query->the_post();
?>
        <li class="prods-item">
          <?php include('loop-san-pham.php'); ?>
        </li>
        <?php
endwhile;
?>
    </div>
    <?php
get_template_part("templates/nav", "main");
wp_reset_query(); 
?>
    </ul>
    <?php include("sidebar-left-menu.php"); ?>
    <?php include('sidebar-support.php'); ?>
    </div>
  </section>
</main>
<?php get_footer(); ?>
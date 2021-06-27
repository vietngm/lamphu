<?php global $mobile_browser; ?>
<a href="<?php echo get_permalink($post->ID);?>" class="relate-square">
  <?php if(has_post_thumbnail()){?>
  <div class='relate-image'>
    <?php the_post_thumbnail('thumbnail',array('class'=>'img-responsive'));?>
  </div>
  <?php }else{?>
  <div class='relate-noimage'>
    <img src="/assets/images/noimg64.png" width="64" height="64" alt="<?php echo $post->post_title;?>">
  </div>
  <?php }?>
</a>
<div class="relate-body">
  <a href="<?php echo get_permalink($post->ID);?>" class="relate-link"><?php the_title();?></a>
  <p><?php echo getExcerptLimit(100,$post->ID);?></p>
</div>

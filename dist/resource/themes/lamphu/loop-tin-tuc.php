<a href="<?php echo get_permalink($post->ID);?>" class="relate-thumb">
  <?php if(has_post_thumbnail()){?>
  <?php the_post_thumbnail('thumbnail',array('class'=>'img-responsive'));?>
  <?php }else{?>
  <img src="/assets/images/noimg64.png" width="64" height="64" alt="<?php echo $post->post_title;?>">
  <?php }?>
</a>

<div class="relate-body">
  <a href="<?php echo get_permalink($post->ID);?>" class="relate-link"><?php the_title();?></a>
  <p><?php echo getExcerptLimit(100,$post->ID);?></p>
</div>
<div class="news" data-mh="news" data-mh-min="768">
  <div class="media">
    <div class="media-left">
      <a href="<?php echo get_permalink($post->ID);?>">
          <?php if(has_post_thumbnail()){?>
              <?php the_post_thumbnail('thumbnail',array('class'=>'img-responsive'));?>
          <?php }else{?>
            <img src="/common/images/noimg64.png" width="64" height="64" alt="<?php echo $post->post_title;?>">
          <?php }?>
      </a>
    </div>
    <div class="media-body" align="left">
      <a href="<?php echo get_permalink($post->ID);?>" class="media-link"><?php the_title();?></a>
      <p><?php echo getExcerptLimit(100,$post->ID);?></p>
    </div>
  </div>
</div>
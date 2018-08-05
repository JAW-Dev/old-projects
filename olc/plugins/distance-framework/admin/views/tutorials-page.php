<div class="wrap">
  <h2><?php _e( 'WordPress Tutotials', 'dfw' ); ?></h2>
  <hr />
  <h3><?php _e( 'WordPress Video Tutotials', 'dfw' ); ?></h3>
  <?php
  if( have_rows( 'dfw_training_videos' ) ) {
    while( have_rows( 'dfw_training_videos' ) ) {
      the_row();
      $dfw_tut_video_title = dfw_get_sub_field( 'dfw_tut_video_title', 'dfw_tut_video_title', true );
      $dfw_tut_video       = dfw_get_sub_field( 'dfw_tut_video', 'dfw_tut_video', true );
      ?>
      <h4 class="dfw__tutorial-title"><?php echo $dfw_tut_video_title; ?></h4>
      <div class="dfw__tutorial-video-wrapper">
        <div class="dfw__tutorial-video">
          <?php
            $iframe = get_sub_field($dfw_tut_video);
            echo $dfw_tut_video;
          ?>
        </div>
      </div>
      <?php
    }
  }
  ?>
</div>
<?php 
$bene_ft_client_work_lable = ( get_field( 'bene_ft_client_work_lable', 'option' ) ? get_field( 'bene_ft_client_work_lable', 'option' ) : '' );
$bene_good_words_lable     = ( get_field( 'bene_good_words_lable', 'option' ) ? get_field( 'bene_good_words_lable', 'option' ) : '' );
?>
<div class="row__hp-body">
  <div class="column__two-third">
    <h2 class="column__title rockwell-light">
      <?php echo $bene_ft_client_work_lable; ?>
    </h2>
    <?php get_template_part( 'template-parts/content/fpage/feat-client' ); ?>
  </div>
  <div class="column__one-third">
    <h2 class="column__title rockwell-light">
      <?php echo $bene_good_words_lable; ?>
    </h2>
    <?php get_template_part( 'template-parts/content/fpage/form' ); ?>
  </div>
</div>
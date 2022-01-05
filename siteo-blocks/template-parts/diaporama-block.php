<?php
/**
 * Layout of Diaporama-slider block
 */


if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
?>
<?php
// Create id attribute allowing for custom "anchor" value.
$id = 'testimonial-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'testimonial';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}
?>
<!--CAROUSEL-->
<!-- ======= Hero Section ======= -->
<div id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $className ); ?> hero" >
    
      <?php    
            if(have_rows('diaporama')) :
            $i = 0; // Set the increment variable
            ?>
            <div id="heroCarousel" class="carousel slide" data-ride="carousel">
              <?php 
              $indicators = get_field('navigation_carousel');
              if( $indicators == 'dots') : ?>

                <ol class="carousel-indicators">
                  <?php
                  // loop through the rows of data for the tab header
                    while ( have_rows('diaporama') ) : the_row();
                      ?>
                      
                      <li data-target="#heroCarousel" data-slide-to="<?php echo $i;?>" class="<?php if($i == 0) echo 'active';?>"></li>
                        
                      <?php $i++; // Increment the increment variable	
                    
                    endwhile; //End the loop  
                    ?>
                  </ol>
              <?php endif; ?>
              <div class="carousel-inner" role="listbox"><?php
              
                  // loop through the rows of data for the tab header
                  $i = 0; // Set the increment variable
                  while(have_rows('diaporama')) : the_row(); 

                    $image = get_sub_field('diapositive');
                    $titre = get_sub_field('titre_diapositive');
                    $phrase = get_sub_field('phrase');
                    $bouton = get_sub_field('lien_bouton');
                    ?>
                    <!-- Slide -->
                    <div class="carousel-item <?php if($i == 1) echo 'active';?>" >
                      <div class="d-flex flex-row flex-wrap h-100">
                          <div class="col-md-5 col-sm-8 h-100 d-flex flex-column justify-content-center">
                              <div class="carousel-wrapper pl-lg-5 pl-xl-5">
                                <h1 class="animate__animated animate__fadeInDown "><?php echo esc_attr( $titre ); ?></h1>
                                <p class="animate__animated animate__fadeInUp"><?php echo esc_attr( $phrase ); ?></p>
                                <?php if( $bouton ): 
                                  $link_url = $bouton['url'];
                                  $link_title = $bouton['title']; ?>
                                <a href="<?php echo esc_url($link_url); ?>" class="button-primary btn-lighter btn-get-started animate__animated animate__fadeInUp scrollto" target="_blank"><?php echo esc_html($link_title); ?></a>
                                <?php endif; ?>
                              </div>                        
                          </div>
                          <div class="col-md-7 col-sm-8 img" style="background-image: url(<?php echo $image; ?> )"></div>
                           
                      </div>
                      
                    </div>
                  <?php 
                  $i++; // Increment the increment variable
              
                  endwhile; ?>
              </div>
              <?php 
            if( $indicators == 'arrows') : ?>
              <a class="carousel-control-prev" href="#heroCarousel" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon bi-chevron-left" aria-hidden="true"></span>
                <span class="sr-only"><i class="bi bi-arrow-left-circle"></i>Previous</span>
              </a>

              <a class="carousel-control-next" href="#heroCarousel" role="button" data-slide="next">
                <span class="carousel-control-next-icon bi-chevron-right" aria-hidden="true"></span>
                <span class="sr-only"><i class="bi bi-arrow-right-circle"></i>Next</span>
              </a>
            <?php endif; ?>
            </div>
            <?php else :

              // no rows found
            endif; ?>
</div><!-- End Hero -->
<?php
/**
 * Template Name: Landing Page
 */
get_header();


$post   = get_post( 313 );
$output =  apply_filters( 'the_content', $post->post_content );

//custome Fields
//$video_url = get_post_meta(313,'landing_video_url',true);

//ACF
$video_url_acf = get_field('landing_page_video_url');


?>
    <section id="primary" class="content-area landing-page <?php the_ID(); ?>" style="width: 100%">
        <main id="main" class="site-main" role="main">
            <div class="container">
                  <h1><?php echo get_the_title(); ?></h1>

                  <!--intro text-->
                  <div class="row">
                      <p><?php echo $output;?></p>
                  </div>

                  <?php 
                  $hide = 'style="display:none;"';

                  ?>

                  <!--video-->
                  <div class="row" <?php if(!is_user_logged_in()){echo $hide;} ?>   >
                      <?php echo do_shortcode('[fvplayer src="http://cn.knovva.com/lms/wp-content/uploads/2017/12/course-high.mp4" width="600" height="400" embed="false"]'); ?>
                  </div>


                  <!--download text-->
                  <div class="row" <?php if(!is_user_logged_in()){echo $hide;} ?>>
                    <p>Scroll past the guides for a link to your weekly discussion board project - a chance to introduce yourself to everyone!</p>
                    
                    <ul class="list-unstyled"><h4>Download Guides:</h4> 
                      <li><i class="fa fa-download" aria-hidden="true"></i> <a style="text-decoration: none; color: black;" href="#"> Course Guide - Everything you Need to Know</a></li>
                      <li><i class="fa fa-download" aria-hidden="true"></i>  <a style="text-decoration: none; color: black;" href="#">Tips for Online Learning</a></li>
                      <li><i class="fa fa-download" aria-hidden="true"></i>  <a style="text-decoration: none; color: black;" href="#">How to Use the Discussion Board  </a></li>
                    </ul>
                    
                    <p>We look forward to learning about the world with you. Check back in on December 22th for the release of the first weekly unit!</p>
                       
                  </div>

            </div>  <!--container ends-->
        </main><!-- #main -->
    </section><!-- #primary -->

<?php
get_footer();

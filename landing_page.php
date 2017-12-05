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
               <div class="row">

                <div class="col-md-5">
                 
                  <?php echo $output;?> 
                </div>
                <div class="col-md-7">
                   <iframe width="100%" height="400" src="<?php echo $video_url_acf;  ?>" frameborder="0" allowfullscreen></iframe>
                </div>
               </div>  
            </div>
        </main><!-- #main -->
    </section><!-- #primary -->

<?php
get_footer();

<?php
/**
 * Template Name: Index Page
 */
get_header();


$post   = get_post( 413 );
$output =  apply_filters( 'the_content', $post->post_content );

//custome Fields
//$video_url = get_post_meta(313,'landing_video_url',true);

//ACF
$video_url_acf = get_field('landing_page_video_url');
$index_page_image_url = get_field('index_page_image_url');


?>
    <div id="landing-banner-full-width"">
        <?php
              if ( has_post_thumbnail() ) {
                      the_post_thumbnail('full');
                } 
              ?>
    </div>

    <section id="primary" class="content-area landing-page <?php the_ID(); ?>" style="width: 100%;margin-top:80px;">
        <main id="main" class="site-main" role="main">
            <div class="container">
            
              <!--<h1><?php //echo get_the_title(); ?></h1>-->
               <div class="row">

                <div class="col-md-5">
                 
                  <?php echo $output;?> 
                </div>
                <div class="col-md-7">
                   <img class="img img-responsive img-thumbnail" style="width: 100%;height: auto" src="<?php echo $index_page_image_url; ?>">
                </div>
               </div>  
            </div>
        </main><!-- #main -->
    </section><!-- #primary -->

<?php
get_footer();

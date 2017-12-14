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

//control css for the visibility of elements 
$hide = 'style="display:none;"';
?>

    <section id="primary" class="content-area landing-page <?php the_ID(); ?>" style="width: 100%">

        <main id="main" class="site-main" role="main">

          <!--title-->
          <div class="startpage-title">
            <div class="container">
               <h1><?php echo get_the_title(); ?></h1>
            </div>
          </div>

          <!--intro text-->
          <div class="startpage-title">
            <div class="container">
              <p><?php echo $output;?></p>
            </div>
          </div>

          <!--video-->
          <div class="video-section" <?php if(!is_user_logged_in()){echo $hide;} ?>   >
            <div class="container">
                <?php 
                      echo do_shortcode('[fvplayer src="https://cn.knovva.com/lms/wp-content/uploads/2017/12/video-compressed.mp4" width="800" height="500" embed="false"]'); 
                ?>
            </div>
          </div>
          

          <!--download section-->
          <div class="download-section jumbotron" <?php if(!is_user_logged_in()){echo $hide;} ?>>
            <div class="container">
              <p>Download the course guides below to learn how to make the most out of this learning experience. We recommend saving or printing these guides for future reference. Please also take a look at the Frequently Asked Questions (FAQ) section of this website to find answers to common questions about the course. Don't stop here! Scroll below the guides to complete your first weekly project - an introduction to your global classmates.</p>

               <div class="row">
                 <div class="col-md-4">
                      <a href="../wp-content/uploads/2017/12/complete_course_guide.pdf" target="_blank"><img class="img img-responsive" src="../wp-content/uploads/2017/12/dl-btn-1.png" ></a>
                      <h5><i class="fa fa-download" aria-hidden="true"></i> <a style="text-decoration: none; color: black;" href="../wp-content/uploads/2017/12/complete_course_guide.pdf" target="_blank"> The Complete Course Guide</a></h5>
                    </div>

                    <div class="col-md-4">
                      <a href="../wp-content/uploads/2017/12/tips-for-english-learners.pdf" target="_blank"><img class="img img-responsive" src="../wp-content/uploads/2017/12/dl-btn-2.png" ></a>
                      <h5><i class="fa fa-download" aria-hidden="true"></i> <a style="text-decoration: none; color: black;" href="../wp-content/uploads/2017/12/tips-for-english-learners.pdf" target="_blank"> Tips for English Learners</a></h5>
                    </div>

                    <div class="col-md-4">
                      <a href="../wp-content/uploads/2017/12/tips-for-online-success.pdf" target="_blank"><img class="img img-responsive" src="../wp-content/uploads/2017/12/dl-btn-3.png" ></a>
                      <h5><i class="fa fa-download" aria-hidden="true"></i>  <a style="text-decoration: none; color: black;" href="../wp-content/uploads/2017/12/tips-for-online-success.pdf" target="_blank"> Tips for Online Success</a></h5>
                    </div>
               </div>
            </div>
          </div>

          <!--2nd text section-->
          <div class="text-section" <?php if(!is_user_logged_in()){echo $hide;} ?> >
            <div class="container">
              <p>
              In this course, we really are all globally connected - by our online discussion board. Each week, you will post a mini-project on the discussion board, as well as explore and comment on the work of others. By interacting with fellow students from a variety of different nations, you will be able to see diverse viewpoints on a subject, and learn for yourself how we are all increasingly connected.</br></br>

              This week your project is to post an introduction on the discussion board. Read through the <a href="../wp-content/uploads/2017/12/Discussion_Board_Guide.pdf" target="_blank">Discussion Board Guide </a> and follow along with the step-by-step instruction to complete your first weekly project! Remember to check this discussion board next week to get to know your classmates. </br></br>

              We look forward to learning about the world with you. Check back in on December 22th for the release of the first weekly unit!</p>  
            </div>  
          </div>

               

          <!--padlet section-->
          <div class="padlet embed" <?php if(!is_user_logged_in()){echo $hide;} ?> >
            <div class="container">
              <div class="padlet-embed" style="border:1px solid rgba(0,0,0,0.1);border-radius:2px;box-sizing:border-box;overflow:hidden;position:relative;width:100%;background:#F4F4F4"><p style="padding:0;margin:0"><iframe src="https://knovva.padlet.org/embed/zc3per92hv1m" frameborder="0" style="width:100%;height:608px;display:block;padding:0;margin:0"></iframe></p><div style="padding:8px;text-align:right;margin:0;"><a href="https://padlet.com?ref=embed" style="padding:0;margin:0;border:none;display:block;line-height:1;height:16px" target="_blank"><img src="https://resources.padletcdn.com/assets/made_with_padlet.png" width="86" height="16" style="padding:0;margin:0;background:none;border:none;display:inline;box-shadow:none" alt="Made with Padlet"></a></div></div> 

            </div>
          </div>
                
                

        </main><!-- #main -->
    </section><!-- #primary -->

<?php
get_footer();

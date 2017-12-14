<?php
/**
 * Template Name: New Index Page
 */
get_header();

//WP connection 
$post   = get_post( 413 );
$output =  apply_filters( 'the_content', $post->post_content );
$featured_img_url = get_the_post_thumbnail_url($post->ID, 'full'); 
//echo $featured_img_url;


//ACF
$index_page_image_url = get_field('index_page_image_url');

?>
    
    <!--full-width in conditional header-->
    <div id="landing-banner-full-width" style="background:url('<?php echo $featured_img_url; ?>') top center no-repeat; background-size:cover; height: 75vh; width: 100%;">
      <div class=container>
        <div class=text-wrapper>
          <h1 style="margin-top: 0">Learn to Be Global,<br/>No Matter Where You Are</h1>
          <a style="" class="btn btn-primary knovva-btn" href="./gettingstarted">Getting Started</a>
        </div>
      </div>
    </div>

    

    <!--body starts-->
    <section id="primary" class="content-area landing-page <?php the_ID(); ?>" style="width: 100%;">
        <main id="main" class="site-main" role="main">
            <!--About the course-->
            <div class="course-intro">
               <div class="container">

               <div class="row">
                <h2>About This Course</h1>
               </div>

               <div class="row">
                  <p>Since the beginning of human civilization, cultures on Earth have grown increasingly connected. This process rapidly picked up speed in the 21st century, and today, the world is smaller than ever before. In such global times, it’s essential to develop the ability to think globally and communicate across cultures. <br><br>

                    In this course, you’ll be introduced to global thinking -- a way to understand how your lives and actions interact with the world at large. You’ll explore how your life is connected to those living halfway across the globe, critically evaluate the ways in which cultures remain distinct from each other, and learn how local decisions can have a global impact and vice versa. The more you understand about our connected world, the more prepared you’ll be for success in college, your career, and a lifelong engagement with global issues and opportunities. </p>
               </div>

               <div class="row btn-wrapper">
                <a class="btn btn-primary knovva-btn" href="https://knovva.com/about" target="_blank">More About Knovva</a>
               </div>

             </div> <!--container ends-->

             </div> <!--course-intro ends-->

            <!--course schedule-->
            <div class="course-schedule">
              <div class="container">
                <h2>Course Schedule</h2>
                <p>This six-week course will examine our connected world in a variety of ways: </p>
                <div class="row">
                  <div class="col-md-6">
                    <img class="img img-responsive" src="./wp-content/uploads/2017/12/index-schedule.png" width="80%">
                  </div>
                  <div class="col-md-6">
                     <ul class="list-unstyled">
                      <li>Week One (Released 12/22): <b>Introduction to Global Thinking</b></li>
                      <li>Week Two (Released 12/29): <b>Global Politics</b></li>
                      <li>Week Three (Released 1/5): <b>Global Economy</b></li>
                      <li>Week Four (Released 1/12): <b>Cultural Differences</b></li>
                      <li>Week Five (Released 1/19): <b>Our Shared Environment</b></li>
                      <li>Week Six (Released 1/26): <b>Going Global</b></li>
                     </ul>
                  </div>
                </div><!--row ends-->

                <div class="btn-wrapper">
                  <a class="btn btn-primary knovva-btn" href="./gettingstarted">Getting Started</a>
                </div>
                
              </div> <!--container ends-->
            </div> <!--course-schedule ends-->

            <!--faq-->
            <!-- <div class="questions">
              <div class="container">
                 <h2>Have Questions?</h2>
                 <p>Our FAQ might help to answer some of your questions, or contact our staff for more information.</p>
                 <div class="row">
                    <div class="col-md-6">
                       <a class="btn btn-primary knovva-btn" href="/faq">FAQ</a>
                    </div>
                    <div class="col-md-6">
                       <a class="btn btn-primary knovva-btn" href="#">Contact Us</a>
                    </div>
                  </div>
              </div>
            </div> -->

    
        </main><!-- #main -->
    </section><!-- #primary -->

<?php
get_footer();

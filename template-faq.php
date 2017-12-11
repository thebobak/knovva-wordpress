<?php
/* Template Name: FAQ Page */
?>


<?php // Query for Child Pages //

  $query = new WP_Query( array(
    'post_type'      => 'faq',
    'posts_per_page' => -1,
    'order'          => 'ASC',
    'orderby'        => 'menu_order'
    ));
?>

<?php get_header(); ?>

<div class="entry-content-page">
  <section>
    <h1 class="entry-title"><?php the_title(); ?></h1> <!-- Page Title -->
    
    <?php //////////////////////////////
    // DISPLAY THE PAGE CONTENT //
    ////////////////////////////// ?>
    <?php while ( have_posts() ) : the_post(); ?>
        
          <?php the_content(); ?> <!-- Page Content -->
          <?php endwhile; // END of Page Content ?>
          <?php wp_reset_query(); //resetting the page query ?>
  </section>
<section>

  <!-- /////////////////////////// -->
<?php // THE CONTENT LOOP // ?>
<?php $loopcounter = 1; ?>
<?php while ( $query->have_posts() ) : $query->the_post(); ?>


  <h4><a data-toggle="collapse" href="#collapse-<?php echo "$loopcounter"; ?>" aria-expanded="false" aria-controls="collapse-<?php echo "$loopcounter"; ?>"><?php the_title(); ?></a></h4>

  <div id="collapse-<?php echo "$loopcounter"; ?>" class="collapse" role="tabpanel" aria-labelledby="heading-<?php echo "$loopcounter"; ?>" data-parent="#accordion">
    <p> <?php the_content(); ?> </p>
  </div>

<?php $loopcounter += 1; ?>
<?php endwhile; wp_reset_postdata();?>
</section>
        </div><!-- .entry-content-page -->



<?php get_footer(); ?>
    

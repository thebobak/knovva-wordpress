<?php
/* Template Name: FAQ Page */
?>





<?php get_header(); ?>


<div class="entry-content-page">
  <section>
    <h1 class="entry-title"><?php the_title(); ?></h1> <!-- Page Title -->


    <?php ////////////////////////////
    // DISPLAY THE PAGE CONTENT     //
    ////////////////////////////// ?>

    <?php while ( have_posts() ) : the_post(); ?>
    <?php the_content(); ?> <!-- Page Content -->
    <?php endwhile; // END of Page Content ?>
    <?php wp_reset_query(); //resetting the page query ?>
  </section>
<section>


  <!-- /////////////////////////// -->
<?php // THE CONTENT LOOP // ?>
<?php $loopcounter = 1; // Used for IDing collapsible elements// ?>
<?php

  $terms = get_terms( array(
    'taxonomy' => 'faq_taxonomy',
    'hide_empty' => false,
  ));

  foreach($terms as $term) :
      echo '<h3>' . $term->name . '</h3>'; // Display FAQ Category

      // Run the Query //
      $query = new WP_Query( array(
        'post_type'      => 'faq',
        'tax_query'      => array(
          array (
            'taxonomy' => 'faq_taxonomy',
            'field' => 'name',
            'terms' => $term->name,
          )),
        orderby   => 'date',
        order     => 'ASC',
      ));

    while ( $query->have_posts() ) :
      $query->the_post();
?>
<!-- FAQ Item -->
  <h4><a data-toggle="collapse" href="#collapse-<?php echo "$loopcounter"; ?>" aria-expanded="false" aria-controls="collapse-<?php echo "$loopcounter"; ?>"><?php the_title(); ?></a></h4>

  <div id="collapse-<?php echo "$loopcounter"; ?>" class="collapse" role="tabpanel" aria-labelledby="heading-<?php echo "$loopcounter"; ?>" data-parent="#accordion">
    <p> <?php the_content(); ?> </p>
  </div>

<?php $loopcounter += 1; ?>
<?php endwhile; wp_reset_postdata();?>
<?php endforeach; ?>
</section>
        </div><!-- .entry-content-page -->



<?php get_footer(); ?>
    

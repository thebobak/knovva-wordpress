<?php
/* Template Name: Available Units */
?>


<?php // Query for Child Pages //

  $childpages = new WP_Query( array(
    'post_type'      => 'page',
    'post_parent'    => $post->ID,
    'posts_per_page' => -1,
    'order'          => 'ASC',
    'orderby'        => 'menu_order'
    ));
?>

<?php get_header(); ?>
    <h1 class="entry-title"><?php the_title(); ?></h1> <!-- Page Title -->
    <?php
    // TO SHOW THE PAGE CONTENTS
    while ( have_posts() ) : the_post(); ?> <!--Because the_content() works only inside a WP Loop -->
        <div class="entry-content-page">
            <?php the_content(); ?> <!-- Page Content -->


    <?php
    endwhile; //resetting the page loop
    wp_reset_query(); //resetting the page query
    ?>

<div class="row">
<?php // THE CONTENT LOOP // ?>
<?php $num_cols = 3;?>
<?php $current_col = 1;?>
<?php while ( $childpages->have_posts() ) : $childpages->the_post(); ?>

<?php if(get_field('visibility') == 'Hidden') {

	// Check custom fields to see if the page is flagged as hidden //
	$hiddenpage = true;
	} else {
	$hiddenpage = false;
	}
?>

<?php // Display the Card // ?>
  <div class="col-sm-4">
    <div class="card">
     <img class="card-img-top"
     		src="<?php the_post_thumbnail_url(); ?>"
     		alt="<?php the_title(); ?>"
     		<?php if($hiddenpage):?>
     			style="filter:grayscale(); opacity:0.3;"
     		<?php endif; ?>
     		>
      <div class="card-body">
        <h4 class="card-title"><?php the_title();?></h4>
        <p class="card-text"><?php the_excerpt();?></p>
        <?php if (is_user_logged_in()) :?>
        <?php if($hiddenpage) : ?>
        <button type="button" class="btn btn-secondary" disabled>Coming Soon</button>
        <?php else: ?>
        <a href="<?php the_field('articulate_direct_url');?>" class="btn btn-primary" target="_blank">Launch Class</a>
    	<?php endif; ?>
    <?php else: ?>
      <a href="<?php echo wp_login_url( get_permalink() ); ?>" title="Login" class="btn btn-secondary">Please Login</a>
      <?php endif; ?>
      </div>
    </div>
  </div>
  <?php if( $current_col % $num_cols == 0) : ?>
    </div><div class="row">
    <?php endif; ?>
    <?php $current_col++;?>

<?php endwhile; wp_reset_postdata();?>
</div>

        </div><!-- .entry-content-page -->



<?php get_footer(); ?>  
<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

    <?php include('includes/homepage_hero.php'); ?>
    <?php include('includes/homepage_about.php'); ?>
    <?php include('includes/homepage_moments.php'); ?>
    <?php include('includes/homepage_testimonials.php'); ?>
    <?php include('includes/homepage_resources.php'); ?>
    
<?php endwhile; endif; ?>
	
<?php get_footer(); ?>

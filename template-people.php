<?php
/*
Template Name: People Page Template
*/
?>
<?php get_header(); ?>

<div class="content">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                    <h2><?php the_title(); ?></h2>
                <?php endwhile; endif; ?>
                <?php 
                    $people = get_field('people_relationship');
                    $partner_count = 1;
                    if( $people ): ?>
                        <div class="row">
                            <?php foreach( $people as $person ): ?>
                                <?php if(is_page('institutional-partners')): ?>
    								<div class="col-sm-6">
                                        <a class="partner" href="<?php echo get_permalink( $person->ID ); ?>">
                                            <div class="person-img"><?php echo get_the_post_thumbnail( $person->ID ); ?></div>
    										<h3><?php echo get_the_title( $person->ID ); ?></h3>
                                            <h5><?php echo get_field('title', $person->ID); ?></h5>
    									</a>
    								</div>
                                    <?php if ($partner_count % 2 === 0) { echo '</div><div class="row">'; } ?>
                                <?php else : ?>
                                    <div class="col-xs-6 col-sm-4 col-md-4 col-lg-3">
                                        <a class="person" href="<?php echo get_permalink( $person->ID ); ?>">
                                            <div class="person-img"><?php echo get_the_post_thumbnail( $person->ID ); ?></div>
    										<h3><?php echo get_the_title( $person->ID ); ?></h3>
                                            <h5><?php echo get_field('title', $person->ID); ?></h5>
    									</a>
    								</div>
                                <?php endif; ?>
							<?php $partner_count++; endforeach; ?>
                        </div>
				<?php endif; ?>
            </div>
            <div class="col-md-3">
                <?php get_sidebar(); ?>
            </div>
        </div>
    </div>
</div>
		
<?php get_footer(); ?>

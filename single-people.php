<?php get_header(); ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<div class="content">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <h2><?php the_title(); ?></h2>
                <div class="row">
                    <?php if ( has_post_thumbnail()) : ?>
                        <div class="col-xs-2 col-sm-3 thumb">
                            <?php the_post_thumbnail('small'); ?>
                        </div>
                        <div class="col-xs-10 col-sm-9">
                            <?php the_content(); ?>
                        </div>
                    <?php else : ?>
                        <div class="col-xs-12">
                            <?php the_content(); ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-md-3">
                <?php get_sidebar(); ?>
            </div>
        </div>
    </div>
</div>
		
<?php endwhile; endif; ?>
<?php get_footer(); ?>

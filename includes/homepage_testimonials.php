<?php if( have_rows('testimonials') ): $testimonialCount = 0; ?>
<section class="homepage-testimonials">
    <div class="container">
		<div class="row">
            <div class="col-sm-12">
                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <?php while( have_rows('testimonials') ): the_row(); ?>
                            <div class="item <?php if($testimonialCount === 0){ echo 'active'; }?>">
                                <h5><?php the_sub_field('quote'); ?></h5>
                                <strong>&mdash;&nbsp;&nbsp;<?php the_sub_field('name'); ?></strong>
                                <p><?php the_sub_field('title'); ?></p>
                            </div>
                        <?php $testimonialCount++; endwhile; ?>
                    </div>
                    <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                        <i class="icon-left-open-big"></i>
                    </a>
                    <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                        <i class="icon-right-open-big"></i>
                    </a>
                </div>
            </div>
            <?php if( have_rows('video_about_url') ): ?>
            <div class="col-sm-12">
                <hr>
                <div class="row">
                    <?php while( have_rows('video_about_url') ): the_row(); ?>
                        <div class="col-sm-4">
                            <a href="<?php the_sub_field('url'); ?>" class="video" target="_blank">
                                <img src="<?php the_sub_field('image'); ?>" />
                            </a>
                        </div>
                    <?php endwhile; ?>
                </div>
            </div>
            <?php endif; ?>
		</div>
    </div>
</section>
<?php endif; ?>
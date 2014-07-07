<section class="homepage-about">
    <div class="container">
		<div class="row">
            <div class="col-sm-12 col-md-8 col-md-offset-2">
                <h5>About the Book</h5>
                <?php the_field('about_the_book'); ?>
                <hr class="divider">
            </div>
            <div class="col-sm-12 col-md-10 col-md-offset-1">
                <div class="row">
                    <div class="col-sm-6">
                        <?php if( have_rows('about_mal') ): while( have_rows('about_mal') ): the_row(); ?>
                            <div class="about-image">
                                <img src="<?php the_sub_field('image'); ?>" alt="Malachi O'Connor" />
                            </div>
                            <h5>Mal O'Connor</h5>
                            <p><?php the_sub_field('bio'); ?></p>
                            <p class="text-center">
                                <a href="<?php the_sub_field('linkedin'); ?>" class="underline" target="_blank">Connect with Mal on LinkedIn&nbsp;&nbsp;&raquo;</a>
                            </p>
                        <?php endwhile; endif; ?>
                    </div>
                    <div class="col-sm-6">
                        <?php if( have_rows('about_barry') ): while( have_rows('about_barry') ): the_row(); ?>
                            <div class="about-image">
                                <img src="<?php the_sub_field('image'); ?>" alt="Barry Dornfeld" />
                            </div>
                            <h5>Barry Dornfeld</h5>
                            <p><?php the_sub_field('bio'); ?></p>
                            <p class="text-center">
                                <a href="<?php the_sub_field('linkedin'); ?>" class="underline" target="_blank">Connect with Barry on LinkedIn&nbsp;&nbsp;&raquo;</a>
                            </p>
                        <?php endwhile; endif; ?>
                    </div>
                </div>
            </div>
            <?php if( have_rows('video_authors_url') ): ?>
                <?php while( have_rows('video_authors_url') ): the_row(); ?>
                    <div class="col-sm-8 col-sm-offset-2 col-sm-8 col-md-offset-2 col-lg-6 col-lg-offset-3">
                        <a href="<?php the_sub_field('url'); ?>" class="author-video" target="_blank">
                            <img src="<?php the_sub_field('image'); ?>" />
                            <h3><?php the_sub_field('text'); ?></h3>
                        </a>
                    </div>
                <?php endwhile; ?>
            <?php endif; ?>
		</div>
    </div>
</section>
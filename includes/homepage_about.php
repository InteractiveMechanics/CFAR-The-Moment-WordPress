<section class="homepage-about">
    <div class="container">
		<div class="row">
            <div class="col-sm-8 col-sm-offset-2">
                <h5>About the Book</h5>
                <?php the_field('about_the_book'); ?>
                <hr class="divider">
            </div>
            <div class="col-sm-10 col-sm-offset-1">
                <div class="row">
                    <div class="col-sm-6">
                        <?php if( have_rows('about_mal') ): while( have_rows('about_mal') ): the_row(); ?>
                            <img src="<?php the_sub_field('image'); ?>" alt="Malachi O'Connor" />
                            <h5>Mal O'Connor</h5>
                            <p><?php the_sub_field('bio'); ?></p>
                            <a href="<?php the_sub_field('linkedin'); ?>" target="_blank">Connect with Mal on LinkedIn&nbsp;&nbsp;&raquo;</a>
                        <?php endwhile; endif; ?>
                    </div>
                    <div class="col-sm-6">
                        <?php if( have_rows('about_barry') ): while( have_rows('about_barry') ): the_row(); ?>
                            <img src="<?php the_sub_field('image'); ?>" alt="Barry Dornfeld" />
                            <h5>Barry Dornfeld</h5>
                            <p><?php the_sub_field('bio'); ?></p>
                            <a href="<?php the_sub_field('linkedin'); ?>" target="_blank">Connect with Barry on LinkedIn&nbsp;&nbsp;&raquo;</a>
                        <?php endwhile; endif; ?>
                    </div>
                </div>
            </div>
            <?php if(get_field('video_authors_url')): ?>
                <div class="col-sm-6 col-sm-offset-3">
                    <?php the_field('video_authors_url'); ?>
                </div>
            <?php endif; ?>
		</div>
    </div>
</section>
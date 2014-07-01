<section class="homepage-hero">
	<div class="container">
		<div class="row">
			<div class="col-sm-5">
                <img src="<?php echo get_template_directory_uri(); ?>/images/book-cover@2x.png" class="book-cover" alt="The Moment You Can't Ignore by Mal O'Connor and Barry Dornfeld" />
			</div>
            <div class="col-sm-7">
                <h1 class="quotes">
                    Leaders today face four fundamental questions:
                </h1>
                <?php if( have_rows('hero_quotes') ): ?>    
                <div class="quote-container">
                    <?php $count = 0; ?>
                    <?php while( have_rows('hero_quotes') ): the_row(); ?>
                        <h1 data-count="<?php echo $count; ?>" class="quote"><?php the_sub_field('quote'); ?></h1>
                    <?php $count++; endwhile; ?>
                </div>
                <?php endif; ?>
                <a class="btn btn-large btn-primary">Purchase the book</a>
                <?php if( have_rows('hero_purchase_links') ): while( have_rows('hero_purchase_links') ): the_row(); ?>
                    <a href="<?php the_sub_field('url'); ?>" target="_blank"><?php the_sub_field('site'); ?></a>
                <?php endwhile; endif; ?>
                <?php if(get_field('hero_download')): ?>
                    <a href="<?php the_field('hero_download'); ?>" class="btn btn-large btn-primary">Download a chapter</a>
                <?php endif; ?>
			</div>
		</div>
	</div>
</section>
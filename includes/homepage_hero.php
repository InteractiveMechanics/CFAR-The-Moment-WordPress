<section class="homepage-hero">
	<div class="container">
		<div class="row">
			<div class="col-sm-5 col-md-4 col-md-offset-1">
                <img src="<?php echo get_template_directory_uri(); ?>/images/book-cover@2x.png" class="book-cover" alt="The Moment You Can't Ignore by Mal O'Connor and Barry Dornfeld" />
			</div>
            <div class="col-sm-7 col-md-6">
                <h1>
                    Leaders today face four fundamental questions:
                </h1>
                <?php if( have_rows('hero_quotes') ): ?>    
                <div class="quote-container">
                    <?php $count = 0; ?>
                    <?php while( have_rows('hero_quotes') ): the_row(); ?>
                        <h1 data-count="<?php echo $count; ?>" class="quote<?php if($count === 0){ echo ' active'; }?>"><?php the_sub_field('quote'); ?></h1>
                    <?php $count++; endwhile; ?>
                </div>
                <?php endif; ?>
                <div class="buttons">
                    <?php if( have_rows('hero_purchase_links') ): ?>
                    <select id="purchase-button">
                        <?php while( have_rows('hero_purchase_links') ): the_row(); ?>
                            <option value="<?php echo the_sub_field('url'); ?>"><?php echo the_sub_field('site'); ?></option>
                        <?php endwhile; ?>
                    </select>
                    <?php endif; ?>

                    <?php if(get_field('hero_download')): ?>
                        <a href="<?php the_field('hero_download'); ?>" class="btn btn-lg btn-primary">Download a chapter</a>
                    <?php endif; ?>
                </div>
			</div>
		</div>
	</div>
</section>
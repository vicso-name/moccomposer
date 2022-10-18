<?php get_template_part('template-parts/head'); ?>
<?php get_template_part('template-parts/header', 'fixed-blog'); ?>
	<main id="main" class="inner-page search-wrap">
		<div class="search-form-wrap">
			<svg><use xlink:href="#search-icon"></use></svg>
			<?php echo get_search_form();?>
		</div>
		<p class="count"><?php printf( __( '%s results found', 'moc' ), count( $posts ) ); ?></p>
		<?php if ( have_posts() ) : ?>
			<?php while ( have_posts() ) : the_post();
				$search_query = trim( get_search_query() );
				$content = trim( preg_replace( "/([\s\n\r]+)/", ' ', strip_tags( get_the_content() ) ) );
				$content_limit = 300;
//				$content = highlight_text( cut_search_text( $content, $search_query, $content_limit ), $search_query );
				$content = cut_search_text( $content, $search_query, $content_limit ); ?>
				<article class="search-result">
					<header>
						<h1 class="title"><?php the_title(); ?></h1>
					</header>
					<p class="text"><?php echo $content; ?></p>
					<footer>
						<a href="<?php the_permalink(); ?>" class="link"><?php the_permalink(); ?></a>
					</footer>
				</article>
			<?php endwhile; ?>
		<?php endif; ?>
	</main>
<?php get_footer(); ?>
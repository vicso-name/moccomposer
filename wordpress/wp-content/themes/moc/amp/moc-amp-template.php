<!doctype html>
<html amp <?php echo AMP_HTML_Utils::build_attributes_string( $this->get( 'html_tag_attributes' ) ); ?>>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no">
	<?php do_action( 'amp_post_template_head', $this ); ?>
	<style amp-custom>
		<?php $this->load_parts( array( 'style' ) ); ?>
		<?php do_action( 'amp_post_template_css', $this ); ?>
	</style>
</head>

<body class="<?php echo esc_attr( $this->get( 'body_class' ) ); ?>">

<?php $this->load_parts( array( 'header-bar' ) ); ?>

<article class="amp-wp-article">

	<header class="amp-wp-article-header">
		<h1 class="amp-wp-title"><?php echo wp_kses_data( $this->get( 'post_title' ) ); ?></h1>
        <?php $post_id = $this->get( 'post_id' ); ?>
        <div class="amp-wp-meta amp-wp-byline"><?php
            if ( get_field('author', $post->ID) ) {
            $author_id = get_field('author', $post->ID);
            $img = get_field('author_image', $author_id);
            $img_thumbnail = $img['sizes']['avatar']; ?>
<!--            <amp-img width="24" height="24"-->
<!--                     src="--><?php //echo $img_thumbnail; ?><!--"-->
<!--                     alt="--><?php //the_field('author_name', $author_id); ?><!--"-->
<!--                     class="i-amphtml-element i-amphtml-layout-fixed i-amphtml-layout-size-defined i-amphtml-layout amp-notsupported">-->
<!--                <img width="24" height="24"-->
<!--                     class="i-amphtml-fill-content i-amphtml-replaced-content"-->
<!--                     src="--><?php //echo $img_thumbnail; ?><!--"-->
<!--                     alt="--><?php //the_field('author_name', $author_id); ?><!--" />-->
<!--            </amp-img>-->

                <amp-img src="<?php echo esc_url( $img_thumbnail ); ?>" width="24" height="24" layout="fixed"></amp-img>
            <span class="amp-wp-author author vcard">
                <?php the_field('author_name', $author_id); ?><?php if (get_field('author_position', $author_id)) { ?><span class="author-position">, <?php the_field('author_position', $author_id); ?></span><?php } ?>
            </span>
            <?php
            }
            else { ?>
                <?php $post_author = $this->get( 'post_author' ); ?>
                <?php $author_avatar_url = get_avatar_url( $post_author->user_email, array( 'size' => 24 ) ); ?>
                <amp-img src="<?php echo esc_url( $author_avatar_url ); ?>" width="24" height="24" layout="fixed"></amp-img>
                <span class="amp-wp-author author vcard"><?php echo esc_html( $post_author->display_name ); ?></span>
            <?php } ?>

        </div>

                <?php $this->load_parts( apply_filters( 'amp_post_article_header_meta', array( 'meta-time' ) ) ); ?>

	</header>

	<?php $this->load_parts( array( 'featured-image' ) ); ?>

	<div class="amp-wp-article-content">
		<?php echo $this->get( 'post_amp_content' ); // amphtml content; no kses ?>
	</div>

	<footer class="amp-wp-article-footer">
		<?php $this->load_parts( apply_filters( 'amp_post_article_footer_meta', array( 'meta-taxonomy', 'meta-comments-link' ) ) ); ?>
	</footer>

</article>

<?php $this->load_parts( array( 'footer' ) ); ?>

<?php do_action( 'amp_post_template_footer', $this ); ?>

</body>
</html>

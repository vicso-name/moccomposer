<section class="contact-form-wrapper" id="estimate-project-form">

    <h1 class="js-hide-after-submit">
        <?php  global $contact_form_header; if ($contact_form_header) echo $contact_form_header; else the_field('contacts_title', $post->ID);  ?>
    </h1>
    <div class="gform_wrapper" id="homepage-form">
        <?php echo do_shortcode('[contact-form-7 id="5407" title="Contacts_Homepage"]'); ?>
    </div>
</section>


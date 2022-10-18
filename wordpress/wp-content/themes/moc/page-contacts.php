<?php
/*
 * Template Name: Contacts
 * */

get_template_part('template-parts/head');
get_template_part('template-parts/header', 'fixed'); ?>

<main id="main" class="inner-page contacts-page hide-estimate">
    <section class="contact-form-wrapper">
        <h1 class="js-hide-after-submit">Let’s Create Remarkable Products Together!</h1>
        <?php //the_content(); ?>
        <div id="contact-form" class="gform_wrapper">
        <?php echo do_shortcode('[contact-form-7 id="5406" title="Contacts"]')?>
        </div>
    </section>
    <?php get_template_part('template-parts/zoho-questions-popup'); ?>
</main>

<?php
function get_zoho_token1()
{

    $url = $_POST['form_location'];
    $form_id = $_POST['form_id'];

    if ((preg_match('/blog|webinars/i', $url)) || ($form_id === 'ecommerce-pdf-form')) {
        $zoho_refresh_token = "1000.5fbec35b562b76665911d43e5b11c15f.75e2d36754356fbc318aa36332c9d76f";
        $zoho_client_id = "1000.386X3QD7NK8D6PEY24X60BTNTIEX4E";
        $zoho_client_secret = "61d9bfd4ca5ccd6f849f97bf694398514560fd5fea";
    } else {
        $zoho_refresh_token = "1000.526015d2d6a06951d0aa650ae99fe21f.2f66d1aac3507246c213e0416a65749c";
        $zoho_client_id = "1000.F0ORJ7DCYTM6IBCA1TPFO9C55IZJ1W";
        $zoho_client_secret = "ce32e28ca93188e7aefe01a98c60d7f57c8f1764d8";
    }

    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => "https://accounts.zoho.eu/oauth/v2/token?refresh_token=" . $zoho_refresh_token . "&client_id=" . $zoho_client_id . "&client_secret=" . $zoho_client_secret . "&grant_type=refresh_token",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 60,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => '',
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json'
        ),
    ));


    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    $json = json_decode($response);
    $token = $json->access_token;

//    print_r($token);
    get_in_zoho($token);

    die();
}

function get_in_zoho($token)
{
    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => "https://www.zohoapis.eu/crm/v2/Leads/343364000004604022",
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_HTTPHEADER => array(
            "Authorization: Zoho-oauthtoken " . $token
        ),
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);

    file_put_contents('/var/www/moc.local/wp-content/uploads/tmp/tmp.txt', $response);

    var_dump($response);

    if ($err) {
        echo "cURL Error #:" . $err;
        error_log(print_r($err, true));
    }

    curl_close($curl);
    die();
}

//get_zoho_token1();

?>


<?php get_footer(); ?>

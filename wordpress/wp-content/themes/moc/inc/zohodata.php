<?php
//create submenu

class ZohoSettingsPage
{
    /**
     * Holds the values to be used in the fields callbacks
     */
    private $options;

    /**
     * Start up
     */
    public function __construct()
    {
        add_action('admin_menu', array($this, 'add_plugin_page'));
        add_action('admin_init', array($this, 'page_init'));
    }

    /**
     * Add options page
     */
    public function add_plugin_page()
    {
        // This page will be under "Settings"
        add_options_page(
            'Settings Admin',
            'Zoho Settings',
            'manage_options',
            'zoho-setting-admin',
            array($this, 'create_admin_page')
        );
    }

    /**
     * Options page callback
     */
    public function create_admin_page()
    {
        // Set class property
        $this->options = get_option('zoho_option_name');
        ?>
        <div class="wrap">
            <h1>Zoho Settings</h1>
            <form method="post" action="options.php">
                <?php
                // This prints out all hidden setting fields
                settings_fields('zoho_option_group');
                do_settings_sections('zoho-setting-admin');
                submit_button();
                ?>
            </form>
        </div>

        <?php
    }

    /**
     * Register and add settings
     */
    public function page_init()
    {
        register_setting(
            'zoho_option_group', // Option group
            'zoho_option_name', // Option name
            array($this, 'sanitize') // Sanitize
        );

        add_settings_section(
            'setting_section_id', // ID
            'Email Settings', // Title
            array($this, 'print_section_info'), // Callback
            'zoho-setting-admin' // Page
        );

        add_settings_field(
            'zohoemail', // ID
            'Email for follow ups sending', // Title
            array($this, 'id_number_callback'), // Callback
            'zoho-setting-admin', // Page
            'setting_section_id' // Section
        );


        add_settings_field(
            'zoholeademail', // ID
            'Email for Lead Info Sending', // Title
            array($this, 'email_lead_callback'), // Callback
            'zoho-setting-admin', // Page
            'setting_section2_id' // Section
        );
    }

    /**
     * Sanitize each setting field as needed
     *
     * @param array $input Contains all settings fields as array keys
     */
    public function sanitize($input)
    {
        $new_input = array();
        if (isset($input['zohoemail']))
            $new_input['zohoemail'] = sanitize_text_field($input['zohoemail']);


        if (isset($input['zoholeademail']))
            $new_input['zoholeademail'] = sanitize_text_field($input['zoholeademail']);

        return $new_input;
    }

    /**
     * Print the Section text
     */
    public function print_section_info()
    {
        print 'Enter your settings below:';
    }

    /**
     * Get the settings option array and print one of its values
     */
    public function id_number_callback()
    {
        printf(
            '<input type="text" id="zohoemail" name="zoho_option_name[zohoemail]" value="%s" />',
            isset($this->options['zohoemail']) ? esc_attr($this->options['zohoemail']) : ''
        );
    }

    /**
     * Get the settings option array and print one of its values
     */
    public function email_lead_callback()
    {
        printf(
            '<input type="text" id="zoholeademail" name="zoho_option_name[zoholeademail]" value="%s" />',
            isset($this->options['zoholeademail']) ? esc_attr($this->options['zoholeademail']) : ''
        );
    }
}

if (is_admin())
    $zoho_settings_page = new ZohoSettingsPage();


add_action('wp_ajax_nopriv_get_zoho_token', 'get_zoho_token');
add_action('wp_ajax_get_zoho_token', 'get_zoho_token');
function get_zoho_token($tag)
{

    $zoho_refresh_token = "1000.5fbec35b562b76665911d43e5b11c15f.75e2d36754356fbc318aa36332c9d76f";
    $zoho_client_id = "1000.386X3QD7NK8D6PEY24X60BTNTIEX4E";
    $zoho_client_secret = "61d9bfd4ca5ccd6f849f97bf694398514560fd5fea";

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
    search_lead_in_zoho($token);

    die();
}

function search_lead_in_zoho($token)
{
    $email = strtolower($_POST['email']);
    $form_id = $_POST['form_id'];
    $lead_id = $_POST['lead_id'];

    if ($form_id === 'download-form') {
        $email = strtolower($_POST['email-2']);
    }

    if ($form_id === 'ecommerce-pdf-form') {
        $email = strtolower($_POST['business-email']);
    }

    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => "https://www.zohoapis.eu/crm/v2/leads/search?email=" . $email,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 60,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json',
            "Authorization: Zoho-oauthtoken " . $token
        ),
    ));

    $response = curl_exec($curl);

//    var_dump(json_decode($response));


    $json = json_decode($response);
    $isSubscribe = $json->access_token;

    global $returned_tag;

    if (!$response || $form_id === 'ecommerce-pdf-form' || $form_id === 'blogpost-form' || $form_id === 'download-form' || $form_id === 'subscribe-form' || $form_id === 'post-voice-form') {
        $returned_tag = '';
    } else {
        $returned_tag = "Returned Lead";
    }

    if (!$lead_id) {
        save_to_zoho($token, $returned_tag);
    } else {
        update_in_zoho($token);
    }
}

function save_to_zoho($token, $returned_tag)
{

    $options = get_option('zoho_option_name', array());
    $leademail = $options['zohoemail'];
    $name = stripcslashes($_POST['your-name']);
    $last_name = stripcslashes($_POST['last-name']);
    $email = strtolower($_POST['email']);
    $city = $_POST['city'];
    $country = $_POST['country'];
    $visited = $_POST['visited'];
    $visited_str = stripcslashes($_POST['visited']);
    $first_visit = $_POST['first_visit'];
    $from_referral = $_POST['isReferral'];
    $channel = stripcslashes($_POST['channel']);
    $webinar_title = stripcslashes($_POST['webinar_title']);
    $description = stripcslashes($_POST['description']);
    $detailsToTest = strtolower($description);
    $company = stripcslashes($_POST['company']);
    $address = stripcslashes($_POST['address']);
    $device = $_POST['device'];
    $form_location = $_POST['form_location'];
    $emailClicked = $_POST['email_clicked'];
    $url = $_POST['form_location'];
    $job_title = $_POST['job-title'];

    $emailToSend = $_POST['email_to_send'];
    $lead_date = date('Y-m-d h:i:s');
    $phone_number = $_POST['phone'];
    $leadChannel = "Inbound";
    $leadSource = "";
    $sourceName = "";
    $form_id = $_POST['form_id'];
    $form_tag = $_POST['form_tag'];
    $form_title = $_POST['form_title'];


    if (strpos($visited_str, "utm") !== false || $from_referral === "true") {
        $leadSource = "Referrals";
    } else {
        $leadSource = "Organic";
        $sourceName = "Direct";
    }

    if (strpos($channel, "clutch.co") !== false) {
        $sourceName = "Clutch";
    } else if (strpos($channel, "themanifest.com") !== false) {
        $sourceName = "Manifest";
    } else if (strpos($channel, "search(google)") !== false) {
        $sourceName = "Google Search";
    } else if ((strpos($channel, "linkedin") !== false) || (strpos($channel, "lnkd.in") !== false)) {
        $leadSource = "Referrals";
        $sourceName = "LinkedIn";
    }


    $exclusion = array('porn', 'xxx', 'casino game', 'viagra', 'resume', 'job offer', 'career', 'job opportunity', 'Internship', 'apply for position');
    $badEmails = array('mail.ru', 'i.ua', 'rambler.ru', 'bk.ru', 'meta.ua', 'lenta.ru', 'ajmail.xyz', '.ru', '.ua', 'mail4opt@yahoo.com');
    $validate = true;


    foreach ($badEmails as $badEmail) {
        if (preg_match_all("(" . $badEmail . ")", strtolower($_POST['email']))) {
            $validate = false;
            break;
        }
    }

    foreach ($exclusion as $exclude) {
        if (preg_match_all("(" . $exclude . ")", strtolower($_POST['description']))) {
            $validate = false;
            break;
        }
    }

    $hostname = $_SERVER['HTTP_HOST'];

    if ($_POST['form_location'] == "https://" . $hostname . "/contacts") {
        $page = "Contact Page";
        $title = "From MOC website " . $page;
        $tag = "Get in Touch";
    } else if ($_POST['form_location'] == "https://" . $hostname . "/chatbot-development") {
        $page = "Chatbot Development Page";
        $title = "From MOC website " . $page;
        $tag = "Chatbot Development";
    } else if ($_POST['form_location'] == "https://" . $hostname . "/business-process-automation" || $_POST['form_location'] == "https://" . $hostname . "/business-process-automation#estimate-project-form-c") {
        $page = "BPA Page";
        $title = "From MOC website " . $page;
        $tag = "BPA";
    } else if ($_POST['form_location'] == "https://" . $hostname . "/mobile-app-development") {
        $page = "Mobile App Page";
        $title = "From MOC website " . $page;
        $tag = "Mobile Developmet";
    } else if ($_POST['form_location'] == "https://" . $hostname . "/web-development") {
        $page = "Web Development Page ";
        $title = "From MOC website " . $page;
        $tag = "Web Development";
    } else if ($_POST['form_location'] == "https://" . $hostname . "/design") {
        $page = "Design Page";
        $title = "From MOC website " . $page;
    } else if ($_POST['form_location'] == "https://" . $hostname . "/apple-business-chat") {
        $page = "Apple Business Chat Page";
        $title = "From MOC website " . $page;
        $tag = "Apple business chat";
    } else if ($_POST['form_location'] == "https://" . $hostname . "/google-rcs") {
        $page = "Google RCS Page";
        $title = "From MOC website " . $page;
        $tag = "Google RCS";
    } else if ($_POST['form_location'] == "https://" . $hostname . "/about-us") {
        $page = "About Us Page";
        $title = "From MOC website " . $page;
        $tag = "About Us";
    } else if ((strpos($url, "webinars") !== false)) {
        $page = "Webinar Page";
        $title = "From MOC website " . $page;
        $tag = "Subscription";
    } else if ((strpos($url, "blog") !== false)) {
        $page = "Blog";
        $title = "Subscription Form";
        $tag = "Subscription";
    } else if ((strpos($url, "knowledge-base") !== false)) {
        $page = "Knowledge base page";
        $title = "From MOC website " . $page;
        $tag = "Knowledge Base";
    } else if ((strpos($url, "ebooks-and-whitepapers") !== false)) {
        $page = "Ebooks and Whitepapers page";
        $title = "From MOC website " . $page;
        $tag = "Ebooks and Whitepapers";
    } else if ($_POST['form_location'] == "https://" . $hostname . "/conversational-ai-in-finance") {
        $page = "AI in finance banking Page";
        $title = "From MOC website " . $page;
        $tag = "Finance Page";
    } else if ($_POST['form_location'] == "https://" . $hostname . "/conversational-ai-chatbot-for-airport-operations") {
        $page = "AI Airports Landing Page";
        $title = "From MOC website " . $page;
        $tag = "Airports Page";
    } else if ($_POST['form_location'] == "https://" . $hostname . "/conversational-ai-in-education") {
        $page = "AI in Education Industry Page";
        $title = "From MOC website " . $page;
        $tag = "Education Page";
    } else if ($_POST['form_location'] == "https://" . $hostname . "/conversational-ai-in-ecommerce-and-retail") {
        $page = "Conversation AI in Ecommerce and Retail Page";
        $title = "From MOC website " . $page;
        $tag = "Ecommerce Page";
    } else if ($_POST['form_location'] == "https://" . $hostname . "/conversation-design") {
        $page = "Conversation Design Page";
        $title = "From MOC " . $page;
        $tag = "Conversation Design";
    } else {
        $page = "Home Page";
        $title = "From MOC website " . $page;
        $tag = "Main Page";
    }

    if (($form_id === 'download-form')) {
        $name = stripcslashes($_POST['your-name-2']);
        $last_name = stripcslashes($_POST['last-name-2']);
        $email = strtolower($_POST['email-2']);
        $page = "Blog";
        $title = $form_title;
        $tag = $form_tag;
    }

    if (($form_id === 'blogpost-form')) {
        $name = stripcslashes($_POST['your-name-3']);
        $description = stripcslashes($_POST['description']);
        $email = strtolower($_POST['email-3']);
        $page = "Blog";
        $title = $form_title;
        $tag = 'Blog Post Page';
    }

    if ($form_id === 'ecommerce-pdf-form') {
        $name = stripcslashes($_POST['your-name-2']);
        $email = strtolower($_POST['business-email']);
        $page = "Ecommerce page";
        $title = $form_title;
        $tag = $form_tag;
    }

    if ($form_id === 'post-voice-form') {
        $name = stripcslashes($_POST['your-name-3']);
        $email = strtolower($_POST['business-email-2']);
        $page = "Blog Page";
        $title = $form_title;
        $tag = $form_tag;
    }

    if ($validate == true) {
        $curl = curl_init();

        $descriptionString = str_replace(array("\r\n", "\r", "\n"), ' ', $description);
//        $descriptionQuotes = str_replace('"', '\'', $descriptionString);
//        $details = substr($descriptionQuotes, 0, 700);
        $visitedString = str_replace(array("\r\n", "\r", "\n"), ' ', $visited_str);
        $visitedString = substr($visitedString, 0, 1999);
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://www.zohoapis.eu/crm/v2/leads",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 60,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => "
        {
        \"data\": [
        {
            \"Last_Name\": \"" . $name . ' ' . $last_name . "\",
            \"Email\": \"" . $email . "\",
            \"Mobile\": \"" . $phone_number . "\",
            \"Company\": \"" . $company . "\",
            \"City\": \"" . $city . "\",
            \"Country1\": \"" . $country . "\",
            \"Street_Address\": \"" . $address . "\",
            \"Chanel\": \"" . $leadChannel . "\",
            \"Referrals\": \"" . $visitedString . "\",
            \"Device_1\": \"" . $device . "\",
            \"Request_Description\": \"" . $descriptionString . "\",
            \"Designation\": \"" . $title . "\",
            \"Lead_Source\": \"" . $leadSource . "\",
            \"Source_Name\": \"" . $sourceName . "\",
            \"Link_Source\": \"" . $channel . "\",
            \"Campaign\": \"" . $webinar_title . "\",
            \"Job_Title\": \"" . $job_title . "\",
            \"Tag\":  [{ name: \"" . $tag . "\" }, { name: \"" . $returned_tag . "\" }],
        },
        ]}",
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json',
                "Authorization: Zoho-oauthtoken " . $token
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        file_put_contents('/var/www/moc.local/wp-content/uploads/tmp/tmp.txt', $response);
        $response = json_decode($response);

        if ($err) {
            echo "cURL Error #:" . $err;
            error_log(print_r($err, true));
        }

        $id = null;
        if ($response && $response->data && is_array($response->data) && count($response->data) && $response->data[0]->details && $response->data[0]->details->id) {
            $id = $response->data[0]->details->id;
        }

        echo json_encode(array(
            "server_id" => $id,
        ));
    }

    $status = '';

    if ($validate !== true) {
        $status = '**';
    }

    if (($page !== "Blog") && (strpos($url, "webinars") === false) && (strpos($url, "ebooks-and-whitepapers") === false)) {

        if ((!empty($emailClicked))) {
            $subject = 'New Lead Details - Click on Email' . $emailClicked;
            $lead_body = "Lead Details:  \n\n";
            if (!empty($emailToSend)) $leademail = $emailToSend;
        } else {
            $subject = 'New Lead Details - Form Submission from ' . $form_location;
            $lead_body = "Lead Details: $status \n\nName: $name \n\nEmail: $email \n\nPhone: $phone_number \n\nCompany: $company \n\n";
            if (!empty($address)) $lead_body = $lead_body . "Address: $address \n\n";
            $lead_body = $lead_body . "Description: $description \n\n";
        }
        $headers = 'From: MOC\'Site  <no-reply@masterofcode.com>' . "\r\n";
        $body = $lead_body . "City: $city \n\nCountry: $country \n\nFirst visit: $first_visit \n\nChannel: $channel \n\nDevice: $device \n\nForm Location: $form_location \n\nVisited Pages: \n$visited ";

        wp_mail(array($leademail), $subject, $body, $headers);
    };

    // insert to database
    saveToDbZoho($name, $email, $description, $company, $lead_date, $phone_number, $device, $country, $city, $visited, $first_visit, $channel);


    curl_close($curl);
    die();
}

function saveToDbZoho($name, $email, $description, $company, $lead_date, $phone_number, $device, $country, $city, $visited, $first_visit, $channel)
{
    global $wpdb;
    $table_name = $wpdb->prefix . "sent_leads";
    $wpdb->insert(
        $table_name,
        array(
            'leadname' => $name,
            'email' => $email,
            'description' => substr($description, 0, 999),
            'company' => $company,
            'lead_date' => $lead_date,
            'phone' => $phone_number,
            'channel' => substr($channel, 0, 254),
            'device' => $device,
            'country' => substr($country, 0, 59),
            'city' => substr($city, 0, 59),
            'visited' => substr($visited, 0, 254),
            'first_visit' => $first_visit
        )
    );
}

function update_in_zoho($token)
{

    $options = get_option('zoho_option_name', array());
    $leademail = $options['zohoemail'];
    $name = stripcslashes($_POST['your_name']);
    $last_name = stripcslashes($_POST['last_name']);
    $estimated_budget = stripcslashes($_POST['estimated_budget']);
    $owns_decision = stripcslashes($_POST['owns_decision']);
    $project_delivery = stripcslashes($_POST['project_delivery']);
    $lead_id = $_POST['lead_id'];

    $curl = curl_init();


    curl_setopt_array($curl, array(
        CURLOPT_URL => "https://www.zohoapis.eu/crm/v2/Leads/" . $lead_id,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 60,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'PUT',
        CURLOPT_POSTFIELDS => "
        {
        \"data\": [
        {
            \"Last_Name\": \"" . $name . ' ' . $last_name . "\",
            \"id\": \"" . $lead_id . "\",
            \"What_is_your_estimated_budget_for_the_project\": \"" . $estimated_budget . "\", 
            \"Who_owns_the_decision\": \"" . $owns_decision . "\", 
            \"How_urgent_is_the_project_delivery\": \"" . $project_delivery . "\", }],
        },
        ]}",
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json',
            "Authorization: Zoho-oauthtoken " . $token
        ),
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);

//        file_put_contents('/var/www/moc.local/wp-content/uploads/tmp/tmp.txt', $response);
//        $response = json_decode($response);

    if ($err) {
        echo "cURL Error #:" . $err;
        error_log(print_r($err, true));
    }

    curl_close($curl);
    die();
}


//chatbot
add_action('wp_ajax_send_to_chatbot_data', 'send_to_chatbot_data');
add_action('wp_ajax_nopriv_send_to_chatbot_data', 'send_to_chatbot_data');

function send_to_chatbot_data()
{
// user data
    $userId = $_POST['bot_user_id'];
    $channel = $_POST['channel'];
    $country = $_POST['country'];
    $city = $_POST['city'];
    $device = $_POST['device'];
    $first_visit = $_POST['first_visit'];
    $timezone = $_POST['timezone'];
    $googleId = $_POST['google_analitics_id'];
    $visited = $_POST['visited'];
    $visited_str = stripcslashes($_POST['visited']);
    $from_referral = $_POST['isReferral'];

    if (strpos($visited_str, "utm") !== false || $from_referral === "true") {
        $leadSource = "Referrals";
    } else {
        $leadSource = "Organic";
        $sourceName = "Direct";
    }

    if (strpos($channel, "clutch.co") !== false) {
        $sourceName = "Clutch";
    } else if (strpos($channel, "themanifest.com") !== false) {
        $sourceName = "Manifest";
    } else if (strpos($channel, "search(google)") !== false) {
        $sourceName = "Google Search";
    } else if ((strpos($channel, "linkedin") !== false) || (strpos($channel, "lnkd.in") !== false)) {
        $leadSource = "Referrals";
        $sourceName = "LinkedIn";
    }

// sending request to backend api
    $curl = curl_init();

    $visitor_data = json_encode(array(
        "bot_user_id" => $userId,
        "channel" => $channel,
        "lead_source" => $leadSource,
        "source_name" => $sourceName,
        "country" => $country,
        "city" => $city,
        "device" => $device,
        "is_new" => $first_visit,
        "timezone" => $timezone,
        "analytics_id" => $googleId,
    ));

    curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://moc-website-bot.mocintra.com/update_visitor',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => $visitor_data,
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json',
            'auth: W3BMbZzbS2TxpGN9jM82F7MzT5xGSg2r9uNVjcWMPt93KNNUbLxtu9RcQYwj7nkRFYDAMbdtuX65nJAqkHtqtVtTKN3tLdVhNqurrhuw7rbjKnjVUCVc9YWvCANZqk83',
        ),
    ));


    $response = curl_exec($curl);
    $err = curl_error($curl);

//    var_dump($response);
//    var_dump(http_response_code());

// Check HTTP status code
    if (!curl_errno($curl)) {
        switch ($http_code = http_response_code()) {
            case 200:
                $responseStatus = '200';
                break;
            default:
                echo 'Unexpected HTTP code: ', $http_code, "\n";
        }
    }

    curl_close($curl);

    echo $server_data = json_encode(array(
        "server_response" => $responseStatus,
    ));

//    echo $responseStatus;
//    print_r(json_encode($response));
//    echo  json_encode($response);

    die();
}

add_action('wp_ajax_send_to_chatbot_pdf_data', 'send_to_chatbot_pdf_data');
add_action('wp_ajax_nopriv_send_to_chatbot_pdf_data', 'send_to_chatbot_pdf_data');

function send_to_chatbot_pdf_data()
{
//pdf data
    $sessionID = $_POST['session_id'];
    $pdfName = $_POST['pdf_name'];

    $curl = curl_init();

    $pdf_data = json_encode(array(
        "session_id" => $sessionID,
        "pdf_name" => $pdfName,
    ));

    curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://moc-website-bot.mocintra.com/analytics_update',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => $pdf_data,
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json',
            'auth: W3BMbZzbS2TxpGN9jM82F7MzT5xGSg2r9uNVjcWMPt93KNNUbLxtu9RcQYwj7nkRFYDAMbdtuX65nJAqkHtqtVtTKN3tLdVhNqurrhuw7rbjKnjVUCVc9YWvCANZqk83',
        ),
    ));


    $response = curl_exec($curl);
    $err = curl_error($curl);

//    var_dump($response);
//    var_dump(http_response_code());

// Check HTTP status code
    if (!curl_errno($curl)) {
        switch ($http_code = http_response_code()) {
            case 200:
                $responseStatus = '200';
                break;
            case 400:
                $responseStatus = '400';
                break;
            default:
                echo 'Unexpected HTTP code: ', $http_code, "\n";
        }
    }

    curl_close($curl);

    echo $server_data = json_encode(array(
        "server_response" => $responseStatus,
    ));

    //echo $pdf_data;
//    print_r(json_encode($response));
    //echo  json_encode($response);

    die();
}


//zoho integration

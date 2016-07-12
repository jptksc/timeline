<?php 
    
    error_reporting(E_ALL); ini_set('display_errors', 1);
    
    // Get settings.
    require_once('../../settings.php');

    // Get the MailChimp helper.
    require_once('../../assets/helpers/mailchimp.php');

    // Only process POST reqeusts.
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
        // Get the form fields and remove whitespace.
        $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);

        // Check that data was sent to the mailer.
        if ( !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        
            // Set a 400 (bad request) response code and exit.
            http_response_code(400);
            exit;
        }
        
        // Add the customer to MailChimp.
        $MailChimp = new MailChimp($mailchimp_api_key);
        $MailChimp->call('lists/subscribe', array(
            'id' => $mailchimp_list_id,
            'email' => array('email' => $email),
            'merge_vars' => array('FNAME' => $_POST["first"], 'LNAME' => $_POST["last"]),
            'double_optin' => true,
            'update_existing' => true,
            'replace_interests' => false,
            'send_welcome' => false
        ));
        
        // Set a 200 (okay) response code.
        http_response_code(200);

    } else {
    
        // Not a POST request, set a 403 (forbidden) response code.
        http_response_code(403);
    }

?>
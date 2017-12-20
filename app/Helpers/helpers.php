<?php

/**
 * Helper for save email data to database and send using sendgrid
 */
function sendMail(
    $fromEmail,
    $fromName,
    $toEmail,
    $toName,
    $subject,
    $content,
    $subs = [],
    $replyTo = null,
    $templateId = null,
    $attachments = [],
    $scheduleTime = null,
    $status = 1,
    $statusLog = null
) {
    $request_body = json_decode(
        '{
            "personalizations": [
                {
                    "to": [
                        {
                            "email": "' . $toEmail . '",
                            "name": "' . $toName . '"
                        }
                    ],
                    "subject": "' . $subject . '",
                    "substitutions": ' . $subs . '
                }
            ],
            "from": {
                "email": "' . $fromEmail . '",
                "name": "' . $fromName . '"
            },
            "template_id": "' . $templateId . '"
        }'
    );

    $apiKey = env('SENDGRID_API_KEY');
    $sg = new \SendGrid($apiKey);

    try {
        $response = $sg->client->mail()->send()->post($request_body);

        return true;
    } catch (\Exception $e) {
        $log = ['Helpers' => 'helpers', 'function' => 'sendgridMail'];
        $dataError['email_recipient'] = $toEmail;
        $dataError['email_recipient_name'] = $toName;
        $dataError['email_subject'] = $subject;
        return false;
    }
}

if (!function_exists('getMainDomicileDropdown')) {
    /**
     * Get list of main domicile for dropdown data
     *
     * @param  string $placeholder
     * @return array
     */
    function getMainDomicileDropdown($placeholder = null)
    {
        $result = require_once app_path('Helpers/list_main_domicile.php');
        $result[''] = $placeholder ?: '< Select Main Domicile >';
        asort($result);
        return $result;
    }
}

if (!function_exists('getImgAvatar')) {
    /**
     * Get image avatar from given email
     *
     * @param  string $email
     * @return string
     */
    function getImgAvatar($email, $size = 150)
    {
        $grav_url = "//www.gravatar.com/avatar/" . md5(strtolower(trim($email))) . "?s=" . $size;
        return $grav_url;
    }
}

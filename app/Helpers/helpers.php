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
                            "email": "'.$toEmail.'",
                            "name": "'.$toName.'"
                        }
                    ],
                    "subject": "'.$subject.'"
                }
            ],
            "from": {
                "email": "'.$fromEmail.'",
                "name": "'.$fromName.'"
            },
            "content": [
                {
                    "type": "text/plain",
                    "value": "'.$content.'"
                }
            ]
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
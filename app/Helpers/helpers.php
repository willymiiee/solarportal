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
    $subs = [],
    $replyTo = null,
    $templateId = null,
    $attachments = [],
    $scheduleTime = null,
    $status = 1,
    $statusLog = null
) {
    $from = new SendGrid\Email($fromName, $fromEmail);
    $subject = $subject;
    $to = new SendGrid\Email($toName, $toEmail);
    $content = new SendGrid\Content("text/html", "Here is your code : ".$subs['code']);
    $mail = new SendGrid\Mail($from, $subject, $to, $content);
    if($templateId != null) $mail->setTemplateId($templateId);
    if($replyTo != null) $mail->setReplyTo($replyTo);

    $apiKey = env('SENDGRID_API_KEY');
    $sg = new \SendGrid($apiKey);

    try {
        $response = $sg->client->mail()->send()->post($mail);

        return true;
    } catch (Exception $e) {
        $log = ['Helpers' => 'helpers', 'function' => 'sendgridMail'];
        $dataError['email_recipient'] = $toEmail;
        $dataError['email_recipient_name'] = $toName;
        $dataError['email_subject'] = $subject;
        return false;
    }
}
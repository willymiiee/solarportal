<?php

namespace App\Mail;

use App\Models\Company;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ParticipantInvitation extends Mailable
{
    use Queueable, SerializesModels;

    public $data;

    public $company;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
        $this->company = Company::find($this->data['company_id']);
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $this->data['subject'] = config('app.name') . ' - ' . $this->_filter($this->data['subject']);
        $this->data['message'] = $this->_filter($this->data['message']);
        $invitation_url = route('register', [
            'ref_company' => $this->data['company_id'],
            'email' => $this->data['email'],
            'name' => $this->data['name'],
        ]);

        return $this
            ->subject($this->data['subject'])
            // ->text('emails.participant_invitation_plain')
            ->markdown('emails.participant_invitation')
            ->with([
                'data' => $this->data,
                'invitation_url' => $invitation_url,
            ]);
    }

    protected function _filter($phrase)
    {
        return str_replace(
            ['__name__', '__company__', '__email__', '__link__'],
            [$this->data['name'], $this->company['name'], $this->data['email'], ''],
            $phrase);
    }
}

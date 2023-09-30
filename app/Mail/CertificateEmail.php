<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Http\File;

class CertificateEmail extends Mailable
{
    use Queueable, SerializesModels;

    protected $pdfUrl;
    protected $emailBody;

    public function __construct($pdfUrl, $emailBody)
    {
        $this->pdfUrl = $pdfUrl;
        $this->emailBody = $emailBody;
    }

    public function build()
    {
        return $this->subject('Certificate')
            ->html($this->emailBody)
            ->attach($this->pdfUrl, [
                'as' => 'attachment_name.pdf',
                'mime' => 'application/pdf',
            ]);
    }
}

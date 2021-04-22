<?php

namespace App\Mail;

use App\Models\Suratmasuk;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NotifikasiSekum extends Mailable
{
    use Queueable, SerializesModels;
    public $sm;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Suratmasuk $sm)
    {
        $this->sm = $sm;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.site.notifikasi');
    }
}

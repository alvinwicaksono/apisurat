<?php

namespace App\Mail;

use App\Models\Desposisimasuk;
use App\Models\Suratmasuk;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class KirimSurat extends Mailable
{
    use Queueable, SerializesModels;

    public $des;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Desposisimasuk $des)
    {
        $this->des = $des;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.site.kirimsurat');
    }
}

<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class mailMaster extends Mailable
{
    use Queueable, SerializesModels;

    public $tieu_de;
    public $data;
    public $view;
    public function __construct($tieu_de, $data, $view)
    {
        $this->tieu_de = $tieu_de;
        $this->data = $data;
        $this->view = $view;
    }

    public function build()
    {
        return $this->subject($this->tieu_de)->view($this->view)->with('data', $this->data);
    }
}

<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Mail;

class jobGuiMail implements ShouldQueue
{
    use Queueable;
    public $nguoi_nhan;
    public $tieu_de;
    public $data;
    public $view;
    public function __construct($nguoi_nhan, $tieu_de, $data, $view)
    {
        $this->nguoi_nhan = $nguoi_nhan;
        $this->tieu_de = $tieu_de;
        $this->data = $data;
        $this->view = $view;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Mail::to($this->nguoi_nhan)->send(new \App\Mail\mailMaster($this->tieu_de, $this->data, $this->view));
    }
}

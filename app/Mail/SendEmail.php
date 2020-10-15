<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendEmail extends Mailable
{
    use Queueable, SerializesModels;

     public $data;
    /**
     * Create a new message instance.
     *
     * @return void
     */
     public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
         return $this->from('info@riomebel.kz ')->subject('Новая заявка с сайта')
        // ->attach(storage_path('/app/public/users/default.png'))
        // ->attach($this->data['document']->getRealPath(),
        //         [
        //             'as' => $this->data['document']->getClientOriginalName(),
        //             'mime' => $this->data['document']->getClientMimeType(),
        //         ])
            // ->attach(storage_path('/app/public/users/default.png'), [
            //     'as' => 'default.png',
            //     'mime' => 'public/users',
            // ])
        ->view('partials.email');
    }
}

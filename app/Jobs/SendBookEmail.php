<?php

namespace App\Jobs;

//Esto son los Facades
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Core\Entities\Book;
use App\Mail\BookMail;
use Illuminate\Contracts\Mail\Mailer;

class SendBookEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */

    //Añado un public
    //public $objBook;
    public $objBookMail;
    
    //public function __construct()
    public function __construct(BookMail $objBookMail)
    {
        //
        $this->objBookMail=$objBookMail;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    //public function handle()
    public function handle(Mailer $mailer)
    {
        //
        $mailer->send($this->objBookMail);
    }
}

<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class NaimoChbab extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'naimo:chbab';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Say Naimo Chbab loool ';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
//        $pass =$this->ask('Type your password ') ;

        $h = ['name' , "email "] ;
        $d = ['naimo' , 'younes' ,'rayhane' , 'mehdi'] ;

        $bar = $this->output->createProgressBar(count($d)) ;

        foreach ($d as $ds){
            sleep(1) ;
            $bar->setProgress(1) ;
        }

        $bar->finish();

        dd() ;

        $rep = $this->choice('What is your age ?', ['10' ,' 15', '20']);

        $this->info(sprintf("you are %d years old ",$rep)) ;
    }
}

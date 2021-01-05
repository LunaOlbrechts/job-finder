<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use App\Models\Student;

class StudentUpdate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'student:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get new students';

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
     * @return int
     */
    public function handle()
    {
        $student = Student::all();
        foreach($student as $all){
            Mail::raw('This is an automatically generated mail', function($message) use ($all){
                $message->from('britt110100@gmail.com');
                $message->to('britt110100@gmail.com')->subject('New students');
            });
        }
        $this->info('Mail update has been send successfully');
    }
}

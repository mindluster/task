<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\student;
use Event;
use App\Events\SendMail;
class order_fix extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'students:order';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'command to fix order number if it is messed up';

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
        $groups=  student::select('id','school_id','name','order')
        ->orderBy('created_at','asc')->get();
        $students = $groups->groupBy('school_id');
        foreach($students as $student_arr)
        {
                foreach($student_arr as $key => $student)
                {

                    $stud = student::find($student->id);
                    $stud->order = $key+1;
                    $stud->save();
                }
        }
        Event::fire(new SendMail(2));
    }
}

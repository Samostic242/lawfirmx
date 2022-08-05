<?php

namespace App\Console\Commands;

use App\Mail\emailNotify;
use App\Models\register;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class ReminderEmailNotification extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:notifyuser';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sends Email Notifications to User yet to submit thier profile';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $date = Carbon::now()->subDays(2)->format('d-m-Y');
        $clients = register::where('image', null)
        ->where('updated_at', '>=', $date)->get();

        $data = array();
        foreach ($clients as $client) {
           $data[] = $client->email;
        }
        foreach($data as $datas){
            $userEmail = Mail::send(new emailNotify($datas));
            register::where('email', $datas)->update(['updated_at' => Carbon::today()]);
        }


    }
}

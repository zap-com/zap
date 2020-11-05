<?php

namespace App\Console\Commands;

use App\Models\Role;
use App\Models\User;
use Illuminate\Console\Command;

class MakeUserRevisor extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'zap:MakeUserRevisor';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'fai diventare un user revisore';

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
        $email = $this->ask('inserisci email');

        $user = User::where('email', $email)->first();

        if (!$user) {
            $this->error('l\'utente non esiste');
            return;
        }

        $user->roles()->attach(Role::find(3));
        $user->save();
        $this->info("l'utente {$user->name} e' ora un revisore");
    }
}

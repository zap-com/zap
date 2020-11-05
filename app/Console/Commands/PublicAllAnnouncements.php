<?php

namespace App\Console\Commands;

use App\Models\Announcement;
use Illuminate\Console\Command;

class PublicAllAnnouncements extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'zap:publishAll';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Pubblica tutti gli annunci';

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

        Announcement::publishAll();
        return 'annunci pubblicati';
    }
}

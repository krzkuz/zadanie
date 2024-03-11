<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class InitDatabase extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'init:database';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command to initialize database and seed with initial data of 50 users and 50 articles';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->call('migrate');
        $this->call('db:seed', ['--class' => 'DatabaseSeeder']);
    }
}

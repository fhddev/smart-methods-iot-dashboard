<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\User;
use Illuminate\Support\Facades\Hash;

class CreateUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:suser';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create Admin User';

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
        //
        //
        $username = $this->ask('Enter username :');
        $email = $this->ask('Type email :');
        $password = $this->secret('Enter password :');

        $user = User::create([
            'name' => $username,
            'email' => $email,
            'password' => Hash::make($password)
        ]);

        $this->info("Root admin user was created.");
    }
}

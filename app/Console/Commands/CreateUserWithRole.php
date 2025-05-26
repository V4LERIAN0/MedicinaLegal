<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class CreateUserWithRole extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:name';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
{
    $username = $this->ask('Username');
    $password = $this->secret('Password');
    $role     = $this->choice('Role', ['secretaria','medico-forense','coordinador','perito','admin-sistema']);

    $user = \App\Models\User::create([
        'username'      => $username,
        'password_hash' => bcrypt($password),
        'rol'           => $role,
    ]);

    $user->assignRole($role);

    $this->info("User {$username} created with role {$role}");
}
}

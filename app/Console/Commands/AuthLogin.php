<?php

namespace App\Console\Commands;

use App\Services\LoginService;
use Exception;
use Illuminate\Console\Command;
use Symfony\Component\Console\Command\Command as CommandAlias;

class AuthLogin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'auth:login';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command that allows you to log in to system and returns auth token';

    protected string|null $login;
    protected string|null $password;

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(): int
    {
        try {
            $token = app(LoginService::class, [
                'login' => $this->ask('Write your login: '),
                'password' => $this->secret('Write you password: '),
            ])->login();
            $this->components->info('Your toke is ' . $token);
            return CommandAlias::SUCCESS;
        } catch (Exception $exception)
        {
            $this->components->error($exception->getMessage());
            return CommandAlias::FAILURE;
        }
    }
}

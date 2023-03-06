<?php

namespace App\Services;

use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginService
{

    protected ?string $login;
    protected ?string $password;
    public function __construct(
        $login = null,
        $password = null,
    )
    {
        $this->login = $login;
        $this->password = $password;
        $this->validate();
    }

    protected function validate(): array
    {
        return Validator::validate([
            'login' => $this->login,
            'password' => $this->password,
        ], [
            'login' => 'required|string|min:4|max:50',
            'password' => 'required|string|min:8|max:250',
        ]);
    }

    /**
     * @throws Exception
     */
    public function login(): string
    {
        $credentials = [
            'login' => $this->login,
            'password' => $this->password,
        ];

        if (!Auth::attempt($credentials)) {
            throw new Exception('Invalid credentials!');
        }

        /** @var User $user */
        $user = auth()->user();
        $user->tokens()->delete();
        return $user->createToken('token')->plainTextToken;
    }
}

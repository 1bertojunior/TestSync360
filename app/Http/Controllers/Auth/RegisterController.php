<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    use RegistersUsers;

    protected $redirectTo = '/home';

    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function validator(array $data)
    {
        $errors = [
            'first_name' => ['required', 'string', 'min:2', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ];

        $message = [
            'first_name.required' => 'O campo nome é obrigatório',
            'first_name.min' => 'O campo nome deve ter no mínimo :min caracteres',
            'email.required' => 'O campo email é obrigatório',
            'email.email' => 'O email fornecido não é válido',
            'email.unique' => 'Este email já está em uso',
            'password.required' => 'O campo senha é obrigatório',
            'password.min' => 'A senha deve ter pelo menos :min caracteres',
            'password.confirmed' => 'A confirmação de senha não corresponde',
        ];

        $validator = Validator::make($data, $errors, $message);
        return $validator;
    }

    protected function create(array $data)
    {

        $result = User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),          
        ]);

        return $result;        
    }
}

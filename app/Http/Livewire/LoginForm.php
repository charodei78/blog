<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class LoginForm extends Component
{
    public $email;
    public $password;
    public $name;
    public $state = 'login';

    public function render()
    {
        return view('livewire.login-form');
    }

    public function login(Request $request)
    {
        if (Auth::attempt(['email' => $this->email, 'password' => $this->password])) {
            $request->session()->regenerate();
            session()->flash('message', "Вы вошли в систему");
            return redirect('/');
        }
        else
            session()->flash('error', 'Имейл или пароль не верны');
    }

    public function register(Request $request)
    {
        Auth::login($user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'is_admin' => 0,
            'password' => Hash::make($this->password),
        ]));
        return redirect('/');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    public function change_state($new_state)
    {
        $this->state = $new_state;
    }
}

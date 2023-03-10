<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{
    public $form = [
        'email'    => '',
        'password' => '',
    ];

    public function submit()
    {
        $this->validate([
            'form.email'    => 'required|email|max:255|min:3',
            'form.password' => 'required|max:255|min:3',
        ], [
            'required' => ':attribute harus diisi',
            'email'    => ':attribute harus berupa email',
            'max'      => ':attribute maksimal 255 karakter',
            'min'      => ':attribute minimal 3 karakter',
        ], [
            'form.email'    => 'Email',
            'form.password' => 'Password',
        ]);

        Auth::attempt($this->form);

        return redirect(route('home'));
    }

    public function render()
    {
        return view('livewire.login');
    }
}

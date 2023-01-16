<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class Register extends Component
{
    public $form = [
        'name'                  => '',
        'email'                 => '',
        'password'              => '',
        'password_confirmation' => '',
    ];

    public function submit()
    {
        $this->validate([
            'form.name'     => 'required|max:255|min:3',
            'form.email'    => 'required|email|max:255|min:3',
            'form.password' => 'required|max:255|min:3|confirmed',
        ], [
            'required' => ':attribute harus diisi',
            'email'    => ':attribute harus berupa email',
            'max'      => ':attribute maksimal 255 karakter',
            'min'      => ':attribute minimal 3 karakter',
        ], [
            'form.name'     => 'Nama',
            'form.email'    => 'Email',
            'form.password' => 'Password',
        ]);

        User::create($this->form);
        
        return redirect(route('login'));
    }
    public function render()
    {
        return view('livewire.register');
    }
}

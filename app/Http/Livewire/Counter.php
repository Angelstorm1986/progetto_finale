<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\User;

class Counter extends Component
{
    public $name;
    public $surname;
    public $email;
    public $date_of_birth;
    public $address;
    public $password;
    public $password_confirmation;
 
    // protected $rules = [
    //     'name' => 'required|max:3',
    //     'email' => 'required|email',
    // ];
 
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName, [
            'name' => 'required|max:20',
            'surname' => 'required|max:20',
            'date_of_birth' => 'required',
            'address' => 'required',
            'password' => 'required|min:8|confirmed|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$/',
            'password_confirmation' => 'required|min:8|same:password|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$/'
        ]);
    }
 
    public function saveUser()
    {
        $validatedData = $this->validate([
            'name' => 'required|max:20', 
            'email' => 'required|email:rfc,dns', 
            'surname' => 'required|max:20',
            'date_of_birth' => 'required',
            'address' => 'required',
            'password' => 'required|min:8|confirmed|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$/',
            'password_confirmation' => 'required|min:8|same:password|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$/'
        ]);
        User::create($validatedData);
        return redirect()->to('/admin/developers');
    }
}

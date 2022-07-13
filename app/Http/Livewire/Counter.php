<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\User;

class Counter extends Component
{
        public $name;
        public $email;
     
        protected $rules = [
            'name' => 'required|max:3',
            'email' => 'required|email',
        ];
     
        public function updated($propertyName)
        {
            $this->validateOnly($propertyName);
        }
     
        public function saveUser()
        {
            $validatedData = $this->validate();
     
            User::create($validatedData);
        }
}

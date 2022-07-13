<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Counter extends Component
{
        public $name;
        public $email;
     
        public $rules = [
            'name' => 'required|min:3',
            'email' => 'required|email',
        ];
     
        public function updated($propertyName)
        {
            $this->validateOnly($propertyName, [
                'name' => 'required|min:3',
                'email' => 'required|email',
            ]);
        }
     
        public function saveContact()
        {
            $validatedData = $this->validate([
                'name' => 'required|min:3',
                'email' => 'required|email',
            ]);
     
            User::create($validatedData);
        }
}

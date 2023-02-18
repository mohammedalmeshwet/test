<?php

namespace App\Traits;

trait  RoleMessageValidtion
{

    public function getRolesSaveUser(){
        return [
            'email' => ['required','email','unique:users,email'],
            'phone' => ['unique:users,phone','numeric','phone_number','digits:10'],
            'password' => ['required','min:6','confirmed'],
        ];
    }

    public function getMessagesSaveUser(){
        return [
            'email.required' => 'You must enter the email',
            'email.unique' => 'The email is already used',
            'email.email' => 'Email is incorrect',
            'phone.unique' => 'The phone is already used',
            'phone.numeric' => 'The phone number must be numbers',
            'phone.phone_number' => 'The phone number must that start 09',
            'phone.digits' => 'You must enter a password greater than Ten numbers',
            'password.required' => 'You must enter the password',
            'password.min' => 'You must enter a password greater than six char',
            'password.confirmed' => 'Password must be reconfirmed',
        ];
    }

    public function getRulesPassword(){
        return [
            'current_password' => ['required','min:6'],
            'new_password' => ['required','min:6','confirmed']
        ];
    }

    public function getMessagesPassword(){
        return [
            'current_password.required' => 'You must enter the password',
            'current_password.min' => 'You must enter a password greater than six char',
            'new_password.required' => 'You must enter the password',
            'new_password.min' => 'You must enter a password greater than six char',
            'new_password.confirmed' => 'Password must be reconfirmed',
        ];
    }

    public function getRules(){
        return [
            'first_name' => ['required'],
            'last_name' => ['required'],
            'email' => ['required','email'],
            'phone' => ['required','numeric','phone_number','digits:10'],
        ];
    }

    public function getMessages(){
        return [
            'email.required' => 'You must enter the email',
            'email.unique' => 'The email is already used',
            'email.email' => 'Email is incorrect',
            'phone.required' => 'You must enter the phone',
            'phone.unique' => 'The phone is already used',
            'phone.numeric' => 'The phone number must be numbers',
            'phone.phone_number' => 'The phone number must that start 09',
            'phone.digits' => 'You must enter a password greater than Ten numbers'
        ];
    }

    public function getRulesRegisterByEmail(){
        return [
            'email' => ['required','email','unique:users,email'],
            'password' => ['required','min:6','confirmed'],
        ];
    }

    public function getMessagesRegisterByEmail(){
        return [
            'email.required' => 'You must enter the email',
            'email.unique' => 'The email is already used',
            'email.email' => 'Email is incorrect',
            'password.required' => 'You must enter the password',
            'password.min' => 'You must enter a password greater than six char',
            'password.confirmed' => 'Password must be reconfirmed',
        ];
    }

    public function getRulesRegisterByPhone(){
        return [
            'phone' => ['required','unique:users,phone','numeric','phone_number','digits:10'],
            'password' => ['required','min:6','confirmed'],
        ];
    }

    public function getMessagesRegisterByPhone(){
        return [
            'phone.required' => 'You must enter the phone',
            'phone.unique' => 'The phone is already used',
            'phone.numeric' => 'The phone number must be numbers',
            'phone.phone_number' => 'The phone number must that start 09',
            'phone.digits' => 'You must enter a password greater than Ten numbers',
            'password.required' => 'You must enter the password',
            'password.min' => 'You must enter a password greater than six char',
            'password.confirmed' => 'Password must be reconfirmed',
        ];
    }
}

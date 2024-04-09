<?php

class User extends Model
{
    public $errors= [];
    protected $table = 'user';
    protected $allowedColumns = [
        'username',
        'email',
        'password',
        'date',
        'role',
    ];

    public function validate($data)
    {
        $this->errors = [];

        if(empty(trim($data['username'])))
        {
            $this->errors['username']='Please enter your Username';
        }
        if(empty(trim($data['email'])))
        {
            $this->errors['email']='Please enter your email';
        }
        elseif(!filter_var(trim($data['email']), FILTER_VALIDATE_EMAIL) )
        {
              $this->errors['email'] = "Please, enter valid email!";
        }
        if(empty(trim($data['password'])))
        {
            $this->errors['password'] = "Please, enter your password";
        }

        if(empty($this->errors))
        {
            return true;
        }
        return false;
    }
}
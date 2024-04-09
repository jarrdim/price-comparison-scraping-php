
<?php

class Signup extends Controller
{
    public function index()
    {
        //instatiating a user class that is model the database table called user
        $user = new User();
        

        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            if($user->validate($_POST))
            {
                //1 role stands for user and 2 admin
                $_POST['role'] = '1';
                $_POST['date'] = date('Y:m:d H:i:s');
                $user->insert($_POST);
                redirect('login');

                
            } 
        }

        $data['errors'] = $user->errors;
        $this->view('signup',$data);
      
    }

   

}
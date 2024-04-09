
<?php

class Login extends Controller
{
    public function index()
    {
       
        $data['title'] = "login";
        $data['errors'] = [];
        //instatiating a user class that is model the database table called user
        $user = new User();
        
        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
           
        
                $arr['email']= trim($_POST['email']);
                $row = $user->first($arr);
                if($row)
                {         
                    if($_POST['password'] == $row->password)
                    {
                        $id = $row->role;
                        $sql = "select role from roles where id =:id limit 1";
                        $role = $user->query($sql,['id'=>$id]);
                        if($role)
                        {
                            $row->role_name = $role[0]->role;
                        }
                        else
                        {
                            $row->role_name = '';
                        }
                
                        Auth::authenticate($row);
                        redirect('home');
                    }
                }

                
            $data['errors']['email'] = "Incorrect email or password!";
        }
 
        $this->view('login',$data);
      
    }

   

}
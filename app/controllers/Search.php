
<?php

class Search extends Controller
{
    public function index()
    {  
         $data = [];
        $data['title'] = 'search';
        $detail = new Detail_model();
        if($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['text']))
        {
        $regNo= (trim($_POST['text']));
        
        //$result = $detail->findAll($data);
         $sql = "SELECT * FROM details WHERE regNo LIKE :regNo";
        $stmt = $detail->conn()->prepare($sql);
        $stmt->bindValue(':regNo', "%$regNo%");

        // Execute the query and get the results
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if($result)
        {
             $result = $result;
           
        }
        else{
             $result =  "no item";
        }
        echo json_encode($result);
        die;
    }
       $this->view('search',$data);
    }

}
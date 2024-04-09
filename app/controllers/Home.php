<?php

class Home extends Controller
{
    public function index()
    {
       
        $data['title'] = "home";
        $data['errors'] = [];
        $data['keyword'] = "";


        if($_SERVER['REQUEST_METHOD'] == "POST" && !empty($_POST['keyword']))
        {
            $keyword = trim($_POST['keyword'])?? "";
            $data['jumia'] = $this->scrapeJumiaProduct($keyword);
            $data['jiji'] = $this->scrapeJijiProduct($keyword);
            $data['ebay'] = $this->ebay($keyword);
            $data['keyword'] = $keyword;

         
        }
      
 
        $this->view('home',$data);
      
    }

   

}
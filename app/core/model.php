<?php

class Model extends Db
{
    public $order ="desc";
    public function insert($data)
    {
        //unwanted
        if(!empty($this->allowedColumns))
        {
            foreach ($data as $key => $value) {
   
              if(!in_array($key, $this->allowedColumns))
              {
                unset($data[$key]);
              }
            }
        }
        $keys = array_keys($data);
        // insert into users username, date values(:username,:date)
        $sql = "insert into $this->table ";
        $sql .="(".implode(", ",$keys).") values(:".implode(", :",$keys).")";  
 
        $this->query($sql,$data);
    }

    public function where($data)
    {
      $sql = "select * from $this->table where ";
       foreach ($data as $key => $value) {
        $sql .= "".$key." = :$key" ." && ";

      }
      $sql = trim($sql,'&& ');
    
      $result = $this->query($sql, $data);
      if($result && count($result)>0)
      {
        return $result;
        
      }
      return false;
    }

    public  function findAll()
    {
      //select * from users 
      $sql = "select * from $this->table order by id $this->order";

      $result = $this->query($sql);
      if(is_array($result) && count($result)>0)
      {
        return $result;
      }
      return false;
    }
    public function delete($data)
    {
      $sql = "delete from $this->table where ";
      foreach ($data as $key => $value) 
      {
        $sql .= "".$key." = :$key" ." && ";
       
      }
      $sql = trim($sql,' &&' );
      $sql .=" limit 1";
      //echo $sql;die;
     

      $this->query($sql, $data);
      return true;

    }
    public function first($data)
    {
      $sql = "select * from $this->table where ";

      foreach ($data as $key => $value) {
        $sql .= "".$key."= :$key" ." &&";
      }
      $sql = trim($sql,'&&');
      $sql .= "order by id $this->order limit 1" ;


      $result = $this->query($sql,$data);
      if(is_array($result) && count($result)>0)
      {
        return $result[0];
      }
      return false;

    }
    
    public function update($id, $data)
    { 
    
         // removing unwanted
        if(!empty($this->allowedColumns))
        {
            foreach ($data as $key => $value) {
                if(!in_array($key, $this->allowedColumns))
                {
                    unset($data[$key]);
                }
            }
        }
        //implode function would work in ths situation
        $keys = array_keys($data);
        $sql = "update $this->table set ";
       foreach ($keys as $key) {
            $sql .= $key." =:".$key.", ";
       }
            $sql = trim($sql, ', ');
            $sql .= " where id = :id";



           $data['id']=$id;
           

        $this->query($sql,$data);

      

        //update users set username = :username where id = :id;
    
    }
}
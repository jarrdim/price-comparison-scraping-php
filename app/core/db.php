<?php

class Db
{
    private function connect()
    {
        $string = "mysql:host=".DBHOST.";dbname=".DBNAME;
        $conn = new PDO($string, DBUSER,DBPASS);
        return $conn;

    }
    public function conn()
    {
        return $this->connect();
    }
    public function query($query, $data=[], $type = 'object')
    {
        $con = $this->connect();
        $stmt = $con->prepare($query);
        if($stmt)
        {
            $check = $stmt->execute($data);
            if($check)
            {
                if($type == 'object')
                {
                    $type = PDO::FETCH_OBJ;
                }
                else
                {
                    $type = PDO::FETCH_ASSOC;
                }

                $result = $stmt->fetchAll($type);
                if(is_array($result) && count($result)>0)
                {

                    return $result;
                }
            }
        }
        return false;
    }
}
<?php

class Db
{
    private $db_host;
    private $db_login;
    private $db_pw;
    private $db_name;
    // private $link;


    public function __construct()
    {
        $this -> db_host = '127.0.0.1';
        $this -> db_login = 'parsers';
        $this -> db_pw = 'parsers';
        $this -> db_name = 'testdrive';
    }

    public function getConnection()
    {
        if(!$this->link)
            $this -> link = mysqli_connect($this -> db_host, $this -> db_login,
                                           $this -> db_pw, $this -> db_name) 
            or die (mysqli_connect_error());
        return $this->link;
    }

    private function updateCounter()
    {   
        $sql = "UPDATE counter 
                SET Counter = Counter +1 
                WHERE id = 1;";

        mysqli_query($this->getConnection(), $sql)
        or die (mysqli_error());
    }

    public function countCourse($course)
    {
        $counter = $this->getCounter();
        if ($counter < 100000 && $counter > 0){
            $course = $course - $counter*0.00005;
            return $course;
        }
        $course = $course - $counter*0.00005 -0.00001;
        return $course;
    }

    public function getCounter()
    {
        $sql = "SELECT Counter 
                FROM counter 
                WHERE id = 1;";
        $q = mysqli_query($this->getConnection(), $sql)
               or die (mysqli_error());
        $result = mysqli_fetch_assoc($q);
        return $result['Counter'];
    }

    public function click($rate)
    {
        $this->updateCounter();
        $counter = $this->getCounter();
        $course = $this->countCourse($rate);
        return round($course, 4);
    }
}

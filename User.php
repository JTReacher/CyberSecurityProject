<?php

include('db_login.php');


class User
{


    private $studentName;
    private $studentNumber; //TODO: Brookes student number. Will be validated to ensure it's unique
    private $password;
    //TODO: No, use student number as a foreign key in a UsersModulesTable with many to one relationship

    
    function __construct($studentName, $studentNumber, $password)
    {
        $this->studentName = $studentName;
        $this->studentNumber = $studentNumber;
        $this->password = $password;
    }


    function getStudentName()
    {
        return $this->studentName;
    }
    function setStudentName($studentName)
    {
        $this->studentName = $studentName;
    }
    function getStudentNumber()
    {
        return $this->studentNumber;
    }
    function setStudentNumber($studentNumber)
    {
        $this->studentNumber = $studentNumber;
    }
    function getPassword()
    {
        return $this->password;
    }
    function setPassword($password)
    {
        $this->password = $password;
    }


    





}

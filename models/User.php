<?php
class User
{


    private $studentName;
    private $studentNumber; //Brookes student number. Will be validated to ensure it's unique
    private $password;
    private $modules = [];
    
    //calculated from other table
    private $totalCreditsAchieved;
    private $qualificationAward;
    private $averageMark;
    private $meritDistinctionOrPass;

    //TODO: Write constructor

    function getStudentName($studentName)
    {
        return $this->$studentName;
    }
    function setStudentName($studentName)
    {
        $this->studentName = $studentName;
    }
    function getStudentNumber($studentNumber)
    {
        return $this->$studentNumber;
    }
    function setStudentNumber($studentNumber)
    {
        $this->studentNumber = $studentNumber;
    }
    function getPassword($password)
    {
        return $this->$password;
    }
    function setPassword($password)
    {
        $this->password = $password;
    }

    //TODO: fix the logic arround the array
    //Will need to get and set the modules as a list
    function getModules($modules)
    {
        return $this->$modules;
    }
    function setModules($modules)
    {
        $this->modules = $modules;
    }
    









}

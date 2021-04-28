<?php

include('db_login.php');

class User
{


    private $studentName;
    private $studentNumber; //TODO: Brookes student number. Will be validated to ensure it's unique
    private $password;
    //TODO: No, use student number as a foreign key in a UsersModulesTable with many to one relationship
    
    
    //calculated from other table
    private $totalCreditsAchieved;
    private $qualificationAward;
    private $averageMark;
    private $meritDistinctionOrPass;

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

    //TODO: fix the logic arround the array
    //Will need to get and set the modules as a list
    function getModules()
    {
        return $this->modules;
    }
    function setModules($modules)
    {
        $this->modules = $modules;
    }

   /*  private $totalCreditsAchieved;
    private $qualificationAward;
    private $averageMark;
    private $meritDistinctionOrPass; */

    function get


    /*
    TODO: Implement

    1. How many A, B, C or F grades have been obtained by a student?
    -> SQL query returning this info as a  count
    2. How many credits have been earned by student? i.e. sum credits of passing modules
    3. What is the award qualification? Based on number of credits achieved apparently
    - 180 credits for  MSc computing Science
    - 120 credits for PG Diploma in computing
    4. Total average marks of all of the modules
    5. Based on the average marks, classify  the degree as pass, merit or distinction
        -See the brief for further conditions
    */





}

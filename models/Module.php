<?php

class module {

    const TotalMarksAvailable = 100;

    
    private $moduleId;
    private $markAchieved;



    //I may have to add these after defining those functions??
    //Write separate functions for these and then call the functions to set the variables
    private $credits; //Assign credits based on module code and passorfail.
    private $moduleName; // Assign based on provided id. Logic to fetch from db.
    private $grade; //assign grade based on marks
    private $pass; // boolean assigned based on grade

    //TODO: Write constructor
    function __construct($moduleId, $markAchieved)
    {
        $this->$moduleId = $moduleId;
        $this->$markAchieved = $markAchieved;
    }
    

    //getters/setters - Remove the surplus setters when you're confident
    public function getModuleName($moduleName){
        return $this->$moduleName;
    }
    public function setModuleName($moduleName)
    {
        $this->$moduleName = $moduleName;
    }
    public function getModuleId($moduleId)
    {
        return $this->$moduleId;
    }
    public function setModuleId($moduleId)
    {
        $this->$moduleId = $moduleId;
    }
    public function getMarkAchieved($markAchieved)
    {
        return $this->$markAchieved;
    }
    public function setMarkAchieved($markAchieved)
    {
        $this->$markAchieved = $markAchieved;
    }



    public function setPass($markAchieved) {
        if ($markAchieved>=50) {
            $pass = true;
        }else {
            $pass = false;
        }
    }

    public function getPass($pass) {
        return $this->$pass;
    }

    public function setGrade($markAchieved) {

        if ($markAchieved >= 70) {
            $grade = 'A';
        }elseif ($markAchieved >= 60 && $markAchieved < 70) {
            $grade = 'B';
        }elseif ($markAchieved >= 50 && $markAchieved < 60) {
            $grade = 'C';
        }else {
            $grade = 'F';
        }
    }

   /*  private $credits; //Assign credits based on module code and pass.
    private $grade; //assign grade based on marks
    private $pass; // Assign based on grade
    private $moduleName; // Assign based on provided id. Logic to fetch from db. */
    

}
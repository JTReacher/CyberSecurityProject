<?php

class module {

    const TotalMarksAvailable = 100;

    
    private $moduleId;
    private $markAchieved;

    //Write separate functions for these and then call the functions to set the variables
    private $credits; //Assign credits based on module code and passorfail.
    private $grade; //assign grade based on marks
    private $passOrFail; // Assign based on grade
    private $moduleName; // Assign based on provided id. Logic to fetch from db.


    //TODO: Write constructor
    function __construct($moduleId, $markAchieved)
    {
        $this->$moduleId = $moduleId;
        $this->$markAchieved = $markAchieved;
    }

    //getters/setters - Remove the surplus setters when you're confident
    function getModuleName($moduleName){
        return $this->$moduleName;
    }
    function setModuleName($moduleName)
    {
        $this->$moduleName = $moduleName;
    }
    function getModuleId($moduleId)
    {
        return $this->$moduleId;
    }
    function setModuleId($moduleId)
    {
        $this->$moduleId = $moduleId;
    }
    function getMarkAchieved($markAchieved)
    {
        return $this->$markAchieved;
    }
    function setMarkAchieved($markAchieved)
    {
        $this->$markAchieved = $markAchieved;
    }

   /*  private $credits; //Assign credits based on module code and passorfail.
    private $grade; //assign grade based on marks
    private $passOrFail; // Assign based on grade
    private $moduleName; // Assign based on provided id. Logic to fetch from db. */


    

}
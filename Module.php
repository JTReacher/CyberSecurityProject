<?php


class Module {

    const TotalMarksAvailable = 100;

    private $studentNumber; //Id of the student who is inputting this info
    private $moduleId;
    private $markAchieved;
    private $credits; //Assign credits based on module code and passorfail.
    private $moduleName; // Assign based on provided id. Logic to fetch from db.
    private $grade; //assign grade based on marks
    private $pass; // boolean assigned based on grade
    //When you pass the model to the controller call these methods to set the values

    //TODO: Write constructor
    function __construct($moduleId, $markAchieved, $studentNumber)
    {
        $this->moduleId = $moduleId;
        $this->markAchieved = $markAchieved;
        $this->studentNumber = $studentNumber;
    }
    

    //getters/setters - Remove the surplus setters when you're confident
   
    public function getModuleId()
    {
        return $this->moduleId;
    }
    public function setModuleId($moduleId)
    {
        $this->moduleId = $moduleId;
    }
    public function getMarkAchieved()
    {
        return $this->markAchieved;
    }
    public function setMarkAchieved($markAchieved)
    {
        $this->markAchieved = $markAchieved;
    }
    public function getStudentNumber()
    {
        return $this->studentNumber;
    }
    public function setStudentNumber($studentNumber)
    {
        $this->studentNumber = $studentNumber;
    }

    public function setPass($markAchieved) {
        if ($markAchieved>=50) {
            $this->pass = true;
        }else {
            $this->pass = false;
        }
    }

    public function getPass() {
        return $this->pass;
    }

    public function setGrade($markAchieved) {

        if ($markAchieved >= 70) {
            $this->grade = 'A';
        }elseif ($markAchieved >= 60 && $markAchieved < 70) {
            $this->grade = 'B';
        }elseif ($markAchieved >= 50 && $markAchieved < 60) {
            $this->grade = 'C';
        }else {
            $this->grade = 'F';
        }
    }

    public function getGrade()
    {
        return $this->grade;
    }

    public function setCredits($moduleId){

        if ($moduleId == 'TECH7009') {
            $this->credits = 60;
        } elseif ($moduleId == 'DALT7002') {
            $this->credits = 10;
        } elseif ($moduleId == 'DALT7011') {
            $this->credits = 10;
        } else {
            $this->credits = 20;
        }
    }

    public function getCredits()
    {
        return $this->credits;
    }

    public function getModuleName()
    {
        return $this->moduleName;
    }
    public function setModuleName($moduleId)
    {
        switch ($moduleId) {
            case 'COMP7001':
                $this->moduleName = 'Object-Oriented Programming';
                break;
            case 'COMP7002':
                $this->moduleName = 'Modern Computer Systems';
                break;
            case 'TECH7005':
                $this->moduleName = 'Research, Scholarship and Professional Skills';
                break;
            case 'DALT7002':
                $this->moduleName = 'Data Science Foundations';
                break;
            case 'DALT7011':
                $this->moduleName = 'Introduction to Machine Learning';
                break;
            case 'SOFT7003':
                $this->moduleName = 'Advanced Software Development';
                break;
            case 'TECH7004':
                $this->moduleName = 'Cyber Security and the Web';
                break;
            default:
                $this->moduleName = 'MSc Dissertation in Computing Subjects';
                break;
        }
        
    }

    

}
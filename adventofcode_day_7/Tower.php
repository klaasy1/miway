<?php

/*
* This class holds all the programs and its children
*/
class Tower{

    private $programArrayList = Array();
    private $programChildArrayList = Array(); //Temporay holds all the children to be used when updating programArrayList

    function __construct($programs, $programChildren){
        $this->programArrayList = $programs;
        $this->programChildArrayList = $programChildren;
    }

    //Gettors and Setters
    public function getProgramList(){
        return $this->programArrayList;
    }

    public function setProgramList($programList){
        $this->programArrayList = $programList;
    }

    public function getProgramChildList(){
        return $this->programChildArrayList;
    }

    public function setProgramChildList($programList){
        $this->programChildArrayList = $programList;
    }

    /*
    * Adds a program to the programChild ArrayList
    * @param $program and instance of program
    */
    public function addProgramChild($program){
        $this->programChildArrayList[] = $program;
    }

    /*
    * Adds a program to the program ArrayList
    * @param $program and instance of program
    */
    public function addProgram($program){
        $this->programArrayList[] = $program;
    }

    /*
    * This function removes the child that has been found in the programArrayList for faster iteration
    * @param $index of the programChild ArrayList 
    */
    public function removeProgramChild($index){
        unset($this->programChildArrayList[$index]);
    }

    /*
    * This function echos the name of the bottom program
    * @param $programArrayList an ArrayList of printPrograms
    */
    public function getBottom($programArrayList){
        foreach($programArrayList as $program):
            if($program->getParentName() == null)
                echo "The name of the bottom program is: ".$program->getName()."\n";
        endforeach;
    }

    /*
    * This function updates all the programs with their parents
    * @param $programList program Array List
    * @param $programChildList program child Array List
    */
    public function updateProgramList($programList = Array(), $programChildList = Array()){
        for($i = 0; $i < sizeof($programList); $i++){
            //User for each since at every iteration we unset the key for faster execution
            foreach($this->programChildArrayList as $key => $value):
                if($programList[$i]->getName() == $programChildList[$key]->getName()){
                    $this->programArrayList[$i]->setParentName($programChildList[$key]->getParentName());
                    //echo $i.": ".$programList[$i]->getName()." = ".$programChildList[$key]->getName()." Size: ".sizeof($this->getProgramChildList())."\n";
                    unset($this->programChildArrayList[$key]);
                }
            endforeach;
        }
    }

}

?>
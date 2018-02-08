<?php

//The register class
class Register{

    //Don't need getters and setter if your instance variables are public
    public $name = "";
    public $incOrDec = null;
    public $incOrDecAmount = 0;
    public $if = "if";
    public $OtherRegisterName = "";
    public $operater = "";
    public $valueToCheck = 0;
    public $value = 0;

    /*
    * This function returns true if the condition passes
    * @Param $otherRegisterValue
    * @return returns a booolen value
    */
    public function isExecutable($otherRegisterValue){

        $flag = false;

        switch($this->operater){
            case '==':
                if($otherRegisterValue == $this->valueToCheck)
                    $flag = true;
            break;
            case '!=':
                if($otherRegisterValue != $this->valueToCheck)
                    $flag = true;
            break;
            case '>':
                if($otherRegisterValue > $this->valueToCheck)
                    $flag = true;
            break;
            case '<':
                if($otherRegisterValue < $this->valueToCheck)
                    $flag = true;
            break;
            case '>=':
                if($otherRegisterValue >= $this->valueToCheck)
                    $flag = true;
            break;
            case '<=':
                if($otherRegisterValue <= $this->valueToCheck)
                    $flag = true;
        }

        return $flag;

    }

    /*
    * This function is used to calculate the instruction if isExecutable returns true
    * @Param $otherRegister receives another register as a parameter
    */
    public function execute($otherRegister){
        if($otherRegister->incOrDec == 'inc')
            $this->value = $this->value + ($otherRegister->incOrDecAmount);
        else
            $this->value = $this->value - ($otherRegister->incOrDecAmount);
    }

}

?>
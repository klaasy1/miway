<?php

    //Use for debugging
    //error_reporting(E_ALL);
	//ini_set("display_errors", 1);

    include_once('Register.php');

    $myfile = fopen("input.txt", "r") or die("Unable to open file!");
    // Output one line until end-of-file

    $registerArrayList = Array(); //Holds the actual registers
    $instructionsArrayList = Array(); //stores the registers with their instructions

    //load Register values
    while(!feof($myfile)) {

        $register = new Register();

        $line = fgets($myfile);

        if($line != ""){

            $pieces = explode(" ", $line);

            $register->name = $pieces[0];
            //Store each register by its name as key, beauty of php
            $tmpRegister = new Register();            
            $tmpRegister->name = $pieces[0];

            $registerArrayList[$pieces[0]] = $tmpRegister;
            unset($tmpRegister);

            $register->incOrDec = $pieces[1];
            $register->incOrDecAmount = $pieces[2];
            $register->if = $pieces[3];
            $register->OtherRegisterName = $pieces[4];
            $register->operater = $pieces[5];
            $register->valueToCheck = trim($pieces[6]);

            $instructionsArrayList[] = $register;

        }
    }

    foreach($instructionsArrayList as $instruction):

        if($instruction->isExecutable($registerArrayList[$instruction->OtherRegisterName]->value)){
            $registerArrayList[$instruction->name]->execute($instruction);
        }
    endforeach;

    $largestValue = -50000000;
    $registerName = "";
    foreach($registerArrayList as $key => $value):
        if($value->value > $largestValue){
            $largestValue = $value->value;
            $registerName = $value->name;
        }
    endforeach;

    echo "The largest value in any register is: ".$largestValue."\n";
    echo "The name of the largest register value is: ".$registerName."\n";

    fclose($myfile);

?>
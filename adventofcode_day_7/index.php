<?php

    //Use for debugging
    //error_reporting(E_ALL);
	//ini_set("display_errors", 1);

    include_once("Program.php");
    include_once("Tower.php");

    $myfile = fopen("input.txt", "r") or die("Unable to open file!");
    // Output one line until end-of-file

    $tower = new Tower([], []);

    while(!feof($myfile)) {

        $line = fgets($myfile);

        if($line != ""){

            $pieces = explode("->", $line);

            $tmppieces = explode(" ", $pieces[0]);

            $name = trim($tmppieces[0]); //Parent
            $tmpSize = str_replace('(', '', $tmppieces[1]);
            $size = str_replace(')', '', $tmpSize);
            $parent_name = '';
            $children = null;

            $program = new Program($name, $size, $parent_name, $children);

            if(isset($pieces[1])){

                $children_pieces = explode(", ", $pieces[1]);

                $tmp_children = Array();

                foreach($children_pieces as $child){

                    $sub_children = null;

                    $sub_program = new Program(trim($child), 0, $program->getName(), $sub_children);

                    $tmp_children[] = $sub_program;

                    $tower->addProgramChild($sub_program); //Keep record of every child of the program

                }

                $program->setChildren($tmp_children);
            }

            $tower->addProgram($program); //Add every program to the program to the tower

        }
    }

    $tower->updateProgramList($tower->getProgramList(), $tower->getProgramChildList());
    $tower->getBottom($tower->getProgramList());

    fclose($myfile);

?>
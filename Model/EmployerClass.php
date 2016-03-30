<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class EmployerClass
{
    private $EmployerID;
    private $EmployerName;
    private $EmployerNum;
    private $EmployerComp;
    private $EmployerEmial;
    
    public function __construct($name, $empNum, $empComp, $email, $empID = NULL) 
        {
            $this->setID($empID);
            $this->setName($name);
            $this->setEmail($email);
            $this->setNumber($empNum);
            $this->setCompany($empComp);
            
            
        }
        
        public function getID(){return $this->EmployerID;}
        public function getName(){return $this->EmployerName;}
        public function getEmail(){return $this->EmployerEmail;}
        public function getNumber(){return $this->EmployerNum;}
        public function getCompany(){return $this->EmployerComp;}
        
        public function setID($empID){$this->EmployerID=$empID;}
        public function setName($name){$this->EmployerName=$name;}
        public function setEmail($email){$this->EmployerEmail=$email;}
        public function setNumber($empNum){$this->EmployerNum=$empNum;}
        public function setCompany($empComp){$this->EmployerComp=$empComp;}
        
        
}
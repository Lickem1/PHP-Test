<?php

	class MarriageCert {
		var $person1;
		var $person2;

		function getPartner($par1) {
			if($this->person1->name == $par1) {
				return $this->person2;
			} else return $this->person1;
		}
		function __construct($par1,$par2) {
			$this->person1 = $par1;
			$this->person2 = $par2;
			$this->person1->setMarriage($this);
			$this->person2->setMarriage($this);
		}
	}
	
	class Person {
	    var $name;
	    var $age;
	    var $gender;
	    var $marriage;
	    
	    function setMarriage($marr) {
	    	return $this->marriage = $marr;
	    }
	    
	    function marriageStatus() {
	    	if(isset($this->marriage)) {
	    		$partner = $this->marriage->getPartner($this->name);
	    		return "The person {$this->name}, is currently happily married to the {$partner->gender} {$partner->name}.";
	    	} else {
	    		return "{$this->name} is {$this->age} years old and would love to be married but no one will love them because they can't code :(";
	    	}
	    }
		function __construct($par1, $par2, $par3) {
			$this->name = $par1;
			$this->age = $par2;
			$this->gender = $par3;
		}
		
		
	}

	$john = new Person("John Doe", 12, "Male");
	$alice = new Person("Alice Doe", 12, "Female");
	$lickem = new Person("Lickem", 21, "Male");

	$newMarriage = new MarriageCert($john, $alice);
	
	echo $john->marriageStatus()."\n";
	echo $alice->marriageStatus(). "\n";
	echo $lickem->marriageStatus();
?>

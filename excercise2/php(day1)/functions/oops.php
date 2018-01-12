<?php

 		if (isset($_POST['counter']) && $_POST['counter']!=11) {
			$counter = ++$_POST['counter'];

		} else {
			$counter = 0;
	
		}

	function getTitle() {
		echo "12 Days of Christmas";
	}

	function getLyrics($counter) {
		$days = [
			"first",
			"secod",
			"third",
			"fourth",
			"fifth",
			"sixth",
			"seventh",
			"eight",
			"ninth",
			"tenth",
			"eleventh",
			"twelfth",
		];
		$gifts = [
			"A Partridge in a Pear Tree",
			"Two Turtle Doves",
			"Three French Hens",
			"Four Calling Birds",
			"Five Golden Rings",
			"Six Geese a Laying",
			"Seven Swans a Swimming",
			"Eight Maids a Milking",
			"Nine Ladies Dancing",
			"Ten Lords a Leaping",
			"Eleven Pipers Piping",
			"12 Drummers Drumming",
		];

		echo "<p>On the ".$days[$counter]." day of Christmas my true love sent to me, ";
		$lyrics = "";
		for ($i=0; $i<=$counter; $i++) {
			if($i==0)
				$lyrics .= $gifts[$i].".";
			elseif($i==1)
				$lyrics = $gifts[$i] . ", and " . $lyrics;
			else
				$lyrics = $gifts[$i] . ", " . $lyrics;
		}
		echo strtolower($lyrics)."</p>";
	}

?>
<?php
	function date_br($date) {
		return date_create($date);
		return date('d/m/Y', strtotime($date));
	}
	

	print_r ( date_br('a') );
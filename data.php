<?php

	$blob = file_get_contents('data.xml');
	
	$DOMDocument = new DOMDocument('1.0', 'UTF-8');
   	$DOMDocument->preserveWhiteSpace = false;
   	$DOMDocument->loadXML($blob);   	

	var_dump($DOMDocument->childNodes);

   	function fc($node) {
	  $child = $node->childNodes;
	  foreach($child as $item) {
	    if ($item->nodeType == XML_TEXT_NODE) {
	      if (strlen(trim($item->nodeValue))) echo trim($item->nodeValue)."<br/>";
	    }
	    else if ($item->nodeType == XML_ELEMENT_NODE) fc($item);
	  }
	}

	fc($DOMDocument->documentElement);
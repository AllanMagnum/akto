<?php
class Util{
	
	function multi_implode($pieces, $glue, $glue2 = null) {
		foreach ( $pieces as $piece ) {
			if (is_array ( $piece )) {
				$retVal [] = multi_implode ( $piece, $glue, $glue2 );
			} else {
				if ($glue2 == null) {
					$retVal [] = $piece;
				} else {
					$retVal [] = implode ( $glue2, $pieces );
					break;
				}
			}
		}
		return implode ( $glue, $retVal );
	}
	
}
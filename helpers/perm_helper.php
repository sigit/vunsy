<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('perm_chck')){
	
	function perm_chck($perms=''){
		
		// trimming the permission of spaces 
		$perms = trim($prems);
		
		// checking if it's not empty and not null then perform the evaluation
		if($perms!="" and $perms!=NULL ){
				
				// add the ; to the end if not there
				if($perms[-1] != ';') $perms .= ';';
				
				// making the premission expression 
				$expression = '$condition = '.$perms;
				
				//evaluating the expression
				@eval($expression);
				
		}
		
		// if the expression evaluated then condition isset
		$result = (isset($condition)==TRUE)? $result = $condition : $result = FALSE;
		// if the result is NOT boolean then make it FALSE
		$result = ($result==TRUE OR $result==FALSE)? $result : FALSE;
		// if the user is root then the result would be TRUE
		$result = ($this->session->userdata('level')==-1)? TRUE : $result;
		
		
		return $result;
	}
}
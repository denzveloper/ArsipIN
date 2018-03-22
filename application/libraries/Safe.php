<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Safe extends CI_Model{
	//anti inject
	function inject($string){
		$result = addslashes(trim($string));
		return $result;
	}
	//enkripsi data
	function convert($string,$key){
		$str=strval($string);
		$ky=strrev($key);
		$ky=str_replace(chr(32),'',$ky);
		$kl=strlen($ky)<32?strlen($ky):32;
		$k=array();for($i=0;$i<$kl;$i++){
		$k[$i]=ord($ky{$i})&0x1F;}
		$j=0;for($i=0;$i<strlen($str);$i++){
		$e=ord($str{$i});
		$str{$i}=$e&0xE0?chr($e^$k[$j]):chr($e);
		$j++;$j=$j==$kl?0:$j;}
		return addslashes(trim($str));
	}
}
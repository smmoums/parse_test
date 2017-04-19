<?php
	const LONGTH = 3;
	const SIZE   = 5;
	
	$code   = isset( $_REQUEST["code"] ) ? $_REQUEST["code"] : 1 ;
	$longth = isset( $_REQUEST["longth"] ) ? $_REQUEST["longth"] : LONGTH ;	
	$size   = isset( $_REQUEST["size"] ) ? $_REQUEST["size"] : SIZE ;	
	switch ( $code )
	{
		//数字
		case 1:
		$data = create_num( $longth );
		print $data;
		break;
		
		//数字数组
		case 2:
		$data = create_array( $size );
		print json_encode ( $data );
		break;
		
		//两个数字为单元的二维数组
		case 3:
		$data = create_darray ( $size,$longth ); 
		print json_encode( $data );
		break;
		
	    default:
		print "unbelievable error";
	}
	
	function create_num ( $longth = LONGTH )
	{
		$size = rand(0,pow(10,$longth));
		return $size;
	}
	
	function create_array ( $size = SIZE,$longth = LONGTH )
	{
		$array =array();
		for ($i=0;$i<$size;$i++)
		{
			$array[]=create_num( $longth );
		}
		return $array;
	}
	
	function create_darray( $size = SIZE,$longth = LONGTH )
	{
		$array =array();
		for ($i=0;$i<$size;$i++)
		{
			$array[]=["x"=>create_num( $longth ),"y"=>create_num( $longth )];
		}
		return $array;
	}
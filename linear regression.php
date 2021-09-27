<?php

    //find all info using id 
    function lr($x,$d){
         
           // $x  =  array(1,2,3,4,5,6,7);
    	$y = $x;
	       $x = array(2015,2016,2017,2018,2019) ;
	
	$xy = array();
	$x2 = array();
	$n = 5;
	
	
	for($i=0;$i<$n;$i++){
		$x2[$i] = ($x[$i]*$x[$i]);
	}
    
	
	for($i=0;$i<$n;$i++){
		$xy[$i] = ($x[$i]*$y[$i]);
	}
	
	$sum = 0.0;
	
	for($i=0;$i<$n;$i++){
		$sum += $x[$i];
	}
	
	
	$sum_x = $sum;
	$summ = 0.0;
	
	for($i=0;$i<$n;$i++){
		$summ += $y[$i];
	}
	$sum_y = $summ;
	
	$summm = 0.0;
	
	for($i=0;$i<$n;$i++){
		$summm += $x2[$i];
	}
	$sum_x2 = $summm;
	
	$summmm = 0.0;
	
	for($i=0; $i<$n; $i++){
		$summmm += $xy[$i];
	}
	$sum_xy = $summmm;
	

	$p = $sum_xy*$n;
	$q = $sum_x*$sum_y;
	$r = $n*$sum_x2;
	$s = $sum_x*$sum_x;
	
	$a1 = ($p-$q)/($r-$s);
	
	$y_bar = $sum_y/$n;
	$x_bar = $sum_x/$n;
	
	$a0 = $y_bar - $a1*$x_bar;
	
	//echo "y = ".$a0 ." + " .$a1."x" ;
 

    
   

    $data=array(
      "x" => $x,
      "y" => $y,
      "price" => ($a0 + ($a1*$d )) 
    );


	return $data ;

    }


	
		


?>
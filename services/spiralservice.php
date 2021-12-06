<?php 
namespace App\services;




class spiralservice  {
	
  function __construct() {

  }
  

  function createSpiral($w, $h) {
   if ($w <= 0 || $h <= 0) return FALSE;

   $ar   = Array();
   $used = Array();

   // Establish grid
   for ($j = 0; $j < $h; $j++) {
    $ar[$j] = Array();
    for ($i = 0; $i < $w; $i++)
      $ar[$j][$i]   = '-';
  }

   // Establish 'used' grid that's one bigger in each dimension
  for ($j = -1; $j <= $h; $j++) {
    $used[$j] = Array();
    for ($i = -1; $i <= $w; $i++) {
      if ($i == -1 || $i == $w || $j == -1 || $j == $h)
       $used[$j][$i] = true;
     else
       $used[$j][$i] = false;
   }
 }

   // Fill grid with spiral
 $n = 0;
 $i = 0;
 $j = 0;
   $direction = 0; // 0 - left, 1 - down, 2 - right, 3 - up
   while (true) {
    $ar[$j][$i]   = $n++;
    $used[$j][$i] = true;

      // Advance
    switch ($direction) {
     case 0:
            $i++; // go right
            if ($used[$j][$i]) { // got to RHS
               $i--; $j++; // go back left, then down
               $direction = 1;
             }
             break;
             case 1:
           $j++; // go down
           if ($used[$j][$i]) { // got to bottom
               $j--; $i--; // go back up, then left
               $direction = 2;
             }
             break;
             case 2:
            $i--; // go left
            if ($used[$j][$i]) { // got to LHS
               $i++; $j--; // go back left, then up
               $direction = 3;
             }
             break;
             case 3:
            $j--; // go up
            if ($used[$j][$i]) { // got to top
               $j++; $i++; // go back down, then right
               $direction = 0;
             }
             break;
           }

       // if the new position is in use, we're done!
           if ($used[$j][$i])
             return $ar;
         }
       }

       
       public function print2DGrid($array) {
         foreach ($array as $row) {
           foreach ($row as $col) {
            print sprintf("% 2d ", $col);
          }
          print "\n";
        }
      }




    }


  ?>
<?php
$fact = 1;
$N = 10;
$res = 0;
while ($N>1){
  $fact*=$N;
  $N--;
}
echo "$fact <br/>";
$c = (string)$fact;
// $i= strlen($c);
// echo "$i <br/>";
for ($i= strlen($c)-1; $i >1 ; $i--) { 
  if ($c[$i] == 0){
    $res++;
  }
  
}
echo $res;
?>
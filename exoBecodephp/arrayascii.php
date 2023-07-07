<?php

$arrayMonths = [11=>"A",12=>"B",13=>"C",14=>"D",15=>"E",16=>"F",17=>"G", 
                18=>"H", 19=>"I",20=>"J",21=>"K",22=>"L",23=>"M",24=>"N",25=>"O",26=>"P",27=>"Q",
                28=>"R",29=>"S",30=>"T",31=>"U",32=>"V",
                33=>"W",34=>"X",35=>"Y",36=>"Z"];

foreach($arrayMonths as $key =>$value)
{
  echo "L'indice $key vaut $value<br>";
}
echo "<br>Avec le code Ascii : <br><br>";
$asci = 65;
$arrayMonths = [11=>$asci,12=>$asci,13=>$asci,14=>$asci,15=>$asci,16=>$asci,17=>$asci, 
                18=>$asci, 19=>$asci,20=>$asci,21=>$asci,22=>$asci,23=>$asci,24=>$asci,
                25=>$asci,26=>$asci,27=>$asci,28=>$asci,29=>$asci,30=>$asci,31=>$asci,32=>$asci,
                33=>$asci,34=>$asci,35=>$asci,36=>$asci];

foreach($arrayMonths as $key =>$value)
{
  echo "L'indice $key vaut " . chr($asci) . "<br>";
  $asci++;
}

?>
<?php
//$todayDate = date("c");// current date	

//get current month and year
$curMonth = date('n');
$curYear  = date('Y');



if ($curMonth == 12)
    $firstDayNextMonth = mktime(0, 0, 0, 0, 0, $curYear+1);
else
    $firstDayNextMonth = mktime(0, 0, 0, $curMonth+1, 1);


$futureDate = date('Y-m-d',strtotime('+1 year',$firstDayNextMonth));
//add one year to the first day of that month
//$dateOneYearAdded = strtotime($firstDayNextMonth . "+1 years");
//$dateSend = date('c', $futureDate);
//echo $dateOneYearAdded;
echo strtotime($futureDate);
//echo $remove;
?>
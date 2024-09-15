<!DOCTYPE html>
<html>
<body>
<?php
require_once 'dbcon.php';
$sql = "SELECT * FROM jjall";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0){
	while($row = mysqli_fetch_array($result)) 
	{
		//printf ("%s (%s)\n", $row["id"], $row["b_date"]);
		//b_date should be produced from calendar data
		$date=$row["b_date"]; 
		$id=$row["id"];
		$dt=$row["dob"];
		$dob=extractDOB($dt);
		
		
		$dob_in_word=in_word_dob(ecodeDOB($date));
		
		mysqli_query($conn, "UPDATE jjall SET b_date_word='$dob_in_word', b_date='$dob' where id='$id'");
	} 
}
else{
	echo "0 results";
}


 
$conn->close();

	// Extract day, month, and year 2000-01-01 to 010100
	function extractDOB($dt=null){
		
		$date = date($dt); 
		$day = date('d', strtotime($date)); 
		$month = date('m', strtotime($date)); 
		
		$year = date('Y', strtotime($date)); 
		//echo "$year";
		$year = substr($year,2,3);
		return $day . $month . $year;
    }
		
	

	//010100
    function ecodeDOB($dob = null)
    {
        $day   = substr($dob, 0, 2);
        $month = substr($dob, 2, 2);
        $year  = intval(substr($dob, 4, 2));
        $year  += $year > 50 ? 1900 : 2000;
        return $day . '-' . $month . '-' . $year;
    }


	//01-01-2000
    function decodeDOB($dob = null)
    {
        $day   = substr($dob, 0, 2);
        $month = substr($dob, 3, 2);
        $year  = substr($dob, 8, 2);
        return $day . $month . $year;
    }



	//01-01-2000
    function in_word_dob($dob)
    {
        $day   = array('', 'First', 'Second', 'Third', 'Fourth', 'Fifth', 'Sixth', 'Seventh', 'Eighth', 'Ninth', 'Tenth', 'Eleventh', 'Twelfth', 'Thirteenth', 'Fourteenth', 'Fifteenth', 'Sixteenth', 'Seventeenth', 'Eighteenth', 'Nineteenth', 'Twentieth', 'Twenty First', 'Twenty Second', 'Twenty Third', 'Twenty Fourth', 'Twenty Fifth', 'Twenty Sixth', 'Twenty Seventh', 'Twenty Eighth', 'Twenty Ninth', 'Thirtieth', 'Thirty First');
        $month = array('', 'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');
        $str   = '';
        $str   .= $day[intval(substr($dob, 0, 2))];
        $str   .= ' ' . $month[intval(substr($dob, 3, 2))];
        $str   .= ' ' . (intval(substr($dob, 8, 2)) < 50 ? 'Two Thousand' : 'Nineteen Hundred');
        if (intval(substr($dob, 8, 2)) > 0) {
            $str .= ' and ' . in_word_english(intval(substr($dob, 8, 2)));
        }
        return $str;
    }




	//Any Number
    function in_word_english($number)
    {
        $ones = array('', 'One', 'Two', 'Three', 'Four', 'Five', 'Six', 'Seven', 'Eight', 'Nine', 'Ten', 'Eleven', 'Twelve', 'Thirteen', 'Fourteen', 'Fifteen', 'Sixteen', 'Seventeen', 'Eighteen', 'Nineteen');
        $tens = array('', '', 'Twenty', 'Thirty', 'Forty', 'Fifty', 'Sixty', 'Seventy', 'Eighty', 'Ninety');

        $word = '';
        //$number=intval($number);
        if ($number == 0) {
            return 'Zero ';
            exit;
        }
        if ($number > 9999999) {
            $dr     = floor($number / 10000000);
            $word   .= $dr > 0 ? in_word_english($dr) . 'Core ' : ' ';
            $number = $number - $dr * 10000000;
        }
        if ($number > 99999) {
            $dr     = floor($number / 100000);
            $word   .= $dr > 0 ? in_word_english($dr) . 'Lac ' : ' ';
            $number = $number - $dr * 100000;
        }
        if ($number > 999) {
            $dr     = floor($number / 1000);
            $word   .= $dr > 0 ? in_word_english($dr) . 'Thousand ' : ' ';
            $number = $number - $dr * 1000;
        }
        if ($number > 99) {
            $dr     = floor($number / 100);
            $word   .= $dr > 0 ? in_word_english($dr) . 'Hundred ' : ' ';
            $number = $number - $dr * 100;
        }
        if ($number > 19) {
            $dr   = floor($number / 10);
            $word .= $dr > 0 ? $tens[$dr] . ' ' . $ones[$number - $dr * 10] . ' ' : ' ';
        }
        if ($number > 0 && $number < 20) {
            $word .= $ones[$number] . ' ';
        }
        return $word;
    }






function spell($date){
	$days = array("FIRST", "SECOND", "THIRD", "FOURTH",'FIFTH','SIXTH',"SEVENTH","EIGHTH","NINTH","TENTH","ELEVENTH","TWELFTH","THIRTEENTH", "FOURTEENTH", "FIFTEENTH","SIXTEENTH","SEVENTEENTH","EIGHTEENTH","NINETEENTH","TWENTIETH","TWENTY FIRST","TWENTY SECOND","TWENTY THIRD","TWENTY FOURTH","TWENTY FIFTH","TWENTY SIXTH","TWENTY SEVENTH","TWENTY EIGHTH","TWENTY NINTH","THIRTIETH","THIRTY FIRST");

	array_unshift($days,"");
	unset($days[0]);
	$arrlength=count($days);

	for($x=1;$x<=$arrlength;$x++){
		if ($x=intval(substr($date,0,2))){
			$day= "$days[$x] \n";  
			break;
		}
	}
	
	$month=array("JANUARY","FEBRUARY","MARCH","APRIL","MAY","JUNE","JULY","AUGUST","SEPTEMBER","OCTOBER","NOVEMBER","DECEMBER");
	array_unshift($month,"");
	unset($month[0]);
	$arrlength=count($month);

	for($x=1;$x<=$arrlength;$x++){
		if ($x=intval(substr($date,2,2))){ 
			$mon= "$month[$x]\n";
			break;
		}
	}
		  
	if ((substr($date,4,1))==0){
		$century="TWO THOUSAND";
		 //echo "$century\n";
	}
	else{
		$century="NINETEEN HUNDRED";	
		//echo "$century\n";
	}
		  
	if ((substr($date,5,1))==0){
		$and="";
		//echo "$and\n";
	}else{
		$and="AND";	
		// echo "$and\n";
	}

	$year10=array("", "","TWENTY","THIRTY","FOURTY","FIFTY","SIXTY","SEVENTY","EIGHTY","NINETY","");
	
	$arrlength=count($year10);
	

	for($x=0;$x<=$arrlength;$x++){
		 
		
		if ($x=substr($date,4,1)){ //010100
			$year10_y= $year10[$x];
			break;
		}
		
	}  
		  

	$year1=array("ONE","TWO","THREE","FOUR","FIVE","SIX","SEVEN","EIGHT","NINE","");
	array_unshift($year1,"");
	unset($year1[0]);
	$arrlength=count($year1);

	for($x=1;$x<=$arrlength;$x++){
		if ($x=substr($date,5,1)){
			$year1_y="$year1[$x]\n";
			break;
		}
	} 
	$dateOfBirth=$day.''.$mon.''.$century.''.$and. ''. $year10_y.''.$year1_y;
	return $dateOfBirth; 
}//function end here

?>
</body>
</html>
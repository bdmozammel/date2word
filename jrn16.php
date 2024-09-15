//  JSC 2019 Reg No. generating program
// converting clipper to php file
<?php
require_once 'dbcon.php';
//$year='23',$bcode='13',$rno,$start=0,$i,$datafile;
$year='23';$bcode='13';$rno;$start=0;$i;
$sql = "SELECT * FROM jjall";
$result = mysqli_query($conn, $sql);
	if (mysqli_num_rows($result) > 0){
		while($row = mysqli_fetch_array($result)) {
			

			if ($row['regno']=2313200001){
				$start=$row['regno'];
			}



				$rno=substr(++$start,6) //regno increases and put into var $rno
				

				if $row['regno'] =space(10){ // faka thakle regno boshaw
					$regno= $year.$bcode.$rno;
					$row['regno']=$regno // example 19+13+200001
					//$row['sess1']='23'// change it for 2023
				}
	mysqli_close($conn);

		}
	//a->sl_no:=rno
	//a->date:=dtoc(date())
	}// first if close

?>
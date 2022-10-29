<?php


	function uploadFile($file_name,$path, $prefix_name){

		if(!empty($file_name)){

			$return_file = '';

			$file = explode(".", $_FILES[$file_name]["name"]);

			$first_name = date("Y-m-d").'_'.time();

			$newfile = $prefix_name.'_'.$first_name.'.'.end($file);

			$tmp_file = $_FILES[$file_name]["tmp_name"];

			if(move_uploaded_file($tmp_file, $path.$newfile)){

				$return_file = $newfile;

			}

			return $return_file;

		}

	}

	function uploadFileCSV($file_name,$path, $prefix_name){

		if(!empty($file_name)){

			$return_file = '';

			$file = explode(".", $_FILES[$file_name]["name"]);

			$newfile = $prefix_name.'.'.end($file);

			$tmp_file = $_FILES[$file_name]["tmp_name"];

			if(move_uploaded_file($tmp_file, $path.$newfile)){

				$return_file = $newfile;

			}

			return $return_file;

		}

	}


	$thai_day_arr=array("อาทิตย์","จันทร์","อังคาร","พุธ","พฤหัสบดี","ศุกร์","เสาร์");
	global $thai_month_arr,$thai_month_arr_short;
	$thai_month_arr=array(
	    "0"=>"",
	    "1"=>"มกราคม",
	    "2"=>"กุมภาพันธ์",
	    "3"=>"มีนาคม",
	    "4"=>"เมษายน",
	    "5"=>"พฤษภาคม",
	    "6"=>"มิถุนายน",
	    "7"=>"กรกฎาคม",
	    "8"=>"สิงหาคม",
	    "9"=>"กันยายน",
	    "10"=>"ตุลาคม",
	    "11"=>"พฤศจิกายน",
	    "12"=>"ธันวาคม"
	);
	$thai_month_arr_short=array(
	    "0"=>"",
	    "1"=>"ม.ค.",
	    "2"=>"ก.พ.",
	    "3"=>"มี.ค.",
	    "4"=>"เม.ย.",
	    "5"=>"พ.ค.",
	    "6"=>"มิ.ย.",
	    "7"=>"ก.ค.",
	    "8"=>"ส.ค.",
	    "9"=>"ก.ย.",
	    "10"=>"ต.ค.",
	    "11"=>"พ.ย.",
	    "12"=>"ธ.ค."
	);
	function thai_date_and_time($time){   // 19 ธันวาคม 2556 เวลา 10:10:43
		$thai_date_return = '';
		global $thai_month_arr;
		$thai_month_arr=array(
	    "0"=>"",
	    "1"=>"มกราคม",
	    "2"=>"กุมภาพันธ์",
	    "3"=>"มีนาคม",
	    "4"=>"เมษายน",
	    "5"=>"พฤษภาคม",
	    "6"=>"มิถุนายน",
	    "7"=>"กรกฎาคม",
	    "8"=>"สิงหาคม",
	    "9"=>"กันยายน",
	    "10"=>"ตุลาคม",
	    "11"=>"พฤศจิกายน",
	    "12"=>"ธันวาคม"
	);
	    $thai_date_return.= date("j",$time);
	    $thai_date_return.=" ".$thai_month_arr[date("n",$time)];
	    $thai_date_return.= " ".(date("Y",$time)+543);
		$thai_date_return.= " เวลา ".date("H:i:s",$time);
	    return $thai_date_return;
	}
	function thai_date_and_time_short($time){   // 19  ธ.ค. 2556 10:10:4
	    $thai_date_return = '';
	    global $thai_day_arr,$thai_month_arr_short;
	    $thai_month_arr_short=array(
	    "0"=>"",
	    "1"=>"ม.ค.",
	    "2"=>"ก.พ.",
	    "3"=>"มี.ค.",
	    "4"=>"เม.ย.",
	    "5"=>"พ.ค.",
	    "6"=>"มิ.ย.",
	    "7"=>"ก.ค.",
	    "8"=>"ส.ค.",
	    "9"=>"ก.ย.",
	    "10"=>"ต.ค.",
	    "11"=>"พ.ย.",
	    "12"=>"ธ.ค."
	);
	    $thai_date_return.=date("j",$time);
	    $thai_date_return.="&nbsp;".$thai_month_arr_short[date("n",$time)];
	    $thai_date_return.= " ".(date("Y",$time)+543);
		$thai_date_return.= " ".date("H:i:s",$time);
	    return $thai_date_return;
	}
	function thai_date_short($time){   // 19  ธ.ค. 2556
		$thai_date_return = '';
	    global $thai_day_arr,$thai_month_arr_short;
	    $thai_date_return.=date("j",$time);
	    $thai_date_return.="&nbsp;".$thai_month_arr_short[date("n",$time)];
	    $thai_date_return.= " ".(date("Y",$time)+543);
	    return $thai_date_return;
	}
	function thai_date_fullmonth($time){   // 19 ธันวาคม 2556
	    global $thai_day_arr,$thai_month_arr;
	    $thai_date_return = '';
	    $thai_date_return.=date("j",$time);
	    $thai_date_return.=" ".$thai_month_arr[date("n",$time)];
	    $thai_date_return.= " ".(date("Y",$time)+543);
	    return $thai_date_return;
	}
	function thai_date_no_date($time){   // ธันวาคม 2556
	    global $thai_day_arr,$thai_month_arr;
	    $thai_date_return = '';
	    $thai_date_return.=$thai_month_arr[date("n",$time)];
	    $thai_date_return.= " ".(date("Y",$time)+543);
	    return $thai_date_return;
	}
	function thai_date_short_number($time){   // 19-12-56
	    global $thai_day_arr,$thai_month_arr;
	    $thai_date_return.=date("d",$time);
	    $thai_date_return.="-".date("m",$time);
	    $thai_date_return.= "-".substr((date("Y",$time)+543),-2);
	    return $thai_date_return;
	}

	function thai_date_slash_number($time){   // 19/12/56
	    global $thai_day_arr,$thai_month_arr;
	    $thai_date_return.=date("d",$time);
	    $thai_date_return.="/".date("m",$time);
	    $thai_date_return.= "/".substr((date("Y",$time)+543),-2);
	    return $thai_date_return;
	}

	function dateConvert($fromdate){
			$sday = substr($fromdate, 0, 2);
			$smonth = substr($fromdate, 3, 2);
			$syear = substr($fromdate, 6, 4);
			$all = $syear."-".$smonth."-".$sday;
			return $all;
	}
	function showDateTextbox($fromdate){
			$sday = trim(substr($fromdate, 0, 2));
			$lenDay = strlen($sday);
			if($lenDay == 1){ $sday = "0".$sday; }
			$smonth = substr($fromdate, 0, -4);
			$smonth = trim(substr($smonth, 2));
			if($smonth == "มกราคม"){
				$smonth = "01";
			}else if($smonth == "กุมภาพันธ์"){
				$smonth = "02";
			}else if($smonth == "มีนาคม"){
				$smonth = "03";
			}else if($smonth == "เมษายน"){
				$smonth = "04";
			}else if($smonth == "พฤษภาคม"){
				$smonth = "05";
			}else if($smonth == "มิถุนายน"){
				$smonth = "06";
			}else if($smonth == "กรกฎาคม"){
				$smonth = "07";
			}else if($smonth == "สิงหาคม"){
				$smonth = "08";
			}else if($smonth == "กันยายน"){
				$smonth = "09";
			}else if($smonth == "ตุลาคม"){
				$smonth = "10";
			}else if($smonth == "พฤศจิกายน"){
				$smonth = "11";
			}else if($smonth == "ธันวาคม"){
				$smonth = "12";
			}else{}
			$syear = substr($fromdate, -4);
			$all = $sday."/".$smonth."/".$syear;
			return $all;
	}

//	$strDate = "2008-08-14 13:42:44";
//	echo "ThaiCreate.Com Time now : ".DateThai($strDate);
	function DateThaiNew($strDate,$full="")
	{
		$strYear = date("Y",strtotime($strDate))+543;
		$strMonth= date("n",strtotime($strDate));
		$strDay= date("j",strtotime($strDate));
		$strHour= date("H",strtotime($strDate));
		$strMinute= date("i",strtotime($strDate));
		$strSeconds= date("s",strtotime($strDate));
		$strMonthCut = Array(
		"0"=>"",
	    "1"=>"มกราคม",
	    "2"=>"กุมภาพันธ์",
	    "3"=>"มีนาคม",
	    "4"=>"เมษายน",
	    "5"=>"พฤษภาคม",
	    "6"=>"มิถุนายน",
	    "7"=>"กรกฎาคม",
	    "8"=>"สิงหาคม",
	    "9"=>"กันยายน",
	    "10"=>"ตุลาคม",
	    "11"=>"พฤศจิกายน",
	    "12"=>"ธันวาคม"
		);
		$strMonthThai=$strMonthCut[$strMonth];
		if($full){
		return "$strDay $strMonthThai $strYear, $strHour:$strMinute";
		} else {
		return "$strDay $strMonthThai $strYear";
		}
	}

//	$strDate = "2008-08-14";
//	echo "ThaiCreate.Com Time now : ".DateThai($strDate);
	function ShortDateThai($strDate)
	{
		$strYear = date("Y",strtotime($strDate))+543;
		$strMonth= date("n",strtotime($strDate));
		$strDay= date("j",strtotime($strDate));
		$strMonthCut = Array(
		"0"=>"",
	    "1"=>"ม.ค.",
	    "2"=>"ก.พ.",
	    "3"=>"มี.ค.",
	    "4"=>"เม.ย.",
	    "5"=>"พ.ค.",
	    "6"=>"มิ.ย.",
	    "7"=>"ก.ค.",
	    "8"=>"ส.ค.",
	    "9"=>"ก.ย.",
	    "10"=>"ต.ค.",
	    "11"=>"พ.ย.",
	    "12"=>"ธ.ค."
		);
		$Month=str_replace('0','',$strMonth);
		$Day=str_replace('0','',$strDay);
		$strMonthThai=$strMonthCut[$Month];
		return "$Day $strMonthThai $strYear";
	}

//เปลี่ยนจาก 2017-02-12 00:00:00 เป็น 12 กุมภาพันธ์ 2560 00:00:00
function FullDateTimeThai($strDate){
    $strYear = date("Y", strtotime($strDate)) + 543;
    $strMonth = date("n", strtotime($strDate));
    $strDay = date("j", strtotime($strDate));
    $strHour = date("H", strtotime($strDate));
    $strMinute = date("i", strtotime($strDate));
    $strSeconds = date("s", strtotime($strDate));
    $strMonthCut = Array(
		"0"=>"",
	    "1"=>"มกราคม",
	    "2"=>"กุมภาพันธ์",
	    "3"=>"มีนาคม",
	    "4"=>"เมษายน",
	    "5"=>"พฤษภาคม",
	    "6"=>"มิถุนายน",
	    "7"=>"กรกฎาคม",
	    "8"=>"สิงหาคม",
	    "9"=>"กันยายน",
	    "10"=>"ตุลาคม",
	    "11"=>"พฤศจิกายน",
	    "12"=>"ธันวาคม"
	);
    $strMonthThai = $strMonthCut[$strMonth];
//    return "$strDay $strMonthThai $strYear";
    return "$strDay $strMonthThai $strYear $strHour:$strMinute:$strSeconds";
}

//เปลี่ยนจาก 2017-02-12 เป็น 12 กุมภาพันธ์ 2560
function FullDateThai($strDate){
    $strYear = date("Y", strtotime($strDate)) + 543;
    $strMonth = date("n", strtotime($strDate));
    $strDay = date("j", strtotime($strDate));
    $strHour = date("H", strtotime($strDate));
    $strMinute = date("i", strtotime($strDate));
    $strSeconds = date("s", strtotime($strDate));
    $strMonthCut = Array(
		"0"=>"",
	    "1"=>"มกราคม",
	    "2"=>"กุมภาพันธ์",
	    "3"=>"มีนาคม",
	    "4"=>"เมษายน",
	    "5"=>"พฤษภาคม",
	    "6"=>"มิถุนายน",
	    "7"=>"กรกฎาคม",
	    "8"=>"สิงหาคม",
	    "9"=>"กันยายน",
	    "10"=>"ตุลาคม",
	    "11"=>"พฤศจิกายน",
	    "12"=>"ธันวาคม"
	);
    $strMonthThai = $strMonthCut[$strMonth];
//    return "$strDay $strMonthThai $strYear";
    return "$strDay $strMonthThai $strYear";
}

//เปลี่ยนจาก 2017-02-12 เป็น วันที่ 12 เดือน กุมภาพันธ์ พ.ศ. 2560
function FullDateThaiPS($strDate){
    $strYear = date("Y", strtotime($strDate)) + 543;
    $strMonth = date("n", strtotime($strDate));
    $strDay = date("j", strtotime($strDate));
    $strHour = date("H", strtotime($strDate));
    $strMinute = date("i", strtotime($strDate));
    $strSeconds = date("s", strtotime($strDate));
    $strMonthCut = Array(
		"0"=>"",
	    "1"=>"มกราคม",
	    "2"=>"กุมภาพันธ์",
	    "3"=>"มีนาคม",
	    "4"=>"เมษายน",
	    "5"=>"พฤษภาคม",
	    "6"=>"มิถุนายน",
	    "7"=>"กรกฎาคม",
	    "8"=>"สิงหาคม",
	    "9"=>"กันยายน",
	    "10"=>"ตุลาคม",
	    "11"=>"พฤศจิกายน",
	    "12"=>"ธันวาคม"
	);
    $strMonthThai = $strMonthCut[$strMonth];
//    return "$strDay $strMonthThai $strYear";
    return "วันที่ $strDay เดือน $strMonthThai พ.ศ. $strYear";
}

//เปลี่ยนจาก 2017-02-12  เป็น 12 ก.พ. 2560
function DateThai($strDate){
    $strYear = date("Y", strtotime($strDate)) + 543;
    $strMonth = date("n", strtotime($strDate));
    $strDay = date("j", strtotime($strDate));
    $strHour = date("H", strtotime($strDate));
    $strMinute = date("i", strtotime($strDate));
    $strSeconds = date("s", strtotime($strDate));
    $strMonthCut = Array(
		"0"=>"",
	    "1"=>"ม.ค.",
	    "2"=>"ก.พ.",
	    "3"=>"มี.ค.",
	    "4"=>"เม.ย.",
	    "5"=>"พ.ค.",
	    "6"=>"มิ.ย.",
	    "7"=>"ก.ค.",
	    "8"=>"ส.ค.",
	    "9"=>"ก.ย.",
	    "10"=>"ต.ค.",
	    "11"=>"พ.ย.",
	    "12"=>"ธ.ค."
	);
    $strMonthThai = $strMonthCut[$strMonth];
    return "$strDay $strMonthThai $strYear";
  //  return "$strDay $strMonthThai $strYear, $strHour:$strMinute";
}

//แปรผลการประเมิน
function Item_Result($Percent){
	if($Percent > 100.00 ){
		return "<div class='text-danger'>ข้อมูลผิดพลาด</div>";
	} else if($Percent >= 90.00 && $Percent <=100.00){
		return "<div class='text-success'>ดีเยี่ยม</div>";
	} else if($Percent >= 80.00 && $Percent <=89.99) {
		return "<div class='text-primary'>ดีเด่น</div>";
	} else if($Percent >= 70.00 && $Percent <=79.99) {
		return "<div class='text-info'>ดี</div>";
	} else if($Percent < 70.00 ) {
		return "<div class='text-warning'>เข้าร่วม</div>";
	}
}

//แปรผลการประเมิน print
function Item_Result_P($Percent){
	if($Percent > 100.00 ){
		return "ข้อมูลผิดพลาด";
	} else if($Percent >= 90.00 && $Percent <=100.00){
		return "ดีเยี่ยม";
	} else if($Percent >= 80.00 && $Percent <=89.99) {
		return "ดีเด่น";
	} else if($Percent >= 70.00 && $Percent <=79.99) {
		return "ดี";
	} else if($Percent < 70.00 ) {
		return "เข้าร่วม";
	} 
}

//แปรผลการประเมิน print
function Item_Result_N($Percent){
	if($Percent > 100.00 ){
		return "ข้อมูลผิดพลาด";
	} else if($Percent >= 90.00 && $Percent <=100.00){
		return 1;
	} else if($Percent >= 80.00 && $Percent <=89.99) {
		return 2;
	} else if($Percent >= 70.00 && $Percent <=79.99) {
		return 3;
	} else if($Percent < 70.00 ) {
		return 4;
	} 
}

function thainumDigit($num){
    return str_replace(array( '0' , '1' , '2' , '3' , '4' , '5' , '6' ,'7' , '8' , '9' ),
    array( "o" , "๑" , "๒" , "๓" , "๔" , "๕" , "๖" , "๗" , "๘" , "๙" ),
    $num);
}

?>
<?php

/** PHPExcel */
require_once 'Classes/PHPExcel.php';

/** PHPExcel_IOFactory - Reader */
include 'Classes/PHPExcel/IOFactory.php';

$inputFileName = "vocab/".$_POST['src'];  
$inputFileType = PHPExcel_IOFactory::identify($inputFileName);  
$objReader = PHPExcel_IOFactory::createReader($inputFileType);  
$objReader->setReadDataOnly(true);  
$objPHPExcel = $objReader->load($inputFileName);  

$maxEx = 20;
/*
// for No header
$objWorksheet = $objPHPExcel->setActiveSheetIndex(0);
$highestRow = $objWorksheet->getHighestRow();
$highestColumn = $objWorksheet->getHighestColumn();

$r = -1;
$namedDataArray = array();
for ($row = 1; $row <= $highestRow; ++$row) {
    $dataRow = $objWorksheet->rangeToArray('A'.$row.':'.$highestColumn.$row,null, true, true, true);
    if ((isset($dataRow[$row]['A'])) && ($dataRow[$row]['A'] > '')) {
        ++$r;
        $namedDataArray[$r] = $dataRow[$row];
    }
}
*/

$objWorksheet = $objPHPExcel->setActiveSheetIndex(0);
$highestRow = $objWorksheet->getHighestRow();
$highestColumn = $objWorksheet->getHighestColumn();

$headingsArray = $objWorksheet->rangeToArray('A1:'.$highestColumn.'1',null, true, true, true);
$headingsArray = $headingsArray[1];

$r = -1;
$namedDataArray = array();
for ($row = 2; $row <= $highestRow; ++$row) {
    $dataRow = $objWorksheet->rangeToArray('A'.$row.':'.$highestColumn.$row,null, true, true, true);
    if ((isset($dataRow[$row]['A'])) && ($dataRow[$row]['A'] > '')) {
        ++$r;
        foreach($headingsArray as $columnKey => $columnHeading) {
            $namedDataArray[$r][$columnHeading] = $dataRow[$row][$columnKey];
        }
    }
}

// echo '<pre>';
// var_dump($namedDataArray);
// echo '</pre><hr />';
$a = array();
$b = array();
// echo "<table>";
foreach ($namedDataArray as $result) {
// 	$c1 = $result["vocab"];
// 	$c2 = $result["translate"];
	$c1 = $result["vocab"];
	$c2 = $result["translate"];
	if($c1 !="" || $c2!=""){
		array_push($a,$c1);
		array_push($b,$c2);
	}
}
// echo "</table>";
$tmpA = $a;
$tmpB = $b;
$tmpC = "[";
$choice = array();
// echo '<pre>';
// var_dump($a);
// echo '</pre><br />';
// echo '<pre>';
// var_dump($b);
// echo '</pre><br />';
echo "<script>jsonData = {vocablistlength:".count($a).",length:".$maxEx.",";
for ($i=0;$i<$maxEx;$i++){
	shuffle($tmpA);
	$random_Vocab = array_rand($tmpA);
	unset($tmpB[$random_Vocab]);
	$vocab = strtoupper(substr($tmpA[$random_Vocab],0,1))."".substr($tmpA[$random_Vocab],1);
	$tran = $b[array_search($tmpA[$random_Vocab],$a)];
	array_push($choice,$tran);
	echo $i." : {";
	echo "vocab : '".$vocab."',";
	echo "tran : '".$tran."'}";
	unset($tmpA[$random_Vocab]);
	array_push($tmpB,$tran);
	
	if(($i+1)%5 == 0){
		shuffle($choice);
		$tmpC .= "'".$choice[0]."','".$choice[1]."','".$choice[2]."','".$choice[3]."','".$choice[4]."'";
		if($i<$maxEx-1){
			$tmpC .=",";
		}
		$choice = array();
	}
	
	if($i<$maxEx-1){
		echo ",";
	}
	else{
		$tmpC .= "]";
		echo "};";
	}
}
echo "jsonData.choice = ".$tmpC;
echo "</script>";

?>

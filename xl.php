<?php
error_reporting(E_ALL);
error_reporting(E_ALL & ~E_DEPRECATED);
ini_set('display_errors',TRUE);
ini_set('display_startup_errors',TRUE);
date_default_timezone_set('Europe/London');
if(PHP_SAPI == 'cli')
    die('This example should only be run form a web Browser');
/*Include PHPExcel*/

require_once'../../../vendor/phpoffice/phpexcel/Classes/PHPExcel.php';
require_once('../../../vendor/autoload.php');
use App\SEIP\Students\Students;
$obj = new Students;
$value = $obj->setData($_GET)->show();
$arr = unserialize($value['subject']);
$allsub = implode(",",$arr);

//create new PHPExcel object
$objPHPExcel = new PHPExcel();
//Set document Properties.
$objPHPExcel->getProperties()->setCreator("Maarten Balliauw")
    ->setLastModifiedBy("MaartenBalliauw")
    ->setTitle("Office 2007 XLSX Test Document")
    ->setSubject("Office 2007 Test Document")
    ->setDescription("Test documtn for office 2007 XLSX, generated using PHP classes.")
    ->setKeywords("Office 2007 openxml php")
    ->setCategory("Test result file");
//Add some data
$objPHPExcel->setActiveSheetIndex(0)
    ->setCellValue('A1','DB-ID')
    ->setCellValue('B1','Name')
    ->setCellValue('C1','Subjects')
    ->setCellValue('D1','Group')
    ->setCellValue('E1','Gender');
$counter=2;
//$serial=0;

 $objPHPExcel->setActiveSheetIndex(0)
    ->setCellValue('A'.$counter,$value['id'])
    ->setCellValue('B'.$counter,$value['title'])
    ->setCellValue('C'.$counter,$allsub)
    ->setCellValue('D'.$counter,$value['groups'])
    ->setCellValue('E'.$counter,$value['sex']);
//Rename worksheet
$objPHPExcel->getActiveSheet()->setTitle('Mobile_list');

//Set active sheet index to the first sheet , so excel opens this as the first sheet
$objPHPExcel->setActiveSheetIndex(0);

//Redirect output to a client's web browser(Excel5)
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition:attachment;filename="01simple.xls"');
header('Cache-Control: max-age=0');
//If you sercing to Ie 9, then the fillowing may be needed
header('Cache-Control: max-age=1');

//If you're serving to Ie over SSl, then the following may be needed
header('Expires:Mon, 26 Jul 1997 05:00:00 GMT');
header('Last-Modified:'.gmdate('D, d M Y H:i:s').' GMT');
header('Pragma:public');

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel,'Excel5');
$objWriter->save('php://output');
exit;


























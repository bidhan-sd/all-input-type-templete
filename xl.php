<?php

    session_start();
    if(empty($_SESSION['userinfo'])){
        header ("Location: signin.php");
    }
    error_reporting(E_ALL);
    error_reporting(E_ALL & ~E_DEPRECATED);
    ini_set('display_errors',TRUE);
    ini_set('display_startup_errors',TRUE);
    date_default_timezone_set('Europe/London');
    if(PHP_SAPI == 'cli')
        die('This example should only be run form a web Browser');
    /*Include PHPExcel*/

    require_once 'urlencryptor.php';

    if(isset($_GET['id']) && isset($_GET['userId'])){
        $id = filter_var($_GET['id'], FILTER_SANITIZE_STRING);//The mysqli_real_escape_string() function escapes special characters in a string for use in an SQL statement.
        $id = mysql_real_escape_string($id);
        $id = htmlspecialchars($id, ENT_IGNORE, 'utf-8');//The htmlspecialchars() function converts some predefined characters to HTML entities.
        $id = strip_tags($id);//The strip_tags() function strips a string from HTML, XML, and PHP tags.
        $id = stripslashes($id);//Remove the backslash:
        
        $userId = filter_var($_GET['userId'], FILTER_SANITIZE_STRING);//The mysqli_real_escape_string() function escapes special characters in a string for use in an SQL statement.
        $userId = mysql_real_escape_string($userId);
        $userId = htmlspecialchars($userId, ENT_IGNORE, 'utf-8');//The htmlspecialchars() function converts some predefined characters to HTML entities.
        $userId = strip_tags($userId);//The strip_tags() function strips a string from HTML, XML, and PHP tags.
        $userId = stripslashes($userId);//Remove the backslash:

        $id = urldecode($id);
        $id = encryptor('decrypt', $id);
        $userId = urldecode($userId);
        $userId = encryptor('decrypt', $userId);
        $link = mysql_connect("localhost", "root", "");
                mysql_select_db("crud", $link);
        $sql     = "SELECT * FROM addstudent WHERE id='$id' AND userId='$userId'";
        $query   = mysql_query($sql, $link);
        $total   = mysql_num_rows($query);
        if(!$total > 0){
            header("location: 404.php");
        }else{
            $result =  mysql_fetch_assoc($query);            
        }
        
    }     
    include_once "vendor/phpoffice/phpexcel/Classes/PHPExcel.php";

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
    ->setCellValue('A1','Name')
    ->setCellValue('B1','Email')
    ->setCellValue('C1','Website')
    ->setCellValue('D1','Country')
    ->setCellValue('E1','Subject')
    ->setCellValue('F1','gender')
    ->setCellValue('G1','image');
$counter=2;
//$serial=0;

 $objPHPExcel->setActiveSheetIndex(0)
    ->setCellValue('A'.$counter,$result['name'])
    ->setCellValue('B'.$counter,$result['email'])
    ->setCellValue('C'.$counter,$result['website'])
    ->setCellValue('D'.$counter,$result['country'])
    ->setCellValue('E'.$counter,$result['subject'])
    ->setCellValue('F'.$counter,$result['gender'])
    ->setCellValue('G'.$counter,$result['image']);
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


























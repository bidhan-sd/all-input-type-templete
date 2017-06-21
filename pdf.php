<?php
    session_start();
    if(empty($_SESSION['userinfo'])){
        header ("Location: signin.php");
    }
    $userId = $_SESSION['userinfo']['userId'];
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
?>
<?php
    include_once "vendor/mpdf/mpdf/mpdf.php";

    $trs1 = $result['name'];
    $trs2 = $result['email'];
    $trs3 = $result['website'];
    $trs4 = $result['country'];
    $trs5 = $result['subject'];
    $trs6 = $result['gender'];
    $trs7 = $result['image'];


$html = <<<EOD
<!DOCTYPE html>
<html>
<head>
<title>$trs1 cv</title>

<meta name="viewport" content="width=device-width"/>
<meta name="description" content="The Curriculum Vitae of Joe Bloggs."/>
<meta charset="UTF-8"> 

<link type="text/css" rel="stylesheet" href="inc/pdfstyle.css">
<link rel="shortcut icon" href="img/favicon.png" type="image/x-icon" size="16X16">
<link href='http://fonts.googleapis.com/css?family=Rokkitt:400,700|Lato:400,300' rel='stylesheet' type='text/css'>

</head>
<body id="top">
<div id="cv" class="instaFade">
    <div class="mainDetails">
        <div id="headshot" class="quickFade" style="width:18%">
            <img src="$trs7" alt="Alan Smith" width="100" height="100"/>
        </div>
        
        <div id="name" style="width:43%">
            <h5 class="quickFade delayTwo">Sutdent Indivisual information</h5>
            <h6 class="quickFade delayThree">$trs1</h6>
        </div>        
        <div id="contactDetails" class="quickFade delayFour" style="">
            <ul>
                <li><span style="font-weight:bold;">Email</span>:$trs2</li>
                <li><span style="font-weight:bold;">Website</span>:$trs3</li>
                <li><span style="font-weight:bold;">Mobile</span>: 01234567890</li>
            </ul>
        </div>
        <div class="clear"></div>
    </div>
    
    <div id="mainArea" class="quickFade delayFive">
        <section>
            <article>
                <div class="sectionTitle">
                    <h1>Personal Profile</h1>
                </div>
                
                <div class="sectionContent">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer dolor metus, interdum at scelerisque in, porta at lacus. Maecenas dapibus luctus cursus. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                </div>
            </article>
            <div class="clear"></div>
        </section>
        
        
        <section>
            <div class="sectionTitle">
                <h1>Work Experience</h1>
            </div>
            
            <div class="sectionContent">
                <article>
                    <h2>BSIT Foundation</h2>
                    <p class="subDetails">April 2017 - Present</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec ultricies massa et erat luctus hendrerit. Curabitur non consequat enim. Vestibulum bibendum mattis dignissim. Proin id sapien quis libero interdum porttitor.</p>
                </article>
            </div>
            <div class="clear"></div>
        </section>
        
        
        <section>
            <div class="sectionTitle">
                <h1>Key Skills</h1>
            </div>
            
            <div class="sectionContent">
                <ul class="keySkills">
                    <li>I have some core skill such as Web design , Web development which instument are  Html , Css , Javascript, Bootstrap , JQuery , PHP , Wordpress . </li>
                </ul>
            </div>
            <div class="clear"></div>
        </section>
        
        
        <section>
            <div class="sectionTitle">
                <h1>Education</h1>
            </div>
            
            <div class="sectionContent">
                <article>
                    <h2>Dhaka International University</h2>
                    <p class="subDetails">Qualification</p>
                    <p>Now I study at Dhaka International University for graduation But I also complated Diploma in Computer Technologoy</p>
                </article>
                
                <article>
                    <h2>Diploma in Engineering</h2>
                    <p class="subDetails">Qualification</p>
                    <p>Now I study at Dhaka International University for graduation But I also complated Diploma in Computer Technologoy</p>
                </article>
            </div>
            <div class="clear"></div>
        </section>
        
    </div>
</div>

</body>
</html>
EOD;

    $mpdf=new mPDF();
    $mpdf->WriteHTML($html);
    $mpdf->Output();
    exit();
?>
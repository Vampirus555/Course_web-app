<?php
require("connectdb.php");
require("session.php");

$result = mysqli_query($connect, "SELECT * FROM Activity_parks WHERE NameOfPark = '".$_POST["login"]."' ");
$result1 = mysqli_query($connect, "SELECT * FROM Info_parks WHERE CommonName = '".$_POST["login"]."' ");

$info = mysqli_fetch_assoc($result1);

$content1 = '';

$count = 1;

while($activity = mysqli_fetch_assoc($result)){
    
    
    $content1 .= '
    <div class="card">
            <div class="card_header">
            '.$activity['CourseName'].'
            </div>
    <br id="all'.$count.'"/><table>
        
        <tr>
            <td>Описание</td>
            <td>'.$activity['CoursesDescription'].'</td>
        </tr>
        <tr>
            <td>Время проведения</td>
            <td>'.$activity['CoursesTimetable'].'</td>
        </tr>
        <tr>
            <td>Форма посещения</td>
            <td>'.$activity['PaidService'].'</td>
        </tr>
        <tr>
            <td>Телефон для справок/записи</td>
            <td>'.$activity['HelpPhone'].'</td>
        </tr>
    </table>
    ';
    if(isset($user) && $user != ""){
        $content1 .= '
        <a href="#close"><button class="margin_5, back">Cвернуть</button></a><a href="#all'.$count.'"><button class="margin_5, back">Развернуть</button></a>
        ';
    }
    $content1 .= "</div>";
    
    $count++;
}



$title = "Сведения";


$content ='
<div class="info">
            

            <div class="park_card">
                <div class="park_header">
                '.$info['CommonName'].'
                </div>
                <table>
                    <tr>
                        <td>Организация</td>
                        <td>'.$info['BalanceholderComp'].'</td>
                    </tr>
                    <tr>
                        <td>Адрес</td>
                        <td>'.$info['Location'].'</td>
                    </tr>
                    <tr>
                        <td>Сайт парка</td>
                        <td><a href="https://'.$info['ParkWebSite'].'">'.$info['ParkWebSite'].'</a></td>
                    </tr>
                    <tr>
                        <td>Телефон парка</td>
                        <td>'.$info['ParkPhone'].'</td>
                    </tr>
                </table>
                <a href="main.php"><button class="margin_5, back">На страницу поиска</button></a>
    
            </div>

            <div style="display: flex; flex-wrap: wrap;">
                '.$content1.'
            </div>

</div>
';
require("template.php");

?>

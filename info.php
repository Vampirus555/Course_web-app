<?php
require("connectdb.php");

$result = mysqli_query($connect, "SELECT * FROM Activity_parks WHERE NameOfPark = '".$_POST["login"]."' ");
$result1 = mysqli_query($connect, "SELECT * FROM Info_parks WHERE CommonName = '".$_POST["login"]."' ");

$info = mysqli_fetch_assoc($result1);

$content1 = '';

$count = 1;

while($activity = mysqli_fetch_assoc($result)){
    
    
    $content1 .= '
    <div class="card">
    <br id="all'.$count.'"/><table>
        <tr>
            <td>Название активности</td>
            <td>'.$activity['CourseName'].'</td>
        </tr>
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
    <a href="#close">свернуть</a><a href="#all'.$count.'">развернуть</a>
</div>
    ';
    
    $count++;
}



// $Arr = mysqli_fetch_assoc($result);
// $name_park = $Arr['NameOfPark'];
// $activity_name = $Arr['CourseName'];
// $description = $Arr['CoursesDescription'];
// $time = $Arr['CoursesTimetable'];
// $paid = $Arr['PaidService'];
// $phone = $Arr['HelpPhone'];

$title = "Сведения";




$content ='
<div class="info">
            <a href="main.php"><p>На страницу поиска</p></a>

            <div class="card">
            <br id="all0"/><table>
                    <tr>
                        <td width="110">Название Парка</td>
                        <td>'.$info['CommonName'].'</td>
                    </tr>
                    <tr>
                        <td>Адрес</td>
                        <td>'.$info['Location'].'</td>
                    </tr>
                    <tr>
                        <td>Время работы</td>
                        <td>'.$info['WorkingHours'].'</td>
                    </tr>
                    <tr>
                        <td>Сайт парка</td>
                        <td>'.$info['ParkWebSite'].'</td>
                    </tr>
                    <tr>
                        <td>Телефон парка</td>
                        <td>'.$info['ParkPhone'].'</td>
                    </tr>
                </table>
                <a href="#close">свернуть</a><a href="#all0">развернуть</a>
            </div>

            <div style="display: flex; flex-wrap: wrap;">
                '.$content1.'
            </div>

        </div>
';
require("template.php");

?>







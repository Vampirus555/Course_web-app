<?php
require("connectdb.php");

$result = mysqli_query($connect, "SELECT * FROM Activity_parks WHERE NameOfPark = '".$_POST["login"]."' ");
$result1 = mysqli_query($connect, "SELECT * FROM Info_parks WHERE CommonName = '".$_POST["login"]."' ");

$info = mysqli_fetch_assoc($result1);

$content1 = '';

while($activity = mysqli_fetch_assoc($result)){
    
    
    $content1 .= '
    <div class="card">
    <table>
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
</div>
    ';
    
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
    <table>
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
</div>

            <div style="display: flex; flex-wrap: wrap;">
                '.$content1.'
            </div>

        </div>
';
require("template.php");

?>


<!-- <div class="card">
                        <div class="card-header">
                            <h3>'.$activity_name.'</h3>
                        </div>
                        <div class="card-body p-0">
                        <table>
                    
                    <tr>
                        <td>Описание</td>
                        <td>'.$description.'</td>
                    </tr>
                    <tr>
                        <td>Время проведения</td>
                        <td>'.$time.'</td>
                    </tr>
                    <tr>
                        <td>Форма посещения</td>
                        <td>'.$paid.'</td>
                    </tr>
                    <tr>
                        <td>Телефон для справок/записи</td>
                        <td>'.$phone.'</td>
                    </tr>
                </table>
                        </div>
                        
                    </div>


        </div> -->





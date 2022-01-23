<?php
require("connectdb.php");
require("session.php");

$result = mysqli_query($connect, "SELECT * FROM Activity_parks WHERE NameOfPark LIKE '%".$_POST["park"]."%' ");
$result1 = mysqli_query($connect, "SELECT * FROM Info_parks WHERE CommonName LIKE '%".$_POST["park"]."%' ");



$info = mysqli_fetch_assoc($result1);


$centr = $info['geodata_center'];
    

$content1 = '';

$count = 1;


if(empty($_POST["park"])){
    header("Location: index.php");
}

if(!$result || mysqli_num_rows($result) == 0){
    $content1 ='
    <div class="card">
        <div class="warning">
            К сожалению, информации по активностям данного парка нет
        </div>
        
    </div>
    ';
}else{
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
}




$title = "Сведения";

if((!$result || mysqli_num_rows($result) == 0) && (!$result1 || mysqli_num_rows($result1) == 0)){
    $content ='
    <div class="card">
        <div class="warning">
            К сожалению, информации по вашему запросу нет
        </div>
        <a href="index.php"><button class="margin_5, back">На страницу поиска</button></a>
    </div>
    ';
}else{
    $content ='
    
    <div class="info">
                
            <div style="display: flex; flex-wrap: wrap; position: center;">
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
                    
                    

                    <a href="index.php"><button class="margin_5, back">На страницу поиска</button></a>
                    
                </div>
                <div class ="card" id="map">
                    
                </div>
            </div>

            <div style="display: flex; flex-wrap: wrap;">
                '.$content1.'
            </div>

    </div>
';
}

require("template.php");

?>

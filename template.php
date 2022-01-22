<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php $title; ?></title>
    <link rel="stylesheet" href="styles/style.css">

    <script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU&amp;apikey=88ed630c-1d1b-497f-8893-1b4e4057c36f" type="text/javascript"></script>
    <script type="text/javascript">
        ymaps.ready(function () {
        var myMap = new ymaps.Map('map', {
            center: <?php echo $centr ?>,
            zoom: 13
        }, {
            searchControlProvider: 'yandex#search'
        }),

       

        myPlacemark = new ymaps.Placemark(myMap.getCenter(), {
            hintContent: '<?php echo $info['CommonName'] ?>',
            
                }, {
                // Опции.
                // Необходимо указать данный тип макета.
                iconLayout: 'default#image',
                // Своё изображение иконки метки.
                iconImageHref: 'images/Icon.png',
                // Размеры метки.
                iconImageSize: [30, 35],
                // Смещение левого верхнего угла иконки относительно
                // её "ножки" (точки привязки).
                iconImageOffset: [-5, -38]
        });

        myMap.geoObjects.add(myPlacemark);
        
});
    </script>
 
</head>
<body>
<header class="header">
        
            <?php if(isset($user) && $user != ""):?> 
                    <label>Добро пожаловать, <?=$_SESSION["name"]?>! </label>
                    <!-- <a href="logout.php">Выйти</a> -->
                    <a href="logout.php"><button class="search-btn" >Выйти из аккаунта</button></a>
            <?php else:?>
            <form action="authpage.php" class="search-form">
                <button class="search-btn" >Войти/Зарегистрироваться</button>
            </form>
            <?php endif;?>
        
    </header>
    <main>
        <p><?=$content;?></p>
        
    </main>
    

    <footer class="footer">
        <p>&copy; Романов В.С. 201-362. Год: <?php echo date('Y'); ?></p>
    </footer>
</body>
</html>
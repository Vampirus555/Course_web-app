<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php $title; ?></title>
    <link rel="stylesheet" href="styles/style.css">
    
 
</head>
<body>
<header class="header">
        <div class="container">
            <?php if(isset($user) && $user != ""):?> 
                    <label>Добро пожаловать, <?=$_SESSION["name"]?>! Теперь вы можете увидеть подробную информацию об активностях парка.</label>
                    <!-- <a href="logout.php">Выйти</a> -->
                    <a href="logout.php"><button class="search-btn" >Выйти из аккаунта</button></a>
            <?php else:?>
            <form action="authpage.php" class="search-form">
                <button class="search-btn" >Войти/Зарегистрироваться</button>
            </form>
            <?php endif;?>
        </div>
    </header>
    <main>
        <p><?=$content;?></p>
        
    </main>
    

    <footer class="footer">
        <div class="container">
            
        </div>
    </footer>
</body>
</html>
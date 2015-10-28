<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8">

        <link rel="stylesheet" type="text/css" href="css/style.css">
        
        <script type="text/javascript" src="js/jquery.min.js"></script>
        <script type="text/javascript" src="js/script.js"></script>
        <script src = "js/ga.js"></script>
        <title>Підтримай курс гривні</title>
    </head>
    <body>
        <p id = "caller">
            Підтримай курс гривні !<br> З кожним кліком по кнопці курс гривні стає нижчим !!!
        </p>
            <div id = "counterHolder">
                USD/UAH 
                <p id="counter">
                <?= $counter;?>
                </p>
            </div>
        <div id="countBtn" value = "1" onClick="countClicks()">Підтримати</div>
        <div id="footer">
            <a href="#warning">Інфо </a>
              LeFranj. 2014р
        </div>
        <a href="#x" class="overlay" id="warning"></a>
        <div class="popup">
        <div id="popuptext">
        Розважальна сторінка "Підтримай курс гривні !"<br/><br/>
             УВАГА !!!<br/><br/> Це лише розважальна сторінка !<br/><br/>
        Ващi дії ніяк не впливають на дійсний курс гривні !<br/><br/>
        Розробив LeFranj <br/><br/>
         2014p.</div>
            <a class="close"title="Закрыть" href="#close"></a>
            </div>
    </body>
</html>
<?php
include ("db_connect.php");

    $cat= $_GET["cat"];



$type=$_GET["type"];


$sorting = $_GET["sort"];
switch ($sorting)
{
    case 'priceasc';
        $sorting = 'price ASC';
        $sort_name = 'От дешевых к дорогим';
        break;

    case 'pricedesc';
        $sorting = 'price DESC';
        $sort_name = 'От дорогих к дешевым';
        break;

    case 'popular';
        $sorting = 'count DESC';
        $sort_name = 'Популярное';
        break;

    case 'news';
        $sorting = 'datatime DESC';
        $sort_name = 'Новинки';
        break;

    case 'brand';
        $sorting = 'brand';
        $sort_name = 'От А до Я';
        break;

    default:
        $sorting = 'products_id ';
        $sort_name = 'Нет сортировки';
        break;


}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Orchid Shop</title>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script type="text/javascript" src="http://yoursite.ru/js/jquery.cookie.js"></script>
    <link rel="stylesheet" href="css.css" type="text/css">
    <script type="text/javascript" src="jskurs.js"></script>



</head>

<body>
<div id="block-body">

    <div id="block-header">
        <div id="header-top-block">

            <ul id="header-top-menu">
                <li>Ваш город - <span>Харьков</span></li>
                <li><a href="">О нас</a></li>
                <li><a href="">Магазины</a></li>
                <li><a href="">Контакты</a></li>

            </ul>

            <p id="reg-auth-title" align="right"><a class="top-auth">Вход</a><a href="">Регистрация</a></p>
            <div id="top-line"></div>

            <img  align="left" id="logomain" src="https://bestlaptop.com.ua/image/data/BLaptop.png">

            <div id="block-inform" align="right">
                <ul id="inform">
                    <li class="information">Рабочие дни: Пн.-Сб.</li>
                    <li class="information">Часы работы: 9:00-20:00.</li>
                    <li class="information">Адресс: ул. Зеленоградская, 5.</li>
                    <li class="information">Телефон: 8-800-555-35-35.</li>
                </ul>
            </div>


        </div>
        <div id="block-search">
            <form method="get" action="search.php?q=">
                <input type="text" id="input-search" name="q" placeholder="Поиск среди более 100 000 товаров" />
                <input type="submit" id="button-search" value="Поиск" />
            </form>

        </div>
    </div>
    <div id="top-menu">
        <ul id="t-menu">
            <li><img src="http://долиподпрописку.рф/wp-content/uploads/2016/05/cropped-house-icon-png-5mpdtgwd1.png"><a href="index11.php">Главная</a></li>
            <li><img src="https://img2.freepng.ru/20180715/cbf/kisspng-computer-icons-icon-design-new-icon-5b4bb823ba33c9.8256211515316889957627.jpg"> <a href="">Новинки</a></li>
            <li><img src="https://img.icons8.com/ios/420/best-seller.png"><a href="">Лидеры продаж</a></li>
            <li><img src="https://image.flaticon.com/icons/png/512/39/39887.png"><a href="">Распродажа</a></li>
        </ul>

        <p align="right" id="block-basket"><img class="img-korz" src="https://s3.amazonaws.com/cdn.freshdesk.com/data/helpdesk/attachments/production/11001410572/original/shopping109.png?1455021247"><a href="">Корзина пустая</a> </p>
    </div>

    <div id="block-right">
        <div id="block-category">
            <p class="header-title">Производители</p>
            <ul>
                <li><a href=""><strong>Все модели</strong></a></li>
                <?php
                $result = mysqli_query($link,"SELECT * FROM category WHERE type='Notebook'");
                if (mysqli_num_rows($result) > 0 )
                {
                    $row = mysqli_fetch_array($result);
                    do{
                        echo '
              <li><a href="view_cat.php?cat="'.strtolower($row["brand"]).'&type='.$row["type"].'">'.$row["brand"].'</a></li>
              ';
                    }while ($row = mysqli_fetch_array($result));
                }

                ?>

            </ul>
        </div>
        <div id="block-parameter">


            <p class="header-title">Поиск</p>

            <p class="title-filter">Стоимость</p>
            <form method="get" action="search-filter.php">
                <div id="block-input-price">
                    <ul>
                        <li><p>oт</p></li>
                        <li><input type="text" id="start-price" name="start_price" placeholder="5000" /></li>
                        <li><p>до</p></li>
                        <li><input type="text" id="end-price" name="end_price" placeholder="75000" /></li>
                        <li><p>грн</p></li>
                    </ul>

                    <div id="block-trackbar"></div>

                    <p class="header-title">Характеристики</p>
                    <ul class="checkbox-brand">
                        <li><input type="checkbox" id="checkbrand1"/><label for="checkbrand1">Brand1</label></li>
                        <li><input type="checkbox" id="checkbrand2"/><label for="checkbrand2">Brand2</label></li>
                        <li><input type="checkbox" id="checkbrand3"/><label for="checkbrand3">Brand3</label></li>
                    </ul>
                </div>

                <input type="submit" name="submit" id="button-param-search" value="Поиск"/>

            </form>
        </div>
        <div id="block-news">
            <img id="slide-prev" src="https://img.icons8.com/windows/420/double-up.png" />
            <div id="newsticker">
                <ul>
                    <li >
                        <span>22.05.19</span>
                        <a href="">Кредит без переплат на ноутбуки от Apple</a>
                        <p>С мая до сентября во всех салонах магазина - ноутбуки Apple в кредит без пореплат!</p>
                    </li>
                    <li >
                        <span>22.05.19</span>
                        <a href="">Кредит без переплат на ноутбуки от Apple</a>
                        <p>С мая до сентября во всех салонах магазина - ноутбуки Apple в кредит без пореплат!</p>
                    </li>
                    <li >
                        <span>22.05.19</span>
                        <a href="">Кредит без переплат на ноутбуки от Apple</a>
                        <p>С мая до сентября во всех салонах магазина - ноутбуки Apple в кредит без пореплат!</p>
                    </li>

                </ul>
            </div>
            <img id="slide-next" src="https://img.icons8.com/windows/420/double-down.png"/>


        </div>


    </div>
    <div id="block-content">
        <div id="block-sorting">
            <p id="nav-breadcrumbs"><a href="index11.php">Главная страница</a> \ <span>Все товары</span></p>
            <ul id="option-list">
                <li>Вид:</li>
                <li><img id="style-grid" src="https://img.icons8.com/metro/420/activity-grid-2.png"></li>
                <li><img id="style-list" src="https://img.icons8.com/metro/420/list.png" /></li>
                <li>Сортировка:</li>
                <li><a id="select-sort">Нет сортировки</a>
                    <ul id="sorting-list">

                        <li><a href="index12.php?sort = priceasc">От дешевых к дорогим</a></li>
                        <li><a href="index12.php?sort = pricedesc">От дорогих к дешевым</a></li>
                        <li><a href="index12.php?sort = popular">Популярное</a></li>
                        <li><a href="index12.php?sort = news">Новинки</a></li>
                        <li><a href="index12.php?sort = brand">От А до Я</a></li>

                    </ul>
                </li>
            </ul>
        </div>
        <ul id="block-tovar-grid">
            <?php

            if (!empty($cat) && !empty($type)){
                $querycat = "AND brand '$cat' AND type_tovara ='$type'";
            }else{
                if(!empty($type)){
                    $querycat = "AND type_tovara='$type'";
                }else{
                    $querycat= "";
                }
            }

            $result = mysqli_query($link,"SELECT * FROM table_products WHERE visible='1' $querycat ORDER BY $sorting");
            if (mysqli_num_rows($result) > 0 )
            {
                $row = mysqli_fetch_array($result);

                do
                {

                    if ($row["image"] != "" && file_exists("./imageskurs/".$row["image"]))
                    {
                        $img_path = './imageskurs/'.$row["image"];
                        $max_width = 200;
                        $max_height = 200;
                        list($width, $height) = getimagesize($img_path);
                        $ratioh = $max_height/$height;
                        $ratiow = $max_width/$width;
                        $ratio = min($ratioh, $ratiow);
                        $width = intval($ratio*$width);
                        $height = intval($ratio*$height);
                    }else
                    {
                        $img_path = "no_image.jpg";
                        $width = 200;
                        $height = 200;
                    }

                    echo '
       
        <li>
        
         <div class="block-images-grid">
         
          <img src="'.$img_path.'" width ="'.$width.'" height = "'.$height.'" />
          
         </div>
         
         <p class="style-title-grid"> <a href="">'.$row["title"].'</a></p>
         <a><img class="img-korz-grid" src="https://s3.amazonaws.com/cdn.freshdesk.com/data/helpdesk/attachments/production/11001410572/original/shopping109.png?1455021247" /></a>
         <p class="style-price-grid"><strong>'.$row["price"].'</strong> грн.</p>
         <div class="mini-features">'.$row["mini_features"].'</div>
        
        </li>';

                }

                while ($row = mysqli_fetch_array($result));
            }

            ?>
        </ul>


        <ul id="block-tovar-list">
            <?php
            $result = mysqli_query($link,"SELECT * FROM table_products WHERE visible='1' $querycat ORDER BY $sorting");
            if (mysqli_num_rows($result) > 0 )
            {
                $row = mysqli_fetch_array($result);

                do
                {

                    if ($row["image"] != "" && file_exists("./imageskurs/".$row["image"]))
                    {
                        $img_path = './imageskurs/'.$row["image"];
                        $max_width = 200;
                        $max_height = 200;
                        list($width, $height) = getimagesize($img_path);
                        $ratioh = $max_height/$height;
                        $ratiow = $max_width/$width;
                        $ratio = min($ratioh, $ratiow);
                        $width = intval($ratio*$width);
                        $height = intval($ratio*$height);
                    }else
                    {
                        $img_path = "no_image.jpg";
                        $width = 80;
                        $height = 70;
                    }

                    echo '
       
        <li>
        
         <div class="block-images-list">
         
          <img src="'.$img_path.'" width ="'.$width.'" height = "'.$height.'" />
          </div>
         
         
         <p class="style-title-list"> <a href="">'.$row["title"].'</a></p>
         
         
         
         <a><img class="img-korz-list" src="https://s3.amazonaws.com/cdn.freshdesk.com/data/helpdesk/attachments/production/11001410572/original/shopping109.png?1455021247" /></a>
         <p class="style-price-list"><strong>'.$row["price"].'</strong> грн.</p>
         <div class="mini-features-list">'.$row["mini_description"].'</div>
        
        </li>';

                }

                while ($row = mysqli_fetch_array($result));
            }

            ?>
        </ul>
    </div>








    <div id="block-footer">
        <div id="bottom-line"></div>
        <div id="footer-notebook">
            <h4>Служба поддержки</h4>
            <h3>8-800-555-35-35</h3>
            <p>Рабочие дни: Пн.-Сб.<br />
                Часы работы: 9:00-20:00.
            </p>
        </div>
        <div class="footer-list">
            <p>Сервис и Помощь</p>
            <ul>
                <li><a href="">Как сделать заказ</a></li>
                <li><a href="">Способ оплаты</a></li>
                <li><a href="">Возврат</a></li>
                <li><a href="">Публичная оферта</a></li>
            </ul>

        </div>
        <div class="footer-list">
            <p>О компании:</p>
            <ul>
                <li><a href="">О нас</a></li>
                <li><a href="">Вакансии</a></li>
                <li><a href="">Партнерам</a></li>
                <li><a href="">Контакты</a></li>
            </ul>

        </div>
        <div class="footer-list">
            <p>Навигация</p>
            <ul>
                <li><a href="scratch.html">Главная страница</a></li>
                <li><a href="">Обратная связь</a></li>

            </ul>

        </div>
    </div>

</div>



</body>




</html>
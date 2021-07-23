<?php
include ("db_connect.php");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Registration</title>
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
           <h2 class="h2-title">Регистрация</h2>
        <form method="post" id="form_reg" action="handler_reg.php">


            <p id="reg_message"></p>

            <div id="block-form-registration">

                <ul id="form-registration">
                    <li>
                        <label>Логин</label>
                        <span class="star">*</span>
                        <input type="text" name="reg_login" id="reg_login" />
                    </li>
                    <li>
                        <label>Пароль</label>
                        <span class="star">*</span>
                        <input type="text" name="reg_pass" id="reg_pass" />
                        <span id="genpass">Сгенерировать!</span>
                    </li>
                    <li>
                        <label>E-mail</label>
                        <span class="star">*</span>
                        <input type="text" name="reg_email" id="reg_email" />
                    </li>


                </ul>
            </div>
            <p align="right"><input type="submit" name="reg_submit" id="form_submit" value="Регистрация" /></p>
        </form>

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
<?php

ob_start();
require_once('../../php/dblogin.php');
$pdo = new PDO('mysql:host='.$host.';dbname='.$db.';port=3306', $user, $pass);

?>
<h1 class="admin__headline">Klienci</h1>
<div class="admin__add">
        <button class="admin__add--addBtn">Dodaj</button>
        <div class="nav__user--search admin__add--search">
          <input type="text" placeholder="Wyszukaj..." id="searchBar"/><i id="searchBtn" class="fa-solid fa-magnifying-glass"></i>
        </div>
</div>
<div class="admin__products">
<?php
$query = $pdo -> query('select login from user');
while ($row = $query->fetch()){
    $param = http_build_query([
        'item' => $row['login']
    ]);
    $delParams = http_build_query([
        'item' => $row['login'],
        'table' => 'user',
        'column' => 'login'
    ]);
    $html = '<div class="admin__product">
    <p class="admin__product--name">'.$row['login'].'</p>
    <a href="./edit_customer.php?'.$param.'" class="admin__add--addBtn admin__product--edit">Edytuj dane</a>
    <a href="../../php/admin_panel/delete_item.php?'.$delParams.'" class="admin__add--addBtn admin__product--delete">Usuń</a>
    </div>';
    echo $html;
}
?>

<div class="admin__popup">
      <div class="admin__contentContainer admin__contentContainerUser">
        <button class="admin__contentContainer--closeBtn"><i class="fa-solid fa-x"></i></button>
        <form class="admin__contentContainer" id="create-product-form" method="post">
            <!-- <div class="admin__formContainersBox"> -->
            <input type="hidden" name="filename" id="filename" value="customers">
                <div class="admin__formContainer">
                    <label for="name">Imię:</label>
                    <input type="text" name="firstname" id="firstname" class="admin__contentContainer--input" placeholder="Imię">
                </div>
                <div class="admin__formContainer">
                    <label for="name">Nazwisko:</label>
                    <input type="text" name="lastname" id="lastname" class="admin__contentContainer--input" placeholder="Nazwisko">
                </div>
                <div class="admin__formContainer">
                    <label for="name">E-mail:</label>
                    <input type="email" name="email" id="email" class="admin__contentContainer--input" placeholder="Email">
                </div>
                <div class="admin__formContainer">
                    <label for="login">Login:</label>
                    <input type="text" name="login" id="login" class="admin__contentContainer--input" placeholder="Login">
                </div>
                <div class="admin__formContainer">
                    <label for="password">Hasło:</label>
                    <input type="password" name="password" id="password" class="admin__contentContainer--input" placeholder="Hasło">
                </div>
                <div class="admin__formContainer">
                    <label for="password2">Powtórz hasło:</label>
                    <input type="password" name="password2" id="password2" class="admin__contentContainer--input" placeholder="Powtórz hasło">
                </div>
                <div class="admin__formContainer">
                    <label for="phone">Telefon:</label>
                    <input type="number" name="phone" id="phone" class="admin__contentContainer--input" placeholder="Telefon">
                </div>
                <div class="admin__formContainer">
                    <label for="address">Ulica i numer:</label>
                    <input type="text" name="address" id="address" class="admin__contentContainer--input" placeholder="Ulica i numer">
                </div>
                <div class="admin__formContainer">
                    <label for="postcode">Kod pocztowy:</label>
                    <input type="text" name="postcode" id="postcode" class="admin__contentContainer--input" placeholder="Kod pocztowy">
                </div>
                <div class="admin__formContainer">
                    <label for="city">Miasto:</label>
                    <input type="text" name="city" id="city" class="admin__contentContainer--input" placeholder="Miasto">
                </div>
                <div class="admin__formContainer">
                    <label for="isAdmin">isAdmin:</label>
                    <select name="isAdmin" id="isAdmin" class="admin__contentContainer--input">
                        <option value="0">Nie</option>
                        <option value="1">Tak</option>
                    </select>
                </div>
                <div class="admin__formContainer">
                    <label for="name">isActive:</label>
                    <select name="isActive" id="isActive" class="admin__contentContainer--input">
                        <option value="1">Tak</option>
                        <option value="0">Nie</option>
                    </select>
                </div>
            <!-- </div> -->
            <div class="admin__formContainer">
                <button type="submit" class="admin__contentContainer--addProduct">Dodaj</button>
            </div>
        </form>
      </div>
    </div>
    </div>
<?php

$body=ob_get_contents(); 
ob_end_clean();

require "./admin_panel.php";

?>
<?php
ob_start();
require_once('../../php/dblogin.php');
$pdo = new PDO('mysql:host='.$host.';dbname='.$db.';port=3306', $user, $pass);
?>
<h1 class="admin__headline">Sposoby płatności</h1>
<div class="admin__add">
        <button class="admin__add--addBtn">Dodaj</button>
        <div class="nav__user--search admin__add--search">
          <input type="text" placeholder="Wyszukaj..." id="searchBar"/><i id="searchBtn" class="fa-solid fa-magnifying-glass"></i>
        </div>
</div>
<div class="admin__categories">
<?php

$sql = 'select id, payment_name, isActive from payment';
$query = $pdo -> prepare($sql);
$query -> execute();
while ($row = $query->fetch()){
    $param = http_build_query([
      'item' => $row['payment_name']
    ]);
    $delParams = http_build_query([
      'item' => $row['payment_name'],
      'table' => 'payment',
      'column' => 'payment_name'
    ]);
    $html = '<div class="admin__category admin__payment">
    <p class="admin__product--name">'.$row['payment_name'].'</p>
    <a href="./edit_payment.php?'.$param.'" class="admin__add--addBtn admin__payment--btn">Edytuj</a>
    <a href="../../php/admin_panel/delete_item.php?'.$delParams.'" class="admin__add--addBtn admin__payment--btn">Usuń</a>
    </div>';
    echo $html;
}
?>
    <div class="admin__popup">
      <div class="admin__contentContainer">
        <button class="admin__contentContainer--closeBtn"><i class="fa-solid fa-x"></i></button>
        <form id="create-product-form" method="post">
        <input type="hidden" name="filename" id="filename" value="payment">
            <div class="admin__formContainer">
                <label for="name">Nazwa sposobu płatności:</label>
                <input type="text" name="name" id="name" class="admin__contentContainer--input" placeholder="Nazwa sposobu płatności">
            </div>
            <div class="admin__formContainer">
                <label for="cost">Prowizja za płatność (%):</label>
                <input type="number" name="cost" id="cost" class="admin__contentContainer--input" placeholder="Prowizja">
            </div>
            <button type="submit" class="admin__contentContainer--addProduct">Dodaj</button>
        </form>
      </div>
    </div>
</div>
<?php
$body=ob_get_contents(); 
ob_end_clean();

require "./admin_panel.php";
<?php

ob_start();
require_once('../../php/dblogin.php');
$pdo = new PDO('mysql:host='.$host.';dbname='.$db.';port=3306', $user, $pass);
?>
<h1 class="admin__headline">Zamówienia</h1>
<div class="admin__products">
<?php
$sql = 'select id from order_details';
$query = $pdo->prepare($sql);
$query -> execute();
while ($row = $query->fetch()):
    $param = http_build_query([
        'item' => $row['id']
    ]);
    $delParams = http_build_query([
        'item' => $row['id'],
        'table' => 'order_details',
        'column' => 'id'
    ]);
?>
    <div class="admin__product">
    <p class="admin__product--name">Nr zamówienia: <?=$row['id']?></p>
    <a href="./edit_order.php?<?=$param?>" class="admin__add--addBtn admin__product--edit">Edytuj</a>
    <a href="../../php/admin_panel/delete_item.php?<?=$delParams?>" class="admin__add--addBtn admin__product--delete">Usuń</a>
    </div>
<?php endwhile; ?>

    <div class="admin__popup">
      <div class="admin__contentContainer">
        <button class="admin__contentContainer--closeBtn"><i class="fa-solid fa-x"></i></button>
        <form id="create-product-form" method="post">
        <input type="hidden" name="filename" id="filename" value="orders">
            <!-- <div class="admin__formContainer">
                <label for="name">Nazwa kategorii:</label>
                <input type="text" name="name" id="name" class="admin__contentContainer--input" placeholder="Nazwa kategorii">
            </div> -->
            <button type="submit" class="admin__contentContainer--addProduct">Dodaj</button>
        </form>
      </div>
    </div>
</div>
<?php
$body=ob_get_contents(); 
ob_end_clean();

require "./admin_panel.php";
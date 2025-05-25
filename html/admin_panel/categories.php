<?php

ob_start();
require_once('../../php/dblogin.php');
$pdo = new PDO('mysql:host='.$host.';dbname='.$db.';port=3306', $user, $pass);
?>
<h1 class="admin__headline">Kategorie</h1>
<div class="admin__add">
        <button class="admin__add--addBtn">Dodaj</button>
        <div class="nav__user--search admin__add--search">
          <input type="text" placeholder="Wyszukaj..." id="searchBar"/><i id="searchBtn" class="fa-solid fa-magnifying-glass"></i>
        </div>
</div>
<div class="admin__categories">
<?php
$query = $pdo -> query('select category_name from category;');
while ($row = $query->fetch()){
    $delParams = http_build_query([
        'item' => $row['category_name'],
        'table' => 'category',
        'column' => 'category_name'
    ]);
    
    $html = '<div class="admin__category">
    <p class="admin__product--name">'.$row['category_name'].'</p>
    <a href="../../php/admin_panel/delete_item.php?'.$delParams.'" class="admin__add--addBtn admin__product--delete">Usuń</a>
    </div>';
    echo $html;
}
?>
    <div class="admin__popup">
      <div class="admin__contentContainer">
        <button class="admin__contentContainer--closeBtn"><i class="fa-solid fa-x"></i></button>
        <form id="create-product-form" method="post">
        <input type="hidden" name="filename" id="filename" value="categories">
            <div class="admin__formContainer">
                <label for="name">Nazwa kategorii:</label>
                <input type="text" name="name" id="name" class="admin__contentContainer--input" placeholder="Nazwa kategorii">
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
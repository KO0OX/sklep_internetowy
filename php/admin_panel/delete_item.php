<?php
include '../../html/menu_component.php';
if(!isset($_SESSION['loggedIn']) || !$_SESSION['loggedIn'] || !$_SESSION["isAdmin"]){
 header('Location: ../../index.php');
}
if(!empty($_GET)){
    $_SESSION['name'] = $_GET['item'];
    $_SESSION['table'] = $_GET['table'];
    $_SESSION['column'] = $_GET['column'];
}
if(isset($_POST['submit'])){
    require_once('../dblogin.php');
    $photo_id = $address_id = $user_id = $product_id = 0;
    if($_SESSION['table'] == "product"){
        $sql = 'select id, photo_id from product where product_name like ?';
        $stmt = $pdo ->prepare($sql);
        $stmt -> execute([$_SESSION['name']]);
        $ids = $stmt -> fetch();
        $product_id = $ids['id'];
        $photo_id = $ids['photo_id'];
    }else if($_SESSION['table'] == 'user'){
        $sql = 'select address_id from user where login like ?';
        $stmt = $pdo ->prepare($sql);
        $stmt -> execute([$_SESSION['name']]);
        $address_id = $stmt -> fetchColumn();
    }
    $sql = 'delete from '.$_SESSION['table'].' where '.$_SESSION['column'].' like ?';
    $stmt = $pdo ->prepare($sql);
    $stmt -> execute([$_SESSION['name']]);
    if($_SESSION['table'] == "product"){
        $sql = 'delete from photos where id = ?';
        $stmt = $pdo ->prepare($sql);
        $stmt -> execute([$photo_id]);
        $sql = 'delete from `product-params` where product_id = ?';
        $stmt = $pdo ->prepare($sql);
        $stmt -> execute([$product_id]);
        header('Location: ../../html/admin_panel/index.php');
    }else if($_SESSION['table'] == 'user'){
        $sql = 'delete from address where id = ?';
        $stmt = $pdo ->prepare($sql);
        $stmt -> execute([$address_id]);
        header('Location: ../../html/admin_panel/customers.php');
    }else if($_SESSION['table'] == 'order_details'){
        $sql = 'delete from order_product where order_id = ?';
        $stmt = $pdo -> prepare($sql);
        $stmt -> execute([$_SESSION['name']]);
        header('Location: ../../html/admin_panel/orders.php');
    }else if($_SESSION['table'] == 'shipping'){
        header('Location: ../../html/admin_panel/shipping.php');
    }else if($_SESSION['table'] == 'payment'){
        header('Location: ../../html/admin_panel/payment.php');
    }else if($_SESSION['table'] == 'info_pages'){
        $sql = 'delete from info_pages where filename = ?';
        $stmt = $pdo -> prepare($sql);
        $stmt -> execute([$_SESSION['name']]);
        unlink('../../html/info_pages/'.$_SESSION['name']);
        unlink('../../html/info_pages/'.$_SESSION['name'].'.php');
        header('Location: ../../html/admin_panel/info_editor.php');
    }
}

?>
<!DOCTYPE html>
<html lang="pl">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="../../img/logo_transparent.png" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap"
      rel="stylesheet"
    />
    <script
      src="https://kit.fontawesome.com/bec5797acb.js"
      crossorigin="anonymous"
    ></script>
    <link rel="stylesheet" href="../../css/main.css" />
    <title>Panel administratora</title>
  </head>
  <body>
  <?php
    echo $nav;
  ?>
  <div class="admin__popup--shadow"></div>
  <main class="user admin">
    <section class="user__menu admin__menu">
      <a href="../../html/admin_panel/index.php" class="user__menu--item admin__menu--item link link-animation-two">Zarządzanie produktami</a>
      <a href="./categories.php" class="user__menu--item admin__menu--item link link-animation-two">Zarządzanie kategoriami</a>
      <a href="./customers.php" class="user__menu--item admin__menu--item link link-animation-two">Zarządzanie klientami</a>
      <a href="./orders.php" class="user__menu--item admin__menu--item link link-animation-two">Zamówienia użytkowników</a>
      <a href="./shipping.php" class="user__menu--item admin__menu--item link link-animation-two">Ustawienia dostawy</a>
      <a href="./payment.php" class="user__menu--item admin__menu--item link link-animation-two">Ustawienia płatności</a>
      <a href="./info_editor.php" class="user__menu--item admin__menu--item link link-animation-two">Edytuj strony informacyjne</a>
    </section>
    <section class="user__section admin__section admin__section--delete">
        <form action="<?=$_SERVER['PHP_SELF']?>" method="post">
            <div class="admin__formContainer">
                <p class="admin__product--name">Czy na pewno chcesz usunąć tę pozycję?</p>
                <input type="text" name="name" id="name" class="admin__contentContainer--input"  value="<?=$_SESSION['name']?>" readonly>
                <br>
                <input type="submit" name="submit" class="admin__contentContainer--addProduct" value="Tak">
                <a href="../../html/admin_panel/index.php" class="linkButton">Anuluj</a>
            </div>
        </form>
      </section>
  </main>
  <script src="../../js/admin_panel.js"></script>
</body>
</html>

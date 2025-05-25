<?php
include '../../html/menu_component.php';

if (!isset($_SESSION['loggedIn']) || !$_SESSION['loggedIn'] || !$_SESSION["isAdmin"]) {
    header('Location: ../../index.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'GET' && !empty($_GET)) {
    $_SESSION['name'] = $_GET['item'];
    $_SESSION['table'] = $_GET['table'];
    $_SESSION['column'] = $_GET['column'];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    require_once('../dblogin.php');

    $photo_id = $address_id = $product_id = 0;

    if ($_SESSION['table'] === "product") {
        $stmt = $pdo->prepare('SELECT id, photo_id FROM product WHERE product_name LIKE ?');
        $stmt->execute([$_SESSION['name']]);
        $ids = $stmt->fetch();
        $product_id = $ids['id'];
        $photo_id = $ids['photo_id'];

        $pdo->prepare('DELETE FROM order_product WHERE product_id = ?')->execute([$product_id]);
        $pdo->prepare('DELETE FROM `product-params` WHERE product_id = ?')->execute([$product_id]);
    } elseif ($_SESSION['table'] === 'user') {
        $stmt = $pdo->prepare('SELECT address_id FROM user WHERE login LIKE ?');
        $stmt->execute([$_SESSION['name']]);
        $address_id = $stmt->fetchColumn();
    }

    $stmt = $pdo->prepare('DELETE FROM ' . $_SESSION['table'] . ' WHERE ' . $_SESSION['column'] . ' LIKE ?');
    $stmt->execute([$_SESSION['name']]);

    if ($_SESSION['table'] === "product") {
        $pdo->prepare('DELETE FROM photos WHERE id = ?')->execute([$photo_id]);
        header('Location: ../../html/admin_panel/index.php');
        exit;
    } elseif ($_SESSION['table'] === 'user') {
        $pdo->prepare('DELETE FROM address WHERE id = ?')->execute([$address_id]);
        header('Location: ../../html/admin_panel/customers.php');
        exit;
    } elseif ($_SESSION['table'] === 'order_details') {
        $pdo->prepare('DELETE FROM order_product WHERE order_id = ?')->execute([$_SESSION['name']]);
        header('Location: ../../html/admin_panel/orders.php');
        exit;
    } elseif ($_SESSION['table'] === 'shipping') {
        header('Location: ../../html/admin_panel/shipping.php');
        exit;
    } elseif ($_SESSION['table'] === 'payment') {
        header('Location: ../../html/admin_panel/payment.php');
        exit;
    } elseif ($_SESSION['table'] === 'info_pages') {
        $pdo->prepare('DELETE FROM info_pages WHERE filename = ?')->execute([$_SESSION['name']]);
        @unlink('../../html/info_pages/' . $_SESSION['name']);
        @unlink('../../html/info_pages/' . $_SESSION['name'] . '.php');
        header('Location: ../../html/admin_panel/info_editor.php');
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="pl">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="shortcut icon" href="../../img/logo_transparent.png" type="image/x-icon">
  <link rel="stylesheet" href="../../css/main.css" />
  <title>Panel administratora</title>
</head>
<body>
<?php echo $nav; ?>
<div class="admin__popup--shadow"></div>
<main class="user admin">
  <section class="user__menu admin__menu">
    <a href="../../html/admin_panel/index.php" class="user__menu--item admin__menu--item">Zarządzanie produktami</a>
    <a href="../../html/admin_panel/categories.php" class="user__menu--item admin__menu--item">Zarządzanie kategoriami</a>
    <a href="../../html/admin_panel/customers.php" class="user__menu--item admin__menu--item">Zarządzanie klientami</a>
    <a href="../../html/admin_panel/orders.php" class="user__menu--item admin__menu--item">Zamówienia użytkowników</a>
    <a href="../../html/admin_panel/shipping.php" class="user__menu--item admin__menu--item">Ustawienia dostawy</a>
    <a href="../../html/admin_panel/payment.php" class="user__menu--item admin__menu--item">Ustawienia płatności</a>
    <a href="../../html/admin_panel/info_editor.php" class="user__menu--item admin__menu--item">Edytuj strony informacyjne</a>
  </section>

  <section class="user__section admin__section admin__section--delete">
    <form action="<?=$_SERVER['PHP_SELF']?>" method="post">
      <div class="admin__formContainer">
        <p class="admin__product--name">Czy na pewno chcesz usunąć tę pozycję?</p>
        <input type="text" name="name" id="name" class="admin__contentContainer--input" value="<?=htmlspecialchars($_SESSION['name'])?>" readonly>
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

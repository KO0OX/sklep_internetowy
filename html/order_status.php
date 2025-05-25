<?php
  include './menu_component.php';
?>
<!DOCTYPE html>
<html lang="pl">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="shortcut icon"
      href="../../img/logo_transparent.png"
      type="image/x-icon"
    />

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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/main.css" />
    <title>Sklep</title>
  </head>
  <body>
    <?php
      echo $nav;

      require_once('../php/dblogin.php');
      $sql;
      $sql = 'select order_details.id, total, payment_name, shipper_name, status from order_details inner join payment on order_details.payment_id=payment.id inner join shipping on order_details.shipping_id=shipping.id where order_details.id = ?';
    $query = $pdo -> prepare($sql);
    $query -> execute([$_GET['order_id']]);
    $order_info = $query -> fetch();
    
    $sql = 'select firstname, lastname, mail, telephone, address_id, order_id, invoice_name, invoice_mail, invoice_telephone, invoice_address_id from order_data where order_id = ?';
    $query = $pdo -> prepare($sql);
    $query -> execute([$_GET['order_id']]);
    $user_info = $query -> fetch();
    $sql = 'select city, postal, address from address where id = ?';
    $query = $pdo -> prepare($sql);
    $query -> execute([$user_info['address_id']]);
    $address_info = $query -> fetch();

    $query -> execute([$user_info['invoice_address_id']]);
    $invoice_address_info = $query -> fetch();
    ?>
    <main class="cart summary">
        <h2>Status zamówienia: <?=$order_info['status']?></h2>
        <div class="order__delivery summary__infoBox">
            <h3>Dane do wysyłki</h3>
            <p><span>Imię i nazwisko: </span><?=$user_info['firstname'].' '.$user_info['lastname']?></p>
            <p><span>Ulica i numer domu / mieszkania: </span><?=$address_info['address']?></p>
            <p><span>Kod pocztowy: </span><?=$address_info['postal']?></p>
            <p><span>Miejscowość: </span><?=$address_info['city']?></p>
            <p><span>Numer telefonu: </span><?=$user_info['telephone']?></p>
            <p><span>Adres e-mail: </span><?=$user_info['mail']?></p>
        </div>
        <div class="order__delivery summary__infoBox">
            <h3>Dane do faktury</h3>
            <p><span>Imię i nazwisko: </span><?=$user_info['invoice_name']?></p>
            <p><span>Ulica i numer domu / mieszkania: </span><?=$invoice_address_info['address']?></p>
            <p><span>Kod pocztowy: </span><?=$invoice_address_info['postal']?></p>
            <p><span>Miejscowość: </span><?=$invoice_address_info['city']?></p>
            <p><span>Numer telefonu: </span><?=$user_info['invoice_telephone']?></p>
            <p><span>Adres e-mail: </span><?=$user_info['invoice_mail']?></p>
        </div>
        <div class="order__delivery summary__infoBox">
            <h3>Płatność i dostawa</h3>
            <p><span>Sposób dostawy: </span><?=$order_info['shipper_name']?></p>
            <p><span>Płatność: </span><?=$order_info['payment_name']?></p>
            <p><span>Łączna wartość: </span><?=$order_info['total']?> zł</p>
        </div>
        <div class="order__delivery summary__infoBox">
            <?php
              $sql = 'select product_id, quantity from order_product where order_id = ?';
              $query = $pdo -> prepare($sql);
              $query -> execute([$_GET['order_id']]);
              while ($product = $query -> fetch()):
                $sql = 'select product_name, price, path from product inner join photos on product.photo_id=photos.id where product.id = ?';
                $query = $pdo -> prepare($sql);
                $query -> execute([$product['product_id']]);
                $row = $query -> fetch();
            ?>
            <div class="cart__product">
                <img src="<?=$row['path']?>" alt="" class="cart__product--img">
                <p class="cart__product--name"><?=$row['product_name']?></p>
                <p class="cart__product--price"><?=$row['price']?> zł</p>
                <div class="number">
                <h4>x <?=$product['quantity']?></h4>
                </div>
            </div>
            <?php endwhile; ?>
        </div>
        <a href="../index.php" class="linkButton summary__backButton"><i class="ti ti-chevron-left"></i>Wróć na stronę główną</a>
    </main>
    <footer class="text-light py-4 text-center">
      <?php
			  include './footer_component.php';
			  echo $footer;
		  ?>
		  <p class="mb-0"> &copy; 2025 | Sunrise</p>
	  </footer>
  </body>
</html>


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
    <link rel="stylesheet" href="../../css/main.css" />
    <title>Sklep</title>
  </head>
  <body>
    <?php
      include '../menu_component.php';
      echo $nav
    ?>
    <main class="cart">
    <div class="popup">
          <button class="admin__contentContainer--closeBtn closeBtn" id="closeBtn"><i class="fa-solid fa-x"></i></button>
          <p>Koszyk jest pusty</p>
      </div>
      <section class="cart__left">
        <div class="cart__addons">
          <h3>Koszyk  (<span id="productCount"></span>)</h3>
            <a id="clearCart"><i class="fa-solid fa-trash"></i>Wyczyść koszyk</a>
        </div>
        <div class="cart__products">
          <?php 
            if(isset($_SESSION['cart']) || empty($_SESSION['cart'])):
              $cart = $_SESSION['cart'] ?? [];
              require_once('../../php/dblogin.php');
              for($i = 0; $i<count($cart); $i++):
                $item = $cart[$i];
                $sql = 'select product.id, product_name, price, path from product inner join photos on product.photo_id=photos.id where product.id = ?';
                $query = $pdo -> prepare($sql);
                $query -> execute([$item[0]]);
                $row = $query -> fetch();
          ?>
            <div class="cart__product" id="<?=$row['id']?>">
                <img src="<?=$row['path']?>" alt="" class="cart__product--img">
                <p class="cart__product--name"><?=$row['product_name']?></p>
                <p class="cart__product--price"><?=$row['price']?> zł</p>
                <div class="number">
                  <span class="minus">-</span>
                  <input class="quantity" type="text" value="<?=$item[1]?>"/>
                  <span class="plus">+</span>
                </div>
                <button class="cart__product--delete"><i class="fa-solid fa-trash"></i></button>
            </div>
          <?php
            endfor;
            endif;
          ?>
        </div>
      </section>
      <section class="cart__right">
        <div class="cart__buySection">
            <button class="cart__buySection--promoBtn">Masz kod promocyjny?<i class="ti ti-chevron-down"></i></button>
            <div class="input-box" id="promobox">
                <input type="text" id="promocode" name="promocode">
                <button>Aktywuj</button>
            </div>
            <div class="cart__priceSection">
                <div class="priceBox">
                    <p>Łączna kwota</p>
                    <p class="price"></p>
                </div>
                <a href="./login_or_register.php" class="cart__priceSection--buyBtn">Przejdź do dostawy<i class="ti ti-chevron-right"></i></a>
            </div>
        </div>
      </section>
    </main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
	<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script src="../../js/cart.js"></script>
  </body>
  <footer class="text-light py-4 text-center">
		<?php
			include '../footer_component.php';
			echo $footer;
		?>
		<p class="mb-0"> &copy; 2025 | Sunrise</p>
	</footer>
</html>

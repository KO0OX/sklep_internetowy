<!DOCTYPE html>
<html lang="pl">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="shortcut icon"
      href="../img/logo_transparent.png"
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
    <link
			rel="stylesheet"
			href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css"
		/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link
			rel="stylesheet"
			type="text/css"
			href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"
		/>
    <link rel="stylesheet" href="../../css/main.css" />
    <title>Sklep</title>
  </head>
  <body>
    <?php
    include '../category_pages/menu_component.php';
    echo $nav
    ?>
        <main class="product">
        <div class="product__topSection">
          <input type="hidden" id="productId" value="60">
            <div class="product__image" style="background-image: url('../../img/t_img.png');">
            </div>
            <div class="product__specs">
                <p id="productName" class="product__specs--headline">t</p>
                <div class="product__specs__info">
                    <div class="product__specs__text">
                      <ul>
                                            </ul>
                    </div>
                    <div class="product__specs__price">
                      <p class="product__specs__price--price">3 zł</p>
                      <div class="number">
                        <span class="minus">-</span>
                        <input type="text" value="1" id="quantity"/>
                        <span class="plus">+</span>
                      </div>
                      <button id="addToCart" class="linkButton">Dodaj do koszyka</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="product__bottomSection">
          <h2 class="product__bottomSection--headline">Opis i cechy</h2>
          <div class="product__bottomSection--text">
          <i class="fa-solid fa-wine-bottle"></i>
            <p></p>
          </div>
          <img src="../../img/t_img.png" alt="">
          <table class="product__bottomSection--table">
                    </table>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script
			type="text/javascript"
			src="//code.jquery.com/jquery-1.11.0.min.js"
		></script>
		<script
			type="text/javascript"
			src="//code.jquery.com/jquery-migrate-1.2.1.min.js"
		></script>
		<script
			type="text/javascript"
			src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"
		></script>
		<script src="../../js/slick.js"></script>
  <script src="../../js/product.js"></script>
  </body>
</html>

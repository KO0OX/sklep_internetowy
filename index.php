<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="pl">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="shortcut icon"
      href="./img/logo_transparent.png"
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
    <link rel="stylesheet" href="css/main.css" />
    <title>Sklep</title>
  </head>
  <body>
    <nav class="nav__mobile">
      <button class="nav__mobile--bars"><i class="fa-solid fa-bars"></i></button>
      <div class="nav__mobileMenu">
        <ul>
            <li class="menu-item one">
              <p>Alkohole mocne</p>
                <ul class="dropdown dropdown-one">
                    <li>Whisky</li>
                    <li>Gin</li>
                    <li>Wódka</li>
                    <li>Rum</li>
                    <li>Tequila</li>
                </ul>
            </li>
            <hr>
            <li class="menu-item two">
                <p>Wina</p>
                <ul class="dropdown dropdown-two">
                    <li>Wytrawne</li>
                    <li>Słodkie</li>
                    <li>Półsłodkie</li>
                    <li>Musujące</li>
                </ul>
            </li>
            <hr>
            <li class="menu-item three">
            <p>Piwo</p>
                <ul class="dropdown dropdown-three">
                    <li>IPA</li>
                    <li>ALE</li>
                    <li>Lager</li>
                    <li>Stout</li>
                    <li>Pilzner</li>
                </ul>
            </li>
            <hr>
            <li class="menu-item four">
            <p>Kursy</p>
          </li>
          <hr>
        </ul>
      </div>
    </nav>
    <!-- <div style="position: absolute; width: 100%;"> -->
    <nav class="nav__desktop">
      <div class="nav__items">
        <a href="./index.php" class="nav__item--logo"></a>
        <a href="./html/category_pages/strong-alcohol.php" class="nav__item link link-animation">Alkohole mocne</a>
        <div class="nav__dropdown nav__dropdown--one">
          <div class="nav__dropdown--left">
            <a href="./html/category_pages/strong-whisky.php" class="link link-animation">Whisky</a>
            <a href="./html/category_pages/strong-gin.php" class="link link-animation">Gin</a>
            <a href="./html/category_pages/strong-wodka.php" class="link link-animation">Wódka</a>
            <a href="./html/category_pages/strong-rum.php" class="link link-animation">Rum</a>
            <a href="./html/category_pages/strong-tequila.php" class="link link-animation">Tequila</a>
          </div>
          <div class="nav__dropdown--right">
            <img src="./img/placeholder_image.jpg" alt="">
            <p>Lorem ipsum, quia dol</p>
            <p>150zł</p>
          </div>
        </div>
        <a href="./html/category_pages/wine.php" class="nav__item link link-animation wine">Wina</a>
        <div class="nav__dropdown nav__dropdown--two">
          <div class="nav__dropdown--left">
            <a href="./html/category_pages/wine-dry.php" class="link link-animation">Wytrawne</a>
            <a href="./html/category_pages/wine-sweet.php" class="link link-animation">Słodkie</a>
            <a href="./html/category_pages/wine-semisweet.php" class="link link-animation">Półsłodkie</a>
            <a href="./html/category_pages/wine-sparkling.php" class="link link-animation">Musujące</a>
          </div>
          <div class="nav__dropdown--right">
            <img src="./img/placeholder_image.jpg" alt="">
            <p>Lorem ipsum, quia dol</p>
            <p>150zł</p>
          </div>
        </div>
        <a href="./html/category_pages/beer.php" class="nav__item link link-animation beer">Piwa</a>
        <div class="nav__dropdown nav__dropdown--three">
          <div class="nav__dropdown--left">
            <a href="./html/category_pages/beer-ipa.php" class="link link-animation">IPA</a>
            <a href="./html/category_pages/beer-ale.php" class="link link-animation">ALE</a>
            <a href="./html/category_pages/beer-lager.php" class="link link-animation">Lager</a>
            <a href="./html/category_pages/beer-stout.php" class="link link-animation">Stout</a>
            <a href="./html/category_pages/beer-pilzner.php" class="link link-animation">Pilzner</a>
          </div>
          <div class="nav__dropdown--right">
            <img src="./img/placeholder_image.jpg" alt="">
            <p>Lorem ipsum, quia dol</p>
            <p>150zł</p>
          </div>
        </div>
        <a href="./html/category_pages/courses.php" class="nav__item link link-animation courses">Kursy</a>
      </div>
      <div class="nav__user">
        <div class="nav__user--search">
          <input type="text" id="searchBar" placeholder="Wyszukaj..." /><i id="searchBtn"
            class="fa-solid fa-magnifying-glass"
          ></i>
        </div>
        <a href="./html/order/cart.php" class="nav__user--cart"
          ><i class="fa-solid fa-cart-shopping"></i
        ><p>Koszyk</p></a>
        <?php if(isset($_SESSION['loggedIn']) && $_SESSION['loggedIn']): ?>
          <a href="./html/user_panel" class="nav__user--cart login-btn">
          <i class="fa-solid fa-user"></i>
          <p>Twoje konto</p>
          </a>
          <a href="./php/logout.php" class="nav__user--cart login-btn">
          <i class="fa-solid fa-right-from-bracket"></i>
          <p>Wyloguj się</p></a> 
        <?php else: ?>
          <a href="./html/login_page.php" class="nav__user--cart login-btn">
          <i class="fa-solid fa-right-to-bracket"></i>
          <p>Zaloguj się</p></a>
        <?php endif; ?>
      </div>
    </nav>
    <header class="header">
      <div class="header__img">
				<div class="header__img--shadow"></div>
				<div class="header__img--text">
					<h1 data-aos="fade-up" data-aos-delay="200">Sunrise</h1>
					<p data-aos="fade-up" data-aos-delay="400">Tu znajdziesz to czego szukasz</p>
					<a data-aos="fade-up" data-aos-delay="600" href="#aboutus" type="button" class="btn btn-outline-light"
						>Poznaj nas</a
					>
				</div>
			</div>
    </header>
    <main>
    <section id="aboutus" class="aboutus py-5">
				<div class="container">
					<h2 class="headline">o nas</h2>
					<div class="underline"></div>
					<div class="row">
						<div class="col-sm-6 col-md-4 text-center aboutus-hover">
							<p><i class="fa-solid fa-truck-fast"></i></p>
							<p class="aboutus-card-title mb-1">Szybka wysyłka</p>
							<p class="aboutus-card-text">Lorem ipsum dolor sit amet.</p>
						</div>
						<div class="col-sm-6 col-md-4 text-center aboutus-hover">
							<p><i class="fa-solid fa-tag"></i></p>
							<p class="aboutus-card-title mb-1">Najwyższe ceny</p>
							<p class="aboutus-card-text">Lorem ipsum dolor sit amet.</p>
						</div>
						<div class="col-sm-6 col-md-4 text-center aboutus-hover">
							<p><i class="fa-solid fa-marker"></i></p>
							<p class="aboutus-card-title mb-1">Najniższe standardy</p>
							<p class="aboutus-card-text">
								Lorem ipsum dolor sit amet.
							</p>
						</div>
					</div>
				</div>
			</section>
      <section id="news" class="news py-5">
				<h2 class="headline">Nowości</h2>
				<div class="underline"></div>

				<div class="container pb-4">
					<div id="carouselExampleCaptions" class="carousel slide d-none d-lg-block" data-bs-ride="carousel"
					>
						<div class="carousel-indicators">
							<button
								type="button"
								data-bs-target="#carouselExampleCaptions"
								data-bs-slide-to="0"
								class="active"
								aria-current="true"
								aria-label="Slide 1"
							></button>
							<button
								type="button"
								data-bs-target="#carouselExampleCaptions"
								data-bs-slide-to="1"
								aria-label="Slide 2"
							></button>
						</div>
						<div class="carousel-inner">
							<div class="carousel-item active">
								<img
									src="./img/whiskey-2171646_1920.jpg"
									class="d-block w-100"
									alt="Butelka whisky"
								/>
								<div class="carousel-caption d-none d-md-block">
									<h3>Nikka Whisky</h3>
									<p>
										Lorem ipsum dolor sit amet consectetur.
									</p>
								</div>
							</div>
							<div class="carousel-item">
								<img
									src="./img/irish-whiskey-2152126_1920.jpg"
									class="d-block w-100"
									alt="Butelka whisky"
								/>
								<div class="carousel-caption d-none d-md-block">
									<h3>Tullamore Dew</h3>
									<p>
										Lorem ipsum dolor sit amet consectetur.
									</p>
								</div>
							</div>
						</div>
						<button
							class="carousel-control-prev"
							type="button"
							data-bs-target="#carouselExampleCaptions"
							data-bs-slide="prev"
						>
							<span
								class="carousel-control-prev-icon"
								aria-hidden="true"
							></span>
							<span class="visually-hidden">Previous</span>
						</button>
						<button
							class="carousel-control-next"
							type="button"
							data-bs-target="#carouselExampleCaptions"
							data-bs-slide="next"
						>
							<span
								class="carousel-control-next-icon"
								aria-hidden="true"
							></span>
							<span class="visually-hidden">Next</span>
						</button>
					</div>

					<div class="card-group d-lg-none">
						<div class="card me-sm-3">
							<img
								src="./img/whiskey-2171646_1920.jpg"
								class="card-img-top"
								alt="Butelka whisky"
							/>
							<div class="card-body">
								<h3 class="card-title">Nikka whisky</h3>
								<p class="card-text">
									This is a wider card with supporting text below as a natural
									lead-in to additional content. This content is a little bit
									longer.
								</p>
							</div>
						</div>
						<div class="card ms-sm-3">
							<img
								src="./img/irish-whiskey-2152126_1920.jpg"
								class="card-img-top"
								alt="Butelka whiskey"
							/>
							<div class="card-body">
								<h3 class="card-title">Tullamore Dew</h3>
								<p class="card-text">
									This card has supporting text below as a natural lead-in to
									additional content.
								</p>
							</div>
						</div>
					</div>
				</div>
			</section>
      <section id="bestsellers" class="bestsellers py-5">
				<h2 class="headline">Bestsellery</h2>
				<div class="underline"></div>
				<div class="team-shadow"></div>
				<div class="container">			
					<div class="card-group team-carousel">
            <div class="card mx-3">
              <img src="./img/whisky.png" class="card-img-top" alt="Butelka whisky">
              <div class="card-body">
                <h5 class="card-title">Singleton</h5>
                <p class="card-text">Lorem ipsum dolor sit amet.</p>
              </div>
            </div>
            <div class="card mx-3">
              <img src="./img/irish-whiskey-2152126_1920.jpg" class="card-img-top" alt="Butelka whisky">
              <div class="card-body">
                <h5 class="card-title">Nazwa</h5>
                <p class="card-text">Lorem ipsum dolor sit amet.</p>
              </div>
            </div>
            <div class="card mx-3">
              <img src="./img/whiskey-2171646_1920.jpg" class="card-img-top" alt="Butelka whisky">
              <div class="card-body">
                <h5 class="card-title">Nazwa</h5>
                <p class="card-text">Lorem ipsum dolor sit amet.</p>
              </div>
            </div>
				  </div>
				</div>
			</section>
      <div id="achievements" class="achievements p-5">
				<h2 class="headline">osiągnięcia</h2>
				<div class="underline"></div>
				<div class="container">
					<div class="row text-center achievements-list">
						<div class="col-md-6 col-lg-4 col-xl-2 achievements">
							<i class="ti ti-thumb-up"></i>
							<p class="achievement-number">100%</p>
							<p class="achievement-text">zadowolonych klientów</p>
						</div>
						<div class="col-md-6 col-lg-4 col-xl-2 achievements">
							<i class="ti ti-trophy"></i>
							<p class="achievement-number">10</p>
							<p class="achievement-text">zdobytych nagród</p>
						</div>
						<div class="col-md-6 col-lg-4 col-xl-2 achievements">
							<i class="ti ti-users"></i>
							<p class="achievement-number">50</p>
							<p class="achievement-text">pracowników</p>
						</div>
						<div class="col-md-6 col-lg-4 col-xl-2 achievements">
							<i class="ti ti-building-community"></i>
							<p class="achievement-number">5</p>
							<p class="achievement-text">nowoczesnych biur</p>
						</div>
						<div class="col-md-6 col-lg-4 col-xl-2 achievements">
              <i class="ti ti-truck-delivery"></i>
							<p class="achievement-number">20</p>
							<p class="achievement-text">umów ze znanymi dostawcami</p>
						</div>
						<div class="col-md-6 col-lg-4 col-xl-2 achievements">
							<i class="ti ti-share"></i>
							<p class="achievement-number">80.000</p>
							<p class="achievement-text">fanów na social media</p>
						</div>
					</div>
				</div>
			</div>
      <section id="contact" class="contact py-5">
				<h2 class="headline">kontakt</h2>
				<div class="underline"></div>
				<div class="container">
					<div class="row text-center contact-us">
						<div class="col-sm-6 col-lg-4 contact-item order-1">
							<h3>główna siedziba</h3>
							<p>ul. Długa 0</p>
							<p>00-000 Kraków</p>
							<p>+48 000 000 000</p>
							<p>mail@mail.pl</p>
						</div>
						<div class="col-lg-4 order-0 order-lg-1 contact-item">
							<h3>social media</h3>
							<div class="social-media">
								<a href="#"><i class="ti ti-brand-facebook"></i></a>
								<a href="#"><i class="ti ti-brand-twitter"></i></a>
								<a href="#"><i class="ti ti-brand-linkedin"></i></a>
							</div>
						</div>
						<div class="col-sm-6 col-lg-4 contact-item order-1">
							<h3>siedziba w warszawie</h3>
							<p>ul. Kwiatowa 9</p>
							<p>00-000 Warszawa</p>
							<p>+48 000 000 000</p>
							<p>mail@mail.pl</p>
						</div>
					</div>
				</div>
				<div class="contact-shadow"></div>
			</section>	
    </main>
    <footer class="text-light py-4 text-center">
		<?php
			include './html/footer_component.php';
			echo $footer;
		?>
		<p class="mb-0"> &copy; 2025 | Sunrise</p>
	</footer>
    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="./js/index.js"></script>
  </body>
</html>

<!DOCTYPE html>
<head>
	<link rel="stylesheet" href="{{ asset('css/style.css') }}">
	<link rel="stylesheet" href="{{ asset('css/reset-style.css') }}">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
	<meta charset="UTF-8">
	<title>{{ env('APP_NAME') }}</title>
</head>
<body>
	<div class="logo">
		<div id="wrapper">
			<div class="logo__inner">
				<div class="logo__main">
					<img src="{{ asset('img/logo.png') }}" alt="Guvernul Republicii Moldova" id="logo">
					<h2 id="site-name">
						Ministerul Finanțelor
					</h2>
				</div>
				<div class="logo__second">
					<div class="logo__list">
						<a href="#" class="logo__link">Acasă</a>
						<a href="#" class="logo__link">Programul ”Prima Casă”</a>
						<a href="#" class="logo__link">Contacte</a>
					</div>
					<div class="logo__country">
						<img class="logo__country-item" src="{{ asset('img/flags/md.png') }}" alt="">
						<img class="logo__country-item" src="{{ asset('img/flags/ru.png') }}" alt="">
						<img class="logo__country-item" src="{{ asset('img/flags/us.png') }}" alt="">
					</div>
				</div>
			</div>
		</div>
	</div>

	<header class="header">
		<div id="wrapper">
			<div class="header__inner">
				<div class="header__list">
					<a href="#" class="header__link">Despre Minister</a>
					<a href="#" class="header__link">Legislatie</a>
					<a href="#" class="header__link">Transparenta decizionala</a>
					<a href="#" class="header__link">Media</a>
					<a href="#" class="header__link">Finantele publice locale</a>
					<a href="#" class="header__link">Asistenta externa</a>
					<a href="#" class="header__link">Cariere</a>
				</div>
				<div class="header__input">
					<input class="header__input-item" type="text">
				</div>
				<div class="header__social">
					<img src="{{ asset('img/facebook-gray.png') }}" alt="">
					<img src="{{ asset('img/youtube-gray.png') }}" alt="">
					<img src="{{ asset('img/rss-gray.png') }}" alt="">
				</div>
			</div>
		</div>
	</header>

	<div class="main">
		<div id="wrapper">
			<div class="main__content">
				<div class="main__nav">
					<a href="https://mf.gov.md/ro" class="main__nav-link">Acasa</a><p class="main__simbol">»</p><p class="main__text"> Generarea codului IBAN pentru încasări</p>
				</div>

			</div>
		</div>

	</div>

	<footer class="footer">
		<div id="wrapper">

		</div>
	</footer>
</body>
</html>

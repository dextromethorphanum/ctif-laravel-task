<!DOCTYPE html>
<head>
	<link rel="stylesheet" href="{{ asset('css/style.css') }}">
	<link rel="stylesheet" href="{{ asset('css/select2.css') }}">
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
				<div class="header__menu">
					<ul>
						<li><a href="#" class="header__link">Despre Minister</a></li>
						<li><a href="#" class="header__link">Legislatie</a></li>
						<li><a href="#" class="header__link">Transparenta decizionala</a></li>
						<li><a href="#" class="header__link">Media</a></li>
						<li><a href="#" class="header__link">Finantele publice locale</a></li>
						<li><a href="#" class="header__link">Asistenta externa</a></li>
						<li><a href="#" class="header__link">Cariere</a></li>
					</ul>
				</div>
				<form class="header__input">
					<input class="header__input-item" type="text">
					<button type="submit"></button>
				</form>
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
					<a href="https://mf.gov.md/ro" class="main__nav-link">Acasa</a><p class="main__symbol">»</p><p class="main__text"> Generarea codului IBAN pentru încasări</p>
				</div>

			</div>
		</div>

	</div>

	<div class="rtecenter">
		<form class="iban_form" action="/iban" method="post" name="iban_form">
			<ul>
				<li>
					</li><li>
					<label for="cod_anul">Anul:</label>
					<select class="js-example-basic-single" name="anul">
						<option value="2022">2022</option>			
						<option value="2021">2021</option>
						<option value="2020">2020</option>
						<option value="2019">2019</option>
						<option value="2018">2018</option>
						<option value="2017">2017</option>			
					</select>
					<p style="display: inline; padding-left: 25px;">Descarca registru</p>
					<div id="iban-export" class="dcsv"></div>
					</li>

					<li>
						<label  for="cod_eco">Codul Eco:</label>
						<select class="js-example-basic-single" name="eco">

						@foreach ($data_eco_codes as $eco_code)
							<option value="{{ $eco_code->code; }}">{{ $eco_code->code; }} — {{ $eco_code->label; }}</option>
						@endforeach
						
						<br></select>
					</li>

					<li>
						<label >Raionul:</label>
						<select class="js-example-basic-single" name="raion" onchange="changeRaion(this.value)">

						@foreach ($data_districts as $district)
							<option value="{{ $district->code; }}">{{ $district->code; }} — {{ $district->name; }}</option>
						@endforeach

						</select>
					</li>  

					<li>  
						<label for="cod_loc">Localitatea:</label>
						<select name="loc" class="js-example-basic-single"> 		
							{{-- <option value=''> - </option> <br>  --}}
						</select>
					</li> 

					<li>
						<b class="spoiler-title">        	
							<button name="submit" class="submit" type="submit">Afiseaza codul IBAN</button>
						</b>
					<div class="spoiler-body"><div id="page-preloader"></div></div>
				</li>
			</ul>
		</form>
		<div id="iban-placeholder"> </div>
	</div>

	<footer class="footer">
		<div id="wrapper">

		</div>
	</footer>

	<script>
		var kdEco = '' ;
		var kdRaion = '' ;
		var kdLoc = '' ;
	</script>
	<script type="text/javascript" src="{{ asset('js/jquery-2.1.4.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/select2.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/custom.js') }}"></script>
</body>
</html>

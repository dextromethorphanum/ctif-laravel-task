@extends('layouts.mfbase')
@section('page_title', 'Generarea codului IBAN pentru încasări')
@section('auth-link', '')

@section('content')
	@parent
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
		<center><div id="iban-placeholder"></div></center>
		<div class="main__last_info">
			<center style="margin: 40px 0px 0 0;">
			<a href="https://mf.gov.md/sites/default/files/Ord%20153_27.12.2021_Modul%20de%20Incasare%20a%202022_modificat.pdf" target="_blank">
				Ordinul nr. 153 din 27.12.2021 cu privire la modul de achitare şi evidență a plăților la bugetul public naţional prin sistemul trezorerial al Ministerului Finanţelor în anul 2022
				</a>
			</center>
			<p>&nbsp;</p>
			<center style="margin: 0px 0px 40px 0;">
				<iframe allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen="" frameborder="0" height="340" src="{{ asset('stuff/XbXr7tTM7Dw._html') }}" width="620"></iframe>
			</center>
			<p>&nbsp;</p>
		</div>
@endsection

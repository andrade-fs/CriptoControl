@extends('layouts.master')
@section('titulo',"CriptoControl")
@section('contenido')
<ol class="breadcrumb mb-4">
	<h1 class="h3 mb-0 text-gray-800">Top 24h: Capitalización de mercado</h1>
</ol>
<div class="row">


<!-- Winnes -->
<div class="col-xl-6 col-lg-6">
	<div class="card shadow mb-4">
	
		<!-- Card Header - Dropdown -->
			<div class="card border-left-success shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-success text-uppercase mb-1">
								<h3>Ganadores (24h)</h3></div>
				
								<div class="h5 mb-0 font-weight-bold text-gray-800">
				
									<!-- Card Body -->
									<div class="card-body">
										<br>								

										<div class="table-responsive">
										<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
											<thead>
												<tr><th>Moneda</th>
													<th>Cap Merc</th>
													<th>Valor</th>
													<th>Subida</th>
													{{-- <th>Precio de entrada</th> --}}
												</tr>
											</thead>
											<tbody>
												
												<?php
													foreach($winners as $win){
												
														echo "<tr><td class=\"text-dark\"><b>".$win['symbol']."</b></td>";
															if(round($win['quote']['USD']['market_cap'],2) == 0){
																echo " <td class=\"text-dark\">$ <0.01</td>";

															}else{
																echo " <td class=\"text-dark\">$". round($win['quote']['USD']['market_cap'],2)."</td>";

															}
															if(round($win['quote']['USD']['price'],2) == 0){
																echo " <td class=\"text-dark\">$ <0.01</td>";

															}else{
																echo "<td class=\"text-dark\">$". round($win['quote']['USD']['price'],2)."</td>";

															}
                                                        echo "<td class=\"text-dark\">". round($win['quote']['USD']['percent_change_24h'],2)."%</td></tr>";
													}

												?>
											</tbody>
										</table>
									</div>
										
									</div>
								</div>

							</div>
						</div>
					</div>
			</div>
	</div>
</div>	

<!-- Loossers -->
<div class="col-xl-6 col-lg-6">
	<div class="card shadow mb-4">
	
		<!-- Card Header - Dropdown -->
			<div class="card border-left-danger shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
								<h3>Perdedores (24h)</h3></div>
				
								<div class="h5 mb-0 font-weight-bold text-gray-800">
				
									<!-- Card Body -->
									<div class="card-body">
										<br>
										<div class="table-responsive">
										<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
											<thead>
												<tr><th>Moneda</th>
													<th>Cap Merc</th>
													<th>Valor</th>
													<th>Subida</th>
													{{-- <th>Precio de entrada</th> --}}
												</tr>
											</thead>
											<tbody>
												
												<?php
													foreach($lossers as $loss){
												
														echo "<tr><td class=\"text-dark\"><b>".$loss['symbol']."</b></td>";
															if(round($loss['quote']['USD']['market_cap'],2) == 0){
																echo " <td class=\"text-dark\">$ <0.01</td>";

															}else{
																echo " <td class=\"text-dark\">$". round($loss['quote']['USD']['market_cap'],2)."</td>";

															}
															if(round($loss['quote']['USD']['price'],2) == 0){
																echo " <td class=\"text-dark\">$ <0.01</td>";

															}else{
																echo "<td class=\"text-dark\">$". round($loss['quote']['USD']['price'],2)."</td>";

															}
                                                        echo "<td class=\"text-dark\">". round($loss['quote']['USD']['percent_change_24h'],2)."%</td></tr>";
													}

												?>
											</tbody>
										</table>
									</div>
										
									</div>
								</div>

							</div>
						</div>
					</div>
			</div>
	</div>
</div>
</div>
<ol class="breadcrumb mb-4">
	<h1 class="h3 mb-0 text-gray-800">Resumen del mercado general</h1>
</ol>
<!-- TradingView Widget BEGIN -->
<div class="tradingview-widget-container ">
	<div class="tradingview-widget-container__widget"></div>
	<div class="tradingview-widget-copyright"><a href="https://es.tradingview.com/markets/cryptocurrencies/prices-all/" rel="noopener" target="_blank"><span class="blue-text">TradingView</span></a></div>
	<script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-screener.js" async>
	{
	"width": "100%",
	"height": "610",
	"defaultColumn": "overview",
	"screener_type": "crypto_mkt",
	"displayCurrency": "USD",
	"colorTheme": "dark",
	"locale": "es"
  }
	</script>
  </div>
  <!-- TradingView Widget END -->
	<!--__--__--__--__--  T H E    S L I D E R --__--__--__--___--__--__--__-->
	


@endsection()
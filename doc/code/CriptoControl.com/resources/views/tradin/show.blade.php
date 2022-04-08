@extends('layouts.master')
@section('titulo',"CriptoControl")
@section('contenido')
<ol class="breadcrumb mb-4">
	<h1 class="h3 mb-0 text-gray-800">Grafico criptocurrencies</h1>
</ol>
<!-- TradingView Widget BEGIN -->
{{-- <form action="{{ route('tradingPost')}}" method="POST">
    @csrf
<label for="">Moneda:</label>
<select class='mi-selector'  class="form-control form-control-user @error('precio_compra') is-invalid @enderror" name="moneda" id="moneda"  required>
                                       
    @for ($i = 0; $i < count($monedas); $i++) 
      <?php 
          echo "<option value='{$monedas[$i]['symbol']}'>{$monedas[$i]['symbol']}</option>";
      ?>
  @endfor 

      
</select>
  @error('moneda')
      <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
      </span>
  @enderror
  <button type="submit" class="btn btn-primary" value="Mostrar datos">Mostrar Datos</button>
</form> --}}
<hr >

@if(isset($criptocurrenci) && $criptocurrenci != "")
 
<div class="tradingview-widget-container">
    <div id="tradingview_4fa2c"></div>
    <div class="tradingview-widget-copyright"><a href="https://es.tradingview.com/symbols/{{ $criptocurrenci }}USDT/?exchange=BINANCE" rel="noopener" target="_blank"><span class="blue-text">BTCUSDT Gráfico</span></a> por TradingView</div>
    <script type="text/javascript" src="https://s3.tradingview.com/tv.js"></script>
    <script type="text/javascript">
    new TradingView.widget(
    {
    "width": "100%",
    "height": "650px",
    "symbol": "BINANCE:BTCUSDT",
    "interval": "1",
    "timezone": "Europe/Madrid",
    "theme": "dark",
    "style": "1",
    "locale": "es",
    "toolbar_bg": "#f1f3f6",
    "enable_publishing": false,
    "allow_symbol_change": true,
    "show_popup_button": true,
    "popup_width": "1000",
    "popup_height": "650",
    "container_id": "tradingview_4fa2c"
  }
    );
    </script>
  </div>
  <!-- TradingView Widget END -->
@else

<div class="tradingview-widget-container">
  <div id="tradingview_4fa2c"></div>
  <div class="tradingview-widget-copyright"><a href="https://es.tradingview.com/symbols/BTCUSDT/?exchange=BINANCE" rel="noopener" target="_blank"><span class="blue-text">BTCUSDT Gráfico</span></a> por TradingView</div>
  <script type="text/javascript" src="https://s3.tradingview.com/tv.js"></script>
  <script type="text/javascript">
  new TradingView.widget(
  {
  "width": "100%",
  "height": "650px",
  "symbol": "BINANCE:BTCUSDT",
  "interval": "1",
  "timezone": "Europe/Madrid",
  "theme": "dark",
  "style": "1",
  "locale": "es",
  "toolbar_bg": "#f1f3f6",
  "enable_publishing": false,
  "allow_symbol_change": true,
  "show_popup_button": true,
  "popup_width": "1000",
  "popup_height": "650",
  "container_id": "tradingview_4fa2c"
}
  );
  </script>
</div>
<!-- TradingView Widget END -->
@endif





@endsection()
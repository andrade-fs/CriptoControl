$.get('/chart/pie', function(datos) {
  labels = [];
  data = [];
  altcoins = 0;
  console.log(datos);
  datos['data'].forEach(function(element){
  
    if((element['precio']/datos['total'])*100 <= 1){
     altcoins += (element['precio']/datos['total'])*100;
     console.log(element['precio'])
    }else{
      labels.push(element['moneda'])
      data.push((element['precio']/datos['total'])*100)
    }
  });
  if(altcoins != 0){
    labels.push('small balances');
    if(altcoins>1){
      data.push(altcoins);
    }else{
      data.push(1);

    }
  }


   console.log(labels);
   console.log(data);

// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

// Pie Chart Example
var ctx = document.getElementById("myPieChart");
var myPieChart = new Chart(ctx, {
  type: 'doughnut',
  data: {
    labels: labels,
    datasets: [{
      data: data,
      backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc','#19E180','#19BD6E','#9D47F4','#F2D625','#F22525'],
      hoverBackgroundColor: ['#4e73df', '#1cc88a', '#36b9cc','#19E180','#19BD6E','#9D47F4','#F2D625','#F22525'],
      hoverBorderColor: "rgba(234, 236, 244, 1)",
    }],
  },
  options: {
    maintainAspectRatio: false,
    tooltips: {
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 20,
      yPadding: 30,
      displayColors: false,
      caretPadding: 10,
    },
    legend: {
      display: true
    },
    cutoutPercentage: 70,
  },
});
});
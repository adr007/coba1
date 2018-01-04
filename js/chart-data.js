
var randomScalingFactor = function(){ return Math.round(Math.random()*1000)};

	var barChartData = {
			labels : ["2016","2017","2018"],
			datasets : [
				{
					fillColor : "#FF3333",
					strokeColor : "rgba(220,220,220,0.8)",
					highlightFill: "#FF3300",
					highlightStroke: "rgba(220,220,220,1)",
					data : [123,randomScalingFactor(),randomScalingFactor()]
				},
				{
					fillColor : "rgba(48, 164, 255, 0.2)",
					strokeColor : "rgba(48, 164, 255, 0.8)",
					highlightFill : "rgba(48, 164, 255, 0.75)",
					highlightStroke : "rgba(48, 164, 255, 1)",
					data : [333,randomScalingFactor(),randomScalingFactor()]
				},
				{
					fillColor : "#CCFF66",
					strokeColor : "#339900",
					highlightFill : "#CCFF33",
					highlightStroke : "#00FF33",
					data : [144,randomScalingFactor(),randomScalingFactor()]
				}
			]
	
		}

	var lineChartData = {
			labels : ["January","February","March"],
			datasets : [
				{
					
				},
				{
					
				},
				{
					
				}
			]

		}

	
window.onload = function(){
	var chart1 = document.getElementById("line-chart").getContext("2d");
	window.myLine = new Chart(chart1).Line(lineChartData, {
		responsive: true
	});
	var chart2 = document.getElementById("bar-chart").getContext("2d");
	window.myBar = new Chart(chart2).Bar(barChartData, {
		responsive : true
	});
	var chart3 = document.getElementById("doughnut-chart").getContext("2d");
	window.myDoughnut = new Chart(chart3).Doughnut(doughnutData, {responsive : true
	});
	var chart4 = document.getElementById("pie-chart").getContext("2d");
	window.myPie = new Chart(chart4).Pie(pieData, {responsive : true
	});
	
};
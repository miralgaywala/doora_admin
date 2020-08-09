<script type="text/javascript">
   $(document).ready(function(){
            $(".select2").select2(); 
        });

// for deal purchased most


   $(document).ready(function(){
      $('#deal_purchased_year').change(function(){
        // loadcategoryfilter($(this).find(':selected').val())
        loaddeal_purchased_year($(this).find(':selected').val())
      })
    })
        function loaddeal_purchased_year(deal_purchased_year){
      
        var deal_purchased_year = deal_purchased_year;
        function getRandomColor() {
		  var letters = '0123456789ABCDEF';
		  var color = '#';
		  for (var i = 0; i < 6; i++) {
		    color += letters[Math.floor(Math.random() * 16)];
		  }
		  return color;
		}
        $.ajax({
		   url: '../../Controller/report/report_filter.php',
		   type: 'POST',
		   data:{deal_purchased_year:deal_purchased_year},
		   success: function(data) {
		   
		  	if(data == '[]')
		   	{
		   		var pieChartContent = document.getElementById('pieChartContent');
				pieChartContent.innerHTML = '<canvas style="height:230px;"><canvas>';
		   	}
		   	else
		   	{
		   	 arr = jQuery.parseJSON(data);
		   	 var labels = [];
		   	 var PieData1 = [];
		   	 var rgt_count = arr.length;
				for(var i = 0; i < rgt_count; i++) {
					var color = ['#f56954','#00a65a','#f39c12','#3c8dbc'];
					var ele = arr[i];
					var color = color[i];
					  labels.push({label:ele.offer_title,value:ele.total_deal,color:color,highlight:color});
					}
					var pieChartContent = document.getElementById('pieChartContent');
					pieChartContent.innerHTML = '';
					$('#pieChartContent').append('<canvas id="pieChart3" style="height:230px;"><canvas>');
					var pieChartCanvas = $('#pieChart3').get(0).getContext('2d')
					    var pieChart       = new Chart(pieChartCanvas)
					    PieData1 = labels
					    var pieOptions     = {
					    	tooltipEvents: [],
					        showTooltips: true,
					        onAnimationComplete: function() {
					            this.showTooltip(this.segments, true);
					        },
					      tooltipTemplate: "<%= label %> - <%= value %>",
					      segmentShowStroke    : true,
					      segmentStrokeColor   : '#fff',
					      segmentStrokeWidth   : 2,
					      percentageInnerCutout: 50, 
					      animationSteps       : 100,
					      animationEasing      : 'easeOutBounce',
					      animateRotate        : true,
					      animateScale         : false,    
					      responsive           : true,
					      maintainAspectRatio  : true,

					      legendTemplate       : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<segments.length; i++){%><li><span style="background-color:<%=segments[i].fillColor%>"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>'
					    }
					   

  						
					   pieChart.Doughnut(PieData1, pieOptions)
					   
			}		    
		 }
    });
}


//for gender


$(document).ready(function(){
      $('#gender').change(function(){
        // loadcategoryfilter($(this).find(':selected').val())
        loadgender($(this).find(':selected').val())
      })
    })
        function loadgender(year_time){
      
        var year_time = year_time;
        function getRandomColor() {
		  var letters = '0123456789ABCDEF';
		  var color = '#';
		  for (var i = 0; i < 6; i++) {
		    color += letters[Math.floor(Math.random() * 16)];
		  }
		  return color;
		}
        $.ajax({
		   url: '../../Controller/report/gender_report_filter.php',
		   type: 'POST',
		   data:{year_time:year_time},
		   success: function(data) {
		   
		  	if(data == '[]')
		   	{
		   		var pieChartContent = document.getElementById('pieChartContent1');
				pieChartContent.innerHTML = '<canvas style="height:230px;"><canvas>';
		   	}
		   	else
		   	{
		   	 arr = jQuery.parseJSON(data);
		   	 var labels = [];
		   	 var PieData1 = [];
		   	 var rgt_count = arr.length;
				for(var i = 0; i < rgt_count; i++) {
					var color = ['#f56954','#00a65a','#f39c12','#3c8dbc'];
					var ele = arr[i];
					var color = color[i];
					  labels.push({label:ele.gender,value:ele.users,color:color,highlight:color,backgroundColor:color});
					}
					var pieChartContent = document.getElementById('pieChartContent1');
					pieChartContent.innerHTML = '';
					$('#pieChartContent1').append('<canvas id="pieChart2" style="height:230px;"><canvas>');
					var pieChartCanvas = $('#pieChart2').get(0).getContext('2d')
					    var pieChart       = new Chart(pieChartCanvas)
					    PieData1 = labels

					    var pieOptions     = {

					      segmentShowStroke    : true,
					      segmentStrokeColor   : '#fff',
					      segmentStrokeWidth   : 2,
					      percentageInnerCutout: 50, 
					      animationSteps       : 100,
					      animationEasing      : 'easeOutBounce',
					      animateRotate        : true,
					      animateScale         : false,    
					      responsive           : true,
					      maintainAspectRatio  : true,
					      legendTemplate       : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<segments.length; i++){%><li><span style="background-color:<%=segments[i].fillColor%>"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>'
					    }
					    pieChart.Doughnut(PieData1, pieOptions)
			}		    
		 }
    });
}


// category and sub-category
$(document).ready(function(){
      $('#category_list').change(function(){
        loadcategory()
      })

  })
$(document).ready(function(){
      $('#year_time_categry').change(function(){
        loadcategory()
      })
    })
        function loadcategory(){
      	var category = $('#category_list').val();
      	var year_time = $('#year_time_categry').val();
      	console.log(category);
      	console.log(year_time);
        function getRandomColor() {
		  var letters = '0123456789ABCDEF';
		  var color = '#';
		  for (var i = 0; i < 6; i++) {
		    color += letters[Math.floor(Math.random() * 16)];
		  }
		  return color;
		}
        $.ajax({
		   url: '../../Controller/report/category_report_filter.php',
		   type: 'POST',
		   data:{year_time:year_time,category:category},
		   success: function(data) {
		   	
		  	if(data == '[]')
		   	{
		   		var pieChartContent = document.getElementById('pieChartContent3');
				pieChartContent.innerHTML = '<canvas style="height:230px;"><canvas>';
		   	}
		   	else
		   	{
		   	 arr = jQuery.parseJSON(data);
		   	 var labels = [];
		   	 var PieData1 = [];
		   	 var rgt_count = arr.length;
				for(var i = 0; i < rgt_count; i++) {
					//var color = ['#f56954','#00a65a','#f39c12','#3c8dbc'];
					var ele = arr[i];
					var color = getRandomColor();
					  labels.push({label:ele.name,value:ele.total_deal,color:color,highlight:color});
					}
					var pieChartContent = document.getElementById('pieChartContent3');
					pieChartContent.innerHTML = '';
					$('#pieChartContent3').append('<canvas id="pieChart1" style="height:230px;"><canvas>');
					var pieChartCanvas = $('#pieChart1').get(0).getContext('2d')
					    var pieChart       = new Chart(pieChartCanvas)
					    PieData1 = labels
					    var pieOptions     = {
					    	
					      segmentShowStroke    : true,
					      segmentStrokeColor   : '#fff',
					      segmentStrokeWidth   : 2,
					      percentageInnerCutout: 50, 
					      animationSteps       : 100,
					      animationEasing      : 'easeOutBounce',
					      animateRotate        : true,
					      animateScale         : false,    
					      responsive           : true,
					      maintainAspectRatio  : true,
					      legendTemplate       : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<segments.length; i++){%><li><span style="background-color:<%=segments[i].fillColor%>"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>'
					    }
					    pieChart.Doughnut(PieData1, pieOptions)
			}		    
		 }
    });
}


//business and time wise

$(document).ready(function(){
      $('#business_list').change(function(){
        loadbusinessreport()
      })

  })
$(document).ready(function(){
      $('#business_year').change(function(){
        loadbusinessreport()
      })
    })


function loadbusinessreport(){
      	var business_list = $('#business_list').val();
      	var business_year = $('#business_year').val();
      	if(business_year == 'last 1 year')
      	{
        $.ajax({
		   url: '../../Controller/report/business_report_filter.php',
		   type: 'POST',
		   data:{business_list:business_list,business_year:business_year},
		   success: function(data) {
		  	var monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sept", "Oct", "Nov", "Dec"];

			var today = new Date();
			var d;
			var month = [];

			for(var i = 11; i >= 0; i -= 1) {
			  d = new Date(today.getFullYear(), today.getMonth() - i);
			 month.push(monthNames[d.getMonth()]+ ',' + d.getFullYear());
			}

		  //  	if(data == '[]')
		  //  	{
		  //  		var pieChartContent = document.getElementById('pieChartContent4');
				// pieChartContent.innerHTML = '<canvas style="height:230px;"><canvas>';
		  //  	}
		  //  	else
		  //  	{	
		   		var arr = jQuery.parseJSON(data);
		   	 	var rgt_count = arr.length;
		   	 	var business_time = '';
		   	 	var label = month;
		   	 	
		   	 	var rgt_count = arr.length;
		   	 	var year = [];
		   	 	var value = [];
				for(var i = 0; i < rgt_count; i++) {
					var ele = arr[i];
					var year_ele = ele.business_time;
					  year.push(year_ele);
					  value.push(ele.total_deal);
					}
					
		   	 		var newArray = [];
		   	 		var value1 = 0;
		   	 		
				for (var i = 0; i < label.length; i++) {
				    var match = false; 
				    for (var j = 0; j < year.length; j++) 
				    {
				    	var value1 = 0;
				        if (label[i] == year[j]) 
				        {
				            value1 = value[j];
				            match = true;
				            break;
				        }
				    }
				    if (!match) {
				        newArray.push(value1);
				    }
				    else
				    {
				    	newArray.push(value1);
				    }
				}
				var areaChart = {
					      labels  : label,
					      datasets: [
					        {
					          data : newArray
					        }
					      ]
					    }
						    var pieChartContent = document.getElementById('pieChartContent4');
							pieChartContent.innerHTML = '';
							$('#pieChartContent4').append('<canvas id="barChart1" style="height:230px;"><canvas>');
					     var barChartCanvas                   = $('#barChart1').get(0).getContext('2d')
					    var barChart                         = new Chart(barChartCanvas)
					    var barChartData                     = areaChart
					    barChartData.datasets[0].fillColor   = '#00a65a'
					    barChartData.datasets[0].strokeColor = '#00a65a'
					    barChartData.datasets[0].pointColor  = '#00a65a'
					    var barChartOptions                  = {
	
					      //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
					      scaleBeginAtZero        : false,
					      //Boolean - Whether grid lines are shown across the chart
					      scaleShowGridLines      : true,
					      //String - Colour of the grid lines
					      scaleGridLineColor      : 'rgba(0,0,0,.05)',
					      //Number - Width of the grid lines
					      scaleGridLineWidth      : false,
					      //Boolean - Whether to show horizontal lines (except X axis)
					      scaleShowHorizontalLines: false,
					      //Boolean - Whether to show vertical lines (except Y axis)
					      scaleShowVerticalLines  : true,
					      //Boolean - If there is a stroke on each bar
					      barShowStroke           : false,
					      //Number - Pixel width of the bar stroke
					      barStrokeWidth          : 5,
					      //Number - Spacing between each of the X value sets
					      barValueSpacing         : 20,
					      //Number - Spacing between data sets within X values
					      barDatasetSpacing       : 0,
					      //String - A legend template
					      legendTemplate          : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].fillColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',
					      //Boolean - whether to make the chart responsive
					      responsive              : true,
					      maintainAspectRatio     : true
					    }
					    barChartOptions.datasetFill = false
					    barChart.Bar(barChartData, barChartOptions)
		   		}
		   //	}
    });
    }
    else if(business_year == 'last 30 days')
    {
		var today = new Date();
		var dd = today.getDate();
		var mm = today.getMonth() + 1; //January is 0!
		var yyyy = today.getFullYear();

		if (dd < 10) {
		  dd = '0' + dd;
		}

		if (mm < 10) {
		  mm = '0' + mm;
		}

		today = mm + '/' + dd + '/' + yyyy;
		function getNDaysBefore(dateString, numberOfDaysBefore) {
		    let startingDate = new Date(dateString).getTime();
		    let datesArray = [],
		        daysCounter = 0,
		        day = 1000 * 60 * 60 * 24;
		    while (daysCounter < numberOfDaysBefore + 1) {
		        let newDateBeforeStaring = startingDate - day * daysCounter;
		        var dateobj = new Date(newDateBeforeStaring); 
		        var monthNames = ["Jan", "Feb", "Mar", "Apr", "May","Jun","Jul", "Aug", "Sep", "Oct", "Nov","Dec"];
		        var dd = dateobj.getDate();
				var yyyy = monthNames[dateobj.getMonth()];
				if (dd < 10) {
				  dd = '0' + dd;
				} 
				var date = dd + ',' + yyyy; 
		        datesArray.push(date);
		        daysCounter++;
		    }
		    return datesArray;
		}
		var dateString = today;
		 var numberOfDaysBefore = 30;

    	$.ajax({
		   url: '../../Controller/report/business_report_filter.php',
		   type: 'POST',
		   data:{business_list:business_list,business_year:business_year},
		   success: function(data) {
		  //  	if(data == '[]')
		  //  	{
		  //  		var pieChartContent = document.getElementById('pieChartContent4');
				// pieChartContent.innerHTML = '<canvas style="height:230px;"><canvas>';
		  //  	}
		  //  	else
		  //  	{	
		   		var arr = jQuery.parseJSON(data);
		   	 	var rgt_count = arr.length;
		   	 	var business_time = '';
		 		var label = getNDaysBefore(dateString, numberOfDaysBefore);
		 		var label = label.reverse();
		   	 	var rgt_count = arr.length;
		   	 	var year = [];
		   	 	var value = [];
				for(var i = 0; i < rgt_count; i++) {
					var ele = arr[i];
					var year_ele = ele.business_time;
					  year.push(year_ele);
					  value.push(ele.total_deal);
					}
					
		   	 		var newArray = [];
		   	 		var value1 = 0;
		   	 		
				for (var i = 0; i < label.length; i++) {
				    var match = false; 
				    for (var j = 0; j < year.length; j++) 
				    {
				    	var value1 = 0;
				        if (label[i] == year[j]) 
				        {
				            value1 = value[j];
				            match = true;
				            break;
				        }
				    }
				    if (!match) {
				        newArray.push(value1);
				    }
				    else
				    {
				    	newArray.push(value1);
				    }
				}
				var areaChart = {
					      labels  : label,
					      datasets: [
					        {
					          data : newArray
					        }
					      ]
					    }
						    var pieChartContent = document.getElementById('pieChartContent4');
							pieChartContent.innerHTML = '';
							$('#pieChartContent4').append('<canvas id="barChart1" style="height:230px;"><canvas>');
					     var barChartCanvas                   = $('#barChart1').get(0).getContext('2d')
					    var barChart                         = new Chart(barChartCanvas)
					    var barChartData                     = areaChart
					    barChartData.datasets[0].fillColor   = '#00a65a'
					    barChartData.datasets[0].strokeColor = '#00a65a'
					    barChartData.datasets[0].pointColor  = '#00a65a'
					    var barChartOptions                  = {
	
					      //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
					      scaleBeginAtZero        : false,
					      //Boolean - Whether grid lines are shown across the chart
					      scaleShowGridLines      : true,
					      //String - Colour of the grid lines
					      scaleGridLineColor      : 'rgba(0,0,0,.05)',
					      //Number - Width of the grid lines
					      scaleGridLineWidth      : false,
					      //Boolean - Whether to show horizontal lines (except X axis)
					      scaleShowHorizontalLines: false,
					      //Boolean - Whether to show vertical lines (except Y axis)
					      scaleShowVerticalLines  : true,
					      //Boolean - If there is a stroke on each bar
					      barShowStroke           : false,
					      //Number - Pixel width of the bar stroke
					      barStrokeWidth          : 5,
					      //Number - Spacing between each of the X value sets
					      barValueSpacing         : 20,
					      //Number - Spacing between data sets within X values
					      barDatasetSpacing       : 0,
					      //String - A legend template
					      legendTemplate          : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].fillColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',
					      //Boolean - whether to make the chart responsive
					      responsive              : true,
					      maintainAspectRatio     : true
					    }
					    barChartOptions.datasetFill = false
					    barChart.Bar(barChartData, barChartOptions)
		   		}
		   	//}
    	});
    }
    else if(business_year == 'last 7 days')
    {
    	var today = new Date();
		var dd = today.getDate();
		var mm = today.getMonth() + 1; //January is 0!
		var yyyy = today.getFullYear();

		if (dd < 10) {
		  dd = '0' + dd;
		}

		if (mm < 10) {
		  mm = '0' + mm;
		}

		today = mm + '/' + dd + '/' + yyyy;
		function getNDaysBefore(dateString, numberOfDaysBefore) {
		    let startingDate = new Date(dateString).getTime();
		    let datesArray = [],
		        daysCounter = 0,
		        day = 1000 * 60 * 60 * 24;
		    while (daysCounter < numberOfDaysBefore + 1) {
		        let newDateBeforeStaring = startingDate - day * daysCounter;
		        var dateobj = new Date(newDateBeforeStaring); 
		        var monthNames = ["Jan", "Feb", "Mar", "Apr", "May","Jun","Jul", "Aug", "Sep", "Oct", "Nov","Dec"];
		        var dd = dateobj.getDate();
				var yyyy = monthNames[dateobj.getMonth()];
				if (dd < 10) {
				  dd = '0' + dd;
				} 
				var date = dd + ',' + yyyy; 
		        datesArray.push(date);

		        daysCounter++;
		    }
		    return datesArray;
		}
		var dateString = today;
		 var numberOfDaysBefore = 6;

    	$.ajax({
		   url: '../../Controller/report/business_report_filter.php',
		   type: 'POST',
		   data:{business_list:business_list,business_year:business_year},
		   success: function(data) {
		   	//console.log(data);
		  //  	if(data == '[]')
		  //  	{
		  //  		var pieChartContent = document.getElementById('pieChartContent4');
				// pieChartContent.innerHTML = '<canvas style="height:230px;"><canvas>';
		  //  	}
		  //  	else
		  //  	{	
		   		var arr = jQuery.parseJSON(data);
		   	 	var rgt_count = arr.length;
		   	 	var business_time = '';
		   	 	var label = getNDaysBefore(dateString, numberOfDaysBefore);
		  		var label = label.reverse();
		   	 	var rgt_count = arr.length;
		   	 	var year = [];
		   	 	var value = [];
				for(var i = 0; i < rgt_count; i++) {
					var ele = arr[i];
					var year_ele = ele.business_time;
					  year.push(year_ele);
					  value.push(ele.total_deal);
					}
					
		   	 		var newArray = [];
		   	 		var value1 = 0;
		   	 		
				for (var i = 0; i < label.length; i++) {
				    var match = false; 
				    for (var j = 0; j < year.length; j++) 
				    {
				    	var value1 = 0;
				        if (label[i] == year[j]) 
				        {
				            value1 = value[j];
				            match = true;
				            break;
				        }
				    }
				    if (!match) {
				        newArray.push(value1);
				    }
				    else
				    {
				    	newArray.push(value1);
				    }
				}
				// console.log(newArray);
				 
				var areaChart = {
					      labels  : label,
					      datasets: [
					        {
					          data : newArray
					        }
					      ]
					      
					    }
						    var pieChartContent = document.getElementById('pieChartContent4');
							pieChartContent.innerHTML = '';
							$('#pieChartContent4').append('<canvas id="barChart1" style="height:230px;"><canvas>');
					     var barChartCanvas                   = $('#barChart1').get(0).getContext('2d')
					    var barChart                         = new Chart(barChartCanvas)
					    var barChartData                     = areaChart
					    barChartData.datasets[0].fillColor   = '#00a65a'
					    barChartData.datasets[0].strokeColor = '#00a65a'
					    barChartData.datasets[0].pointColor  = '#00a65a'
					    var barChartOptions                  = {
	
					      //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
					      scaleBeginAtZero        : false,
					      //Boolean - Whether grid lines are shown across the chart
					      scaleShowGridLines      : true,
					      //String - Colour of the grid lines
					      scaleGridLineColor      : 'rgba(0,0,0,.05)',
					      //Number - Width of the grid lines
					      scaleGridLineWidth      : false,
					      //Boolean - Whether to show horizontal lines (except X axis)
					      scaleShowHorizontalLines: false,
					      //Boolean - Whether to show vertical lines (except Y axis)
					      scaleShowVerticalLines  : true,
					      //Boolean - If there is a stroke on each bar
					      barShowStroke           : false,
					      //Number - Pixel width of the bar stroke
					      barStrokeWidth          : 5,
					      //Number - Spacing between each of the X value sets
					      barValueSpacing         : 20,
					      //Number - Spacing between data sets within X values
					      barDatasetSpacing       : 0,
					      //String - A legend template
					      legendTemplate          : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].fillColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',
					      //Boolean - whether to make the chart responsive
					      responsive              : true,
					      maintainAspectRatio     : true
					    }
					    barChartOptions.datasetFill = false
					    barChart.Bar(barChartData, barChartOptions)
		   		}
		   	//}
    	});
    }
    else
    {
    	function getDateItems(hours) {
		  var toDate = new Date();
		  var fromDate = new Date();
		  fromDate.setTime(fromDate.getTime() - (hours * 60 * 60 * 1000));
		  var result = [];
		  
		  while (toDate > fromDate) {
		  	function tConvert (time) {
			  // Check correct time format and split into components
			  time = time.toString ().match (/^([01]\d|2[0-3])(:)([0-5]\d)(:[0-5]\d)?$/) || [time];

			  if (time.length > 1) { // If time format correct
			    time = time.slice (1);  // Remove full string match value
			    time[5] = +time[0] < 12 ? 'AM' : 'PM'; // Set AM/PM
			    time[0] = +time[0] % 12 || 12; // Adjust hours
			  }
			  return time.join (''); // return adjusted time or original string
			}
			var tconvert_time= ("00" + toDate.getHours()).slice(-2) + ":" + ("00" + toDate.getMinutes()).slice(-2);
			var time_exec = tConvert (tconvert_time);
		    result.push(time_exec);
		    // consider using moment.js library to format date
		    
		    toDate.setTime(toDate.getTime() - (1 * 60 * 60 * 1000));
		  }

		  return result;
		}

		var datesFrom24Hours = getDateItems(24);

    	$.ajax({
		   url: '../../Controller/report/business_report_filter.php',
		   type: 'POST',
		   data:{business_list:business_list,business_year:business_year},
		   success: function(data) {
		  //  	if(data == '[]')
		  //  	{
		  //  		var pieChartContent = document.getElementById('pieChartContent4');
				// pieChartContent.innerHTML = '<canvas style="height:230px;"><canvas>';
		  //  	}
		  //  	else
		  //  	{	
		   		var arr = jQuery.parseJSON(data);
		   	 	var rgt_count = arr.length;
		   	 	var business_time = '';
		   	 	var label = datesFrom24Hours;
		   	 	var label = label.reverse();
		   	 	var rgt_count = arr.length;
		   	 	var year = [];
		   	 	var value = [];
				for(var i = 0; i < rgt_count; i++) {
					var ele = arr[i];
					var year_ele = ele.business_time;
					  year.push(year_ele);
					  value.push(ele.total_deal);
					}
		   	 		var newArray = [];
		   	 		var value1 = 0;
		   	 		
				for (var i = 0; i < label.length; i++) {
				    var match = false; 
				    for (var j = 0; j < year.length; j++) 
				    {
				    	var value1 = 0;
				        if (label[i] >= year[j] && label[i+1] <= year[j]) 
				        {
				            value1 = value[j];
				            match = true;
				            break;
				        }
				    }
				    if (!match) {
				        newArray.push(value1);
				    }
				    else
				    {
				    	newArray.push(value1);
				    }
				}
				

				var areaChart = {
					      labels  : label,
					      datasets: [
					        {
					          data : newArray
					        }
					      ]
					    }

						    var pieChartContent = document.getElementById('pieChartContent4');
							pieChartContent.innerHTML = '';
							$('#pieChartContent4').append('<canvas id="barChart1" style="height:230px;"><canvas>');
					     var barChartCanvas                   = $('#barChart1').get(0).getContext('2d')
					    var barChart                         = new Chart(barChartCanvas)
					    var barChartData                     = areaChart
					    barChartData.datasets[0].fillColor   = '#00a65a'
					    barChartData.datasets[0].strokeColor = '#00a65a'
					    barChartData.datasets[0].pointColor  = '#00a65a'
					    var barChartOptions                  = {
	
					      //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
					      scaleBeginAtZero        : false,
					      //Boolean - Whether grid lines are shown across the chart
					      scaleShowGridLines      : true,
					      //String - Colour of the grid lines
					      scaleGridLineColor      : 'rgba(0,0,0,.05)',
					      //Number - Width of the grid lines
					      scaleGridLineWidth      : false,
					      //Boolean - Whether to show horizontal lines (except X axis)
					      scaleShowHorizontalLines: false,
					      //Boolean - Whether to show vertical lines (except Y axis)
					      scaleShowVerticalLines  : true,
					      //Boolean - If there is a stroke on each bar
					      barShowStroke           : false,
					      //Number - Pixel width of the bar stroke
					      barStrokeWidth          : 5,
					      //Number - Spacing between each of the X value sets
					      barValueSpacing         : 20,
					      //Number - Spacing between data sets within X values
					      barDatasetSpacing       : 0,
					      //String - A legend template
					      legendTemplate          : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].fillColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',
					      //Boolean - whether to make the chart responsive
					      responsive              : true,
					      maintainAspectRatio     : true
					    }
					    barChartOptions.datasetFill = false
					    barChart.Bar(barChartData, barChartOptions)
		   		}
		   //	}
    	});
     }
}

$(document).ready(function(){
      $('#age_year').change(function(){
        loadagereport()
      })
    })

function loadagereport(){
	var age_year = $('#age_year').val();
        $.ajax({
		   url: '../../Controller/report/age_report_filter.php',
		   type: 'POST',
		   data:{age_year:age_year},
		   success: function(data) {
		   
		   				var arr = jQuery.parseJSON(data);
						   	 	var rgt_count = arr.length;
						   	 	var business_time = '';
						   	 	var label = ["1-10","10-20","20-30","30-40","40-50","50-60","60-70","70-80","80-90","90-100","100+"];
						   	 	var rgt_count = arr.length;
						   	 	var year = [];
						   	 	var value = [];
								for(var i = 0; i < rgt_count; i++) {
									var ele = arr[i];
									var year_ele = ele.age;
									  year.push(year_ele);
									  value.push(ele.users);
									}
						   	 		var newArray = [];
						   	 		var value1 = 0;
						   	 		
								for (var i = 0; i < label.length; i++) {
								    var match = false; 
								    for (var j = 0; j < year.length; j++) 
								    {
								    	var value1 = 0;
								        if (label[i] == year[j]) 
								        {
								        	
								            value1 = value[j];
								            match = true;
								            break;
								        }
								    }
								    if (!match) {
								        newArray.push(value1);
								    }
								    else
								    {
								    	newArray.push(value1);
								    }
								}
								

								var areaChart = {
									      labels  : label,
									      datasets: [
									        {
									          data : newArray
									        }
									      ]
									    }
						    var pieChartContent = document.getElementById('pieChartContent5');
							pieChartContent.innerHTML = '';
							$('#pieChartContent5').append('<canvas id="barChart" style="height:230px;"><canvas>');
					     var barChartCanvas                   = $('#barChart').get(0).getContext('2d')
					    var barChart                         = new Chart(barChartCanvas)
					    var barChartData                     = areaChart
					    barChartData.datasets[0].fillColor   = '#00a65a'
					    barChartData.datasets[0].strokeColor = '#00a65a'
					    barChartData.datasets[0].pointColor  = '#00a65a'
					    var barChartOptions                  = {
	
					      //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
					      scaleBeginAtZero        : false,
					      //Boolean - Whether grid lines are shown across the chart
					      scaleShowGridLines      : true,
					      //String - Colour of the grid lines
					      scaleGridLineColor      : 'rgba(0,0,0,.05)',
					      //Number - Width of the grid lines
					      scaleGridLineWidth      : false,
					      //Boolean - Whether to show horizontal lines (except X axis)
					      scaleShowHorizontalLines: false,
					      //Boolean - Whether to show vertical lines (except Y axis)
					      scaleShowVerticalLines  : true,
					      //Boolean - If there is a stroke on each bar
					      barShowStroke           : false,	
					      //Number - Pixel width of the bar stroke
					      barStrokeWidth          : 3,
					      //Number - Spacing between each of the X value sets
					      barValueSpacing         : 10,
					      //Number - Spacing between data sets within X values
					      barDatasetSpacing       : 0,
					      //String - A legend template
					      legendTemplate          : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].fillColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',
					      //Boolean - whether to make the chart responsive
					      responsive              : true,
					      maintainAspectRatio     : true
					    }
					    barChartOptions.datasetFill = false
					    barChart.Bar(barChartData, barChartOptions)
		   	
		  }
    });
    }




</script>
<section class="content">
   
    	<div class="row">
    		<div class="col-md-10" style="float: left;margin-bottom: 10px;"> <h2>Reports</h2></div>
    		<div class="col-md-2">
                <br/>   
    		</div>
    	</div> 
        <div class="row">
          <div class="col-sm-12">
             <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Deals posted</h3>
               <div class="box-tools">
               
               <select name="business_list" class="form-control select2" style="width: 150px;" id="business_list">
               	<option value="">All Business</option>
                <?php foreach ($business as $business) {
                  ?>
                <option value="<?php echo $business['user_id']; ?>"><?php echo $business['business_name']; ?></option>
                <?php
                }
                 ?>
              </select>
               <select name="business_year" class="form-control select2" style="width: 125px;" id="business_year">
                <option value="last 24 hours">Last 24 hours</option>
                <option value="last 7 days">Last 7 days</option>
                <option value="last 30 days">Last 30 days</option>
                <option value="last 1 year" selected>Last 1 year</option>
              </select>
              </div>
            </div>
            <div class="box-body">
              <div class="chart" id="pieChartContent4">
                <canvas id="barChart1" style="height:230px;"></canvas>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          </div>
        	<div class="col-md-6">
          <!-- LINE CHART -->
          <!-- /.box -->
          <!-- BAR CHART -->
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Deal type purchases</h3>
              <div class="box-tools">
                <select name="deal_purchased_year" class="form-control select2" style="width: 125px;" id="deal_purchased_year">
                <option value="last 24 hours">Last 24 hours</option>
                <option value="last 7 days">Last 7 days</option>
                <option value="last 30 days" >Last 30 days</option>
                <option value="last 1 year" selected>Last 1 year</option>
              </select>
            </div>
            </div>
            <div class="box-body">
               <div class="chart" id="pieChartContent">
              <canvas id="pieChart3" style="height:230px;"></canvas>
               </div>
               <div id="legendDiv"></div>
            </div>
            
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <div class="col-md-6">
          <!-- LINE CHART -->
          <!-- /.box -->
          <!-- BAR CHART -->
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title" style="font-size: 14px;">Catgeory & Sub-category wise purchased deals</h3>
              <div class="box-tools">
               <select name="category_list" class="form-control select2" style="width: 100px;padding-left: 0px;" id="category_list">
	               	<option value="category" selected>Category</option>
	                <option value="sub-category">Sub-category</option>
              </select>
               <select name="year_time_categry" class="form-control select2" style="width: 125px;" id="year_time_categry">
                <option value="last 24 hours">Last 24 hours</option>
                <option value="last 7 days">Last 7 days</option>
                <option value="last 30 days">Last 30 days</option>
                <option value="last 1 year" selected>Last 1 year</option>
              </select>
              </div>
            </div>
            <div class="box-body">
               <div class="chart" id="pieChartContent3">
              <canvas id="pieChart1" style="height:230px;"></canvas>
               </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <div class="col-md-6">
          <!-- LINE CHART -->
          <!-- /.box -->
          <!-- BAR CHART -->
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Gender wise active user</h3>
              <div class="box-tools">
                <select name="gender" class="form-control select2" style="width: 125px;" id="gender">
                <option value="last 24 hours">Last 24 hours</option>
                <option value="last 7 days">Last 7 days</option>
                <option value="last 30 days">Last 30 days</option>
                <option value="last 1 year" selected>Last 1 year</option>
              </select>
            </div>
            </div>
            <div class="box-body">
               <div class="chart" id="pieChartContent1">
              <canvas id="pieChart2" style="height:230px"></canvas>
               </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <div class="col-md-6">
          <!-- LINE CHART -->
          <!-- /.box -->
          <!-- BAR CHART -->
           <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Age wise active user</h3>
              <div class="box-tools">
                <select name="age_year" class="form-control select2" style="width: 150px;" id="age_year">
                <option value="last 24 hours">Last 24 hours</option>
                <option value="last 7 days">Last 7 days</option>
                <option value="last 30 days">Last 30 days</option>
                <option value="last 1 year" selected>Last 1 year</option>
              </select>
            </div>
            </div>
            <div class="box-body">
              <div class="chart" id="pieChartContent5">
                <canvas id="barChart" style="height:230px"></canvas>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col (RIGHT) -->
      </div>
       </div>
    </section>
</div>
<script src="../../bower_components/chart.js/Chart.js"></script>
<script src="../../dist/js/adminlte.min.js"></script>
<script>
  $(function () {
   $(document).ready(function(){
     
        loadcategory_filter()
  })
        function loadcategory_filter(){
        function getRandomColor() {
		  var letters = '0123456789ABCDEF';
		  var color = '#';
		  for (var i = 0; i < 6; i++) {
		    color += letters[Math.floor(Math.random() * 16)];
		  }
		  return color;
		}
        $.ajax({
		   url: '../../Controller/report/categoryreport_filter.php',
		   type: 'POST',
		   success: function(data) {
		   	
		  	if(data == '[]')
		   	{
		   		var pieChartContent = document.getElementById('pieChartContent3');
				pieChartContent.innerHTML = '<canvas style="height:230px;"><canvas>';
		   	}
		   	else
		   	{
		   	 arr = jQuery.parseJSON(data);
		   	 var labels = [];
		   	 var PieData1 = [];
		   	 var rgt_count = arr.length;
				for(var i = 0; i < rgt_count; i++) {
					var color = ['#f56954','#00a65a','#f39c12','#3c8dbc'];
					var ele = arr[i];
					var color = getRandomColor();
					  labels.push({label:ele.name,value:ele.total_deal,color:color,highlight:color});
					}
					var pieChartContent = document.getElementById('pieChartContent3');
					pieChartContent.innerHTML = '';
					$('#pieChartContent3').append('<canvas id="pieChart1" style="height:230px;"><canvas>');
					var pieChartCanvas = $('#pieChart1').get(0).getContext('2d')
					    var pieChart       = new Chart(pieChartCanvas)
					    PieData1 = labels
					    var pieOptions     = {
					      segmentShowStroke    : true,
					      segmentStrokeColor   : '#fff',
					      segmentStrokeWidth   : 2,
					      percentageInnerCutout: 50, 
					      animationSteps       : 100,
					      animationEasing      : 'easeOutBounce',
					      animateRotate        : true,
					      animateScale         : false,    
					      responsive           : true,
					      maintainAspectRatio  : true,
					      legendTemplate       : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<segments.length; i++){%><li><span style="background-color:<%=segments[i].fillColor%>"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>'
					    }
					    pieChart.Doughnut(PieData1, pieOptions)
			}		    
		 }
    });
}


    $(document).ready(function(){
    	loaddeal_purchased_year()
     })
        function loaddeal_purchased_year()
        {
        $.ajax({
		   url: '../../Controller/report/dealfilter_report.php',
		   type: 'POST',
		   success: function(data) {
		  	if(data == '[]')
		   	{
		   		var pieChartContent = document.getElementById('pieChartContent');
				pieChartContent.innerHTML = '<canvas style="height:230px;"><canvas>';
		   	}
		   	else
		   	{
		   	 arr = jQuery.parseJSON(data);
		   	 var labels = [];
		   	 var PieData1 = [];
		   	 var rgt_count = arr.length;
				for(var i = 0; i < rgt_count; i++) {
					var color = ['#f56954','#00a65a','#f39c12','#3c8dbc'];
					var ele = arr[i];
					var color = color[i];
					  labels.push({label:ele.offer_title,value:ele.total_deal,color:color,highlight:color});
					}
					var pieChartContent = document.getElementById('pieChartContent');
					pieChartContent.innerHTML = '';
					$('#pieChartContent').append('<canvas id="pieChart3" style="height:230px;"><canvas>');
					var pieChartCanvas = $('#pieChart3').get(0).getContext('2d')
					    var pieChart       = new Chart(pieChartCanvas)
					    PieData1 = labels

					    var pieOptions     = {
					      tooltipEvents: [],
					        showTooltips: true,
					        onAnimationComplete: function() {
					            this.showTooltip(this.segments, true);
					        },
					      segmentShowStroke    : true,
					      segmentStrokeColor   : '#fff',
					      segmentStrokeWidth   : 2,
					      percentageInnerCutout: 50, 
					      animationSteps       : 100,
					      animationEasing      : 'easeOutBounce',
					      animateRotate        : true,
					      animateScale         : false,    
					      responsive           : true,
					      maintainAspectRatio  : true,
					      legendTemplate       : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<segments.length; i++){%><li><span style="background-color:<%=segments[i].fillColor%>"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>'
					    }
					    pieChart.Doughnut(PieData1, pieOptions)
			}		    
		 }
    });
}



$(document).ready(function(){
    
        loadgender()
      })

        function loadgender(){
        $.ajax({
		   url: '../../Controller/report/genderfilter_report.php',
		   type: 'POST',
		   success: function(data) {
		   	
		  	if(data == '[]')
		   	{
		   		var pieChartContent = document.getElementById('pieChartContent1');
				pieChartContent.innerHTML = '<canvas style="height:230px;"><canvas>';
		   	}
		   	else
		   	{
		   	 arr = jQuery.parseJSON(data);
		   	 var labels = [];
		   	 var PieData1 = [];
		   	 var rgt_count = arr.length;
				for(var i = 0; i < rgt_count; i++) {
					var color = ['#f56954','#00a65a','#f39c12','#3c8dbc'];
					var ele = arr[i];
					var color = color[i];
					  labels.push({label:ele.gender,value:ele.users,color:color,highlight:color});
					}
					var pieChartContent = document.getElementById('pieChartContent1');
					pieChartContent.innerHTML = '';
					$('#pieChartContent1').append('<canvas id="pieChart2" style="height:230px;"><canvas>');
					var pieChartCanvas = $('#pieChart2').get(0).getContext('2d')
					    var pieChart       = new Chart(pieChartCanvas)
					    PieData1 = labels
					    var pieOptions     = {
					    	 tooltipEvents: [],
					        showTooltips: true,
					        onAnimationComplete: function() {
					            this.showTooltip(this.segments, true);
					        },
					      segmentShowStroke    : true,
					      segmentStrokeColor   : '#fff',
					      segmentStrokeWidth   : 2,
					      percentageInnerCutout: 50, 
					      animationSteps       : 100,
					      animationEasing      : 'easeOutBounce',
					      animateRotate        : true,
					      animateScale         : false,    
					      responsive           : true,
					      maintainAspectRatio  : true,
					      legendTemplate       : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<segments.length; i++){%><li><span style="background-color:<%=segments[i].fillColor%>"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>'
					    }
					    pieChart.Doughnut(PieData1, pieOptions)
			}		    
		 }
    });
}



    //-------------
    //- BAR CHART -
    //-------------
     

   	$(document).ready(function(){
    
        loadbusinessdealreport()
      })

        function loadbusinessdealreport()
        {
       $.ajax({
		   url: '../../Controller/report/businessdealfilter_report.php',
		   type: 'POST',
		   success: function(data) {
		  	var monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sept", "Oct", "Nov", "Dec"];

			var today = new Date();
			var d;
			var month = [];

			for(var i = 11; i >= 0; i -= 1) {
			  d = new Date(today.getFullYear(), today.getMonth() - i);
			 month.push(monthNames[d.getMonth()]+ ',' + d.getFullYear());
			}

		  //  	if(data == '[]')
		  //  	{
		  //  		var pieChartContent = document.getElementById('pieChartContent4');
				// pieChartContent.innerHTML = '<canvas style="height:230px;"><canvas>';
		  //  	}
		  //  	else
		  //  	{	
		   		var arr = jQuery.parseJSON(data);
		   	 	var rgt_count = arr.length;
		   	 	var business_time = '';
		   	 	var label = month;
		   	 	
		   	 	var rgt_count = arr.length;
		   	 	var year = [];
		   	 	var value = [];
				for(var i = 0; i < rgt_count; i++) {
					var ele = arr[i];
					var year_ele = ele.business_time;
					  year.push(year_ele);
					  value.push(ele.total_deal);
					}
					
		   	 		var newArray = [];
		   	 		var value1 = 0;
		   	 		
				for (var i = 0; i < label.length; i++) {
				    var match = false; 
				    for (var j = 0; j < year.length; j++) 
				    {
				    	var value1 = 0;
				        if (label[i] == year[j]) 
				        {
				            value1 = value[j];
				            match = true;
				            break;
				        }
				    }
				    if (!match) {
				        newArray.push(value1);
				    }
				    else
				    {
				    	newArray.push(value1);
				    }
				}
				var areaChart = {
					      labels  : label,
					      datasets: [
					        {
					          data : newArray
					        }
					      ]
					    }
						    var pieChartContent = document.getElementById('pieChartContent4');
							pieChartContent.innerHTML = '';
							$('#pieChartContent4').append('<canvas id="barChart1" style="height:230px;"><canvas>');
					     var barChartCanvas                   = $('#barChart1').get(0).getContext('2d')
					    var barChart                         = new Chart(barChartCanvas)
					    var barChartData                     = areaChart
					    barChartData.datasets[0].fillColor   = '#00a65a'
					    barChartData.datasets[0].strokeColor = '#00a65a'
					    barChartData.datasets[0].pointColor  = '#00a65a'
					    var barChartOptions                  = {
	
					      //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
					      scaleBeginAtZero        : false,
					      //Boolean - Whether grid lines are shown across the chart
					      scaleShowGridLines      : true,
					      //String - Colour of the grid lines
					      scaleGridLineColor      : 'rgba(0,0,0,.05)',
					      //Number - Width of the grid lines
					      scaleGridLineWidth      : false,
					      //Boolean - Whether to show horizontal lines (except X axis)
					      scaleShowHorizontalLines: false,
					      //Boolean - Whether to show vertical lines (except Y axis)
					      scaleShowVerticalLines  : true,
					      //Boolean - If there is a stroke on each bar
					      barShowStroke           : false,
					      //Number - Pixel width of the bar stroke
					      barStrokeWidth          : 5,
					      //Number - Spacing between each of the X value sets
					      barValueSpacing         : 20,
					      //Number - Spacing between data sets within X values
					      barDatasetSpacing       : 0,
					      //String - A legend template
					      legendTemplate          : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].fillColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',
					      //Boolean - whether to make the chart responsive
					      responsive              : true,
					      maintainAspectRatio     : true
					    }
					    barChartOptions.datasetFill = false
					    barChart.Bar(barChartData, barChartOptions)
		   		}
		   //	}
    });
}



$(document).ready(function(){
    
        loadbusinessagereport()
      })

        function loadbusinessagereport()
        {
       var age_year = $('#age_year').val();
        $.ajax({
		   url: '../../Controller/report/agereport_filter.php',
		   type: 'POST',
		   data:{age_year:age_year},
		   success: function(data) {
		   	
		   				var arr = jQuery.parseJSON(data);
						   	 	var rgt_count = arr.length;
						   	 	var business_time = '';
						   	 	var label = ["1-10","10-20","20-30","30-40","40-50","50-60","60-70","70-80","80-90","90-100","100+"];
						   	 	var rgt_count = arr.length;
						   	 	var year = [];
						   	 	var value = [];
								for(var i = 0; i < rgt_count; i++) {
									var ele = arr[i];
									var year_ele = ele.age;
									  year.push(year_ele);
									  value.push(ele.users);
									}
						   	 		var newArray = [];
						   	 		var value1 = 0;
						   	 		
								for (var i = 0; i < label.length; i++) {
								    var match = false; 
								    for (var j = 0; j < year.length; j++) 
								    {
								    	var value1 = 0;
								        if (label[i] == year[j]) 
								        {
								        	
								            value1 = value[j];
								            match = true;
								            break;
								        }
								    }
								    if (!match) {
								        newArray.push(value1);
								    }
								    else
								    {
								    	newArray.push(value1);
								    }
								}
								

								var areaChart = {
									      labels  : label,
									      datasets: [
									        {
									          data : newArray
									        }
									      ]
									    }
						    var pieChartContent = document.getElementById('pieChartContent5');
							pieChartContent.innerHTML = '';
							$('#pieChartContent5').append('<canvas id="barChart" style="height:230px;"><canvas>');
					     var barChartCanvas                   = $('#barChart').get(0).getContext('2d')
					    var barChart                         = new Chart(barChartCanvas)
					    var barChartData                     = areaChart
					    barChartData.datasets[0].fillColor   = '#00a65a'
					    barChartData.datasets[0].strokeColor = '#00a65a'
					    barChartData.datasets[0].pointColor  = '#00a65a'
					    var barChartOptions                  = {
	
					      //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
					      scaleBeginAtZero        : false,
					      //Boolean - Whether grid lines are shown across the chart
					      scaleShowGridLines      : true,
					      //String - Colour of the grid lines
					      scaleGridLineColor      : 'rgba(0,0,0,.05)',
					      //Number - Width of the grid lines
					      scaleGridLineWidth      : false,
					      //Boolean - Whether to show horizontal lines (except X axis)
					      scaleShowHorizontalLines: false,
					      //Boolean - Whether to show vertical lines (except Y axis)
					      scaleShowVerticalLines  : true,
					      //Boolean - If there is a stroke on each bar
					      barShowStroke           : false,
					      //Number - Pixel width of the bar stroke
					      barStrokeWidth          : 3,
					      //Number - Spacing between each of the X value sets
					      barValueSpacing         : 10,
					      //Number - Spacing between data sets within X values
					      barDatasetSpacing       : 0,
					      //String - A legend template
					      legendTemplate          : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].fillColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',
					      //Boolean - whether to make the chart responsive
					      responsive              : true,
					      maintainAspectRatio     : true
					    }
					    barChartOptions.datasetFill = false
					    barChart.Bar(barChartData, barChartOptions)
		   	
		  }
    });
}







  })
</script>
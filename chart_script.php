$(document).ready(function() {
			$(document).ajaxStart(function(){
			$("#wait").css("display", "block");
			});
			$(document).ajaxComplete(function(){
				$("#wait").css("display", "none");
			});
		
			$.ajax({
			url:'dashboard_ajax.php',
			type:'post',
			data:'page=display_main_dashboard',
			cache: false,
			success:function(result)
			{
				//console.log(resp);
				var res_data= jQuery.parseJSON(result);
				
				$('#Total_Projects').html(res_data.Total_Projects);
				$('#Total_Employees').html(res_data.Total_Employees);
				$('#Total_Tasks').html(res_data.Total_Tasks);
				$('#Total_Milestones').html(res_data.Total_Milestones);
				
				
			
				var ctx1 = document.getElementById("pie-charts");
				var ctx = document.getElementById("bar-charts");
				var myChart = new Chart(ctx, {
				//Highcharts.chart('pie-charts', {
					title: {
						text: ''
					},

					xAxis: {
						categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
					},

					series: [{
						type: 'pie',
						allowPointSelect: false,
						keys: ['name', 'y', 'selected', 'sliced'],
						data: [
							['all_project', parseInt(res_data.Total_Projects), false],
							['all_dev', parseInt(res_data.Total_Employees), false],
							['project_tasks', parseInt(res_data.Total_Tasks), false],
							['proj_milestone', parseInt(res_data.Total_Milestones), false]
						],
						showInLegend: false
					}],
					plotOptions: {
					series: {
						borderWidth: 0,
						dataLabels: {
							enabled: true,
							//style: {
							//	color: 'red',
							//}
						}
					}
				}
				});
				
				/*bar chart*/
				bar_chart_graph(parseInt(res_data.Total_Projects),parseInt(res_data.Total_Employees),parseInt(res_data.Total_Tasks),parseInt(res_data.Total_Milestones));
				
				/*end bar chart*/
				
			}
		});	
		})	
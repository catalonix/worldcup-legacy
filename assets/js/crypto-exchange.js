$(function(e){
  'use strict'
  
	/* Chartjs (#ph-chart) */
	var ctx = $('#temperature-chart');
	ctx.height(110);
	var myChart = new Chart(ctx, {
		type: 'line',
		data: {
			labels: ['Date 1', 'Date 2', 'Date 3', 'Date 4', 'Date 5', 'Date 6', 'Date 7', 'Date 8', 'Date 9', 'Date 10', 'Date 11', 'Date 12', 'Date 13', 'Date 14', 'Date 15', 'Date 16', 'Date 17', 'Date 18', 'Date 19', 'Date 20', 'Date 21', 'Date 22', 'Date 23', 'Date 24',],
			type: 'line',
			datasets: [{
				data: [45, 25, 32, 67, 49, 72, 52, 55, 46, 54, 32, 74, 88, 96, 36, 32, 48, 54, 87, 88, 96, 53, 21, 24, 14, 58, 78, 55, 41, 21, 45, 54, 51, 52, 48],
				label: '오도',
				backgroundColor: 'rgba(98, 89, 202, 0.2)',
				borderColor: '#6259ca',
				borderWidth: '2',
				pointBorderColor: 'transparent',
				pointBackgroundColor: 'transparent',
			}]
		},
		options: {
			maintainAspectRatio: false,
			legend: {
				display: false
			},
			responsive: true,
			tooltips: {
				mode: 'index',
				titleFontSize: 12,
				titleFontColor: '#7886a0',
				bodyFontColor: '#7886a0',
				backgroundColor: 'rgba(16, 28, 44, 0.68)',
				titleFontFamily: 'Montserrat',
				bodyFontFamily: 'Montserrat',
				cornerRadius: 3,
				intersect: false,
			},
			scales: {
				xAxes: [{
					gridLines: {
						color: 'transparent',
						zeroLineColor: 'transparent'
					},
					ticks: {
						fontSize: 2,
						fontColor: 'transparent'
					}
				}],
				yAxes: [{
					display: false,
					ticks: {
						display: false,
					}
				}]
			},
			title: {
				display: false,
			},
			elements: {
				line: {
					borderWidth: 1
				},
				point: {
					radius: 4,
					hitRadius: 10,
					hoverRadius: 4
				}
			}
		}
	});
	/* Chartjs (#ph-chart) */
	
	
	/* Chartjs (#wind-chart) */
	var ctx = $('#humidity-chart');
	ctx.height(110);
	var myChart = new Chart(ctx, {
		type: 'line',
		data: {
			labels: ['Date 1', 'Date 2', 'Date 3', 'Date 4', 'Date 5', 'Date 6', 'Date 7', 'Date 8', 'Date 9', 'Date 10', 'Date 11', 'Date 12', 'Date 13', 'Date 14', 'Date 15', 'Date 16', 'Date 17', 'Date 18', 'Date 19', 'Date 20', 'Date 21', 'Date 22', 'Date 23', 'Date 24',],
			type: 'line',
			datasets: [{
				data: [88, 96, 36, 32, 48, 54, 87, 88, 96, 53, 21, 24, 14, 45, 25, 32, 67, 49, 72, 52, 55, 46, 54, 32, 74, 58, 78, 55, 41, 21, 45, 54, 51, 52, 48],
				label: '습도',
				backgroundColor: 'rgba(39, 164, 251, 0.2)',
				borderColor: '#27a4fb',
				borderWidth: '2',
				pointBorderColor: 'transparent',
				pointBackgroundColor: 'transparent',
			}]
		},
		options: {
			maintainAspectRatio: false,
			legend: {
				display: false
			},
			responsive: true,
			tooltips: {
				mode: 'index',
				titleFontSize: 12,
				titleFontColor: '#7886a0',
				bodyFontColor: '#7886a0',
				backgroundColor: 'rgba(16, 28, 44, 0.68)',
				titleFontFamily: 'Montserrat',
				bodyFontFamily: 'Montserrat',
				cornerRadius: 3,
				intersect: false,
			},
			scales: {
				xAxes: [{
					gridLines: {
						color: 'transparent',
						zeroLineColor: 'transparent'
					},
					ticks: {
						fontSize: 2,
						fontColor: 'transparent'
					}
				}],
				yAxes: [{
					display: false,
					ticks: {
						display: false,
					}
				}]
			},
			title: {
				display: false,
			},
			elements: {
				line: {
					borderWidth: 1
				},
				point: {
					radius: 4,
					hitRadius: 10,
					hoverRadius: 4
				}
			}
		}
	});
	/* Chartjs (#wind-chart) */
	
	/* Chartjs (#humidity-chart) */
	var ctx = $('#wind-chart');
	ctx.height(110);
	var myChart = new Chart(ctx, {
		type: 'line',
		data: {
			labels: ['Date 1', 'Date 2', 'Date 3', 'Date 4', 'Date 5', 'Date 6', 'Date 7', 'Date 8', 'Date 9', 'Date 10', 'Date 11', 'Date 12', 'Date 13', 'Date 14', 'Date 15', 'Date 16', 'Date 17', 'Date 18', 'Date 19', 'Date 20', 'Date 21', 'Date 22', 'Date 23', 'Date 24',],
			type: 'line',
			datasets: [{
				data: [58, 78, 55, 41, 21, 45, 54, 51, 52, 48, 88, 96, 36, 32, 48, 24, 14, 45, 25, 32, 67, 49, 54, 87, 88, 96, 53, 21, 72, 52, 55, 46, 54, 32, 74],
				label: '풍속 수치',
				backgroundColor: 'rgba(2, 219, 197, 0.2)',
				borderColor: '#02dbc5',
				borderWidth: '2',
				pointBorderColor: 'transparent',
				pointBackgroundColor: 'transparent',
			}]
		},
		options: {
			maintainAspectRatio: false,
			legend: {
				display: false
			},
			responsive: true,
			tooltips: {
				mode: 'index',
				titleFontSize: 12,
				titleFontColor: '#7886a0',
				bodyFontColor: '#7886a0',
				backgroundColor: 'rgba(16, 28, 44, 0.68)',
				titleFontFamily: 'Montserrat',
				bodyFontFamily: 'Montserrat',
				cornerRadius: 3,
				intersect: false,
			},
			scales: {
				xAxes: [{
					gridLines: {
						color: 'transparent',
						zeroLineColor: 'transparent'
					},
					ticks: {
						fontSize: 2,
						fontColor: 'transparent'
					}
				}],
				yAxes: [{
					display: false,
					ticks: {
						display: false,
					}
				}]
			},
			title: {
				display: false,
			},
			elements: {
				line: {
					borderWidth: 1
				},
				point: {
					radius: 4,
					hitRadius: 10,
					hoverRadius: 4
				}
			}
		}
	});
	/* Chartjs (#humidity-chart) */
	
	/* Chartjs (#pm-chart) */
	var ctx = $('#light-chart');
	ctx.height(110);
	var myChart = new Chart(ctx, {
		type: 'line',
		data: {
			labels: ['Date 1', 'Date 2', 'Date 3', 'Date 4', 'Date 5', 'Date 6', 'Date 7', 'Date 8', 'Date 9', 'Date 10', 'Date 11', 'Date 12', 'Date 13', 'Date 14', 'Date 15', 'Date 16', 'Date 17', 'Date 18', 'Date 19', 'Date 20', 'Date 21', 'Date 22', 'Date 23', 'Date 24',],
			type: 'line',
			datasets: [{
				data: [88, 96, 36, 32, 48, 24, 14, 45, 25, 32, 45, 54, 51, 52, 48, 54, 67, 49, 58, 78, 55, 41, 21, 87, 88, 96, 53, 21, 72, 52, 55, 46, 54, 32, 74],
				label: '광명',
				backgroundColor: 'rgba(255, 255, 0, 0.2)',
				borderColor: '#ffff00',
				borderWidth: '2',
				pointBorderColor: 'transparent',
				pointBackgroundColor: 'transparent',
			}]
		},
		options: {
			maintainAspectRatio: false,
			legend: {
				display: false
			},
			responsive: true,
			tooltips: {
				mode: 'index',
				titleFontSize: 12,
				titleFontColor: '#7886a0',
				bodyFontColor: '#7886a0',
				backgroundColor: 'rgba(16, 28, 44, 0.68)',
				titleFontFamily: 'Montserrat',
				bodyFontFamily: 'Montserrat',
				cornerRadius: 3,
				intersect: false,
			},
			scales: {
				xAxes: [{
					gridLines: {
						color: 'transparent',
						zeroLineColor: 'transparent'
					},
					ticks: {
						fontSize: 2,
						fontColor: 'transparent'
					}
				}],
				yAxes: [{
					display: false,
					ticks: {
						display: false,
					}
				}]
			},
			title: {
				display: false,
			},
			elements: {
				line: {
					borderWidth: 1
				},
				point: {
					radius: 4,
					hitRadius: 10,
					hoverRadius: 4
				}
			}
		}
	});
	/* Chartjs (#pm-chart) */
	
	/* Chartjs (#pm10-chart) */
	var ctx = $('#pm10-chart');
	ctx.height(110);
	var myChart = new Chart(ctx, {
		type: 'line',
		data: {
			labels: ['Date 1', 'Date 2', 'Date 3', 'Date 4', 'Date 5', 'Date 6', 'Date 7', 'Date 8', 'Date 9', 'Date 10', 'Date 11', 'Date 12', 'Date 13', 'Date 14', 'Date 15', 'Date 16', 'Date 17', 'Date 18', 'Date 19', 'Date 20', 'Date 21', 'Date 22', 'Date 23', 'Date 24', ],
			type: 'line',
			datasets: [{
				data: [47, 45, 54, 38, 56, 24, 65, 31, 37, 39, 62, 51, 35, 41, 35, 27, 93, 53, 61, 27, 54, 43, 19, 46],
				label: '미세먼지',
				backgroundColor: 'rgba(247, 147, 30, 0.2)',
				borderColor: '#f7931e',
				borderWidth: '2',
				pointBorderColor: 'transparent',
				pointBackgroundColor: 'transparent',
			}]
		},
		options: {
			maintainAspectRatio: false,
			legend: {
				display: false
			},
			responsive: true,
			tooltips: {
				mode: 'index',
				titleFontSize: 12,
				titleFontColor: '#7886a0',
				bodyFontColor: '#7886a0',
				backgroundColor: 'rgba(16, 28, 44, 0.68)',
				titleFontFamily: 'Montserrat',
				bodyFontFamily: 'Montserrat',
				cornerRadius: 3,
				intersect: false,
			},
			scales: {
				xAxes: [{
					gridLines: {
						color: 'transparent',
						zeroLineColor: 'transparent'
					},
					ticks: {
						fontSize: 2,
						fontColor: 'transparent'
					}
				}],
				yAxes: [{
					display: false,
					ticks: {
						display: false,
					}
				}]
			},
			title: {
				display: false,
			},
			elements: {
				line: {
					borderWidth: 1
				},
				point: {
					radius: 4,
					hitRadius: 10,
					hoverRadius: 4
				}
			}
		}
	});
	/* Chartjs (#pm10-chart) */

	/* Chartjs (#pm2-chart) */
	var ctx = $('#pm2-chart');
	ctx.height(110);
	var myChart = new Chart(ctx, {
		type: 'line',
		data: {
			labels: ['Date 1', 'Date 2', 'Date 3', 'Date 4', 'Date 5', 'Date 6', 'Date 7', 'Date 8', 'Date 9', 'Date 10', 'Date 11', 'Date 12', 'Date 13', 'Date 14', 'Date 15', 'Date 16', 'Date 17', 'Date 18', 'Date 19', 'Date 20', 'Date 21', 'Date 22', 'Date 23', 'Date 24', ],
			type: 'line',
			datasets: [{
				data: [47, 45, 54, 38, 56, 24, 65, 31, 37, 39, 62, 51, 35, 41, 35, 27, 93, 53, 61, 27, 54, 43, 19, 46],
				label: '초미세먼지',
				backgroundColor: 'rgba(33, 86, 206, 0.2)',
				borderColor: '#2156ce',
				borderWidth: '2',
				pointBorderColor: 'transparent',
				pointBackgroundColor: 'transparent',
			}]
		},
		options: {
			maintainAspectRatio: false,
			legend: {
				display: false
			},
			responsive: true,
			tooltips: {
				mode: 'index',
				titleFontSize: 12,
				titleFontColor: '#7886a0',
				bodyFontColor: '#7886a0',
				backgroundColor: 'rgba(16, 28, 44, 0.68)',
				titleFontFamily: 'Montserrat',
				bodyFontFamily: 'Montserrat',
				cornerRadius: 3,
				intersect: false,
			},
			scales: {
				xAxes: [{
					gridLines: {
						color: 'transparent',
						zeroLineColor: 'transparent'
					},
					ticks: {
						fontSize: 2,
						fontColor: 'transparent'
					}
				}],
				yAxes: [{
					display: false,
					ticks: {
						display: false,
					}
				}]
			},
			title: {
				display: false,
			},
			elements: {
				line: {
					borderWidth: 1
				},
				point: {
					radius: 4,
					hitRadius: 10,
					hoverRadius: 4
				}
			}
		}
	});
	/* Chartjs (#pm2-chart) */
	
	
	/* Chartjs (#carbon-chart) */
	var ctx = $('#carbon-chart');
	ctx.height(110);
	var myChart = new Chart(ctx, {
		type: 'line',
		data: {
			labels: ['Date 1', 'Date 2', 'Date 3', 'Date 4', 'Date 5', 'Date 6', 'Date 7', 'Date 8', 'Date 9', 'Date 10', 'Date 11', 'Date 12', 'Date 13', 'Date 14', 'Date 15', 'Date 16', 'Date 17', 'Date 18', 'Date 19', 'Date 20', 'Date 21', 'Date 22', 'Date 23', 'Date 24',],
			type: 'line',
			datasets: [{
				data: [54, 35, 24, 64, 43, 55, 39,60, 61, 54, 62, 63, 44, 55, 64, 34, 46, 34,  64, 50,  34, 53, 4,  43, 45, 60, 54, 41, 45, 26, 45, 21, 45, 64],
				label: 'Litecoin-price',
				backgroundColor: 'rgba(249, 57, 100, 0.2)',
				borderColor: '#f93964',
				borderWidth: '2',
				pointBorderColor: 'transparent',
				pointBackgroundColor: 'transparent',
			}]
		},
		options: {
			maintainAspectRatio: false,
			legend: {
				display: false
			},
			responsive: true,
			tooltips: {
				mode: 'index',
				titleFontSize: 12,
				titleFontColor: '#7886a0',
				bodyFontColor: '#7886a0',
				backgroundColor: 'rgba(16, 28, 44, 0.68)',
				titleFontFamily: 'Montserrat',
				bodyFontFamily: 'Montserrat',
				cornerRadius: 3,
				intersect: false,
			},
			scales: {
				xAxes: [{
					gridLines: {
						color: 'transparent',
						zeroLineColor: 'transparent'
					},
					ticks: {
						fontSize: 2,
						fontColor: 'transparent'
					}
				}],
				yAxes: [{
					display: false,
					ticks: {
						display: false,
					}
				}]
			},
			title: {
				display: false,
			},
			elements: {
				line: {
					borderWidth: 1
				},
				point: {
					radius: 4,
					hitRadius: 10,
					hoverRadius: 4
				}
			}
		}
	});
	/* Chartjs (#dash-chart) */
	
	
	
});
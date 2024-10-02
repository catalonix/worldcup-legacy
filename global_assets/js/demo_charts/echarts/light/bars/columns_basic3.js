/* ------------------------------------------------------------------------------
 *
 *  # Echarts - Basic column example
 *
 *  Demo JS code for basic column chart [light theme]
 *
 * ---------------------------------------------------------------------------- */


// Setup module
// ------------------------------

var EchartsColumnsBasicLight2 = function() {


    //
    // Setup module components
    //

    // Basic column chart
    var _columnsBasicLightExample2 = function() {
        if (typeof echarts == 'undefined') {
            console.warn('Warning - echarts.min.js is not loaded.');
            return;
        }

        // Define element
        var columns_basic2_element = document.getElementById('columns_basic2');


        //
        // Charts configuration
        //

        if (columns_basic2_element) {

            // Initialize chart
            var columns_basic2 = echarts.init(columns_basic2_element);



            //
            // Chart config
            //

            // Options
            columns_basic2.setOption({

                // Define colors
                color: ['#2ec7c9','#b6a2de','#5ab1ef','#ffb980','#d87a80'],

                // Global text styles
                textStyle: {
                    fontFamily: 'Roboto, Arial, Verdana, sans-serif',
                    fontSize: 13
                },

                // Chart animation duration
                animationDuration: 750,

                // Setup grid
                grid: {
                    left: 0,
                    right: 40,
                    top: 35,
                    bottom: 0,
                    containLabel: true
                },

                // Add legend ['RVR(m)', 'MOR(m)', '풍향(Deg)', '풍속(kt)']
                legend: {
                    data: ['RVR(m)', 'MOR(m)', '풍향(Deg)', '풍속(kt)'],
                    itemHeight: 8,
                    itemGap: 20,
                    textStyle: {
                        padding: [0, 5]
                    }
                },

                // Add tooltip
                tooltip: {
                    trigger: 'axis',
                    backgroundColor: 'rgba(0,0,0,0.75)',
                    padding: [10, 15],
                    textStyle: {
                        fontSize: 13,
                        fontFamily: 'Roboto, sans-serif'
                    }
                },

                // Horizontal axis
                xAxis: [{
                    type: 'category',
                    data: ['15:10', '15:11', '15:13', '15:14', '15:15', '15:16', '15:17', '15:18', '15:19', '15:20', '15:21'],
                    axisLabel: {
                        color: '#333'
                    },
                    axisLine: {
                        lineStyle: {
                            color: '#999'
                        }
                    },
                    splitLine: {
                        show: true,
                        lineStyle: {
                            color: '#eee',
                            type: 'dashed'
                        }
                    }
                }],

                // Vertical axis
                yAxis: [{
                    type: 'value',
                    axisLabel: {
                        color: '#333'
                    },
                    axisLine: {
                        lineStyle: {
                            color: '#999'
                        }
                    },
                    splitLine: {
                        lineStyle: {
                            color: ['#eee']
                        }
                    },
                    splitArea: {
                        show: true,
                        areaStyle: {
                            color: ['rgba(250,250,250,0.1)', 'rgba(0,0,0,0.01)']
                        }
                    }
                }],

                // Add series
                series: [
                    {
                        name: 'RVR(m)',
                        type: 'bar',
                        data: [2400, 2450, 2450, 2500, 2500, 2600, 2500, 2700, 2400, 2100, 2200, 2500],
                        itemStyle: {
                            normal: {
                                label: {
                                    show: false,
                                    position: 'top',
                                    textStyle: {
                                        fontWeight: 500
                                    }
                                }
                            }
                        }
                    },
                    {
                        name: 'MOR(m)',
                        type: 'bar',
                        data: [2500, 2350, 2250, 2600, 2500, 2600, 2300, 2600, 2700, 2200, 2300, 2400],
                        itemStyle: {
                            normal: {
                                label: {
                                    show: false,
                                    position: 'top',
                                    textStyle: {
                                        fontWeight: 500
                                    }
                                }
                            }
                        }
                    },
                    {
                        name: '풍향(Deg)',
                        type: 'line',
                        data: [1000, 800, 1250, 1000, 1500, 2000, 2300, 2600, 2200, 1900, 1000, 1100],
                        itemStyle: {
                            normal: {
                                label: {
                                    show: true,
                                    position: 'top',
                                    textStyle: {
                                        fontWeight: 500
                                    }
                                }
                            }
                        }
                    },
                    {
                        name: '풍속(kt)',
                        type: 'line',
                        data: [80, 100, 1200, 1500, 1700, 2000, 2500, 2200, 1800, 1500, 1000, 800],
                        itemStyle: {
                            normal: {
                                label: {
                                    show: true,
                                    position: 'top',
                                    textStyle: {
                                        fontWeight: 500
                                    }
                                }
                            }
                        }
                    }
                ]
            });

        }



        // Resize charts
        // Resize function
        var triggerChartResize2 = function() {
            columns_basic2_element && columns2_basic.resize();
        };

        // On sidebar width change
        var sidebarToggle2 = document.querySelectorAll('.sidebar-control');
        if (sidebarToggle2) {
            sidebarToggle2.forEach(function(togglers) {
                togglers.addEventListener('click', triggerChartResize2);
            });
        }

        // On window resize
        var resizeCharts2;
        window.addEventListener('resize', function() {
            clearTimeout(resizeCharts2);
            resizeCharts2 = setTimeout(function () {
                triggerChartResize2();
            }, 200);
        });

       
    };


    //
    // Return objects assigned to module
    //

    return {
        init: function() {
            _columnsBasicLightExample2();
        }
    }
}();



// Initialize module
// ------------------------------

document.addEventListener('DOMContentLoaded', function() {
    EchartsColumnsBasicLight2.init();
});


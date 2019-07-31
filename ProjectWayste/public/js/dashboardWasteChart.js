( function ( $ ) {

    var charts = {

        init: function(){
            Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
			Chart.defaults.global.defaultFontColor = '#292b2c';
            charts.ajaxGetData();
            // charts.createChart();
        },

        ajaxGetData: function(){
            var urlPath =  'http://127.0.0.1:8000/test3';
			var request = $.ajax( {
				method: 'GET',
				url: urlPath
		    });

			request.done( function ( response ) {
				console.log( response );
				charts.createChart( response );
			});

        },

        createChart: function(response){
            var ctx = document.getElementById('myChart3').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: response.months,
                    datasets: [{
                        labelDisplay: true,
                        label: "Kitchen Waste",
                        data: response.monthlyCountKitchenFinal,
                        backgroundColor: "rgba(25, 25, 112, 1)",
                        borderColor: "rgba(255, 255, 255, 1)",
                        borderWidth: 2,
                        fontColor: "white",
                        color: "white",
                        pointBackgroundColor: "#fff",
                    },{
                        label: "Recyclable",
                        data: response.monthlyCountRecyclableFinal,
                        backgroundColor: "rgba(6, 72, 21, 1)",
                        borderColor: "rgba(255, 255, 255, 1)",
                        borderWidth: 2,
                        fontColor: "white",
                        color: "white",
                        pointBackgroundColor: "#fff",
                    },
                    {
                        label: "Electronic",
                        data: response.monthlyCountElectronicFinal,
                        backgroundColor: "rgba(110, 125, 19, 1)",
                        borderColor: "rgba(255, 255, 255, 1)",
                        borderWidth: 2,
                        fontColor: "white",
                        color: "white",
                        pointBackgroundColor: "#fff",
                    },
                    {
                        label: "Residual",
                        data: response.monthlyCountResidualFinal,
                        backgroundColor: "rgba(100, 5, 161, 1)",
                        borderColor: "rgba(255, 255, 255, 1)",
                        borderWidth: 2,
                        fontColor: "white",
                        color: "white",
                        pointBackgroundColor: "#fff",
                    },
                    {
                        label: "Hazardous",
                        data: response.monthlyCountHazardousFinal,
                        backgroundColor: "rgba(112, 6, 16, 1)",
                        borderColor: "rgba(255, 255, 255, 1)",
                        borderWidth: 2,
                        fontColor: "white",
                        color: "white",
                        pointBackgroundColor: "#fff",
                    },
                    {
                        label: "Bulk",
                        data: response.monthlyCountBulkFinal,
                        backgroundColor: "rgba(58, 58, 54, 1)",
                        borderColor: "rgba(255, 255, 255, 1)",
                        borderWidth: 2,
                        fontColor: "white",
                        color: "white",
                        pointBackgroundColor: "#fff",
                    }
                    ]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                fontColor: "white",
                                max: response.max,
                                beginAtZero: true

                            }
                        }],
                        xAxes:[{
                            ticks: {
                                fontColor: "white"
                            }
                        }]

                    },
                    legend: {
                        position: 'right',
                        display: true,
                        labels: {
                            fontColor: 'white'
                         }
                    }
                    // title:{
                    //     display: true,
                    //     text: 'User Monthly Stats',
                    //     position: 'left',
                    //     fontColor: 'white',
                    //     fontSize: 20
                    // }
                }

            });

        },


    };

    charts.init();
})( jQuery );

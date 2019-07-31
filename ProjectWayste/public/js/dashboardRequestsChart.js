( function ( $ ) {

    var charts = {

        init: function(){
            Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
			Chart.defaults.global.defaultFontColor = '#292b2c';
            charts.ajaxGetData();
            // charts.createChart();
        },

        ajaxGetData: function(){
            var urlPath =  'http://127.0.0.1:8000/test2';
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
            var ctx = document.getElementById('myChart2').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: response.months,
                    datasets: [{
                        labelDisplay: 'false',
                        data: response.requests_finalcount_data_monthly,
                        backgroundColor: "rgba(123, 239, 178, 0.2)",
                        borderColor: "rgba(123, 239, 178, 1)",
                        borderWidth: 2,
                        borderJoinStyle: 'miter',
                        fontColor: "white",
                        color: "white",
                        pointBackgroundColor: "#fff",
                    }]
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
                        display: false,
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

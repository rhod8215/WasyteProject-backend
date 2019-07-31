( function ( $ ) {

    var charts = {

        init: function(){
            Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
			Chart.defaults.global.defaultFontColor = '#292b2c';
            charts.ajaxGetData();
            // charts.createChart();
        },

        ajaxGetData: function(){
            var urlPath =  'http://127.0.0.1:8000/test';
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
            var ctx = document.getElementById('myChart').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: response.months, //['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                    datasets: [{
                        label: '# of users',
                        data: response.user_finalcount_data_monthly, // [12, 19, 3, 5, 2, 3],
                        // backgroundColor: [
                        //     'rgba(255, 99, 132, 0.2)',
                        //     'rgba(54, 162, 235, 0.2)',
                        //     'rgba(255, 206, 86, 0.2)',
                        //     'rgba(75, 192, 192, 0.2)',
                        //     'rgba(153, 102, 255, 0.2)',
                        //     'rgba(255, 159, 64, 0.2)'
                        // ],
                        backgroundColor: "rgba(123, 239, 178, 0.2)",
                        // borderColor: [
                        //     'rgba(255, 99, 132, 1)',
                        //     'rgba(54, 162, 235, 1)',
                        //     'rgba(255, 206, 86, 1)',
                        //     'rgba(75, 192, 192, 1)',
                        //     'rgba(153, 102, 255, 1)',
                        //     'rgba(255, 159, 64, 1)'
                        // ],
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
                        display: true,
                        labels: {
                            fontColor: 'white'
                         }
                    },
                    title:{
                        display: true,
                        text: 'User Monthly Stats',
                        position: 'left',
                        fontColor: 'white',
                        fontSize: 20
                    }
                }

            });

        },


    };

    charts.init();
})( jQuery );

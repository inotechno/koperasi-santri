Highcharts.chart("chart_statistis", {
    chart: {
        type: "pie",
    },
    title: {
        text: "",
        align: "left",
    },
    xAxis: {
        categories: ["Apples", "Bananas", "Oranges"],
    },
    accessibility: {
        announceNewData: {
            enabled: true,
        },
        point: {
            valueSuffix: "",
        },
    },

    plotOptions: {
        series: {
            borderRadius: 5,
            dataLabels: {
                enabled: true,
                format: "{point.name}: {point.y:.1f}%",
            },
        },
    },

    tooltip: {
        headerFormat: '<span style="font-size:11px"></span><br>',
        pointFormat:
            '<span style="color:{point.color}">{point.name}</span><br/>',
    },

    series: [
        {
            colorByPoint: true,
            data: [
                {
                    name: "Laki-laki",
                    y: 6,
                    drilldown: "Laki-laki",
                },
                {
                    name: "Perempuan",
                    y: 9,
                    drilldown: "Perempuan",
                },
            ],
        },
    ],
    drilldown: {
        series: [
            {
                name: "Laki-laki",
                id: "Laki-laki",
                data: [[1]],
            },
        ],
    },
});

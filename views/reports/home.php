<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-md-6">
                <h5 class="card-title">Number of news</h5>
            </div>
            <div class="col-md-6">
                <label for="date-from">Date from</label>
                <input type="date" id="date-from" class="form-control pull-right helper">
                <label for="date-to">Date to</label>
                <input type="date" id="date-to" class="form-control pull-right helper">
            </div>
        </div>
    </div>
    <div class="card-body" id="number-of-news-body">
        <!-- Line Chart -->
        <canvas id="number-of-news" style="max-height: 400px; display: block; box-sizing: border-box; height: 400px; width: 801.6px;" width="1002" height="500"></canvas>
        <!-- End Line CHart -->
    </div>
</div>

<script>
    $(document).ready(function (){
        var url = "/reports/numberOfNews";
        var dataFromView = { "date_from": $("#date-from").val(), "date_to": $("#date-to").val() };
        var canvasObject = $("#number-of-news").get(0).getContext('2d');

        $.getJSON(url, dataFromView,function (result){
            var labels = result.map(function (object){
                return object.month_name;
            });

            var data = result.map(function (object){
                return object.number_of_news;
            });

            createGraph(data, labels, canvasObject);
        });

        $(".helper").change(function () {
            $("#number-of-news").remove();
            $("#number-of-news-body").append("<canvas id='number-of-news' style='max-height: 400px; display: block; box-sizing: border-box; height: 400px; width: 801.6px;' width='1002' height='500'></canvas>");

            dataFromView = { "date_from": $("#date-from").val(), "date_to": $("#date-to").val() };
            canvasObject = $("#number-of-news").get(0).getContext('2d');

            $.getJSON(url, dataFromView,function (result){
                var labels = result.map(function (object){
                    return object.month_name;
                });

                var data = result.map(function (object){
                    return object.number_of_news;
                });

                createGraph(data, labels, canvasObject);
            });
        });
    });

    function createGraph(data, labels, canvasObject)
    {
        new Chart(canvasObject, {
            type: "bar",
            data: {
                labels: labels,
                datasets: [{
                    data: data,
                    label: "News per month",
                    backgroundColor: 'rgb(173, 5, 5)',
                    borderColor: 'rgb(173, 5, 5)',
                    fill: false
                }]
            },
            options: {
                title: {
                    display: true,
                    text: "News per month"
                },
                scales: {
                    yAxes: [{
                        ticks: {
                            max: 70,
                            min: 0,
                        }
                    }]
                },
                legend: {
                    display: true
                }
            }
        });
    }
</script>
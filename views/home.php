<link href="assets/vendor/toastr/toastr.min.css" rel="stylesheet">
<script
        src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
        crossorigin="anonymous"></script>

<!--CUSTOMERS-->
<div class="card">
    <div class="card-header text-center">
        <div class="row">
            <h5 class="card-title">
                Number of customers
            </h5>
            <div class="input-group">
                <label for="data-from-customers" class="col-form-label me-2">Date From</label>
                <input type="date" id="date-from-customers" class="form-control helper">
                <label for="data-to-customers" class="col-form-label ms-2 me-2"> Date To</label>
                <input type="date" id="date-to-customers" class="form-control helper">
            </div>
            <div class="input-group">
                <select id="customers-show-by" class="dataTable-selector helper">
                    <option value="DAYNAME">Day</option>
                    <option value="MONTHNAME" selected>Month</option>
                    <option value="YEAR">Year</option>

                </select>
            </div>
        </div>
        <div class="card-body" id="number-of-customers-card">

            <canvas id="number-of-customers"
                    style="max-height: 400px; display: block; box-sizing: border-box; height: 359px; width: 719px;"
                    width="719" height="359">

            </canvas>
        </div>

    </div>
</div>

<!--REVENUE-->
<div class="card">
    <div class="card-header text-center">
        <div class="row">
            <h5 class="card-title">
                    Revenue
            </h5>
            <div class="input-group">
                <label for="data-from-revenue" class="col-form-label me-2">Date From</label>
                <input type="date" id="date-from-revenue" class="form-control helper">
                <label for="data-to-revenue" class="col-form-label ms-2 me-2"> Date To</label>
                <input type="date" id="date-to-revenue" class="form-control helper">
            </div>
            <div class="input-group">
                <select id="revenue-show-by" class="dataTable-selector helper">
                    <option value="MONTHNAME" selected>Month</option>
                    <option value="YEAR">Year</option>

                </select>
            </div>
        </div>
        <div class="card-body" id="revenue-card">

            <canvas id="revenue-canvas"
                    style="max-height: 400px; display: block; box-sizing: border-box; height: 359px; width: 719px;"
                    width="719" height="359">

            </canvas>
        </div>

    </div>
</div>

<!--ORDERS-->
<div class="card">
    <div class="card-header text-center">
        <div class="row">
            <h5 class="card-title">
                Number of orders
            </h5>
            <div class="input-group">
                <label for="data-from-customers" class="col-form-label me-2">Date From</label>
                <input type="date" id="date-from-orders" class="form-control helper">
                <label for="data-to-customers" class="col-form-label ms-2 me-2"> Date To</label>
                <input type="date" id="date-to-orders" class="form-control helper">
            </div>
            <div class="input-group">
                <select id="orders-show-by" class="dataTable-selector helper">
                    <option value="DAYNAME">Day</option>
                    <option value="MONTHNAME" selected>Month</option>
                    <option value="YEAR">Year</option>

                </select>


            </div>

            <div class="input-group">
                <select id="chart-type-orders" class="dataTable-selector helper">
                    <option value="bar">Bar Chart</option>
                    <option value="line" selected>Line Chart</option>

                </select>


            </div>

        </div>
        <div class="card-body" id="number-of-orders-card">

            <canvas id="number-of-orders"
                    style="max-height: 400px; display: block; box-sizing: border-box; height: 359px; width: 719px;"
                    width="719" height="359">

            </canvas>
        </div>

    </div>
</div>

<!--CATEGORIES-->
<div class="card">
    <div class="card-header text-center">
        <div class="row">
            <h5 class="card-title">
                Category orders count
            </h5>


        </div>
    </div>
    <div class="card-body" id="category-orders-count-card">

        <canvas id="category-orders-count"
                style="max-height: 600px; display: block; box-sizing: border-box; height: 359px; width: 719px;"
                width="719" height="359">

        </canvas>
    </div>

</div>

<!--TOP SELLING-->
<h1 class="mt-3 mb-3">Top Selling Items</h1>
<table class="table">
    <thead class="table-dark">
    <tr>
        <th scope="col">#</th>
        <th scope="col">Product Name</th>
        <th scope="col">Amount Sold</th>

    </tr>
    </thead>
    <tbody id="top-selling">

    </tbody>
</table>


<script>
    //CUSTOMERS
    function getCustomersReports() {
        $(document).ready(function () {
            var url = "/reports/numberofcustomers";
            var dateFromView = {
                "date_from_customers": $("#date-from-customers").val(),
                "date_to_customers": $("#date-to-customers").val(),
                "customers_show_by": $("#customers-show-by option:selected").val()

            };
            var canvasObject = $("#number-of-customers").get(0).getContext('2d');

            $.getJSON(url, dateFromView, function (result) {
                var labels = result.map(
                    function (object) {
                        return object.month;
                    }
                )

                var data = result.map(
                    function (object) {
                        return object.number_of_customers;
                    }
                )
                createGraph(data, labels, canvasObject);
            })

            $(".helper").change(function () {
                $("#number-of-customers").remove();
                $("#number-of-customers-card").append(
                    '<canvas id="number-of-customers" style="max-height: 400px; display: block; box-sizing: border-box; height: 359px; width: 719px;" width="719" height="359"> </canvas>')

                dateFromView = {
                    "date_from_customers": $("#date-from-customers").val(),
                    "date_to_customers": $("#date-to-customers").val(),
                    "customers_show_by": $("#customers-show-by option:selected").val()

                };
                canvasObject = $("#number-of-customers").get(0).getContext('2d');

                console.log(dateFromView);
                $.getJSON(url, dateFromView, function (result) {
                    var labels = result.map(
                        function (object) {
                            return object.month;
                        }
                    )

                    var data = result.map(
                        function (object) {
                            return object.number_of_customers;
                        }
                    )
                    createGraph(data, labels, canvasObject);
                })

            })
        })


        function createGraph(data, labels, canvasObject) {

            new Chart(canvasObject, {
                type: "line",
                data: {
                    labels: labels,
                    datasets: [{
                        data: data,
                        borderColor: "red",
                        label: "Number of customers",
                        backgroundColor: 'red',
                        fill: false
                    }]
                },
                options: {
                    title: {
                        display: true,
                        text: "Number of customers per day"
                    },
                    scales: {
                        yAxes: [
                            {
                                ticks: {
                                    max: 700,
                                    min: 0
                                }
                            }
                        ]
                    }
                    , legend: {
                        display: true
                    }
                }
            });

        }
    }

    //ORDERS
    function getOrdersReport() {
        $(document).ready(function () {
            var url = "/reports/numberoforders";
            var dateFromView = {
                "date_from_orders": $("#date-from-orders").val(),
                "date_to_orders": $("#date-to-orders").val(),
                "orders_show_by": $("#orders-show-by option:selected").val()

            };


            var canvasObject = $("#number-of-orders").get(0).getContext('2d');

            $.getJSON(url, dateFromView, function (result) {
                var labels = result.map(
                    function (object) {
                        return object.month;
                    }
                )

                var data = result.map(
                    function (object) {
                        return object.number_of_orders;
                    }
                )
                createGraph(data, labels, canvasObject,'line');
            })

            $(".helper").change(function () {
                $("#number-of-orders").remove();
                $("#number-of-orders-card").append(
                    '<canvas id="number-of-orders" style="max-height: 400px; display: block; box-sizing: border-box; height: 359px; width: 719px;" width="719" height="359"> </canvas>')

                dateFromView = {
                    "date_from_orders": $("#date-from-orders").val(),
                    "date_to_orders": $("#date-to-orders").val(),
                    "orders_show_by": $("#orders-show-by option:selected").val()
                };

                var chartType = $("#chart-type-orders option:selected").val();

                canvasObject = $("#number-of-orders").get(0).getContext('2d');

                console.log(dateFromView);
                $.getJSON(url, dateFromView, function (result) {
                    var labels = result.map(
                        function (object) {
                            return object.month;
                        }
                    )

                    var data = result.map(
                        function (object) {
                            return object.number_of_orders;
                        }
                    )
                    createGraph(data, labels, canvasObject,chartType);
                })

            })
        })


        function createGraph(data, labels, canvasObject,chartType) {
            new Chart(canvasObject, {
                type: chartType,
                data: {
                    labels: labels,
                    datasets: [{
                        data: data,
                        borderColor: "blue",
                        label: "Number of orders",
                        backgroundColor: 'blue',
                        fill: false
                    }]
                },
                options: {
                    title: {
                        display: true,
                        text: "Number of orders"
                    },
                    scales: {
                        yAxes: [
                            {
                                ticks: {
                                    max: 700,
                                    min: 0
                                }
                            }
                        ]
                    }
                    , legend: {
                        display: true
                    }
                }
            });

        }
    }

    // CATEGORIES
    function getCategoriesReport() {

        $(document).ready(function () {
            var url = "/reports/categoryordercount";
            var canvasObject = $("#category-orders-count").get(0).getContext('2d');

            $.getJSON(url, function (result) {
                var labels = result.map(
                    function (object) {
                        return object.category;
                    }
                )

                var data = result.map(
                    function (object) {
                        return object.quantity;
                    }
                )
                createGraph(data, labels, canvasObject);
            })

        })


        function createGraph(data, labels, canvasObject) {

            new Chart(canvasObject, {
                type: "pie",
                data: {
                    labels: labels,
                    datasets: [{
                        data: data,
                        borderColor: ["blue", "green", "red", "brown", "purple"],
                        label: "Number of orders",
                        backgroundColor: ["blue", "green", "red", "brown", "purple"],
                        fill: false
                    }]
                },
                options: {
                    title: {
                        display: true,
                        text: "Number of orders"
                    }
                    , legend: {
                        display: true
                    }
                }
            });

        }
    }

    //Top Selling

    function getTopSelling() {
        $(document).ready(function () {
                var url = "/reports/topselling";

                var table = document.getElementById('top-selling');
                let tr_list="";


            $.getJSON(url, function (result) {
                for(i=0;i<result.length;i++){
                    var productName = result[i].product_name;
                    var amount = result[i].amount;
                    var num = i+1;
                    var td = "<tr><td>"+num+"</td> <td>" + productName + "</td> <td>" + amount + "</td></tr>";
                    tr_list+=td;

                }
                console.log(tr_list)
                table.innerHTML += tr_list;

            })



            }
        )
    }

    function getRevenueReport() {
        $(document).ready(function () {
            var url = "/reports/revenue";
            var dateFromView = {
                "date_from_revenue": $("#date-from-revenue").val(),
                "date_to_revenue": $("#date-to-revenue").val(),
                "revenue_show_by": $("#revenue-show-by option:selected").val()

            };

            var canvasObject = $("#revenue-canvas").get(0).getContext('2d');

            $.getJSON(url, dateFromView, function (result) {
                var labels = result.map(
                    function (object) {
                        return object.dt;
                    }
                )

                var data = result.map(
                    function (object) {
                        return object.revenue;
                    }
                )
                createGraph(data, labels, canvasObject);
            })

            $(".helper").change(function () {
                $("#revenue-canvas").remove();
                $("#revenue-card").append(
                    '<canvas id="revenue-canvas" style="max-height: 400px; display: block; box-sizing: border-box; height: 359px; width: 719px;" width="719" height="359"> </canvas>')

                dateFromView = {
                    "date_from_revenue": $("#date-from-revenue").val(),
                    "date_to_revenue": $("#date-to-revenue").val(),
                    "revenue_show_by": $("#revenue-show-by option:selected").val()

                };


                canvasObject = $("#revenue-canvas").get(0).getContext('2d');

                console.log(dateFromView);
                $.getJSON(url, dateFromView, function (result) {
                    var labels = result.map(
                        function (object) {
                            return object.dt;
                        }
                    )

                    var data = result.map(
                        function (object) {
                            return object.revenue;
                        }
                    )
                    createGraph(data, labels, canvasObject);
                })

            })
        })


        function createGraph(data, labels, canvasObject) {

            new Chart(canvasObject, {
                type: "line",
                data: {
                    labels: labels,
                    datasets: [{
                        data: data,
                        borderColor: "green",
                        label: "Revenue",
                        backgroundColor: 'green',
                        fill: false
                    }]
                },
                options: {
                    title: {
                        display: true,
                        text: "Revenue"
                    },
                    scales: {
                        yAxes: [
                            {
                                ticks: {
                                    max: 700,
                                    min: 0
                                }
                            }
                        ]
                    }
                    , legend: {
                        display: true
                    }
                }
            });

        }
    }

    getOrdersReport();
    getCustomersReports();
    getCategoriesReport();
    getRevenueReport();
    getTopSelling();

</script>
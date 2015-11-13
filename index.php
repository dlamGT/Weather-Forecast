<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">


    <style>

        html, body {
            height:100%;
        }

        .container {
            background-image:url("background.jpg");
            width:100%;
            height:100%;
            background-size: cover;
            background-position:center;
            padding-top:150px;
        }

        .center {
            text-align:center;
        }

        .white {
            color:white;
        }

        p {
            padding-top:15px;
            padding-bottom:15px;
        }

        button {
            margin-top:20px
            margin-bottom:20px;
        }

        .alert {
            margin-top:20px;
            display:none;
        }

    </style>

</head>
<body>
    <div class="container">

        <div class="row">

            <div class="col-md-6 col-md-offset-3 center">
                <h1 class="center">Weather Predictor</h1>

                <p class="lead center">Enter your city below to get a forecast for a weather.</p>

                <form>

                    <div class="form-group">

                        <input type="text" class="form-control" name"city" id="city" placeholder="Eg. London, Newyork, San Francisco..."/>

                    </div>

                    <button id="findMyWeather" class="btn btn-success btn-lg center">Find My Weather</button>

                </form>
                <div id="success" class="alert alert-success">Success!</div>

                <div id="fail" class="alert alert-danger">Could not find weather of that city. Please try again!</div>

                <div id="noCity" class="alert alert-danger">Please enter a city name!</div>

            </div>




        </div>

    </div>

     <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js"></script>

    <script>
        $("#findMyWeather").click(function(event) {
            event.preventDefault();
            $(".alert").hide();
            if ($("#city").val()!="") {
                $.get("scraper.php?city="+$("#city").val(), function(data) {
                    if (data == 0) {
                        $("#fail").fadeIn();
                    } else {
                        $("#success").html(data).fadeIn();
                    }
                });
            } else {
                $("#noCity").fadeIn();
            }
        });
    </script>

</body>
</html>

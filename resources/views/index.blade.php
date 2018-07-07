<!DOCTYPE html>

<html>
<head>
    <meta name="viewport" content="width=device-width" />
    <title>Exportar Archivos .MCR</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" >
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.15/angular.min.js"></script>
    <script>
        $(function () {
            $("#docstatus").click(function () {

                $("#result").empty();
                $("#prg .progress-bar").css("width", "50%").addClass("progress-bar-striped active").html("50%");
                $.ajax({
                    url: "/createFiles",
                    success: function (data) {
                        $("#prg .progress-bar").css({ "width": "100%" }).removeClass("active").html("100%");
                        $("#result").html(data);
                        //window.location.href = data.download_zip
                        $("#load_link").attr("href", data.download_zip);
                        $("#load_link").show()
                    }, error: function () {
                        alert("error");
                    }
                });

            });
        });
    </script>
</head>
<body>
    <div class="container">
    	<div class="row">
    	  <div class="col-md-12">
    	  	<h2 class="text-center">Exportar Archivos .MCR</h2>
    	  	<br>
    	  	<div class="progress" id="prg">
    	  	    <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
    	  	</div>
    	  </div>
    	</div>
    	<div class="row">
    	  <div class="col-md-12">
    	  	<input type="button" class="btn btn-success btn-block" value="Exportar" id="docstatus" />
    	  	<br>
    	  	<a href="" class="btn btn-warning btn-block" id="load_link" style="display: none;">Descargar Exportacion</a>
    	  </div>
    	</div>
   </div>
</body>
</html>
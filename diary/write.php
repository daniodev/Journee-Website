<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Journee Write</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
<?php
$conn = mysqli_connect("127.0.0.1", "root", "", "journee") 
    or die("Connection failed: " . mysqli_connect_error());
//$query = $conn -> query()

/*
if($row["username"] == $_POST["username"]){
$registered = true;
if($row["password"] == $_POST["password"]){
echo"Password c";
}else{
echo"Password sb";
}

*/

?>

    </head>

<body>
    <div class="container-fluid">

        <div class="row">

            <h1>How was Today?<span class="badge text-bg-secondary">New</span></h1>
        </div>
    
        <div class="row">
        
            <div class="col-9">

                <textarea id="comments" name="comments" rows="7" cols="50">
                    Write your thoughts
                </textarea>
            </div>

            <div class="col-1">

                <h4>Scala 1</h4>
                <div class="form-check">
                    <input class="form-check-input" type="Radio" name="ValueDefault" id="ValueDefault5">
                    <label class="form-check-label" for="ValueDefault5">
                        5
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="Radio" name="ValueDefault" id="ValueDefault4" checked>
                    <label class="form-check-label" for="ValueDefault4">
                        4
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="Radio" name="ValueDefault" id="ValueDefault3" checked>
                    <label class="form-check-label" for="ValueDefault3">
                        3
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="Radio" name="ValueDefault" id="ValueDefault2" checked>
                    <label class="form-check-label" for="ValueDefault2">
                        2
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="Radio" name="ValueDefault" id="ValueDefault1" checked>
                    <label class="form-check-label" for="ValueDefault1">
                        1
                    </label>
                </div>
            </div>


            <div class="col-1">

                <h4>Scala 2</h4>
                <div class="form-check">
                    <input class="form-check-input" type="Radio" name="ValueDefault2" id="ValueDefault5">
                    <label class="form-check-label" for="ValueDefault5">
                        5
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="Radio" name="ValueDefault2" id="ValueDefault4" checked>
                    <label class="form-check-label" for="ValueDefault4">
                        4
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="Radio" name="ValueDefault2" id="ValueDefault3" checked>
                    <label class="form-check-label" for="ValueDefault3">
                        3
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="Radio" name="ValueDefault2" id="ValueDefault2" checked>
                    <label class="form-check-label" for="ValueDefault2">
                        2
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="Radio" name="ValueDefault2" id="ValueDefault1" checked>
                    <label class="form-check-label" for="ValueDefault1">
                        1
                    </label>
                </div>

            </div>

            <div class="col-1">
                <h4>Scala 3</h4>
                <div class="form-check">
                    <input class="form-check-input" type="Radio" name="ValueDefault3" id="ValueDefault5">
                    <label class="form-check-label" for="ValueDefault5">
                        5
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="Radio" name="ValueDefault3" id="ValueDefault4" checked>
                    <label class="form-check-label" for="ValueDefault4">
                        4
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="Radio" name="ValueDefault3" id="ValueDefault3" checked>
                    <label class="form-check-label" for="ValueDefault3">
                        3
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="Radio" name="ValueDefault3" id="ValueDefault2" checked>
                    <label class="form-check-label" for="ValueDefault2">
                        2
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="Radio" name="ValueDefault3" id="ValueDefault1" checked>
                    <label class="form-check-label" for="ValueDefault1">
                        1
                    </label>
                </div>

            </div>
    
        </div>

    </div>
    <button onclick="SendinFunction()" type="button" class="btn">Base class</button>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous">
        function SendinFunction(){
        }
    </script>
<?php

?>
</body>
</html>
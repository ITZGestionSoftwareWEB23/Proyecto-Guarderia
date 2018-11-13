<form  method="post">
        <table border="2px">
            <center>
                <h1>Ficha Medica</h1>
            </center>
           
            <div class="form-group col-md-6">
                <label for="formGroupExampleInput">Grupo Sanguineo: </label>
                <input type="text" class="form-control" name="sanguineoNino" id="sanguineoNino" required>
            </div>
            <div class="form-group col-md-6">
                <label for="formGroupExampleInput2">Seguro Medico :</label>
                <input type="text" class="form-control"name="seguroNino" id="seguroNino" >
            </div>
            <div class="form-group col-md-6">
                <label for="formGroupExampleInput2">Indicaciones Medicas :</label>
                <input type="text" class="form-control" name="imNino" id="imNino" >
            </div>
            <div class="form-group col-md-6">
                <label for="formGroupExampleInput">Observaciones: </label>
                <input type="text" class="form-control" name="observacionNino" id="observacionNino" >
            </div>

            <div class="form-group col-md-6">
                <label for="formGroupExampleInput">Alergia: </label>
                <input type="text" class="form-control" name="alergiaNino" id="alergiaNino">
            </div>

            <div class="form-group col-md-6">
                <label for="formGroupExampleInput">Descripcion: </label>
                <input type="text" class="form-control" name="descNino" id="descNino">
            </div>
            
            <div class="form-group col-md-6">
                <input type="submit" class="btn btn-primary mb-2" name="fichaNino">
            </div>

        </table>
        </form>
 <?php

   /* require_once "controllers/controller.php";

    $mvc = new MVCController();
    $mvc->registroNinoController();
/*
    if (isset($_GET["action"])) {
        if ($_GET["action"] == "ok") {
            echo "Registro Exitoso!";
        }
    }*/
?>
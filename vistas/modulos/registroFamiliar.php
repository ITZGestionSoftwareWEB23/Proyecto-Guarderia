<form  method="post">
        <table border="2px">
            <center>
                <h1>Registro de Datos Personales</h1>
            </center>
           
            <div class="form-group col-md-6">
                <label for="formGroupExampleInput">Nombre: </label>
                <input type="text" class="form-control" name="nombreFamiliar" id="nombreFamiliar"  required>
            </div>
            <div class="form-group col-md-6">
                <label for="formGroupExampleInput2">Apellido Paterno :</label>
                <input type="text" class="form-control"name="paternoFamiliar" id="paternoFamiliar"  required>
            </div>
            <div class="form-group col-md-6">
                <label for="formGroupExampleInput2">Apellido Materno :</label>
                <input type="text" class="form-control" name="maternoFamiliar" id="maternoFamiliar"  required>
            </div>
            <div class="form-group col-md-6">
                <label for="formGroupExampleInput">Fecha de Nacimiento: </label>
                <input type="text" class="form-control" name="fechaFamiliar" id="fechaFamiliar" placeholder="dd-mm-aa" required>
            </div>

            <div class="form-group col-md-6">
                <label for="formGroupExampleInput">Genero: </label>
                <input type="text" class="form-control" name="generoFamiliar" id="generoFamiliar" required>
            </div>

            <div class="form-group col-md-6">
                <label for="formGroupExampleInput">Direccion: </label>
                <input type="text" class="form-control" name="direccionFamiliar" id="direccionFamiliar" required>
            </div>
            <div class="form-group col-md-6">
                <label for="formGroupExampleInput2">Telefono :</label>
                <input type="text" class="form-control" name="telefonoFamiliar" id="telefonoFamiliar" required>
            </div>
             <div class="form-group col-md-6">
                <label for="formGroupExampleInput2">Ocupacion :</label>
                <input type="text" class="form-control" name="ocupacionFamiliar" id="ocupacionFamiliar" required>
            </div>
            

             <div class="form-group col-md-6">
                <label for="formGroupExampleInput2">Email:</label>
                <input type="text" class="form-control" name="emailFamiliar" id="emailFamiliar" required>
            </div>

             <div class="form-group col-md-6">
                <label for="formGroupExampleInput2">Vive con el:</label>
                <input type="text" class="form-control" name="viveFamiliar" id="viveFamiliar" required>
            </div>

             <div class="form-group col-md-6">
                <label for="formGroupExampleInput2">Estado Civil:</label>
                <input type="text" class="form-control" name="estadoFamiliar" id="estadoFamiliar" required>
            </div>
            <div class="form-group col-md-6">
                <input type="submit" class="btn btn-primary mb-2" name="registradoFamiliar">
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
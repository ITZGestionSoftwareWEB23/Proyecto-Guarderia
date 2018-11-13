 <?php

    require_once "controllers/controller.php";

    $mvc = new MVCController();
    $mvc->registroNinoController();
/*
    if (isset($_GET["action"])) {
        if ($_GET["action"] == "ok") {
            echo "Registro Exitoso!";
        }
    }*/
?>
<form  method="post">
        <table border="2px">
            <center>
                <h1>Registro de Datos Personales</h1>
            </center>
           
            <div class="form-group col-md-6">
                <label for="formGroupExampleInput">Nombre: </label>
                <input type="text" class="form-control" name="nombreDocente" id="nombreDocente" required>
            </div>
            <div class="form-group col-md-6">
                <label for="formGroupExampleInput2">Apellido Paterno :</label>
                <input type="text" class="form-control"name="paternoDocente" id="paternoDocente"  required>
            </div>
            <div class="form-group col-md-6">
                <label for="formGroupExampleInput2">Apellido Materno :</label>
                <input type="text" class="form-control" name="maternoDocente" id="maternoDocente" required>
            </div>
            <div class="form-group col-md-6">
                <label for="formGroupExampleInput">Fecha de Nacimiento: </label>
                <input type="text" class="form-control" name="fechaDocente" id="fechaDocente" placeholder="dd-mm-aa" required>
            </div>

            <div class="form-group col-md-6">
                <label for="formGroupExampleInput">Genero: </label>
                <input type="text" class="form-control" name="generoDocente" id="generoDocente" required>
            </div>

            <div class="form-group col-md-6">
                <label for="formGroupExampleInput">Direccion: </label>
                <input type="text" class="form-control" name="direccionDocente" id="direccionDocente" required>
            </div>
            <div class="form-group col-md-6">
                <label for="formGroupExampleInput2">Telefono :</label>
                <input type="text" class="form-control" name="telefonoDocente" id="telefonoDocente" required>
            </div>
                         

             <div class="form-group col-md-6">
                <label for="formGroupExampleInput2">Email:</label>
                <input type="text" class="form-control" name="emailDocente" id="emailDocente" required>
            </div>

            <div class="form-group col-md-6">
                <label for="formGroupExampleInput2">Cargo :</label>
                <input type="text" class="form-control" name="cargoDocente" id="cargoDocente" required>
            </div>

            <div class="form-group col-md-6">
                <label for="formGroupExampleInput2">Estado Civil:</label>
                <input type="text" class="form-control" name="estadoDocente" id="estadoDocente" required>
            </div>


             <div class="form-group col-md-6">
                <label for="formGroupExampleInput2">Profecion:</label>
                <input type="text" class="form-control" name="profecionDocente" id="profecionDocente" required>
            </div>

             
            <div class="form-group col-md-6">
                <input type="submit" class="btn btn-primary mb-2" name="registradoDocente">
            </div>

        </table>
        </form>

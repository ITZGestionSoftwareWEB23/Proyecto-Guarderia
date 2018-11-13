<?php
		require_once "controllers/controller.php";

    if (isset($_POST["nombre"])) {
        $mvc = new MVCController();
        $mvc->registroNinoController();
    }

    /*if (isset($_GET["action"])) {
        if ($_GET["action"] == "ok") {
            //header("location:index.php?action=fiichaMedica&".$_GET["cve_per"]);
            //echo "Registro Exitoso!";
        }
    }*/
?>
<form  method="POST">
        <table border="2px">
            <center>
                <h1>Registro de Datos Personales</h1>
            </center>
           
            <div class="form-group col-md-6">
                <label for="formGroupExampleInput">Nombre: </label>
                <input type="text" class="form-control" name="nombre" id="nombre" required>
            </div>
            <div class="form-group col-md-6">
                <label for="formGroupExampleInput2">Apellido Paterno :</label>
                <input type="text" class="form-control"name="paterno" id="paterno"  required>
            </div>
            <div class="form-group col-md-6">
                <label for="formGroupExampleInput2">Apellido Materno :</label>
                <input type="text" class="form-control" name="materno" id="materno" required>
            </div>
            <div class="form-group col-md-6">
                <label for="formGroupExampleInput">Fecha de Nacimiento: </label>
                <input type="text" class="form-control" name="fecha" id="fecha" placeholder="dd-mm-aa" required>
            </div>
            <div class="form-group col-md-6">
                <label for="formGroupExampleInput">Genero: </label>
                <input type="text" class="form-control" name="genero" id="genero" required>
            </div>

            <div class="form-group col-md-6">
                <label for="formGroupExampleInput">Direccion: </label>
                <input type="text" class="form-control" name="direcion" id="direcion" required>
            </div>
            <div class="form-group col-md-6">
                <label for="formGroupExampleInput2">Nacionalidad :</label>
                <input type="text" class="form-control" name="nacionalidad" id="nacionalidad" required>
            </div>
            <div class="form-group col-md-6">
                <input type="submit" class="btn btn-primary mb-2" name="registradoNino">
            </div>

        </table>
 </form>

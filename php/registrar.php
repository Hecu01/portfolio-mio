<?php 
    include("con_db.php");

    if (isset ($_POST['register'])){
        if (strlen($_POST['name']) >= 1 && strlen($_POST['surname']) >= 1 && strlen($_POST['correo']) >= 1 && strlen($_POST['messagge']) >= 1)
        { 
            $name = trim($_POST['name']);
            $surname = trim($_POST['surname']);
            $email = trim($_POST['correo']);
            $messagge = trim ($_POST['messagge']);
            $fecha_reg = date("d/m/y"); 
            $consulta = "INSERT INTO clientes(Nombre, Apellido, Correo, Mensaje, Fecha_reg) VALUES ('$name', '$surname','$email','$messagge', '$fecha_reg')";
            $resultado = mysqli_query($conex, $consulta);

            if ($resultado){
                ?> 
                
                <div class="alert alert-dismissible fade show enviado" id="consulta-enviada" role="alert" >
                    <strong>¡Hola usuario!</strong> La consulta fue realizada con éxito.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" onclick=""></button>
                </div>
                <script>
                    window.location.href = "#consulta-enviada";
                </script>

                <?php

            } else{
                ?>
                <div class="alert alert-danger alert-dismissible fade show error" id="no-enviada-la-consulta" role="alert">
                    <strong>¡Ups!</strong> Ha ocurrido un error inesperado...
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <script>
                    window.location.href = "#no-enviada-la-consulta";
                </script>
                <?php
            }            

        } else{
            ?> 
            
            <div class="alert alert-dismissible fade show error" id="falta-completar-campos" role="alert" >
                <strong>Por favor</strong> Rellene todos los campos...
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <script>
                window.location.href = "#falta-completar-campos";
            </script>
            <?php
        }




    }


?>
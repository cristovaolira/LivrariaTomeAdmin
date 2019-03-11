<?php
    

    $conn = mysqli_connect("localhost","root", "usbw", "livrariatome");
    $np = $_POST['np'];
    $stratment = "DELETE FROM cadastro_vendas WHERE NUM_PED = $np";
    $query = mysqli_query($conn,$stratment);

    if($query){
        header("Location:vendas.php");
    } else{
        echo("Erro ao apagar...");
    }

?>
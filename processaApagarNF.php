<?php
    
    $conn = mysqli_connect("localhost","root", "usbw", "livrariatome");
    $nf = $_POST['nf'];
    $stratment = "DELETE  FROM notas_fiscais WHERE NF_NUM = $nf";
    $query = mysqli_query($conn,$stratment);

    if($query){
        header("Location:faturas.php");
    } else{
        echo("Erro ao apagar..."); 
    }

?>
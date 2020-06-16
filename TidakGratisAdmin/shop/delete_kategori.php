<?php

    require_once('connect.php');

    $id_kategori = isset($_GET['id_kategori']) ? $_GET['id_kategori'] : '';

    //Asign  a  query
    $query  =  "DELETE FROM kategori WHERE (id_kategori = ".$id_kategori.")";

    //  Execute  the  query
    $result = mysqli_query($con,$query); 
    if  (!$result){
        die  ("Could  not  query  the  database:  <br  />".  mysqli_error($con));
    } else{
        header('Location: kategori.php');    
    }
?>
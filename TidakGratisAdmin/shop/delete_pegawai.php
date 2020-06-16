<?php

    require_once('connect.php');

    $id_pegawai = isset($_GET['id_pegawai']) ? $_GET['id_pegawai'] : '';

    //Asign  a  query
    $query  =  "DELETE FROM pegawai WHERE (id_pegawai = ".$id_pegawai.")";

    //  Execute  the  query
    $result = mysqli_query($con,$query); 
    if  (!$result){
        die  ("Could  not  query  the  database:  <br  />".  mysqli_error($db));
    } else{
        header('Location: pegawai.php');    
    }
?>
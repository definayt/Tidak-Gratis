<?php
    session_start();
    if(!isset($_SESSION['username'])){
      header("location: login.php");
    }
    else{
?>
<?php

    require_once('connect.php');
    // $con = mysqli_connect($db_host, $db_username, $db_password,$db_database);
    // if (mysqli_connect_errno()){
    // die ("Could not connect to the database: <br />". mysqli_connect_error());
    // }

    $id_subkategori = isset($_GET['id_subkategori']) ? $_GET['id_subkategori'] : '';

    //Asign  a  query
    $query  =  "DELETE FROM sub_kategori WHERE (id_subkategori = ".$id_subkategori.")";

    //  Execute  the  query
    $result = mysqli_query($con,$query); 
    if  (!$result){
        die  ("Could  not  query  the  database:  <br  />".  mysqli_error($db));
    } else{
        header('Location: sub_kategori.php');    
    }
}
?>
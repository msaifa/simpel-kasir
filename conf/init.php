<?php
    session_start();
    require ("globalvar.php");

    $host = "localhost" ;
    $user = "root" ;
    $pass = "" ;
    $debe = "db_toko" ;

    $koneksi = mysqli_connect($host,$user,$pass,$debe) ;

    if (!$koneksi){
        echo 'KONEKSI GAGAL' ;
    } else {
        // echo 'KONEKSI BERHASIL' ;
    }

    function query($sql){
        global $koneksi ;

        return mysqli_query($koneksi, $sql) ;
    }

    function total($sql){
        global $koneksi ;

        $res = query($sql) ;
        return mysqli_num_rows($res) ;
    }

    function start(){
        query("START TRANSACTION") ;
    }

    function commit(){
        query("COMMIT") ;
    }

    function rollback(){
        query("ROLLBACK") ;
    }

    function getFaktur(){
        $sql = "select * from transaksi order by trafaktur desc limit 1" ;
        $res = query($sql) ;
        $tot = total($sql);

        if ($tot == 0){
            $no = "TRA0001" ;
        } else {
            $row = mysqli_fetch_assoc($res);
            $res = substr($row['trafaktur'],3);

            $res += 1 ;
            $no = "TRA" ;
            for($i = 0 ; $i < 4 - strlen($res) ; $i++){
                $no  .= "0" ;
            }
            $no .= $res ;
        }

        return $no ;
    }

    function cek(){
        global $base_url ;

        if (empty($_SESSION['user'])) header("Location:{$base_url}pages/login.php");
    }

    function logout(){
        session_unset();
    }

?>
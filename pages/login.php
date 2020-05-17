<!-- 
    created by msaifa
    @ 2020
 -->
 <?php

    require '../conf/init.php' ;

    if (isset($_POST['simpan'])){
        $username = $_POST['username'] ;
        $userpass = $_POST['userpass'] ;

        if (empty($username) || empty($userpass)){
            $msg = 'Harap masukkan data dengan benar' ;
        } else {
            $sql = "SELECT * FROM user where username='$username' and userpass='$userpass'" ;
            
            if (total($sql) == 1){
                $res = query($sql);
                $_SESSION['user'] = mysqli_fetch_assoc($res);
                header("Location: {$base_url}");
            } else {
                $msg = 'Login Gagal. Pastikan Username dan password benar!' ;
            }
        }
    }

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Login - msaifa</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css?h=3c16114e461561544db42dd299b535e5">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.0/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.min.css">
    <link rel="stylesheet" href="../assets/css/styles.min.css?h=d41d8cd98f00b204e9800998ecf8427e">
</head>

<body class="bg-gradient-primary">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9 col-lg-12 col-xl-10">
                <div class="card shadow-lg o-hidden border-0 my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-flex">
                                <div class="flex-grow-1 bg-login-image" style="background-image: url(&quot;../assets/img/login.png?h=cbc3a40dae521ddee89bf6b026abde71&quot;);"></div>
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h4 class="text-dark mb-4">Selamat Datang!</h4>
                                        <?= $msg ? '<h6 class="text-dark mb-4">'.$msg.'</h6>' : ""?>
                                    </div>
                                    <form class="user" method="POST">
                                        <div class="form-group"><input class="form-control form-control-user" type="text" id="exampleInputEmail" placeholder="Username" name="username"></div>
                                        <div class="form-group"><input class="form-control form-control-user" type="password" id="exampleInputPassword" placeholder="Password" name="userpass"></div>
                                        <input class="btn btn-primary btn-block text-white btn-user" type="submit" name="simpan" />
                                        <hr>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
    <script src="../assets/js/script.min.js?h=b86d882c5039df370319ea6ca19e5689"></script>
</body>

</html>
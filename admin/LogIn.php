<?php
require_once("../inc/functions.inc.php");
$error = "";
session_start();
if(isset($_SESSION["logged_in"]) && $_SESSION["logged_in"] == true){
    header("Location: ../admin/Dashboard.php");
}
if (isset($_POST["username"]) && isset($_POST["password"])) {
    try {
        $stmt = executeRequete("SELECT * FROM membre WHERE nom_personnel = :username AND password = :password");
        $stmt->bindParam(":username", $_POST["username"]);
        $stmt->bindParam(":password", $_POST["password"]);
        $stmt->execute();

        if ($stmt->rowCount() == 1) {
            session_start();
            $array = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $_SESSION["logged_in"] = true;
            $_SESSION["userinfo"] = json_encode($array);
            $_SESSION["username"] = $_POST["username"];
            $_SESSION["currentPath"] = "../admin/Dashboard.php";
            header("Location: ../admin/Dashboard.php");
        } else {
            $error = "Invalid username or password.";
        }
    } catch (PDOException $e) {
        die("Error querying database: " . $e->getMessage());
    }
}
?>
<!doctype html>
<html lang="en">

<head>
  <title>ISTA Larache - Login</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="../inc/js/functions.inc.js"></script>
  
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  
    <style>
        .background{
            position: absolute;
            width: 100%;
            height: 100%;
            overflow:hidden;
            margin: 0;
            padding: 0;
            z-index: -1;
            top: 0;
            bottom: 0;
        }
        .background img{
            
            width: 100%;
            height: 100%;
            
            object-fit: cover;
            object-position: left;
            
        }
        .loginCol{
            min-width: 260px;
            max-width: 450px;
        }
        .LoginContainer{
            background-color:white;
            border-radius: 20px;
            min-width: 260px;
            max-width: 450px;
        }
        .LoginIcon{
            min-height: 140px;
            min-width: 140px;
            
        }
        .shadow-1{
            box-shadow: 10px 10px 9px rgba(0, 0, 0, 0.25);
        }
        .form-control {
            display: block;
            width: 100%;
            padding: .375rem .75rem;
            font-size: 1rem;
            font-weight: 400;
            line-height: 1.5;
            color: #212529;
            background-color: #0000001C;
            background-clip: padding-box;
            border: 0px solid #ced4da;
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            border-radius: 0;
            transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
        }
        .inputIcon{
            height: 50%;
            

        }
        #toasts {
        min-height: 0;
        position: fixed;
        right: 20px;
        top: 20px;
        width: 400px;
        }

        #toasts .toast {
        background: #d6d8d9;
        border-radius: 3px;
        box-shadow: 2px 2px 3px rgba(0, 0, 0, .1);
        color: rgba(255,255,255, 1);
        cursor: default;
        margin-bottom: 20px;
        opacity: 0;
        position: relative;
        padding: 20px;
        transform: translateY(15%);
        transition: opacity .5s ease-in-out, transform .5s ease-in-out;
        width: 100%;
        will-change: opacity, transform;
        z-index: 1100;
        } 

        #toasts .toast.success {
        background: #26d68a;
        }

        #toasts .toast.warning {
        background: #ffa533;
        }

        #toasts .toast.info {
        background: #2cbcff;
        }

        #toasts .toast.error {
        background: #f44336;
        }

        #toasts .toast.show {
        opacity: 1;
        transform: translateY(0);
        transition: opacity 1s ease-in-out, transform 1s ease-in-out;
        }

        #toasts .toast.hide {
        height: 0;
        margin: 0;
        opacity: 0;
        overflow: hidden;
        padding: 0 30px;
        transition: all .5s ease-in-out;
        }

        #toasts .toast .close {
        cursor: pointer;
        font-size: 24px;
        height: 16px;
        margin-top: -10px;
        position: absolute;
        right: 14px;
        top: 50%;
        width: 16px;
        }
        
.custom-toast {
  display: flex;
  align-items: center;
}

.custom-toast img {
  background-size: 50px 50px;
  height: 50px;
  width: 50px;
}

.custom-toast p {
  font-size: 14px;
  padding: 10px;
}
@media (max-width:720px) {
    .loginCol{
        width: 100% !important;
    }    
}
    </style>
</head>

<body>
        <div class="position-absolute" id="toasts">
                        <!-- <div class="toast align-items-center text-white bg-danger border-0" role="alert" aria-live="assertive" aria-atomic="true">
                            <div class="d-flex">
                                <div class="toast-body">
                                Hello, world! This is a toast message.
                                </div>
                                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                            </div>
                        </div>-->
                    </div> 
    <script>
        var msg = "<?php echo $error?>";
        console.log(msg);
        console.log(msg=="");
        if(msg != ""){

            showToast({
                type:"error",
                autoDismiss: true,
                message:msg
            });
        }
        
    </script>
  
  <main>
    <div class="background">
        <img src="/imgs/login_background.png">
    </div>
    <div class="container-fluid position-absolute top-50 start-50 translate-middle">
        <div class="row justify-content-center align-items-center">
            <div class="col-6"></div>
            <div class="col-6 loginCol">
                <div class="container-sm">
                    <div class="d-flex flex-column  ">
                        <div class="p-2">
                            <div class="container-md text-center">
                                <img src="/imgs/ofppt_icon.png" class="img-fluid LoginIcon" alt="">
                            </div>
                        </div>
                        <div class="p-2">
                            <div class="container-md p-5 text-center LoginContainer shadow-1">
                                <h3 class="fw-bolder">Bienvenue</h3>
                                <p class="form-text text-muted fw-semibold">
                                    Connectez-vous pour continuer
                                </p>
                                <form action="" method="post">
                                    <div class="row mt-5 mb-3">
                                        <div class="col-10 p-0">
                                            <!--<label for="username" class="form-label">Name</label>-->
                                            <input type="text"
                                                class="form-control" name="username" id="username" aria-describedby="helpId" placeholder="Enter Username">
                                            <!--<small id="helpId" class="form-text text-muted">Enter Username or email</small>-->
                                            
                                        </div>
                                        <div class="col-2 bg-primary position-relative">
                                            <img src="/imgs/login_accountIcon.png" class="img-fluid inputIcon position-absolute top-50 start-50 translate-middle" alt="">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-10 p-0">
                                            <!--<label for="password" class="form-label">Password</label>-->
                                            <input type="password"
                                            class="form-control" name="password" id="password" aria-describedby="helpId" placeholder="Enter Password">
                                            <!--<small id="helpId" class="form-text text-muted">Enter Password</small>-->
                                            
                                        </div>
                                        <div class="col-2 bg-primary position-relative">
                                            <img src="/imgs/login_passwordIcon.png" class="img-fluid inputIcon position-absolute top-50 start-50 translate-middle" alt="">
                                        </div>
                                    </div>
                                    <div class="container-sm mb-5">
                                        <a href="#">Mot de passe oublié ?</a>
                                    </div>
                                    <input name="S_LOGIN" id="S_LOGIN" class="btn btn-primary w-100" type="submit" value="CONNEXION">
                                    <input href="/home.php" class="btn btn-info text-black mt-4 w-100" style="background-color: aliceblue;" value="Page Principale" onclick="location.replace('/home.php')">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </main>
  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>
</body>

</html>
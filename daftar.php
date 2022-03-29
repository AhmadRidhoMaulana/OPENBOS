<?php
include_once "kon.php";
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />

		<!-- Bootstrap CSS -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
		<link rel="stylesheet" href="user.css" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.1/font/bootstrap-icons.css">
		<title>Daftar</title>
	</head>
    
	<body id="body">
        <form action="kon.php?proses_daftar" method="POST">
        <div class="row justify-content-evenly" >
            <div class="col-4 " id="username">
                <div class="container shadow-lg ">
                    <h4 class="text-center">Daftar</h4>
                    <form action="">
                        <div class="form-group mb-3">
                            <label for=""> <i class="bi bi-file-person-fill"></i>Username</label>
                            <input type="text" name="username" class="form-control" placeholder="username" />
                        </div>
                        <div class="form-group mb-3">
                            <label for=""> <i class="bi bi-shield-lock-fill text-lg-start"></i> Password</label>
                            <input type="password" name="pass" class="form-control " placeholder=" password" />
                        </div>
                        <div class="form-group mb-3">
                            <label for=""> <i class="bi bi-shield-lock-fill text-lg-start"></i> Masukkan Ulang Password </label>
                            <input type="password" name="pass2" class="form-control " placeholder=" kata ulang password" />
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Nama </label>
                            <input type="text" name="nama" class="form-control " placeholder="nama lengkap" />
                        </div>
                        <div class="mb-4 pb-md-1">
                            <button type="submit" class="btn btn-success" name="login">Register</button>
                            <button type="reset" class="btn btn-danger">reset</button>
                        </div>
                        <a href="user.php">Login</a>
                    
                    </form>
                </div>
            </div>
            <div class="col-8 " id="foto">
                <img src="img/Camping_on_Ranu_Kumbolo.jpg" class="rounded float-end" width="100%" alt="...">
            </div>
          </div>
        </div>
        </form>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	</body>
</html>

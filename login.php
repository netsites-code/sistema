<!DOCTYPE html>
<html lang="en">
<?php include_once("includes/head.php"); ?>
<body class="bg-gradient-primary">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-xl-10 col-lg-12 col-md-9">
        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Bem-Vindo!</h1>
                  </div>
                  <form class="user" method="POST">
                    <div class="form-group">
                      <input type="email" class="form-control form-control-user" name="email" aria-describedby="emailHelp" placeholder="Digite seu e-mail">
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" name="senha" placeholder="Digite sua senha">
                    </div>
                    <input type="submit" class="btn btn-primary btn-user btn-block" value="Entrar" name="entrar">
                  </form>
                  <hr>
                  <div class="text-center">
                    <a class="small" href="forgot-password">Esqueceu a senha?</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="js/sb-admin-2.min.js"></script>
</body>
</html>

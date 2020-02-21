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
              <div class="col-lg-6 d-none d-lg-block bg-password-image"></div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-2">Esqueceu sua senha?</h1>
                    <p class="mb-4">Entendemos, as coisas acontecem. Basta digitar seu endereço de e-mail abaixo e enviaremos um link para redefinir sua senha!</p>
                  </div>
                  <form class="user">
                    <div class="form-group">
                      <input type="email" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Digite seu e-mail">
                    </div>
                    <a href="/login" class="btn btn-primary btn-user btn-block">
                      Enviar link para redefinição
                    </a>
                  </form>
                  <hr>
                  <div class="text-center">
                    <a class="small" href="login">Sabe sua senha? Entrar</a>
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
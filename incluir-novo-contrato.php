<!DOCTYPE html>
<html lang="en">
<?php include_once("includes/head.php"); ?>
<body id="page-top">
  <div id="wrapper">
    <?php include_once("includes/sidebar.php"); ?>
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        <?php include_once("includes/topbar.php"); ?>
        <div class="container-fluid">
        	<div class="d-sm-flex align-items-center justify-content-between mb-4">
            	<h1 class="h3 mb-0 text-gray-800">Incluir novo contrato</h1>
        	</div>
        	<div class="row">
            	<div class="col-lg-6">
              		<div class="card shadow mb-4">
                		<div class="card-body">
                			<form class="user" method="POST" enctype="multipart/form-data">
				              	<div class="form-group row">
				              		<div class="col-sm-6 mb-3 mb-sm-0">
					                	<select class="form-control form-control-user select" name="tipo" required>
					                		<option value>Selecione o tipo de contrato</option>
					                		<option value="1">Rural</option>
					                		<option value="2">Venda</option>
					                		<option value="3">Locação</option>
					                		<option value="4">Arrendamento</option>
					                	</select>
					                </div>
					                <div class="col-sm-6">
				                    	<input type="file" class="form-control form-control-user select" name="file" required>
				                  	</div>
				              	</div>
				              	<input type="submit" class="btn btn-primary btn-user btn-block" value="Cadastrar contrato" name="cadastrar-contrato">
				            </form>
				        </div>
              		</div>
            	</div>
          	</div>
        </div>
      </div>
      <?php include_once("includes/footer.php"); ?>
    </div>
  </div>
  <?php include_once("includes/end.php"); ?>
</body>
</html>
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
            	<h1 class="h3 mb-0 text-gray-800">Incluir novo imóvel</h1>
        	</div>
        	<div class="row">
            	<div class="col-lg-12">
              		<div class="card shadow mb-4">
                		<div class="card-body">
                			<form class="user" method="POST" enctype="multipart/form-data">
                				<div class="form-group row">
				                  	<div class="col-sm-6 mb-3 mb-sm-0">
				                    	<select class="form-control form-control-user select" name="tipo" required>
					                		<option value>Selecione o tipo do imóvel</option>
					                		<option value="1">Locação</option>
											<option value="2">Venda</option>
											<option value="3">Rurais</option>
					                	</select>
				                  	</div>
				                  	<div class="col-sm-6">
				                    	<select class="form-control form-control-user select" name="tipodepropriedade" required>
					                		<option value>Selecione o tipo de propriedade</option>
					                		<option value="1">Comercial - Área Comercial</option>
											<option value="2">Comercial - Barracão</option>
											<option value="3">Comercial - Empresa</option>
											<option value="4">Comercial - Prédio</option>
											<option value="5">Comercial - Sala</option>
											<option value="6">Comercial - Terreno</option>
											<option value="7">Industrial - Área Industrial</option>
											<option value="8">Industrial - Barracão</option>
											<option value="9">Industrial - Prédio</option>
											<option value="10">Industrial - Terreno</option>
											<option value="11">Residencial - Apartamento</option>
											<option value="12">Residencial - Apartamento Duplex</option>
											<option value="13">Residencial - Área Residencial</option>
											<option value="14">Residencial - Casa</option>
											<option value="15">Residencial - Prédio</option>
											<option value="16">Residencial - Quitinete</option>
											<option value="17">Residencial - Sobrado</option>
											<option value="18">Residencial - Terreno</option>
											<option value="19">Fazendas</option>
											<option value="20">Rural - Área Preservação Permanente</option>
											<option value="21">Rural - Área Rural</option>
											<option value="22">Rural - Chácara</option>
											<option value="23">Rural - Granja</option>
											<option value="24">Rural - Sítio</option>
					                	</select>
				                  	</div>
				                </div>
				                <div class="form-group row">
				                  	<div class="col-sm-4 mb-3 mb-sm-0">
				                    	<select class="form-control form-control-user select" name="pais" required>
					                		<option value>Selecione o país</option>
					                		<option value="1">Brasil</option>
					                	</select>
				                  	</div>
				                  	<div class="col-sm-4 mb-3 mb-sm-0">
				                    	<select class="form-control form-control-user select" name="estado" required>
					                		<option value>Selecione o estado</option>
					                		<option value="1">Paraná</option>
					                	</select>
				                  	</div>
				                  	<div class="col-sm-4">
				                    	<select class="form-control form-control-user select" name="municipio" required>
					                		<option value>Selecione o município</option>
					                		<option value="1">Marechal Cândido Rondon</option>
					                	</select>
				                  	</div>
				                </div>
				              	<div class="form-group">
				                	<input type="text" class="form-control form-control-user" placeholder="Endereço" name="endereco" required>
				              	</div>
				              	<div class="form-group">
				                	<input type="text" class="form-control form-control-user" placeholder="Preço" name="preco" required>
				              	</div>
				              	<div class="form-group">
				                	<input type="text" class="form-control form-control-user" placeholder="Título do imóvel" name="titulodoimovel" required>
				              	</div>
				              	<div class="form-group">
				                	<textarea class="form-control form-control-user" placeholder="Descrição" name="descricao" required></textarea>
				              	</div>
				              	<div class="form-group row">
				              		<div class="col-sm-3 mb-3 mb-sm-0">
					                	<select class="form-control form-control-user select" name="numerodedormitorios" required>
					                		<option value>Selecione o número de dormitórios</option>
					                		<option value="1">1</option>
											<option value="2">2</option>
											<option value="3">3</option>
											<option value="4">4</option>
											<option value="5">5</option>
											<option value="6">6</option>
											<option value="7">7</option>
											<option value="8">8</option>
					                	</select>
					                </div>
					                <div class="col-sm-3 mb-3 mb-sm-0">
					                	<select class="form-control form-control-user select" name="numerodeandar">
					                		<option value>Selecione o número de andar</option>
					                		<option value="1">1</option>
											<option value="2">2</option>
											<option value="3">3</option>
											<option value="4">4</option>
											<option value="5">5</option>
											<option value="6">6</option>
											<option value="7">7</option>
											<option value="8">8</option>
											<option value="9">9</option>
											<option value="10">10</option>
											<option value="11">11</option>
											<option value="12">12</option>
											<option value="13">13</option>
											<option value="14">14</option>
											<option value="15">15</option>
											<option value="16">16</option>
											<option value="17">17</option>
											<option value="18">18</option>
											<option value="19">19</option>
											<option value="20">20</option>
											<option value="21">21</option>
											<option value="22">22</option>
											<option value="23">23</option>
											<option value="24">24</option>
											<option value="25">25</option>
											<option value="26">26</option>
											<option value="27">27</option>
											<option value="28">28</option>
											<option value="29">29</option>
											<option value="30">30</option>
					                	</select>
					                </div>
					                <div class="col-sm-3 mb-3 mb-sm-0">
					                	<input type="text" class="form-control form-control-user" placeholder="Área Construída" name="areaconstruida" required>
					                </div>
					                <div class="col-sm-3">
					                	<select class="form-control form-control-user select" name="visaopara" required>
					                		<option value>Visão para</option>
					                		<option value="1">Visão da rua</option>
											<option value="2">Vista do pátio</option>
											<option value="3">Vista do mar</option>
											<option value="4">Vista do lago</option>
					                	</select>
					                </div>
				              	</div>
				              	<div class="form-group">
				                	<input type="text" class="form-control form-control-user" placeholder="O que está próximo?" name="oqueestaproximo" required>
				              	</div>
				              	<div class="form-group">
				                	<input type="text" class="form-control form-control-user" placeholder="Área terreno/total" name="areaterrenototal" required>
				              	</div>
				              	<div class="form-group">
				                	<input type="file" class="form-control form-control-user select" name="fotodoimovel" required>
				              	</div>
				              	<input type="submit" name="cadastrar-imovel" class="btn btn-primary btn-user btn-block" value="Cadastrar imóvel">
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
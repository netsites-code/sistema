<?php
  if(isset($_GET['searchiddoimovel'])) {
    $iddoimovel = $_GET['iddoimovel'];
    $omsselect = "SELECT * from avaliacaoepericia WHERE iddoimovel=$iddoimovel";
    try {
      $omsresult = $bdd->prepare($omsselect);
      $omsresult->execute();
      $omscontar = $omsresult->rowCount();
      if($omscontar>0) {
        while($omsmost = $omsresult->FETCH(PDO::FETCH_OBJ)) {
          $omsid = $omsmost->id;
          $omsavaliacao = $omsmost->avaliacao;
          $omspericia = $omsmost->pericia;
  ?>
          <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
              <form method="POST"><label class="btn-trash" for="avaliacaoepericia"><i class="fas fa-times"></i></label><input type="submit" id="avaliacaoepericia" name="avaliacaoepericia<?php echo $omsid; ?>" hidden></form>
              <a href="<?php echo $omsavaliacao; ?>" target="_Blank">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Avaliação</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">Arquivo</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-file-signature fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </a>
            </div>
          </div>
          <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
              <form method="POST"><label class="btn-trash" for="avaliacaoepericia"><i class="fas fa-times"></i></label><input type="submit" id="avaliacaoepericia" name="avaliacaoepericia<?php echo $omsid; ?>" hidden></form>
              <a href="<?php echo $omspericia; ?>" target="_Blank">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Perícia</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">Arquivo</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-file-signature fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </a>
            </div>
          </div>
  <?php
          if(isset($_POST['avaliacaoepericia'.$omsid])) {
            unlink($omsfile);
            $vercodeeas = $bdd->prepare('DELETE FROM avaliacaoepericia WHERE id=:id');
            $vercodeeas->bindParam(':id', $omsid);
            $vercodeeas->execute();
            header("Refresh: 0");
          }
        }
      }
      else {
        echo '<div class="ml-md-3">Nada encontrado..</div>';
      }
    }
    catch(PDOException $e) {
      echo $e;
    }
  }
  else {
      echo '<div class="ml-md-3">Nada encontrado..</div>';
  }
?>
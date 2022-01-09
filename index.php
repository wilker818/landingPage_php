<?php
require './bdconnect.php';
$sql_busca = "SELECT * FROM arquivo";
$mostrar = mysqli_query($conn, $sql_busca);
$qtd_arquivos = mysqli_num_rows($mostrar);
$msg_sem = ($qtd_arquivos <= 0) ? "NÃO HÁ ARQUIVOS NO SISTEMA!" : "";
?>
<!DOCTYPE html>
<html>

<head lang="pt-br">
  <title>TESTE PROGRAMADOR</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="css/reset.css">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" type="text/css" href="font-awesome/css/all.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />
</head>

<body>
  <?php include 'header.php'; ?>
  <div class="container">
    <div class="float">
      <div class="center pz">
        <div class="line pz"></div>
        <p><?= $msg_sem ?></p>
        <div class="center">
          <ul class="content-product">
            <?php
            while ($dados = mysqli_fetch_array($mostrar)) {
              $arquivo = $dados['arquivo'];
            ?>
              <li>
                <div class="content">
                  <span class="align_item-image">
                    <a href="#<?php echo $dados["id"]; ?>" rel="modal:open"><img class="item-image" src="upload/<?= $arquivo ?>" /></a>
                  </span>
                  <div class="desc" style="margin-top:10px;">
                    <h2 class="title">
                      <span>
                        Nome do Álbum Lorem Ipsum Dolor Amed
                      </span>
                    </h2>
                    <div class="line"></div>
                    <div class="social-media">
                      <div>
                        <span class="twitter">Twettar</span>
                        <div id="pointer"></div>&nbsp;&nbsp;<span class="box">59</span>
                      </div>
                      <div>
                        <span class="facebook"><i class="far fa-thumbs-up"></i>&nbsp;Curtir</span>
                        <div id="pointer2"></div>&nbsp;&nbsp;<span class="box2">12</span>
                      </div>
                    </div>
                    <div class="clear"></div>
                  </div>
                </div>
              </li>
              <!-- Modal -->
              <div id="<?php echo $dados["id"]; ?>" class="modal">
                <img src="upload/<?= $arquivo ?>" alt="Image Modal">
                <div class="line"></div>
                <span class="size16 upper"><b>Descrição:</b></span><br /><br />
                <p class="size14"><?php echo $dados["descricao"]; ?></p>
              </div>
            <?php } ?>
          </ul>
        </div>
        <div class="line"></div>
      </div>
    </div>
  </div>
  <?php include 'footer.php'; ?>
  <!-- include jQuery -->
  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
  <!-- jQuery Modal -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
  <!-- font-awesome -->
  <script defer src="font-awesome/js/all.js"></script>
  <script type="text/javascript">
    jQuery(document).ready(function($) {
      var uls = $('#menu ul');
      uls.hide();

      $('#menu > li').click(function(e) {
        e.stopPropagation();
        uls.hide();
        $(this).find('ul').show();
      });
      $('#menu ul').click(function(e) {
        e.stopPropagation();
      });
      $('body').click(function() {
        uls.hide();
      });
    });
  </script>
</body>

</html>
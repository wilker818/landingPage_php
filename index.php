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
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/reset.css" type="text/css">
  <link rel="stylesheet" href="css/style.css" type="text/css">
  <link rel="stylesheet" type="text/css" href="font-awesome/css/all.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />
</head>

<body>
  <div class="container">
    <div class="float">
      <div class="center">
        <div class="cabecalho">
          <div class="logo">
            <img src="img/LOGO.png" />
          </div>
          <div class="info">
            <div class="contact">
              <a><i class="fas fa-phone-alt"></i>&nbsp;<small>(16)</small> 99347-5070</a>
            </div>
            <div class="pages">
              <div><a>Página 1</a></div>
              <div><a>Página 2</a></div>
              <div><a>Página 3</a></div>
              <div><a>Página 4</a></div>
              <div><a>Página 5</a></div>
              <div><a>Página 6</a></div>
              <div><a href="./upload_image.php">ENVIAR ARQUIVO</a></div>
            </div>
          </div>
        </div>
        <div class="line"></div>
        <p><?= $msg_sem ?></p>
        <ul id="content-product">
          <?php
          while ($dados = mysqli_fetch_array($mostrar)) {
            $arquivo = $dados['arquivo'];
          ?>
            <li>
              <div class="content">
                <span class="align_item-image">
                  <a href="#<?php echo $dados["id"]; ?>" rel="modal:open"><img class="item-image" src="upload/<?= $arquivo ?>" widht="230" height="150px" /></a>
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
        <div class="line"></div>
        <div class="footer">
          <div class="center shadow-footer">
            <div class="c-footer">
              <div class="about">
                <div>
                  <img src="img/man-photograph.png" alt="foto" style="max-width: none;">
                </div>
                <div class="text_footer">
                  <p style="font-weight: 700; font-size: 20px;">Pessoa ou Empresa</p><br>
                  <span>
                    <p>Lorem ipsum dolor sit amet, lorem consectetur elit. Aliquam id mi ipsum sed ligula sollicitudin fermentum dolor. </p><br>
                    <p>Aliquam suscipit, massa quis posuere consecttur, enim libero tempor enim, ultriies est turpis nec risus. Nam in libero nulla, eu adipiscing nibh. In vitae massa vitae suscipit scelerisque lorem psum amed. </p>
                  </span>
                </div>
              </div>
              <div class="pd10"></div>
              <div class="social-media__footer">
                <ul>
                  <li>
                    <span>Acesse Também:</span>
                  </li>
                  <li>
                    <i class="fab fa-facebook-square size26"></i><a>&nbsp;&nbsp;www.fb.com/loremipsum</a>
                  </li>
                  <li>
                    <i class="fab fa-twitter-square size26"></i><a>&nbsp;&nbsp;www.twitter.com/loremipsum</a>
                  </li>
                  <li>
                    <i class="fab fa-flickr size26"></i><a>&nbsp;&nbsp;www.flickr.com/loremipsum</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <div class="copyright">
            <div>Todos os direitos reservados - © 2022 </div>
            <div>
              <span>Linha Fast</span>
              <span> | </span>
              <span><strong>RGB</strong><small>comunicação.com.br</small></span>
            </div>
          </div>
          <div class="pd10"></div>
        </div>
      </div>
    </div>
  </div>
</body>
<!-- include jQuery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
<!-- jQuery Modal -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
<!-- font-awesome -->
<script defer src="font-awesome/js/all.js"></script>

</html>
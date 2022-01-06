<?php
require './bdconnect.php';
$msg = false;
if (isset($_POST['descricao'])) {
	$descricao = addslashes($_POST['descricao']);
	if (isset($_FILES['arquivo'])) {
		$descricao;
		$arquivo = $_FILES['arquivo']['name'];

		$extensao = strtolower(pathinfo($arquivo, PATHINFO_EXTENSION));

		$novo_nome = md5(time()) . "." . $extensao;

		$diretorio = "upload/";

		move_uploaded_file($_FILES['arquivo']['tmp_name'], $diretorio . $novo_nome);

		$sql_code = "INSERT INTO arquivo(id, arquivo, data, descricao) VALUES('','$novo_nome', NOW(), '$descricao')";

		if (mysqli_query($conn, $sql_code))
			$msg = "Arquivo enviado com sucesso!";
		else
			$msg = "Falha ao enviar arquivo!";
	}
}
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
	<!-- Inclusão do jQuery-->
	<script src="http://code.jquery.com/jquery-1.11.1.js"></script>
	<!-- Inclusão do Plugin jQuery Validation-->
	<script src="http://jqueryvalidation.org/files/dist/jquery.validate.js"></script>
</head>

<body>
	<div class="container">
		<div class="center">
			<div class="formulario-box">
				<?php
				if (isset($msg) && $msg != false) {
					echo "<br><p class='size16'><strong>$msg</strong></p>";
				}
				?><br><br>
				<form id="form" action="upload_image.php" method="post" enctype="multipart/form-data" style="border: 1px solid; padding: 29px;">
					<label>Selecione o arquivo:</label><br>
					<input type="file" class="arquivo" name="arquivo" id="arquivo" required /><br><br>
					<label>Escreva o texto:</label><br>
					<textarea type="text" name="descricao" id="descricao" rows="5" cols="42" maxlength="250" required placeholder=" Escreva aqui..." style="padding: 5px;"></textarea><br><br>
					<input type="submit" value="Enviar" class="submit" style="padding: 5px 20px;" />
				</form>
			</div>
		</div>
	</div>
	<!-- VALIDATE -->
	<script type="text/javascript">
		$.validator.setDefaults({
			submitHandler: function() {
				alert("submitted!");
			}
		});
		$('#form').validate();
		$('#arquivo').rules('add', {
			accept: "image/jpeg, image/pjpeg",
			messages: {
				accept: "Formato inválido."
			}
		});
	</script>
</body>
<!-- include jQuery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
<!-- jQuery Modal -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
<!-- font-awesome -->
<script defer src="font-awesome/js/all.js"></script>

</html>
<?
# Inicia uma Sessao PHP
@session_start();
?>
<html>
<head>
<title>Galeria</title>
<!– O arquivo lightbox.css faz parte da biblioteca e
é necessária sua inclusão–>
<link rel=”stylesheet” href=”css/lightbox.css” type=”text/css” media=”screen” />
<link rel=”stylesheet“ href=”css/galeria.css” type=”text/css” media=”screen” />
<!– incluindo os arquivos da biblioteca LightBox–>
<script type=”text/javascript” src=”js/prototype.js“></script>
<script type=”text/javascript” src=”js/scriptaculous.js?load=effects“></script>
<script type=”text/javascript” src=”js/lightbox.js“></script>
</head>
<body>
<p>&nbsp;</p>
<p><a href=”enviar.php”>Enviar fotos para Galeria</a></p>
<p>&nbsp;</p>
<hr>
<!– Incluindo o programa que le o diretorio de fotos –>
<? include ‘lerdir.php’; ?>
</body>
</html>
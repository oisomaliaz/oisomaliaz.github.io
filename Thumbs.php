<?php
# Inclui a classe thumbnail
include_once(‘thumbnail.inc.php‘);
# Cria nova thumb da imagem recebida por get
$thumb = new Thumbnail($_GET[‘img’]);
# Seta as dimensoes da thumb altura e largura
$thumb->resize(120,120);
# Exibe/retorna  a imagem em miniatura
$thumb->show();
exit;
?>
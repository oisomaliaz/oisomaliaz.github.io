<!–  incluindo Login de usuario –>
<? include ‘login.php’; ?>
<html>
<head>
<title>Galeria</title>
<link rel=”stylesheet”  href=”css/galeria.css”  type=”text/css”  media=”screen” />
</head>
<body>
<?
# 1 Se a Sessao Logado nao existir exibe o formulario de login
if(!isset($_SESSION[‘logado’]))
{
?>
<form name=”login” method=”post”>
<label>Password:</label>
<input type=”password”  name=”senha“>
<input type=”submit”  value=”login“>
</form>
<p>&nbsp;</p>
<p><a href=”index.php”>Visitar Galeria</a></p>
<?
exit;
# 2 Se a sessao existir exibe o formulario de upload
}else{
?>
<p>
<a href=”index.php“>Visitar Galeria</a> |
<a href=”enviar.php?logout=true“>Logout</a>
</p>
<hr>
<p>&nbsp;</p>
<form action=””  method=”post”  enctype=”multipart/form-data“>
<input type=”file”  name=”fotos[]” /><Br>
<input type=”file”  name=”fotos[]” /><br>
<input type=”file”  name=”fotos[]” /><br>
<input type=”file”  name=”fotos[]” /><br><br>
<input type=”submit”  value=”enviar” />
</form>
<p>&nbsp;</p>
<!– 3 Incluindo o programa que faz o upload das imagens –>
<? include ‘upload.php‘; ?>
<p>&nbsp;</p>
<? }?>
</body>
</html>
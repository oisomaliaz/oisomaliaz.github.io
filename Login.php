<?
@session_start();
# Simulando Login de usuario
$senha = “1234”;
if(isset($_POST[‘senha‘]) && $_POST[‘senha‘] == “$senha”)
{
# Cria uma sessao se a senha estiver correta
$_SESSION[‘logado‘] = true;
}
# Verifica se logout foi solicitato
if(isset($_GET[‘logout‘]) && $_GET[‘logout‘] == “true”)
{
# Destroi a sessao
@ session_destroy();
}
?>
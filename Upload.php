<?php
# Setando as configurações permitidas
$larguraMax = 2000; // largura em pixels
$alturaMax = 2000; // altura em pixels
$tamanhoMax = 1500000; // tamanho em bytes
$formatos = “pjpeg|jpeg|png|gif|bmp|x-png|jpg”; // extensoes permitidas
# Criando as mensagens de erro
$erro[] = “Tamanho do arquivo maior que o permitido [“.($tamanhoMax/1000).” kb].”;
$erro[] = “A Largura da imagem maior que o permitido.”;
$erro[] = “A Altura da imagem maior que o permitido.”;
$erro[] = “O Arquivo já existe no diretório.”;
$erro[] = “Formato do arquivo não permitido ou inválido.”;
if(isset($_FILES[“fotos”]))
{
foreach ($_FILES[“fotos”][“name”] as $key => $name)
{
$arquivo = $_FILES[“fotos”];
$dimensoes = getimagesize($arquivo[“tmp_name”][$key]);
$nomefoto = strtolower($_FILES[“fotos”][“name”][$key]);
#Verificando se a imagem foi enviada
if($arquivo[“name”][$key] != “”)
{
# Retirando espacos no nome do arquivo
$espacos = explode(” “,$nomefoto);
if(count($espacos) > 1)
{
$nomefoto = strtolower(ereg_replace(‘ ‘, ‘_’, $nomefoto));
}
# Se o Tamanho do arquivo é permitido
if($arquivo[“size”][$key] > $tamanhoMax)
{
# Adiciona o erro no array erros[]
$erros[] = “[$nomefoto] $erro[0]”;
}
# Se a Largura do arquivo é permitida
if($dimensoes[0] > $larguraMax)
{
$erros[] = “[$nomefoto] $erro[1]“;
}
# Se a Altura do arquivo é permitida
if($dimensoes[1] > $alturaMax)
{
$erros[] = “[$nomefoto] $erro[2]”;
}
# Verifica se o arquivo ja existe no diretorio
if(file_exists(“fotos/$nomefoto“))
{
$erros[] = “[$nomefoto] $erro[3]”;
}
# Verifica se extensao é pertida
if(!eregi(“^image/($formatos)$”, $arquivo[“type”][$key]))
{
$erros[] = “[$nomefoto] $erro[4]”.$arquivo[“type”][$key];
}
# O array erros nao tiver nenhum indice o upload é permitido/realizado
if(!isset($erros))
{
$imagem_dir = “fotos/”.$nomefoto;
move_uploaded_file($_FILES[“fotos”][“tmp_name”][$key], $imagem_dir);
$sucesso[] = “[$nomefoto] upload com sucesso.”;
}
}
}
# Verifica se existem erros  no array
if(isset($erros))
{
echo “<ul class=’erro’>”;
foreach($erros as $erro)
{
echo “<p><span>$erro</span></p>”;
}
echo “</ul>”;
}
# Verifica quais imagens tiveram sucesso no upload
if(isset($sucesso))
{
echo “<ul class=’sucesso’>”;
foreach($sucesso as $up)
{
echo “<p><span>$up</span></p>”;
}
echo “</ul>”;
}
}
?>
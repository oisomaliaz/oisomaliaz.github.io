<?
# 1 Diretorio que guardara as fotos
$dir = “fotos”;
# Extensoes permitidas na  exibicao da galeria
$exts = array(‘jpg‘,’png‘,’jpeg‘,’gif’,’bmp‘);
if (is_dir($dir)) {
if ($d = opendir($dir))
{
while (($file = readdir($d)) !== false)
{
if (filetype($dir.’/’.$file) == ‘file’)
{
# Recupera a extensao do arquivo
$extensao = explode(“.”, $file);
for($i=0; $i<=count($exts)-1; $i++)
{
# Verifica se a extensa é permita (esta no array exts)
if($extensao[1] == $exts[$i])
{
# Criando o link da imagem pra o lightbox e exibindo a thumb
echo “<a href=”$dir/{$file}” rel=”lightbox[roadtrip]”>“;
echo “<img src=”thumb.php?img=$dir/{$file}” class=”thumb”></a>“;
}
} # end for
} # filetype
} # while
closedir($d); // encerra a leitura do diretorio
} # end opendir
}
?>
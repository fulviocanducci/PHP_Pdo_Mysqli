<?php 

//phpinfo();

//$dbh = new PDO('pgsql:host=localhost;port=5432;dbname=dbo', 'postgres', 'senha');

//var_dump($dbh->query('select * from "order"')->fetchAll());

function esquerda($str, $length) 
{
	$length++;
    return substr($str, (strlen($str) - $length), $length - 1);
}

$xml = '<a>
	<loc>https://www.site.com.br/aluno/jose/11111111111111/</loc>
	<loc>https://www.site.com.br/aluno/jose/22222222222222/</loc>
	<loc>https://www.site.com.br/aluno/jose/33333333333333/</loc>
	</a>';

$simpleXml = simplexml_load_string($xml);

foreach($simpleXml->loc as $loc) 
{
	echo esquerda($loc, 14);
	echo '<br />';
}
#!/usr/bin/php
<?php
function y($m) {
	$m = preg_replace("/\./", " x ", $m);
	$m = preg_replace("/@/", " y", $m);
	return $m;
}

function x($y, $z) {
	$a = file_get_contents($y);
	$a = preg_replace("/(\[x (.*)\])/e", "y(\"\\2\")", $a);
	$a = preg_replace("/\[/", "(", $a);
	$a = preg_replace("/\]/", ")", $a);
	return $a;
}
$r = x($argv[1], $argv[2]);
print $r;
/*
Ligne 3-7 : La fonction y($m) est définie. Elle prend un paramètre $m qui est une chaîne de caractères. À l'intérieur de la fonction, deux appels à la fonction preg_replace sont effectués. Le premier appel remplace tous les points (.) par la chaîne de caractères " x ", et le deuxième appel remplace tous les caractères "@" par le caractère "y". Ensuite, la fonction retourne la valeur de $m modifiée.

Ligne 9-15 : La fonction x($y, $z) est définie. Elle prend deux paramètres, $y et $z. À l'intérieur de la fonction, le contenu du fichier spécifié par $y est lu à l'aide de la fonction file_get_contents et stocké dans la variable $a. Ensuite, plusieurs appels à la fonction preg_replace sont effectués pour modifier le contenu de $a. Le premier appel utilise une expression régulière pour rechercher des occurrences de "[x quelque_chose]" et les remplace par le résultat de l'appel à la fonction y("quelque_chose"). Les autres appels à preg_replace remplacent simplement les crochets "[" et "]" par des parenthèses "(" et ")". Enfin, la fonction retourne la valeur modifiée de $a.
*/
?>


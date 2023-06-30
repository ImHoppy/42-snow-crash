# Level 12

Home structure
```
$ ls -l
total 4
-rwsr-sr-x+ 1 flag12 level12 464 Mar  5  2016 level12.pl
```

Comme le script dans level 04, le script récupère les paramètres `x` et `y` d'une requête HTTP, exécute la commande système `egrep` pour rechercher dans le fichier `/tmp/xd` en utilisant la valeur de `x` en ayant mis toutes les lettres en majuscules avant, puis affiche des points en fonction des résultats de la recherche et de la valeur de `y`. Le nombre de points affichés dépend de la correspondance trouvée et de la valeur de `y`.


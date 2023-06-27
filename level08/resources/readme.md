# Level 08

Structure du home
```sh
$ ls -la
total 28
dr-xr-x---+ 1 level08 level08  140 Mar  5  2016 .
d--x--x--x  1 root    users    340 Aug 30  2015 ..
-r-x------  1 level08 level08  220 Apr  3  2012 .bash_logout
-r-x------  1 level08 level08 3518 Aug 30  2015 .bashrc
-rwsr-s---+ 1 flag08  level08 8617 Mar  5  2016 level08
-r-x------  1 level08 level08  675 Apr  3  2012 .profile
-rw-------  1 flag08  flag08    26 Mar  5  2016 token
```
On peut apercevoir un exécutable. Si on l'exécute il nous écrit des instructions d'utilisation pour lire un fichier, si on lui donne `token`, un message d'erreur apparaît.
```
$ ./level08
./level08 [file to read]
$ ./level08 token
You may not access 'token'
$ echo 'hi' > /tmp/toto
$ $ ./level08 /tmp/toto
hi
```
Avec `toto` le fichier se fait bien lire. Une sécurité serait en place pour le fichier `token` ?
```
$ strings ./level08
...
printf
strstr
read
open
...
%s [file to read]
token
You may not access '%s'
Unable to open %s
Unable to read fd %d
...
```
On voit bien la fonction `strstr` qui permet de trouver une chaine de caractère dans une autre.

Et si tous simplement on renomme le fichier `token` . Mais on n'a pas la permission dans le dossier pour écrire alors qu'il est à notre nom. Alors on modifie la permission.
```
$ mv token pass
mv: cannot move `token' to `pass': Permission denied
$ chmod 755 .
$ mv token pass
$ ./level08 pass
quif5eloekouj29ke0vouxean
```
> ⚠ Le token n'est pas le mot de pass de `level09` mais celui de `flag08`.
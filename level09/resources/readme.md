# Level 09

Structure :
```
$ ls -la
total 24
dr-x------ 1 level09 level09  140 Mar  5  2016 .
d--x--x--x 1 root    users    340 Aug 30  2015 ..
-r-x------ 1 level09 level09  220 Apr  3  2012 .bash_logout
-r-x------ 1 level09 level09 3518 Aug 30  2015 .bashrc
-rwsr-sr-x 1 flag09  level09 7640 Mar  5  2016 level09
-r-x------ 1 level09 level09  675 Apr  3  2012 .profile
----r--r-- 1 flag09  level09   26 Mar  5  2016 token
```
On voit qu'on a la permission de lire le fichier `token`.

```
$ cat token
f4kmm6p|=�p�n��DB�Du{��
```
Ça ne ressemble pas à un token valide. Peut être qu'on peut avoir plus d'info avec l'exécutable level09 ?

```
$ ./level09
You need to provied only one arg.
$ ./level09 aaaaaaaa
abcdefgh
```
On a bien l'impression que notre argument se fait incrementer par rapport à sa position dans le string ?

Et si on faisait l'inverse, voici un petit exécutable en c pour soustraire par son index.
```
$ chmod +w .
$ gcc -xc -std=c99 - <<< 'main(int c, char **av){for (int i=0; av[1][i]; i++){printf("%c", av[1][i]-i);}}'
$ ./a.out abcdef
aaaaaa
$ ./a.out $(cat token); echo
f3iji1ju5yuevaus41q1afiuq
```
On recupère donc le mot de passe de l'user `flag09`.
```
$ su flag09
$ getflag
s5cAJpM8ev6XHw998pRWG728z
```

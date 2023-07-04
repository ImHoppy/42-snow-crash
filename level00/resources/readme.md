# Level 00

```
$ find / -user flag00 2> /dev/null
/usr/sbin/john
/rofs/usr/sbin/john
$ cat /usr/sbin/john
cdiiddwpgswtgt
```
Mais ce code ne correspondait pas au password de `flag00`.

Mais on a pu decouvrir que ce code était un code de [César](https://www.dcode.fr/chiffre-cesar), et ce qui nous donne `nottoohardhere` pour l'user `flag00`
````
$ su flag00
Password: nottoohardhere
$ getflag
Check flag.Here is your token : x24ti5gi3x0ol2eh4esiuxias
````

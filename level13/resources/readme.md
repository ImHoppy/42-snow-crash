# Level 13

Home structure
```
$ ls -l
total 8
-rwsr-sr-x 1 flag13 level13 7303 Aug 30  2015 level13
```
Quand on execute level13, il nous dit qu'on peut le lancer seulement avec l'utilisateur avec UID 4242.

On a deux posibilité de le bypass, créer un utilisateur et lui definir l'UID 4242. Ou alors modifier l'assembly et et la condition.

On va faire la plus compliqué, vu que sur mon ordinateur je n'ai pas les droits de crée un utilisateur.

En regardant l'assembly du program, on voit des appel à `getuid` et directement après une comparaison avec la valeur `0x1092` qui est `4242` en decimal.
```
$ objdump -d level13

level13:     file format elf32-i386


Disassembly of section .init:
...
0804858c <main>:
 804858c:	55                   	push   %ebp
 804858d:	89 e5                	mov    %esp,%ebp
 804858f:	83 e4 f0             	and    $0xfffffff0,%esp
 8048592:	83 ec 10             	sub    $0x10,%esp
 8048595:	e8 e6 fd ff ff       	call   8048380 <getuid@plt>
 804859a:	3d 92 10 00 00       	cmp    $0x1092,%eax
 804859f:	74 2a                	je     80485cb <main+0x3f>
 80485a1:	e8 da fd ff ff       	call   8048380 <getuid@plt>
 80485a6:	ba c8 86 04 08       	mov    $0x80486c8,%edx
 80485ab:	c7 44 24 08 92 10 00 	movl   $0x1092,0x8(%esp)
 80485b2:	00
 80485b3:	89 44 24 04          	mov    %eax,0x4(%esp)
 80485b7:	89 14 24             	mov    %edx,(%esp)
 80485ba:	e8 a1 fd ff ff       	call   8048360 <printf@plt>
 80485bf:	c7 04 24 01 00 00 00 	movl   $0x1,(%esp)
 80485c6:	e8 d5 fd ff ff       	call   80483a0 <exit@plt>
 80485cb:	c7 04 24 ef 86 04 08 	movl   $0x80486ef,(%esp)
 80485d2:	e8 9d fe ff ff       	call   8048474 <ft_des>
 80485d7:	ba 09 87 04 08       	mov    $0x8048709,%edx
 80485dc:	89 44 24 04          	mov    %eax,0x4(%esp)
 80485e0:	89 14 24             	mov    %edx,(%esp)
 80485e3:	e8 78 fd ff ff       	call   8048360 <printf@plt>
 80485e8:	c9                   	leave
 80485e9:	c3                   	ret
...
```
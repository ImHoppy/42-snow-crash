# Level 14

Home structure
```
$ ls -l
total 0
$ find / -user flag14 2>/dev/null
```
Mince, on ne trouve rien que très intéressant, ni dans le home, ni un fichier avec des permission. Rien dans le `/etc/passwd` à crack. <br/>
Vu du dernier level, qui nous introduit au disassemble, pourrait t'on disassemble le getflag ?

En ouvrant le program `getflag` dans ghidra, on choper une version aproximative du C<br/>
Sur l'image en dessous, on a entourer deux blocs interessant et important.
- Le premier nous met un message d'erreur si on `ptrace` nous retourne `-1`.
- Le deuxieme qui choppe le `getuid`.

Et la suite du program des une foret de if, entre l'uid de l'executeur et d'autre uid.<br/>
Chaque condition on une liste de charactère passé à `ft_des` puis print le retour de celle ci dans la stdout.

![Decompile version of getflag executable in ghidra](./getflag_ghidra.png)


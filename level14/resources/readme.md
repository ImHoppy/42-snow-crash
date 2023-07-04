# Level 14

Home structure
```
$ ls -l
total 0
$ find / -user flag14 2>/dev/null
```
Mince, on ne trouve rien que très intéressant, ni dans le home, ni un fichier avec des permission. Rien dans le `/etc/passwd` à crack. <br/>
Vu du dernier level, qui nous introduit au disassemble, pourrait t'on disassemble le getflag ?

En ouvrant le program `getflag` dans ghidra, on récupère une version approximative du C<br/>
Sur l'image en dessous, on a entouré deux blocs intéressant et important.
- Le premier nous met un message d'erreur si on `trace` nous retourne `-1`.
- Le deuxième qui choppe le `getuid`.

Et la suite du program une forêt d'if, entre l'uid de l'exécuteur et d'autres uid.<br/>
Chaque condition a une liste de caractère passé à `ft_des` puis print le retour de celle-ci dans la stdout.

![Decompile version of getflag executable in ghidra](./getflag_ghidra.png)


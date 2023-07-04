# Level 01

```
$ cat /etc/passwd
flag01:42hDRfypTqqnw:3001:3001::/home/flag/flag01:/bin/bash
```
On peut apercevoir un code: `42hDRfypTqqnw`.
Il ne correspond pas au password de `flag01`.

En téléchargeant un outil appelé [John](https://github.com/openwall/john), on peut trouver le facilement le mot de passe en brutforce avec une liste de mot de passe courant.
Ce qui nous donne le mot de passe de `flag01`

```
$ john --show passwd
flag01:abcdefg:3001:3001::/home/flag/flag01:/bin/bash

1 password hash cracked, 0 left
```

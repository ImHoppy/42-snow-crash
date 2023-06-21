# Level 02

Dans le home du level02, on voit un fichier nommé `level02.pcap`, l'extension pcap correspond au fichier de sauvegarde de wireshark.

En ouvrant le fichier wireshark, on a la liste des connections entrant et sortie, et en allant sur la fenetre  Follow TCP Stream (Analyse > Follow > TCP Stream) et en vu hexdump.

On appercoit donc le mot de passe et aussi ̀a l'address 0x0C1..0C3 et 0x0C9 des `.` mais si on regarde la table ascii l'hexa correspondant ̀a 7f n'est pas des `.` mais la touche `delete`.

Ce qui voudrait dire qu'on voit characters qui n'est pas present dans le mot de passe de final.
Comme 0x0BE..0C0 et 0x0C8.

Le mot de passe final: `ft_waNDReL0L`

| Hex Adress | Hex | Char |
| ----------:|:---:|:----:|
| 000000B9   | 66  |  f   |
| 000000BA   | 74  |  t   |
| 000000BB   | 5f  |  _   |
| 000000BC   | 77  |  w   |
| 000000BD   | 61  |  a   |
| 000000BE   | 6e  |  n   |
| 000000BF   | 64  |  d   |
| 000000C0   | 72  |  r   |
| 000000C1   | 7f  |  .   |
| 000000C2   | 7f  |  .   |
| 000000C3   | 7f  |  .   |
| 000000C4   | 4e  |  N   |
| 000000C5   | 44  |  D   |
| 000000C6   | 52  |  R   |
| 000000C7   | 65  |  e   |
| 000000C8   | 6c  |  l   |
| 000000C9   | 7f  |  .   |
| 000000CA   | 4c  |  L   |
| 000000CB   | 30  |  0   |
| 000000CC   | 4c  |  L   |
| 000000CD   | 0d  |  .   |

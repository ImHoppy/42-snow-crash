# Snow Crash

## Faut faire quoi?
Ce projet vise à nous faire découvrir, à travers plusieurs petits défis, la cybersécurité dans divers domaines.

Chaque défi est representé via un utilisateur allant de level00 jusqu'à level14. Chaque level contient une clé caché qui nous donne accès au level suivant, soit dans un fichier où on n'a pas les droit. Ou soit un programme avec une faille.

## L'environement et les outils utilisé
L'environement où se situe les levels est une vm, disponible via ssh. Mon ordi de travail est ceux disponible à l'Ecole 42 Paris sur Ubuntu

La liste des outils et commandes utilisé:
 - john
 - ghidra
 - wireshark
 - vim
 - gdb
 - ptrace
 - nm
 - netstat
 - objdump

## Listes des levels
- [**level00**](level00/resources/readme.md): Recherche de programme caché et introduction à la cryptographie
- [**level01**](level01/resources/readme.md): Découvrir la gestion de mot de passe et d'utilisateur sur unix
- [**level02**](level02/resources/readme.md): Découverte du logiciel wireshark.
- [**level03**](level03/resources/readme.md): Exploiter les variables d'environnement
- [**level04**](level04/resources/readme.md): Utilisation d'une faille de sécurité dans un script Perl cgi
- [**level05**](level05/resources/readme.md): Découverte du programme cron
- [**level06**](level06/resources/readme.md): Utilisation et découverte d'une ancienne faille php
- [**level07**](level07/resources/readme.md): Exploiter une variable d'environnement mais autrement
- [**level08**](level08/resources/readme.md): Comprendre les permissions fichier et le SUID
- [**level09**](level09/resources/readme.md): Comprendre le fonctionnement d'un programme et être capable de faire un script
- [**level10**](level10/resources/readme.md): Découvrir les `Race condition` et `strace`
- [**level11**](level11/resources/readme.md): Découverte de lua et de sa bibliothèque standard
- [**level12**](level12/resources/readme.md): Comment contourner la sécurité dans un script perl
- [**level13**](level13/resources/readme.md): Patch un programme pour contourner une sécutité
- [**level14**](level14/resources/readme.md): Patcher plusieurs sécurité mais directement via gdb
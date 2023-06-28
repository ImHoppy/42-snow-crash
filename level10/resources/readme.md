# Level 10

Home structure
```
$ ls -la
total 36
drwxrwx---+ 1 level10 level10   260 Jun 28 15:36 .
d--x--x--x  1 root    users     340 Aug 30  2015 ..
-rwsr-sr-x+ 1 flag10  level10 10817 Mar  5  2016 level10
-rw-------  1 flag10  flag10     26 Mar  5  2016 token
```
```
$./level10 file host
	sends file to host if you have access to it
```
L'executable nous demandes un fichier avec des accès dessus et une ip ?
```
./level10 token 127.0.0.1
You don't have access to token
./level10 /tmp/toto 127.0.0.1
Connecting to 127.0.0.1:6969 .. Unable to connect to host 127.0.0.1
```
On a plus d'info sur l'ip, il essaye de se connecté à l'ip via le port 6969. On va donc setup un petit serveur
```
$ nc -l 6969 &
[1] 2086
$ ./level10 /tmp/toto 127.0.0.1
Connecting to 127.0.0.1:6969 .. .*( )*.
Connected!
Sending file .. Hello
wrote file!
```
On recoit bien le contenu du fichier `/tmp/toto` qui est: `Hello`.

```
$ strace ./level10 /tmp/toto 127.0.0.1
...
access("/tmp/toto", R_OK)               = 0
write(1, "Connecting to 127.0.0.1:6969 .. ", 32Connecting to 127.0.0.1:6969 .. ) = 32
socket(PF_INET, SOCK_STREAM, IPPROTO_IP) = 3
connect(3, {sa_family=AF_INET, sin_port=htons(6969), sin_addr=inet_addr("127.0.0.1")}, 16) = 0
write(3, ".*( )*.\n", 8.*( )*.
)                = 8
write(1, "Connected!\n", 11Connected!
)            = 11
write(1, "Sending file .. ", 16Sending file .. )        = 16
open("/tmp/toto", O_RDONLY)             = 4
read(4, "Hello\n", 4096)                = 6
write(3, "Hello\n", 6Hello
)                  = 6
write(1, "wrote file!\n", 12wrote file!
)           = 12
```
Lors du strace de l'executable, on voit qu'il essaye d'`access` sur le fichier avec la permision `READ` avant de l'ouvrir et de se connecter. On pourrait peut être faire une [Race condition](https://en.wikipedia.org/wiki/Race_condition) ?
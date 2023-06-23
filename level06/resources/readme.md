# Level 06
Home:
```
$ ls -la
total 24
dr-xr-x---+ 1 level06 level06  140 Mar  5  2016 .
d--x--x--x  1 root    users    340 Aug 30  2015 ..
-r-x------  1 level06 level06  220 Apr  3  2012 .bash_logout
-r-x------  1 level06 level06 3518 Aug 30  2015 .bashrc
-rwsr-x---+ 1 flag06  level06 7503 Aug 30  2015 level06
-rwxr-x---  1 flag06  level06  356 Mar  5  2016 level06.php
-r-x------  1 level06 level06  675 Apr  3  2012 .profile
```

L'executable level06 sert juste à lancer /bin/php avec les bonnes permissions et prend deux paramètre optionel.
```c
int32_t main(int32_t argc, char** argv, char** envp)
{
    char* param_1 = strdup("");
    char* param_2 = strdup("");
    if (argv[1] != 0)
    {
        free(param_1);
        param_1 = strdup(argv[1]);
        if (argv[2] != 0)
        {
            free(param_2);
            param_2 = strdup(argv[2]);
        }
    }
    gid_t eax_6 = getegid();
    uid_t eax_7 = geteuid();
    setresgid(eax_6, eax_6, eax_6);
    setresuid(eax_7, eax_7, eax_7);
	char *v10[11];
	v10[0] = "/usr/bin/php";
	v10[1] = "/home/user/level06/level06.php";
	v10[2] = param_1;
	v10[3] = param_2;
	v10[4] = 0;
    execve("/usr/bin/php", &v10, envp);
    return 0;
}
```
import sys
if (len(sys.argv) < 2):
	print('No args')
	exit()

transformed = ''.join(chr(ord(letter)-i) for (i, letter) in enumerate(sys.argv[1]))
print(transformed)
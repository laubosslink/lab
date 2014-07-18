#include <stdio.h>
#include <stdlib.h>

int main(){
	char str[80];
	char str2[80];

	FILE *f = fopen("test.txt", "r");

	fscanf(f, "%s\n", str);
	fscanf(f, "%s\n", str2);

	printf("%s\n", str);
	printf("%s\n", str2);

	fclose(f);

	return 0;
}


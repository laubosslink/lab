#include <stdlib.h>
#include <string.h>
#include <stdio.h>

int main(){
	char *str = (char *) malloc(sizeof(char) * 5);
	char *str_calloc = (char *) calloc(5, sizeof(char));

	printf("sizeof(str) : %ld\n", sizeof(str));
	printf("strlen(str) : %ld\n", strlen(str));
	printf("strlen(str_calloc) : %ld\n", strlen(str_calloc));

	return 0;
}

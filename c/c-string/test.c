#include <stdio.h>
#include <stdlib.h>
#include <string.h>

int main(){
	char s[] = "hello world...";
	char *s1;
	char *s2 = "just for pleasure";
	
	s1 = malloc(sizeof(char) * strlen(s));
	
	strcpy(s1, s);
	
	printf("s1: %s\n", s1);
	printf("s2: %s\n", s2);
	
	(char *) realloc(s1, (strlen(s1) + strlen(s2)) * sizeof(char));
	
	/* (destination, source) */
	strcat(s1, s2);
	
	printf("s1: %s\n", s1);
	printf("s2: %s\n", s2);
	
	return EXIT_SUCCESS;
}
 

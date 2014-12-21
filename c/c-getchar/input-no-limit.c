#include <stdio.h>
#include <stdlib.h>
#include <string.h>

#define INIT_SIZE 64

int main(){
	char c;
	char *saisie;
	int i=0, l=INIT_SIZE;

	saisie = (char *) malloc(sizeof(char) * l);

	while((c = fgetc(stdin)) != '\n'){
		if(i >= l-1)
		{
			//printf("realloc\n");
			l *= 2;
			saisie = (char *) realloc(saisie, sizeof(char) * l);
		}

		saisie[i++] = c;
	}

	saisie[i] = '\0';

	printf("output(%d): %s\n", i, saisie);

	return EXIT_SUCCESS;
}

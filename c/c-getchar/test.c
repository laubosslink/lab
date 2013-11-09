#include <stdio.h>
#include <stdlib.h>
#include <string.h>

int main(){
	char c;
	char *saisie;
	int i;
	
	saisie = malloc(sizeof(char) * 80);
	
	i=0;
	
	// fgetc(stdin) <=> getchar()
	while((c = fgetc(stdin)) != '.'){  // Ne passera dans la boucle que lorsqu'on a tapé la touche entrée, et s'arrêtera que si on arrive sur le caractère . ou que la longueur > 80
		if(strlen(saisie) > 80)
			break;
		
		if(c == ' ') // si on a un espace on l'affiche
		{
			printf("s: %zd\n", strlen(saisie));
		}
		
		saisie[i++] = c;
	}
	
	printf("output: %s\n", saisie);

	return EXIT_SUCCESS;
}

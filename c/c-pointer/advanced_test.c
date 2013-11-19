#include <stdlib.h>
#include <stdio.h>

void lire(int **tab, int taille){
	int i;
	
	*tab = (int*) malloc(sizeof(int) * taille);
	
	for(i=0; i<taille; i++)
	{
		printf("tab[%d]:", i);
		scanf("%d", &((*tab)[i]));
	}
}

void afficher(int **tab, int taille){
	int i;

	for(i=0; i<taille; i++)
		printf("tab[%d]=%d\n", i, (*tab)[i]);
}

int main(){
	int *tab;
	
	lire(&tab, 3);
	afficher(&tab, 3);
	
	return EXIT_SUCCESS;
}

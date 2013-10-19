#include <stdlib.h>
#include <stdio.h>

void inverseTable(int tab[], int taille){
	int tmp, i;
	
	for(i=0; i<taille/2; i++)
	{
		tmp = tab[i];
		tab[i] = tab[taille-i-1];
		tab[taille-i-1] = tmp;
	}
	
}

void afficheTable(int tab[], int taille){
	int i=0;
	
	printf("{");
	for(; i<taille;i ++){
		printf("%d,", tab[i]);
	}
	
	printf("}\n\n");
}

int main(){
	int t=21;
	int tab[] = {0,1,2,3,4,5,6,7,8,9};
	
	printf("adr(tab): %p\n", tab);
	printf("adr(t) : %p\n", &t);
	
	printf("val(t) : %p\n", t);
	
	printf("\n");
	
	afficheTable(tab, 10);
	inverseTable(tab, 10);
	afficheTable(tab, 10);
	
	return EXIT_SUCCESS;
}

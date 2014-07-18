#include <stdlib.h>
#include <stdio.h>
#include <time.h>
#include <unistd.h>

int main(){
	int tab1[5], tab2[5];
	int i;
	
	printf("[NO SRAND]\n");
	
	for(i=0; i<5; i++){
		tab1[i] = rand()%10;
		tab2[i] = rand()%10;
	}
	
	for(i=0; i<5; i++){
		printf("tab1[%d] = %d; tab2[%d] = %d\n", i, tab1[i], i, tab2[i]);
	}
	
	printf("\n\n[SRAND IN WHILE(BAD)]\n");
	
	for(i=0; i<5; i++){
		srand(time(NULL)); // time(NULL sera le meme sur une tres tres courte periode)
		
		tab1[i] = rand()%100;
		tab2[i] = rand()%100;
		//sleep(1); peut regler le probleme dun srand dans une boucle
	}
	
	for(i=0; i<5; i++){
		printf("tab1[%d] = %d; tab2[%d] = %d\n", i, tab1[i], i, tab2[i]);
	}
	
	return 0;
}

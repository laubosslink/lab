#include <stdio.h>
#include <stdlib.h>

int main(){
	
	int i;
	
	int tab[] = {1, 15, 21, 32, 4, 54, 65, 64, 45, 31};
	int *ptab = tab;
	
	printf("%p\n", tab); /* <=> */
	printf("%p\n", ptab);
	
	for(i=0; i<10; i++){
		printf("%d\n", (*ptab)++);
	}
	
	printf("ptab[0]: %d\n", *ptab);  
	
	return EXIT_SUCCESS;
}

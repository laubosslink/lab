#include <stdlib.h>
#include <stdio.h>

int main(){
	int *pointer;

	pointer = calloc(1, sizeof(int));
	
	*pointer = 5;
	
	printf("[Before free]\n");
	printf("adr: %p\n", pointer);
	printf("val: %d\n\n", *pointer);
	free(pointer);

	printf("[After free]\n");
	printf("adr: %p\n", pointer);
	printf("value: %d\n\n", *pointer);
	
	/* so we need that : */
	
	pointer = NULL;
	
	printf("[After NULL]\n");
	printf("adr: %p\n", pointer);
	printf("value: %d\n\n", *pointer);
	
	return EXIT_SUCCESS;
}

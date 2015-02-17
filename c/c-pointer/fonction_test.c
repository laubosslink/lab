#include <stdio.h>
#include <stdlib.h>

int* ret(){
	int *c = malloc(sizeof(int));
	
	*c = 4;
	
	return c;
}

int main(){

	printf("%d\n", *ret());

	return 0;
}

#include <stdlib.h>
#include <stdio.h>

#define ARRAY_SIZE 5

int*** init_array(){
	int x, y, z;
	static int ***a;

	/** allocation des z */
	a = (int***) calloc(ARRAY_SIZE, sizeof(int **));

	for(z=0; z<ARRAY_SIZE; z++){
		
		/** allocation des y */
		a[z] = (int **) calloc(ARRAY_SIZE, sizeof(int *));
		
		for(y=0; y<ARRAY_SIZE; y++){
			
			/** allocation des x */
			a[z][y] = (int *) calloc(ARRAY_SIZE, sizeof(int));
			
			for(x=0; x<ARRAY_SIZE; x++) a[z][y][x] = z * x * y;
		}
	}
	
	return a;
}

void read_array(int ***arr){
	int x, y, z;
	
	for(z=0; z<ARRAY_SIZE; z++){
		for(y=0; y<ARRAY_SIZE; y++){
			for(x=0; x<ARRAY_SIZE; x++){
				printf("[z=%d][y=%d][x=%d]=%d\n", z, y, x, arr[z][y][x]);
			}
		}	
	}
}

void free_array(int ***a){
	int x, y, z;
	
	for(z=0; z<ARRAY_SIZE; z++){
		for(y=0; y<ARRAY_SIZE; y++){
			free(a[z][y]);
			a[z][y] = NULL;
		}
		free(a[z]);
		a[z] = NULL;
	}
	
	free(a);
	a=NULL;
}

int main(){
	int ***a = init_array();
	
	read_array(a);
	
	free_array(a);
	
	return EXIT_SUCCESS;
}

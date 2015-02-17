#include <stdio.h>
#include <stdlib.h>

int main(){
	FILE* f;
	
	f = fopen("test.txt", "r");
	
	fseek(f, 2, SEEK_CUR);
	
	char c;
	
	fscanf(f, "%c", &c);
	
	printf("charactere : %c\n", c);
	
	fseek(f, 3, SEEK_CUR);
	
	fscanf(f, "%c", &c);
	
	printf("charactere : %c\n", c);

	/* it doesnt work to use \n.... SO USE fseek PLEASE ! */
	fscanf(f, "\n\n\n \n%c", &c);
	
	printf("charactere : %c\n", c);
	
	return 0;
}

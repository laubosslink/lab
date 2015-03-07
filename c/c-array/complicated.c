#include <stdlib.h>
#include <stdio.h>

int main(){
	int i=0;
	int tab1[] = {1, 2, 3, 5, 8, 13, 21, 34, 55, 89};
	int *ptab1 = tab1;
	double tab2[10];
	double *ptab2 = tab2;
	
	/*
	for(i=0; i<10; i++){
		*ptab2 = (*ptab1 * *ptab1);
		ptab2++;
		ptab1++;
	}*/
		
	for(i=0; i<10; i++){
		//*ptab2++ = (float)(*(ptab1++)); 
		*ptab2 = (float) *ptab1; 
		ptab2++;
		ptab1++;
	}
	
	ptab2=tab2; /** tres important */
	
	for(i=0; i<10; i++){
		printf("%.00f, ", ptab2[i]);
	}
	
	printf("\n\n");
	
	ptab1 = tab1;
	ptab2 = tab2;
	
	for(i=0; i<10; i++){
		*ptab2++ = (float)((*ptab1)++); // *ptab1 = *ptab1+1;
	}
	
	//ptab1=tab1;
	//printf("%d\n", ptab1);
	
	ptab2 = tab2;
	
	for(i=0; i<10; i++){
		printf("%.00f, ", ptab2[i]);
	}
	
	printf("\n\n");
	
	ptab1 = tab1;
	ptab2 = tab2;
	
	for(i=0; i<10; i++){
		*ptab2++ = (float)(*ptab1++);
	}
	
	ptab2 = tab2;
	
	for(i=0; i<10; i++){
		printf("%.00f, ", ptab2[i]);
	}
	
	printf("\n\n");
	
	ptab1 = tab1;
	ptab2 = tab2;
	
	for(i=0; i<10; i++){
		*(ptab2+i) = (float)(*ptab1+i);
	}

	ptab2 = tab2;
	
	for(i=0; i<10; i++){
		printf("%.00f, ", ptab2[i]);
	}
	
	printf("\n\n");
	
	
	ptab1 = tab1;
	ptab2 = tab2;
	tab1[0] = 1;
	
	for(i=0; i<10; i++){
		*(ptab2+i) = (float)(*(ptab1+i));
	}

	ptab2 = tab2;

	for(i=0; i<10; i++){
		printf("%.00f, ", ptab2[i]);
	}
	
	printf("\n\n");
}

#include <stdlib.h>
#include <stdio.h>

int rec(int a, int b)
{
	int q;

	if(b > q) return 0;

	q = a/b;

	if(q%2 == 0)
		return rec(a, 2*b);

	return rec(a+b, 2*b);
}

int main(int argc,  char* argv[]){
	printf("a=%d\n", atoi(argv[1]));
	printf("b=%d\n", atoi(argv[2]));
	printf("rec(a,b)=%d\n", rec(atoi(argv[1]), atoi(argv[2])));
	return 0;
}

#include <assert.h>

int main(){
	int x = 0;
	int &r = x;
	int *p = &x;
	int *p2 = &r;
	assert(p == p2);
	return 0;
}

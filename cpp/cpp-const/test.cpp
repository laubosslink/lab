#include <iostream>

int main()
{
	char t = 'a';
	char *pt = &t;
	const char *cpt = pt;
	*pt = 'b';
//	*cpt = 'c'; // cant do that

	std::cout << *cpt << std::endl;
}

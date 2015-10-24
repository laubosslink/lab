#include <iostream>

void foo(int i) { std::cout << "int:" << i; }
void foo(const int* i) { std::cout << "int*:" <<  i; }
//void foo(const char* i) { std::cout << "const char*:" << i; }
//void foo(nullptr i) { std::cout << "const char*:" << i; }

int main()
{
	foo(nullptr);
	std::cout << std::endl;
}

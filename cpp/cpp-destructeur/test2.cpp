#include <iostream>

int main() {
  int a = 5;
  int *b = new int;
  *b = a;

  std::cout << "b=" << b << "; *b=" << *b << std::endl; // b=0xYZ;  *b=5
  delete b;
  std::cout << "b=" << b << "; *b=" << *b << std::endl; // b=0xYZ; *b=0
  delete b; //  *** Error in `./test': double free or corruption (fasttop): 0x000000000078b010 ***
}

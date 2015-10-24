#include <iostream>

class A{
public:
  A() {
    std::cout << "Called :)" << std::endl;
  }
};

class B {
public:
  B(int param) {
    std::cout << "P:" << param << std::endl;
  }
};

int main() {
  A atmp;
  A *a = new A[10]; // A() called 10 times
  B b = 2; // affiche P:2
  std::cout << atmp << std::endl; 
}

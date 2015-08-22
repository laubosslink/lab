#include <iostream>

class A{
public:
  double a;
  A() {
    std::cout << "A()" << std::endl;
  }

  A(double a) {
    std::cout << "A(double a)" << std::endl;
    A::a = a;
  }

  A(int a) {
    std::cout << "A(int a)" << std::endl;
    A::a = a;
  }
};

double foo(A a) {
  std::cout << "foo()" << std::endl;
  return a.a;
}

int main() {
  foo(10.0f); // call A(double) implicit
  std::cout << foo(A(2.5)) << std::endl;
}

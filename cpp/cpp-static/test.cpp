#include <iostream>

class A {
  private:
    static int a;
    const static int b = 10;
  public:
    static int getA();
    static int getB() {
      return b;
    }
};

int A::a = 5; // ne peut être définis dans la classe, ne doit pas avoir le mot static

int A::getA()  { // ne peut être définis dans la classe, ne doit pas avoir le mot static
  return a++;
}

int main() {
  std::cout << A::getA() << std::endl;
  std::cout << A::getA() << std::endl;
  std::cout << A::getA() << std::endl;
  std::cout << A::getB() << std::endl;
}

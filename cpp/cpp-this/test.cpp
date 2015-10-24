#include <iostream>

class A {
  private:
    int a;
  public:

    int getA() {
      return this->a;
    }
};

int main() {
  A* a1 = new A[300000]; for(int i=1; i<300000; i++) a1[i] = A();
  A* a2 = new A();

  int last;

  std::cout << "a1[0]=" << a1[0].getA() << std::endl;

  for(int i=1; i<300000; i++) {
    last = a1[i-1].getA();
    if(last != a1[i].getA()) {
      last = a1[i].getA();
      std::cout << "a1[" << i << "]=" << a1[i].getA() << std::endl;
    }
  }

  std::cout << "a2=" << a2->getA() << std::endl;
}

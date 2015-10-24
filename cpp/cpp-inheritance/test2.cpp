#include <iostream>

class A {
public:
  int a;
  int b; // comment acceder à ce b ?

  A() {
    b = 3;
  }
};

class B : public A {
public:
    int b; // ne provoque pas d'erreur... pourquoi ?
};

class C : public B {
public:
  int c;
};

int main() {
  C c;
  c.a = 2;
  c.b = 5;

  std::cout << c.a << std::endl; // affiche 2
  std::cout << c.b << std::endl; // affiche 5
}

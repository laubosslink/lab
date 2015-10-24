#include <iostream>

int main() {
  double g = 9.81;
  double &accel = g;
  double alpha = 0.6e-9;
  double *pg;

  accel = 1.0;
  pg = &accel;

    std::cout << "&g = " << &g << std::endl;
    std::cout << "pg = " <<  pg << std::endl;
}

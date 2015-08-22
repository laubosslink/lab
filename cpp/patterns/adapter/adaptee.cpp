#ifndef ADAPTEE
#define ADAPTEE

#include <iostream>

class Adaptee
{
	public:
		Adaptee(){}

		void specificPrint()
		{
			std::cout << "Adaptee::specificPrint()" << std::endl;
		}
};

#endif

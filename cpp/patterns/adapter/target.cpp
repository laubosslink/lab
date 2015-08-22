#ifndef TARGET
#define TARGET

#include <iostream>

class Target
{
	public:
		Target(){}

	virtual void print()
	{
		std::cout << "Target::print()" << std::endl;
	}
};

#endif

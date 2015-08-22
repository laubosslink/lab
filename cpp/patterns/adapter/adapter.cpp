#ifndef ADAPTER
#define ADAPTER

#include "target.cpp"
#include "adaptee.cpp"

class Adapter: private Target
{
	private:
		Adaptee* adaptee;

	public:
		Adapter()
		{
			adaptee = new Adaptee();
		}

		void print()
		{
			this->adaptee->specificPrint();
		}
};
#endif

class  Singleton (object):
	instance = None       
	def __new__(classe, *args, **kargs): 
		if classe.instance is None:
			classe.instance = object.__new__(classe, *args, **kargs)
		return classe.instance

# Utilisation:
monSingleton1 =  Singleton()
monSingleton2 =  Singleton()

assert monSingleton1 is monSingleton2
print monSingleton1
print monSingleton2

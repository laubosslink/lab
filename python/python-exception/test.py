#!/usr/bin/python

class DB:
    def select(self):
        # requete sql
        raise Exception('Bad request SQL')


class User:
    def getUser(self):
        try:
            db = DB()
            db.select()
        except Exception as a:
            print hex(id(a)) #0x10f2e8758
            raise a

class Group:
    def getGroup(self):
        try:
            u = User()
            u.getUser()
        except Exception as b:
            print hex(id(b)) #0x10f2e8758
            raise b # n'instancie pas (si on utilise: raise Exception(str(b)), on instancie un nouvel objet /!\

msg = ""

g = Group()

try:
    g.getGroup()
except Exception as c:
	print hex(id(c)) #0x10f2e8758
	msg=str(c)

print msg


#Bad request SQL

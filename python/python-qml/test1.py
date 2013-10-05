from PySide import QtCore  
from PySide import QtGui  
from PySide import QtDeclarative  
  
class Message(QtDeclarative.QDeclarativeItem):  
  
	messageChanged = QtCore.Signal()  
  
	def __init__(self, parent = None):  
		QtDeclarative.QDeclarativeItem.__init__(self, parent)  
		self._msg = u''  
  
	def getMessage(self):  
		return self._msg  
  
	def setMessage(self, value):  
		if self._msg != value:  
			print "Setting message property to", value  
			self._msg = value  
			self.messageChanged.emit()  
		else:  
			print "Message property already set to", value  
  
	message = QtCore.Property(unicode, getMessage, setMessage, notify=messageChanged)  
  
  
def main():  
	app = QtGui.QApplication([])  
  
	QtDeclarative.qmlRegisterType(Message, "utils", 1, 0, "Message")  
  
	win = QtDeclarative.QDeclarativeView()  
	win.setSource("main.qml")  
	win.setWindowTitle("Hello World")  
	win.setResizeMode(QtDeclarative.QDeclarativeView.SizeRootObjectToView)  
  
	win.show()  
	app.exec_()  
  
if __name__ == "__main__":  
	main()  

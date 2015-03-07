#!/usr/bin/python

import PyQRNative
 
def makeQR(data_string,path,level=1):
    quality={1: PyQRNative.QRErrorCorrectLevel.L,
             2: PyQRNative.QRErrorCorrectLevel.M,
             3: PyQRNative.QRErrorCorrectLevel.Q,
             4: PyQRNative.QRErrorCorrectLevel.H}
    size=3
    while 1:
        try:
            q = PyQRNative.QRCode(size,quality[level])
            q.addData(data_string)
            q.make()
            im=q.makeImage()
            im.save(path,format="png")
            break
        except TypeError:
            size+=1

if __name__ == "__main__":
	makeQR("Hello world !", ".");

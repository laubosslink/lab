    import Qt 4.7 // or QtQuick 1.0 if applicable  
      
    import utils 1.0  
      
    Rectangle {  
        id: main  
      
        signal clicked  
      
        color: "black"  
        width: 360; height: 360  
      
        Message {  
            id: msg  
      
            message: "Click Me!"  
            onMessageChanged: label.font.pixelSize = 40  
        }  
      
        Text {  
            id: label  
      
            anchors.centerIn: parent  
      
            text: msg.message  
            color: "white"  
            font.pixelSize: 25  
      
     Behavior on font.pixelSize {  
                NumberAnimation { duration: 800; easing.type: Easing.OutBounce }  
            }  
      
            MouseArea {  
                anchors.fill: parent  
                onClicked: msg.message = "Hello World", label.color = "blue"  
            }  
        }  
      
    }  

serverList = (("<host1>","DEV","Informatica","Red_Hat","64"),
              ("<host2>","PROD","Informatica","Red_Hat","64"),
              ("<host3>","PROD","Informatica","Red_Hat","64"),
              ("<host4>","QA","Informatica","Red_Hat","64"),
              ("<host5>","PROD","Tibco","Solaris"),
              ("<host6>","TEST","Tibco","Solaris"))
envList = [['PROD','Red_Hat','64'], ["PROD","Solaris"]]
 
output = []
for item in serverList:
    for elem in envList:
        if set(elem).issubset(set(item[1:])):
            output.append(item[0])
 
print output


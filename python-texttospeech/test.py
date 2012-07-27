import speechd # require speechd service

spk = speechd.Speaker('speak1')
spk.speak('hello world')

girl = speechd.Speaker('speak2')
girl.set_voice('FEMALE1')

girl.speak('Im a girl')


# -*- coding: utf-8 -*-
#!/usr/bin/python

import urllib2

import xml.etree.ElementTree as xml

def getWeather(city):

    #create google weather api url
    url = "http://www.google.com/ig/api?weather=" + urllib2.quote(city)

    try:
        # open google weather api url
        f = urllib2.urlopen(url)
    except:
        # if there was an error opening the url, return
        return "Error opening url"

    # read contents to a string
    s = f.read()
    #print(s)
    myxml = xml.fromstring(s)

    city = myxml.find('weather/forecast_information/city').get('data')

    temp = myxml.find('weather/current_conditions/temp_c').get('data')

    temp_max = myxml.find('weather/forecast_conditions/high').get('data')
    temp_max = (int(temp_max)-32)/(9.0/5)

    futur_weather = myxml.find('weather/forecast_conditions/condition').get('data')


    wind = str(s).split("<current_conditions>")[1].split("Wind:")[1].split("\"")[0][6:8]

    #temp = None

    humidity = str(s).split("<current_conditions>")[1].split("Humidity:")[1].split("\"")[0][1:3]

    # extract weather condition data from xml string
    weather = s.split("<current_conditions><condition data=\"")[-1].split("\"")[0]

    # if there was an error getting the condition, the city is invalid
    if weather == "<?xml version=":
        return "Invalid city"

    #return the weather condition
    return weather, humidity, wind, temp, city, temp_max, futur_weather

#city = raw_input("Give me a city: ")
city="lille"
weather, humidity, wind, temp, city, temp_max, futur_weather = getWeather(city)

import subprocess

def parler(phrase):
    subprocess.call(["espeak", "-v", "mb/mb-fr1", phrase], stderr=open('/dev/null', 'r'))

def listen():
    subprocess.call(["./record.sh"], shell=True)
    output = subprocess.Popen(['./decode.sh'], shell=True, stdout=subprocess.PIPE)
    return output.stdout.read()

parler("Est-ce que tu veux la météo de Lille, Laurent ?")
reponse = listen()

if "yes" in reponse.lower():
 parler("Attend, je vais te la donner !")
 parler("La température à Lille est de " + temp + " avec une humidité de " + humidity + " pourcent")
else:
 parler("Désolé de te déranger")



parler("Tu veux faire l'amour ?")
reponse = listen()

if "yes" in reponse.lower():
 parler("Il y a un trou juste dérrière")
else:
 parler("Tant pis")
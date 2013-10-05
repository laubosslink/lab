# -*- coding: utf-8 -*-
"""
Created on Thu Jul 26 00:34:10 2012

@author: laubosslink
"""

import urllib2
import xml.etree.ElementTree as xml
import espeak

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
    
    wind = str(s).split("<current_conditions>")[1].split("Wind:")[1].split("\"")[0][6:8]
    
    #temp = None
    
    humidity = str(s).split("<current_conditions>")[1].split("Humidity:")[1].split("\"")[0][1:3]

    # extract weather condition data from xml string
    weather = s.split("<current_conditions><condition data=\"")[-1].split("\"")[0]

    # if there was an error getting the condition, the city is invalid
    if weather == "<?xml version=":
        return "Invalid city"

    #return the weather condition
    return weather, humidity, wind, temp, city, temp_max

#city = raw_input("Give me a city: ")
city="lille"
weather, humidity, wind, temp, city, temp_max = getWeather(city)

import subprocess
import time
import os

def parler(phrase):
    #subprocess.call(["espeak", "-p", "85", "-v", "mb/mb-fr1+f3", phrase], stderr=open('/dev/null', 'r'))
    subprocess.call(["espeak", "-v", "mb/mb-fr1", phrase], stderr=open('/dev/null', 'r'))
    
def jour(n):
    jour = ["lundi", "mardi", "mercredi", "jeudi", "vendredi", "samedi", "dimanche"]
    return jour[n]

day = int(time.strftime('%d'))%7

parler("Salut, Laurent")
parler("Aujourd'hui c'est " + jour(day))
parler("Il est, " + time.strftime('%H')[1] + ", heure et " + time.strftime('%M') + " minute")
parler("En ce qui concerne la météo pour " + city)


if "Clear" in weather:
    weather = "temps clair, il fait beau"

parler("Google dit : " + weather)
if temp:
    parler("Température de " + temp + " degré")
else:
    parler("La température n'a pas pu être déterminé")
parler("Humidité de " + humidity + " pourcent")
parler("Le vent ira jusqu'a " + wind + " kilo mètre heure")

parler("Une température maximale de " + str(temp_max))

if temp_max > 25:
    parler("Beaucoup trop chaud, travail la nuit")


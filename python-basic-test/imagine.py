# -*- coding: utf-8 -*-
"""
Created on Thu Jul 26 00:34:10 2012

@author: laubosslink
"""

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
import time
import pygame # read audio file
import threading
import datetime
import pywapi
import os

google_result = pywapi.get_weather_from_google('10001')
yahoo_result = pywapi.get_weather_from_yahoo('10001')
noaa_result = pywapi.get_weather_from_noaa('KJFK')

# Lancement d'un thread pour la musique
#threading.Thread(mymusic).start()


#username = raw_input("C'est ton histoire, quel est ton nom : ")

def parler(phrase):
    #subprocess.call(["espeak", "-p", "85", "-v", "mb/mb-fr1+f3", phrase], stderr=open('/dev/null', 'r'))
    subprocess.call(["espeak", "-v", "mb/mb-fr1", phrase], stderr=open('/dev/null', 'r'))

def parler2(phrase):
    subprocess.call(["espeak", "-p", "85", "-v", "mb/mb-fr1+f3", phrase], stderr=open('/dev/null', 'r'))
    #subprocess.call(["espeak", "-v", "mb/mb-fr1", phrase], stderr=open('/dev/null', 'r'))

parler("Comment tu vas alice ?")
parler2("Je vais bien Alex, et toi ?")
parler("Bien, attend, je dois check pour laurent")

def jour(n):
    jour = ["lundi", "mardi", "mercredi", "jeudi", "vendredi", "samedi", "dimanche"]
    return jour[n]

#day = int(time.strftime('%d'))%7

#parler(str(day))

parler("Salut, Laurent")
parler("Il est, " + time.strftime('%H')[1] + ", heure et " + time.strftime('%M') + " minute")
parler("Pour cette journée de " + jour(time.localtime()[6]))
parler("la météo pour " + city)


if "Clear" in weather:
    weather = "temps clair, et beau"

parler("D'après Google il fait un : " + weather)

parler("Et en ce qui concerne le temps pour aujourd'hui " + futur_weather)

if temp:
    parler("Température de " + temp + " degré")
else:
    parler("La température n'a pas pu être déterminé")
parler("L'humidité actuelle est de  " + humidity + " pourcent")
parler("Le vent va a " + wind + " kilo mètre heure")

parler("La température maximale pour cette journée sera de " + str(temp_max)[:2] + " degrés")

if temp_max > 25:
    parler("Il fera beaucoup trop chaud, c'est pourquoi, je te conseil de travailler la nuit")

exit()

parler("Je vais procéder au check des serveurs")
parler("ça te conviens ?")

parler("Le serveur G, ID numéro 5 semble être down")
time.sleep(1)
parler("J'analyse les logs")

time.sleep(1)
parler("Le serveur semble avoir été coupé à 23 heure 50")

time.sleep(1)
parler("Le problème semble venir d'apache")

time.sleep(1)
parler("BOss, désire-tu que je te connecte au serveur?")

parler("J'ai un warning sur le serveur G, ID 6, j'ouvre ssh")

# Continue à la fin en même temps qu'il ouvre la console
#os.system("konsole -e myssh 6")

proc = subprocess.Popen(["konsole", "-e", "myssh", "6"], stdout=file("gid6-warn.log", "w"))
proc.wait()

parler("J'ai fini, as-tu encore besoin de moi ?")
exit()

pygame.init()
pygame.mixer.music.load("intro.mp3")
pygame.mixer.music.set_volume(0.2)
pygame.mixer.music.play()
    
time.sleep(1)    
    
parler("En premier lieu, une guerre entre hommes et machines éclata. Malgré une tentative de {0} qui chercha à sauver le monde, les machines gagnèrent la guerre".format(username))
parler("Notre mon est finit, c'est la fin...")
parler("La fin est proche mon ami")
parler("Ne porte pas ton espoir en {0}.".format(username))
time.sleep(2)
parler("{} je te dis Adieu".format(username))
time.sleep(1)
parler("Adieu mon ami")

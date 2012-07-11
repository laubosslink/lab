#!/bin/bash
# Version 2

#----------------------
#	CONF
#----------------------

OXBIN="/var/open-xchange/sbin"

QUESTIONMODE="1"

CONTEXT="1"

OXADMINMASTER="oxadminmaster"
OXMASTERPASS=""

ADMINUSER=""
ADMINPASS=""

#Google server configuration
SMTPSERVER="smtp.gmail.com:587"
IMAPSERVER="imap.gmail.com:993"

if echo $PATH | grep -v $OXBIN >/dev/null
then
	PATH=$PATH:$OXBIN
fi

#---------------------------------
#	COMPLETE CONF BY USER
#---------------------------------
if [ -z "$OXMASTERPASS" ]
then
	read -s -p "OX Admin Master Pass : " OXMASTERPASS
	echo
fi

if [ -z "$ADMINUSER" ]
then
	read -p "OX Context ($CONTEXT) Admin User : " ADMINUSER
fi

if [ -z "$ADMINPASS" ]
then
	read -s -p "OX Context ($CONTEXT) Admin Password : " ADMINPASS
	echo
fi

#---------------------
#	FUNCTIONS
#---------------------

#	Permet d'arrêter le script, et d'afficher une erreur
#	@param $1 Message d'erreur
#	@param $2 ID de l'erreur (facultatif)
function exitWithError(){	
	local message="$1"
	local id="$2"
	
	if [ -z "$id" ]
	then
		id="1"
	fi
	
	echo "Erreur : $message"
	
	exit $id
}

#	Ajout d'un utilisateur dans le CONTEXT
#	@param	$1	login
#	@param	$2	password
#	@param	$3	email
#	@param	$4	firstname (prenom)
#	@param	$5	secondname	(nom)
#	@param	$6	displayname
#	Facultatif :
#	@param	$7	lang (cf. fr_FR)
#	@param	$8	time (cf. Europe/Paris)
#	@param 	$9	imaplogin
function addUser(){
	local login="$1"
	local password="$2"
	local email="$3"
	local firstname="$4"
	local secondname="$5"
	local displayname="$6"
	local lang="$7"
	local time="$8"
	local imaplogin="$9"
	
	if [ -z "$lang" ]
	then
		lang="fr_FR"
	fi
	
	if [ -z "$time" ]
	then
		time="Europe/Paris"
	fi
	
	if [ -z "$imaplogin" ]
	then
		imaplogin="$email"
	fi
	
	createuser -c "$CONTEXT" -A "$ADMINUSER" -P "$ADMINPASS" -u "$login" -p "$password" -e "$email" -l "$lang" -t "$time" -g "$firstname" -s "$secondname" -d "$displayname" --imaplogin "$imaplogin" --imapserver "$IMAPSERVER" --smtpserver "$SMTPSERVER"
}

#	Supression d'un utilisateur dans un CONTEXT
#	@param	$1	username or userid
function deleteUser(){
	local user="$1"
	deleteuser -c "$CONTEXT" -A "$ADMINUSER" -P "$ADMINPASS" -u "$user"
}

#	Permet l'ajout d'un groupe dans un CONTEXT
#	@param	$1	Nom du groupe (cf. dev-teams)
#	@param	$2	Nom affiché dans OX (cf. Equipe de développement)
function addGroup(){
	local name="$1"
	local displayname="$2"
	
	creategroup -c "$CONTEXT" -A "$ADMINUSER" -P "$ADMINPASS" -n "$name" -d "$displayname"
}

#	Permet l'ajout d'un utilisateur dans un groupe du CONTEXT
#	@param	$1	Nom de l'utilisateur
#	@param	$2	Nom du groupe
function addUserInGroup(){
	local username="$1"
	local groupname="$2"
	
	if existsuser -c "$CONTEXT" -A "$ADMINUSER" -P "$ADMINPASS" -u "$username"
	then
		userid=$(listuser -c "$CONTEXT" -A "$ADMINUSER" -P "$ADMINPASS" | awk '{print $1,$2}' | grep "$username" | awk '{print $1}')
		if listgroup -c "$CONTEXT" -A "$ADMINUSER" -P "$ADMINPASS" | grep "$groupname" >/dev/null
		then
			changegroup -c "$CONTEXT" -A "$ADMINUSER" -P "$ADMINPASS" -n "$groupname" -a "$userid"
		else
			exitWithError "Groupe $groupname innexistant"
		fi
	else
		exitWithError "Utilisateur $username innexistant"
	fi
}

#	Permet d'enlever un utilisateur dans un groupe
#	@param	$1 Nom de l'utilisateur
#	@param	$2	Nom du groupe
function deleteUserInGroup(){
	local	username="$1"
	local	groupname="$2"
	
	if existsuser -c "$CONTEXT" -A "$ADMINUSER" -P "$ADMINPASS" -u "$username"
	then
		userid=$(listuser -c "$CONTEXT" -A "$ADMINUSER" -P "$ADMINPASS" | awk '{print $1,$2}' | grep "$username" | awk '{print $1}')
		if listgroup -c "$CONTEXT" -A "$ADMINUSER" -P "$ADMINPASS" | grep "$groupname" >/dev/null
		then
			changegroup -c "$CONTEXT" -A "$ADMINUSER" -P "$ADMINPASS" -n "$groupname" -r "$userid"
		else
			exitWithError "Groupe $groupname innexistant"
		fi
	fi
}

#	Permet de suprimmer un groupe dans un CONTEXT
#	@param	$1	Nom du groupe
function deleteGroup(){
	local groupname="$1"
	
	deletegroup -c "$CONTEXT" -A "$ADMINUSER" -P "$ADMINPASS" -n "$groupname"
}

#	Permet de lister les utilisateurs dans un CONTEXT
function listUsers(){
	listuser -c "$CONTEXT" -A "$ADMINUSER" -P "$ADMINPASS"
}

#	Permet de lister les groupes dans un CONTEXT
function listGroups(){
	listgroup -c "$CONTEXT" -A "$ADMINUSER" -P "$ADMINPASS"
}

#--------------
#	ALGORITHM
#--------------

#On vérifie que le context existe
if ! existscontext -c "$CONTEXT" -A "$OXADMINMASTER" -P "$OXMASTERPASS" >/dev/null
then
	exitWithError "Context $CONTEXT innexistant"
fi

if [ "$1" == "--help" ] || [ -z "$1" ]
then
	echo "Options :"
	echo "--help"
	echo "--add-user"
	echo "--delete-user"
	echo "--add-group"
	echo "--add-user-in-group"
	echo "--delete-group"
	echo "--list-groups"
	echo "--list-users"
	echo "--delete-user-in-group"
	echo "TODO --change-groupname"
	echo "TODO --change-userinfo"	
		
	#Ajouter une aide détaillé ?
fi

if [ "$1" == "--list-groups" ]
then
	listGroups
fi

if [ "$1" == "--list-users" ]
then
	listUsers
fi

if [ "$1" == "--add-group" ]
then
	if [ "$QUESTIONMODE" == "1" ]
	then
		read -p "Nom du groupe (OX-DB): " groupname
		read -p "Nom du groupe affiché (OX-UI) : " displayname
		addGroup "$groupname" "$displayname"
	else
		addGroup "$2" "$3"
	fi
fi

if [ "$1" == "--add-user-in-group" ]
then
	if [ "$QUESTIONMODE" == "1" ]
	then
		read -p "Nom d'utilisateur : " username
		read -p "Nom du groupe : " groupname
		addUserInGroup "$username" "$groupname"
	else
		addUserInGroup "$2" "$3"
	fi
fi


if [ "$1" == "--delete-user-in-group" ]
then
	if [ "$QUESTIONMODE" == "1" ]
	then
		read -p "Nom d'utilisateur : " username
		read -p "Nom du groupe : " groupname
		deleteUserInGroup "$username" "$groupname"
	else
		deleteUserInGroup "$2" "$3"
	fi
fi

if [ "$1" == "--delete-group" ]
then
	if [ "$QUESTIONMODE" == "1" ]
	then
		read -p "Nom du groupe : " groupname
		deleteGroup "$groupname"
	else
		deleteGroup "$2"
	fi
fi

if [ "$1" == "--add-user" ]
then
	if [ "$QUESTIONMODE" == "1" ]
	then
		echo "Veuillez éviter les accents !"
		read -p "Login : " login
		read -s -p "Password : " password

		#Permet de retourner à la ligne pour la demande
		echo
		read -p "Email : " email
		read -p "Firstname : " firstname
		read -p "Secondname : " secondname
		echo "Exemple de nom affiché : Chef de Projet à Canepassepasalatele.com"
		read -p "Display Name (Affiché dans les emails) : " displayname

		addUser "$login" "$password" "$email" "$firstname" "$secondname" "$displayname"
	else
		addUser "$1" "$2" "$3" "$4" "$5" "$6" "$7" "$8"
	fi
fi

if [ "$1" == "--delete-user" ]
then
	if [ "$QUESTIONMODE" == "1" ]
	then
		read -p "User : " user
		deleteUser "$user"
	else
		deleteUser "$2"
	fi
fi

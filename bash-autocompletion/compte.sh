#!/bin/bash

_compte() {
   local choix mot_courant
   case "$COMP_CWORD" in
     # si nous sommes au premier paramètres, nous donnons la liste des langues
     1) 
       choix="français anglais espagnol"
       ;;

     # second niveau, la langue a donc été choisie
     2) 
       langue=${COMP_WORDS[1]}
       case "$langue" in
         anglais)
           choix="one two three"
           ;;
         français)
           choix="un deux trois"
           ;;
         espagnol)
           choix="un dos tres"
           ;;
         *)
           choix="késako"
           ;;
       esac
       ;;
     *)
       words=()
       ;;
   esac

   # création de la liste finale de choix
   mot_courant=${COMP_WORDS[COMP_CWORD]}
   COMPREPLY=( $( compgen -W '$choix' -- $mot_courant  ) )
 }

 complete -F _compte compte

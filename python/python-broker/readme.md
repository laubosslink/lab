# HSConversion - Highshare Conversion Server

HS Conversion est basé sur une architecture client/serveur. Il permet de déléguer la conversion de fichier à un serveur[^1].

	* Le client lance une requête de conversion de fichier.
	* Le serveur réalise la conversion si il en est capable.[^2]

## Exemple d'utilisation

### Serveur

Voir server/doc/*

### Client

Voir client/doc/*

## Tests

Pour vérifier que le client/serveur fonctionne, vous pouvez executer la batterie de tests.

Vous devez ouvrir deux terminaux différents, chacun se trouvant dans 'server/', 'client/'.

```
.../server$ ./scripts/run-server.sh
```

```
.../client$./scripts/run-tests.sh
```

[^1]: Par exemple un .jpeg en .pdf
[^2]: Dépend de la présence d'une librairie capable de réaliser la conversion.

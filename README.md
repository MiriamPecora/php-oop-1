# Consegna:

Creare un file index.php in cui:
- è definita una classe ‘Movie’
    - all'interno della classe sono dichiarate delle variabili d'istanza
    - all'interno della classe è definito un costruttore
    - all'interno della classe è definito almeno un metodo
- vengono istanziati almeno due oggetti ‘Movie’ e stampati a schermo i valori delle relative proprietà
- gestite almeno una Exception nella logica dei vostri metodi

## Bonus 1:
Modificare la classe Movie in modo che accetti più di un genere.

## Bonus 2:
Creare un layout completo per stampare a schermo una lista di movies.
Facciamo attenzione all’organizzazione del codice, suddividendolo in appositi file e cartelle. Possiamo ad esempio organizzare il codice
- creando un file dedicato ai dati (tipo le array di oggetti) che potremmo chiamare db.php
- mettendo ciascuna classe nel proprio file e magari raggruppare tutte le classi in una cartella dedicata che possiamo chiamare Models/
- organizzando il layout dividendo la struttura ed i contenuti in file e parziali dedicati.

## Continuo dell'assegnazione: 

- Aggiungete il concetto di composizione, facendo revisione del genere/generi dei movies e aggiungete la classe Actor da utilizzare nei Movies.
- Ogni Movie può avere uno o più actor;
- Create (OLTRE al setter relativo a generi e attori, due metodi per aggiungere nuovi Generi / Attori al Movie)
- Utilizzate, nella rappresentazione delle informazioni, il NULL Safe operator;
- Provate a realizzare, come visto a lezione, una proprietà e un metodo statico;
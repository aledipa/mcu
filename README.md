# MCU Website - README
## _Informazioni varie_
Il sito è realizzato in stile marvel e tramite un design glassmorfico.

## Tecnologie utilizzate

- HTML
- CSS/Bootstrap
- JS/JQUERY/AJAX
- PHP
- MySQL

Vengono implementate delle API come richiesto da consegna

> • Ottenere film dall'ID
>  • Ottenere film dal titolo
>  • Ottenere film dal regista
>  • Ottenere film dall'eroe
>  • Rimuovere film dall'ID
>  • Ottenere poteri dall'eroe
>  • Controllo se si è loggati per vedere se si possono effettuare alcune funzionalità

Ognuna di questa funzionalità PHP è richiamata tramite hotlinking da AJAX

## Home

Ogni pagina del sito è realizzata in maniera nativamente responsive per desktop e mobile con boostrap

Proprietà:
- Mostra le varie azioni che si possono intraprendere (login, aggiungi film, etc.)
- Animazione accensione Iron Man
- Blocco alcune funzionalità se non si è loggati
- Quando si è loggati, per sloggarsi basta clickare in alto a sinistra sull'iniziale del proprio username e poi premere il tasto a comparsa "Log Out"


## Login

Proprietà:
- Animazione caricamento
- Notifica di successo o fallimento login
- Collegamento a signup


## Signup

Proprietà:
- Animazione caricamento
- Notifica di successo o fallimento registrazione
- Evidenzia la zona errata
- Collegamento a login

## Add Hero

Proprietà:
- Non è possibile aprirla senza essere loggati, se lo si fa tramite link si verrà reinderizzati alla home
- L'inserimento del film a cui è associato è facoltativo
- Se lo si associa ad un film non esistente, porta alla pagina di creazione dei film (Add Movie) e compila in automatico i campi noti, fatto ciò creerà il nuovo eroe e lo assocerà al nuovo film in automatico
- Notifica di successo o di errore di aggiunta eroe

## Add Movie

Proprietà:
- Non è possibile aprirla senza essere loggati, se lo si fa tramite link si verrà reinderizzati alla home
- Se lo si associa ad un eroe non esistente, porta alla pagina di creazione dei eroe (Add Hero) e compila in automatico i campi noti, fatto ciò creerà il nuovo film e lo assocerà al nuovo eroe in automatico
- Notifica di successo o di errore di aggiunta film

## Find Movie

Proprietà:
- Non è possibile rimuovere film senza essere loggati, se si tenta di farlo si verrà reinderizzati alla pagina di login
- Ogni dato è aggiornato LIVE
- È possibile cercare i film da 
  - Titolo
  - Eroe
  - Regista
  - ID
- La tabella mostrerà le seguenti informazioni di ogni film
  - ID
  - Titolo
  - Durata film
  - Data di pubblicazione
  - Regista
  - Eroi presenti

*N.B.* È possibile visualizzare i dettagli di ogni eroe presente semplicemente passandoci sopra con il cursore in hover



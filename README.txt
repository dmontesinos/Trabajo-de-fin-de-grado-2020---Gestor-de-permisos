Si vols utilitzar l'accés al CAS a la màquina deic-projectes 
	* La màquina ja està configurada
	* Nomès cal que copiïs la carpeta /web dins /var/www/
	* Renombra /var/www/web amb el nom que sigui addient 
	* L'arxiu /var/www/<la teva carpeta>/index.php ja té la 
	capçalera necessària per a  cridar al CAS per que realitzi 
	l'autenticació

Si vols utilitzar l'accés al CAS a qualsevol altra màquina
	* Copia tot el contingut de l'arxiu comprimit a /var/www/ 
	* Instal·la php5curl
	* Copia l'arxiu DigiCertCA.crt que hi ha a la carpeta
	/certificat de l'arxiu comprimit al directori  
	/usr/local/share/ca-certificates i executa 
	update-ca-certificates per afegir-ho
	* Renombra /var/www/web amb el nom que sigui addient 
	* L'arxiu /var/www/<la teva carpeta>/index.php ja té la 
	capçalera necessària per a  cridar al CAS per que realitzi 
	l'autenticació

Tingues en compte:
	* L'arxiu /ssl/2048_star_uab_cat.crt caduca el 21/04/16
	caldrà demanar un altre nou quan arribi aquesta data
	* Si la màquina on ho instal·les no és deic-projectes, 
	hauràs de demanar a Joaquim.Campuzano@uab.cat o a 
	Sergio.Morales@uab.cat que l'afegeixin al l'accés permés
	al sistema d'autenticació

contacte: adria.sanchez@deic.uab.cat

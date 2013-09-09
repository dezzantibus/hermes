<?php

class Albanian
{

	const ERROR = 'ka një gabim';

	const MESSAGE = 'Post nga Hermes';

	const ERROR_BOGUS_EMAIL		= '%s non e\' un\'email valida';
	const ERROR_IS_NOT_NUMERIC	= '%s deve essere un numero valido';
	const ERROR_MISMATCH_PASS   = 'Le due password sono diverse';
	const ERROR_REQUIRED_VALUE	= '%s non e\' un dato opzionale';
	const ERROR_TOO_LARGE		= '%s e\' troppo grande';
	const ERROR_TOO_LONG		= '%s e\' troppo lungo';
	const ERROR_TOO_SHORT		= '%s e\' troppo corto';
	const ERROR_TOO_SMALL		= '%s e\' troppo piccolo';

	const MEX_ARTICLE     = 'L\'articolo';
	const MEX_CATEGORY    = 'La categoria';
	const MEX_EMAIL       = 'L\'email';
	const MEX_FNAME       = 'Il nome';
	const MEX_JOURNALIST  = 'L\'autore';
	const MEX_LNAME       = 'Il cognome';
	const MEX_MANAGER     = 'Il supervisore';
	const MEX_PASSWORD    = 'La password';
    const MEX_BRIEF       = 'Il breve';
    const MEX_SUBTITLE    = 'Il sottotitolo';
	const MEX_TEXT        = 'Il testo';
	const MEX_TITLE       = 'Il titolo';
	const MEX_USER        = 'L\'utente';
	const MEX_USERNAME    = 'Il nome utente';

	const FORM_CATEGORY     = 'Categoria';
	const FORM_EMAIL        = 'Email';
	const FORM_FNAME        = 'Nome';
	const FORM_JOURNALIST   = 'Giornalista';
	const FORM_LNAME        = 'Cognome';
	const FORM_PASSWORD     = 'Password';
	const FORM_PWD_CONFIRM  = 'Conferma password';
	const FORM_SUBTITLE     = 'Sottotitolo';
	const FORM_TEXT         = 'Testo';
	const FORM_TITLE        = 'Titolo';
	const FORM_USERNAME     = 'Nome utente';

	const READ_MORE     = 'Continua a leggere';
	const POPULAR_NEWS  = 'Notizie popolari';
	const HIGHLIGHTED   = 'In evidenza';
	const LATEST        = 'Ultimi articoli';

    const ADMIN_MENU_NEW    = 'Nuovo';
    const ADMIN_MENU_EDIT   = 'Modifica';
    const ADMIN_MENU_DELETE = 'Cancella';
    const ADMIN_MENU_SAVE   = 'Salva';

    const ADMIN_MENU_CATEGORY    = 'Categorie';
    const ADMIN_MENU_ARTICLE     = 'Articoli';
    const ADMIN_MENU_JOURNALIST  = 'Giornalisti';
    const ADMIN_MENU_NEWSLETTER  = 'Newsletter';
	
    const MEX_DELETE        = 'Sicuro di voler cancellare?';
    const MEX_SELECT_OPTION = 'Selezionare opzione';

    const LABEL_CATEGORY	= 'Categoria';
    const LABEL_DATE		= 'Data';
    const LABEL_EMAIL		= 'Email';
    const LABEL_FNAME		= 'Nome';
    const LABEL_JOURNALIST	= 'Giornalista';
    const LABEL_LNAME	    = 'Cognome';
	const LABEL_TITLE		= 'Titolo';

    const NEW_ARTICLE    = 'Nuovo articolo';
    const NEW_JOURNALIST = 'Nuovo giornalista';

    static $month = array(
		'english'  => array('January', 'February', 'March', 'April', 'May', 'June',	'July',   'August', 'September', 'October', 'November', 'December'),
		'albanian' => array('janar',   'shkurt',   'mars',  'prill', 'maj', 'qershor', 'korrik', 'gusht',  'shtator',   'tetor',   'nëntor',   'dhjetor'),
	);

	static $day = array(
		'english'  => array('Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday',   'Saturday', 'Sunday'),
		'albanian' => array('e hënë', 'e martë', 'e mërkurë', 'e enjte',  'e premte', 'e shtunë', 'e diel'),
	);

}
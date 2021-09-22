<?php
session_start();

$sessionData = $_SESSION['order_data'];
if (!empty($sessionData)) {
    $sessionData = json_decode($sessionData);
} else {
    $sessionData = new STDClass();
    $sessionData->name = null;
    $sessionData->phone = null;
    $sessionData->remote_ip = null;
    $sessionData->geo = null;
    $sessionData->address = null;
    $sessionData->referer = null;
}
$name = $sessionData->name;
$phone = $sessionData->phone;
$referer = $sessionData->referer;
$geo = $sessionData->geo;

$messages = array(
    'ru' => array(
        'message_title_success' => 'Заявка отправлена',
        'message_title_fail' => 'Ошибка',
        'message_fail' => 'Ошибка! Ваш заказ не принят!',
        'message_try_again' => 'Попробуйте еще раз!',
        'message_order_id' => 'ПОЗДРАВЛЯЕМ! ВАШ ЗАКАЗ № '.$order_id.' ПРИНЯТ!',
        'message_contact' => 'В ближайшее время с вами свяжется оператор для подтверждения заказа. Пожалуйста, включите ваш контактный телефон.',
        'message_check_data' => 'Пожалуйста, проверьте правильность введенной вами информации',
        'message_fio' => 'Ф.И.O.',
        'message_phone' => 'Телефон',
        'message_correct' => 'Если вы ошиблись при заполнении формы, то, пожалуйста, <a href="'.$referer.'">заполните заявку еще раз</a>',
        'message_also' => 'С этим товаром покупают также:',
    ),
    'rs' => array(
        'message_title_success' => 'Zahtev је послат',
        'message_title_fail' => 'Грешка',
        'message_fail' => 'Грешка! Ваша поруџбина није прихваћена.',
        'message_try_again' => 'Покушајте поново!',
        'message_order_id' => 'Честитамо! Ваша поруџбина бр. '.$order_id.' је прихваћена.',
        'message_contact' => 'Ускоро ће Вас контактирати оператер ради потврде поруџбине. Молимо Вас да укључите контактни телефон.',
        'message_check_data' => 'Молимо Вас да проверите унете информације.',
        'message_fio' => 'Пуно име и презиме',
        'message_phone' => 'Телефон',
        'message_correct' => 'Уколико сте погрешили приликом попуњавања формулара, молимо Вас да <a href="'.$referer.'">попуните формулар поново.</a>',
        'message_also' => 'Са овим робу купују такође:',
    ),
    'hr' => array(
        'message_title_success' => 'Zahtev je poslat',
        'message_title_fail' => 'Greška',
        'message_fail' => 'Greška ! Vaša porudžbina nije prihvaćena !',
        'message_try_again' => 'Pokušajte ponovo !',
        'message_order_id' => 'Čestitamo ! Vaša porudžbina broj '.$order_id.' prihvaćena!',
        'message_contact' => 'Uskoro operater će vas kontaktirati radi potvrde porudžbine. Molimo Vas da ukljućute svoj telefon .',
        'message_check_data' => 'Proverite informacije koju ste naveli',
        'message_fio' => 'Ime i prezime',
        'message_phone' => 'Telefon',
        'message_correct' => 'Ako napravite grešku prilikom popunjavanja formulara , molimo <a href="'.$referer.'"> popuniti formular ponovo</a>',
        'message_also' => 'S tim roba kupiti i:',
    ),
    'mk' => array(
        'message_title_success' => 'Барањето е испратено',
        'message_title_fail' => 'Грешка',
        'message_fail' => 'Грешка! Вашата нарачка не е примена',
        'message_try_again' => 'Пробајте уште еднаш!',
        'message_order_id' => 'Ви честитам! Вашата нарачка № '.$order_id.' е примена!',
        'message_contact' => 'Во најбрзо време ќе ве контактира оператор за потврдување на нарачката.Ќе ве молам држете го вашиот контакт телефон вклучен.',
        'message_check_data' => 'Ќе ве молам проверете ја точноста на внесените податоци.',
        'message_fio' => 'Име и презиме',
        'message_phone' => 'Телефон',
        'message_correct' => 'Доколку сте направиле грешка при пополнување на формуларот, <a href="'.$referer.'">ве молиме да го пополните формуларот повторно.</a>',
        'message_also' => 'Со овој производ, исто така се купи:',
    ),
    'es' => array(
        'message_title_success' => 'Gracias! Su pedido ha sido aceptado!',
        'message_title_fail' => 'Error!',
        'message_fail' => 'Error! Su pedido ha sido aceptado!',
        'message_try_again' => 'Inténtelo de nuevo!',
        'message_order_id' => 'ENHORABUENA! SU PEDIDO № '.$order_id.' FUE REALIZADO!',
        'message_contact' => 'Pronto nuestro operador se pondrá en contacto con usted para confirmar el pedido. Por favor, mantenga su teléfono disponible.',
        'message_check_data' => 'Por favor, compruebe que la información indicada en el formulario sea correcta.',
        'message_fio' => 'Nombre y Apellidos',
        'message_phone' => 'Número de teléfono',
        'message_correct' => 'Si comete un error en el formulario, <a href="'.$referer.'">rellenelo nuevamente con los datos correctos.</a>',
        'message_also' => 'Con este artículo también compran:',
    ),
    'it' => array(
        'message_title_success' => 'Richiesta inviata',
        'message_title_fail' => 'Errore!',
        'message_fail' => 'Errore! L\'ordine non è stato accettato.',
        'message_try_again' => 'Riprova!',
        'message_order_id' => 'COMPLIMENTI! IL TUO ORDINE № '.$order_id.' È STATO ACCETTATO!',
        'message_contact' => 'Prossimamente l\'operatore la contatterà per confermare l\'ordine. Si prega di non staccare il numero di contatto.',
        'message_check_data' => 'Pregiamo di verificare che le informazioni inserite siano corrette.',
        'message_fio' => 'Nome',
        'message_phone' => 'Telefono',
        'message_correct' => 'Se hai commesso un errore durante la compilazione del modulo, <a href="'.$referer.'">si prega di compilare nuovamente.</a>',
        'message_also' => 'I nostri clienti comprano assieme anche:',
    ),
    'en' => array(
        'message_title_success' => 'Order sent',
        'message_title_fail' => 'Error',
        'message_fail' => 'Error! Your order is not accepted!',
        'message_try_again' => 'Try again!',
        'message_order_id' => 'CONGRATULATIONS! YOUR ORDER № '.$order_id.' ACCEPTED!',
        'message_contact' => 'Operator will shortly contact you to confirm your order.',
        'message_check_data' => 'Please check the correctness of the data you entered.',
        'message_fio' => 'Full name',
        'message_phone' => 'Mobile Phone',
        'message_correct' => 'If you have made a mistake in filling the form, please <a href="'.$referer.'">fill it once again</a>',
        'message_also' => 'With this product also buy:',
    ),
    'pt' => array(
        'message_title_success' => 'Pedido submetido',
        'message_title_fail' => 'ERRO!',
        'message_fail' => 'ERRO! SEU PEDIDO NÃO É ACEITO! ',
        'message_try_again' => 'Tente novamente',
        'message_order_id' => 'PARABÉNS! SEU PEDIDO '.$order_id.' ACEITO!',
        'message_contact' => 'Um operador entrará em contato com você em breve para confirmar o pedido.Por favor mantenha o seu telefone ligado, para que possamos contactar-lhe.',
        'message_check_data' => 'Verifique se as informações inseridas estão corretas',
        'message_fio' => 'Nome e apelido',
        'message_phone' => 'Número de telefone',
        'message_correct' => 'Se você cometeu um erro ao preencher o formulário, <a href="'.$referer.'">por favor preencha o formulário novamente</a>',
        'message_also' => 'Também comprado com este produto:',
    ),
    'id' => array(
        'message_title_success' => 'Selamat!',
        'message_title_fail' => 'Kesalahan!',
        'message_fail' => 'Kesalahan! Pesanan anda tidak diterima!',
        'message_try_again' => 'Coba lagi',
        'message_order_id' => 'Selamat! Pesanan anda diterima № '.$order_id.'!',
        'message_contact' => 'Dalam waktu dekat  Anda akan dikontak oleh sang operator untuk mengonfirmasi pesanan Anda. ',
        'message_check_data' => 'Silhakan periksa kebenaran informasi yang Anda masukkan!',
        'message_fio' => 'Nama',
        'message_phone' => ' Telpon',
        'message_correct' => 'Kalau Anda salah waktu mengisi formulir, <a href="'.$referer.'">Anda bisa mengisi formulir sekali lagi</a>',
        'message_also' => 'Dengan produk ini juga membeli:',
    ),
    'gr' => array(
        'message_title_success' => 'υποβληθείσα αίτηση',
        'message_title_fail' => 'Λαθος!',
        'message_fail' => 'Λαθος! Η παραγγελια σας δεν εγινε αποδεκτη!',
        'message_try_again' => 'δοκιμάστε ξανά!',
        'message_order_id' => 'ΣΥΓΧΑΡΗΤΗΡΙΑ! Η ΠΑΡΑΓΓΕΛΙΑ ΣΑΣ #'.$order_id.' ΕΓΙΝΕ ΑΠΟΔΕΚΤΗ',
        'message_contact' => 'Ο χειριστής μας θα επικοινωνήσει μαζι σας το συντομότερο για επιβεβαιωση παραγγελιας.Παρακαλω, ελεγξτε ο αριθμος σας να ειναι διαθεσημος.',
        'message_check_data' => 'Παρακαλω, βεβαιωθειτε οτι τα στοιχεια σας ειναι σωστα',
        'message_fio' => 'Όνομα',
        'message_phone' => 'Τηλέφωνο',
        'message_correct' => 'Αν κάνατε κάποιο λάθος στην αίτηση παραγγελίας, <a href="'.$referer.'">παρακαλούμε, συμπληρώστε ξανά.</a>',
        'message_also' => ' Επίσης μπορειτε να αγοράσετε με αυτό το προϊόν:',
    ),
    'ro' => array(
        'message_title_success' => 'Заявка отправлена',
        'message_title_fail' => 'Eroare!',
        'message_fail' => 'Eroare! Comanda dvs. nu a fost acceptată!',
        'message_try_again' => 'Încercați din nou!',
        'message_order_id' => 'VĂ FELICITĂM! COMANDA DVS № '.$order_id.' A FOST ACCEPTATĂ!',
        'message_contact' => 'Un operator vă va contacta în scurt timp pentru a confirma comanda. 
Vă rugăm să activați numărul dvs. de contact.',
        'message_check_data' => 'Vă rugăm să verificați corectitudinea datelor introduse',
        'message_fio' => 'Nume, Prenume',
        'message_phone' => 'Numărul de telefon',
        'message_correct' => 'Dacă ați găsit gresșeli, <a href="'.$referer.'">atunci vă rugăm să completați din nou formularul</a>',
        'message_also' => 'Împreună cu acest produs puteți procura:',
    ),
    'bg' => array(
        'message_title_success' => 'Заявлението е изпратено',
        'message_title_fail' => 'Грешка!',
        'message_fail' => 'Грешка! Неуспешна поръчка',
        'message_try_again' => 'Опитайте отново',
        'message_order_id' => 'ПOЗДРАВЛЕНИЯ! ВАШАТА ПОРЪЧКА № '.$order_id.' Е ПРИЕТА!',
        'message_contact' => 'Оператор ще се свърже с вас скоро, за да потвърди поръчката. Моля, включете своя телефон.',
        'message_check_data' => 'Моля, проверете дали въведената информация е вярна.',
        'message_fio' => 'Име и фамилия',
        'message_phone' => 'Телефонен номер',
        'message_correct' => 'Ако сте направили грешка при попълването на формуляра, <a href="'.$referer.'">моля, попълнете отново заявлението</a>',
        'message_also' => 'С този артикул често купуват:',
    ),
    'cz' => array(
        'message_title_success' => 'Žádost byla odeslána',
        'message_title_fail' => 'CHYBA!',
        'message_fail' => 'CHYBA! VAŠE OBJEDNÁVKA NENÍ PŘIJATA!',
        'message_try_again' => 'Zkuste to znovu',
        'message_order_id' => 'DĚKUJI! VAŠE OBJEDNÁVKA ČÍSLO № '.$order_id.' BYLA PŘIJATA!',
        'message_contact' => 'Operátor bude Vás kontaktovat v nejbližší době aby potvrdít objednávku.Zapněte prosím mobilní telefon.',
        'message_check_data' => 'Prosím, zkontrolujte zadané údaje.',
        'message_fio' => 'Jméno',
        'message_phone' => 'Mobilní telefon',
        'message_correct' => 'Pokud jste při vyplňování formuláře udělali chybu, <a href="'.$referer.'">vyplňte prosím žádost znovu.</a>',
        'message_also' => 'Zákazníci, kteří koupili tento produkt, si také zakoupili:',
    ),
    'sk' => array(
        'message_title_success' => 'Žiadosť bola odoslaná',
        'message_title_fail' => 'CHYBA!',
        'message_fail' => 'CHYBA! VAŠE OBJEDNÁVKA NENÍ PŘIJATA!',
        'message_try_again' => 'Skúste to znova',
        'message_order_id' => 'ĎAKUJEM! VAŠA OBJEDNÁVKA ČÍSLO № '.$order_id.' BOLA PRIJATÁ!',
        'message_contact' => 'Operátor bude Vás kontaktovať v najbližšej dobe aby potvrdiť objednávku.Zapnite prosím mobilný telefón.',
        'message_check_data' => 'Prosím, zkontrolujte zadané údaje.',
        'message_fio' => 'Meno',
        'message_phone' => 'Mobilný telefón',
        'message_correct' => 'Ak ste pri vypĺňaní formulára urobili chybu, <a href="'.$referer.'">vyplňte prosím žiadosť znovu.</a>',
        'message_also' => 'Zákazníci, ktorí kúpili tento produkt, si tiež kúpili:',
    ),
     'pl' => array(
        'message_title_success' => 'Zamówienie jest przyjęte',
        'message_title_fail' => 'Błąd',
        'message_fail' => 'Błąd! Twoje zamówienie nie jest przyjęte!',
        'message_try_again' => 'Spróbuj ponownie!',
        'message_order_id' => 'TWOJE ZAMÓWIENIE № '.$order_id.' ZOSTAŁO AKCEPTOWANE',
        'message_contact' => 'йNasz operator skontaktuje się z Tobą w celu potwierdzenia zamówienia. Sprawdź, czy wprowadzone dane są poprawne.',
        'message_check_data' => 'Sprawdź, czy wprowadzone dane są poprawne.',
        'message_fio' => 'Imię',
        'message_phone' => 'Numer telefonu',
        'message_correct' => 'Jeśli popełniłeś błąd podczas wypełniania aplikacji, <a href="'.$referer.'">wypełnij  ponownie</a>',
        'message_also' => 'Klienci, którzy kupili ten produkt, kupili również::',
    ),
      'al' => array(
        'message_title_success' => 'Mesazhi u dërgua',
        'message_title_fail' => 'GABIM',
        'message_fail' => 'GABIM! POROSIA NUK U MOR!!',
        'message_try_again' => 'Provoni përsëri!',
        'message_order_id' => 'URIME! POROSIA JUAJ № '.$order_id.' U KRYE ME SUKSES!',
        'message_contact' => 'Operatori do t`ju kontaktoje së shpejti për të konfirmuar porosinë.',
        'message_check_data' => 'Ju lutem, kontrolloni saktësinë e të dhënave',
        'message_fio' => 'Emër',
        'message_phone' => 'Numri i telefonit',
        'message_correct' => 'Në raste së keni bërë gabim duke plotësuar formën <a href="'.$referer.'">filloni nga e para.</a>',
        'message_also' => 'Më këtë produkt shpesh blihen:',
    ),
      'xk' => array(
        'message_title_success' => 'Mesazhi u dërgua',
        'message_title_fail' => 'GABIM',
        'message_fail' => 'GABIM! POROSIA NUK U MOR!!',
        'message_try_again' => 'Provoni përsëri!',
        'message_order_id' => 'URIME! POROSIA JUAJ № '.$order_id.' U KRYE ME SUKSES!',
        'message_contact' => 'Operatori do t`ju kontaktoje së shpejti për të konfirmuar porosinë.',
        'message_check_data' => 'Ju lutem, kontrolloni saktësinë e të dhënave',
        'message_fio' => 'Emër',
        'message_phone' => 'Numri i telefonit',
        'message_correct' => 'Në raste së keni bërë gabim duke plotësuar formën <a href="'.$referer.'">filloni nga e para.</a>',
        'message_also' => 'Më këtë produkt shpesh blihen:',
     ),
        'hu' => array(
        'message_title_success' => 'Megrendelés elküldve',
        'message_title_fail' => 'Hiba!',
        'message_fail' => 'Hiba! Megrendelése nincs elfogadva!',
        'message_try_again' => 'Próbálja meg újra!',
        'message_order_id' => 'GRATULÁLUNK! AZ ÖN № '.$order_id.' SZÁMÚ RENDELÉSÉT FELVETTÜK!',
        'message_contact' => 'Az ügyintézőnk hamarosan felveszi Önnel a kapcsolatot a megrendelés megerősítése céljából. Kérjük, legyen elérhető a megadott telefonszámon.',
        'message_check_data' => 'Kérjük, ellenőrizze a megadott adatok helyességét',
        'message_fio' => 'Utónév',
        'message_phone' => 'Telefon',
        'message_correct' => 'Ha hibázott az űrlap kitöltésekor, akkor kérjük,  <a href="'.$referer.'">töltse ki újra a megrendelőt</a>',
        'message_also' => 'Valamint ezzel a termékkel együtt vásárolják:',
    ),
      'br' => array(
        'message_title_success' => 'Gracias! Su pedido ha sido aceptado!',
        'message_title_fail' => 'Error!',
        'message_fail' => 'Error! Su pedido ha sido aceptado!',
        'message_try_again' => 'Inténtelo de nuevo!',
        'message_order_id' => 'ENHORABUENA! SU PEDIDO № '.$order_id.' FUE REALIZADO!',
        'message_contact' => 'Pronto nuestro operador se pondrá en contacto con usted para confirmar el pedido. Por favor, mantenga su teléfono disponible.',
        'message_check_data' => 'Por favor, compruebe que la información indicada en el formulario sea correcta.',
        'message_fio' => 'Nombre y Apellidos',
        'message_phone' => 'Número de teléfono',
        'message_correct' => 'Si comete un error en el formulario, <a href="'.$referer.'">rellenelo nuevamente con los datos correctos.</a>',
        'message_also' => 'Con este artículo también compran:',
    ),
      'mx' => array(
        'message_title_success' => 'Gracias! Su pedido ha sido aceptado!',
        'message_title_fail' => 'Error!',
        'message_fail' => 'Error! Su pedido ha sido aceptado!',
        'message_try_again' => 'Inténtelo de nuevo!',
        'message_order_id' => 'ENHORABUENA! SU PEDIDO № '.$order_id.' FUE REALIZADO!',
        'message_contact' => 'Pronto nuestro operador se pondrá en contacto con usted para confirmar el pedido. Por favor, mantenga su teléfono disponible.',
        'message_check_data' => 'Por favor, compruebe que la información indicada en el formulario sea correcta.',
        'message_fio' => 'Nombre y Apellidos',
        'message_phone' => 'Número de teléfono',
        'message_correct' => 'Si comete un error en el formulario, <a href="'.$referer.'">rellenelo nuevamente con los datos correctos.</a>',
        'message_also' => 'Con este artículo también compran:',
    ),
      'pe' => array(
        'message_title_success' => 'Gracias! Su pedido ha sido aceptado!',
        'message_title_fail' => 'Error!',
        'message_fail' => 'Error! Su pedido ha sido aceptado!',
        'message_try_again' => 'Inténtelo de nuevo!',
        'message_order_id' => 'ENHORABUENA! SU PEDIDO № '.$order_id.' FUE REALIZADO!',
        'message_contact' => 'Pronto nuestro operador se pondrá en contacto con usted para confirmar el pedido. Por favor, mantenga su teléfono disponible.',
        'message_check_data' => 'Por favor, compruebe que la información indicada en el formulario sea correcta.',
        'message_fio' => 'Nombre y Apellidos',
        'message_phone' => 'Número de teléfono',
        'message_correct' => 'Si comete un error en el formulario, <a href="'.$referer.'">rellenelo nuevamente con los datos correctos.</a>',
        'message_also' => 'Con este artículo también compran:',
    ),
      'co' => array(
        'message_title_success' => 'Gracias! Su pedido ha sido aceptado!',
        'message_title_fail' => 'Error!',
        'message_fail' => 'Error! Su pedido ha sido aceptado!',
        'message_try_again' => 'Inténtelo de nuevo!',
        'message_order_id' => 'ENHORABUENA! SU PEDIDO № '.$order_id.' FUE REALIZADO!',
        'message_contact' => 'Pronto nuestro operador se pondrá en contacto con usted para confirmar el pedido. Por favor, mantenga su teléfono disponible.',
        'message_check_data' => 'Por favor, compruebe que la información indicada en el formulario sea correcta.',
        'message_fio' => 'Nombre y Apellidos',
        'message_phone' => 'Número de teléfono',
        'message_correct' => 'Si comete un error en el formulario, <a href="'.$referer.'">rellenelo nuevamente con los datos correctos.</a>',
        'message_also' => 'Con este artículo también compran:',
    ),
      'cl' => array(
        'message_title_success' => 'Gracias! Su pedido ha sido aceptado!',
        'message_title_fail' => 'Error!',
        'message_fail' => 'Error! Su pedido ha sido aceptado!',
        'message_try_again' => 'Inténtelo de nuevo!',
        'message_order_id' => 'ENHORABUENA! SU PEDIDO № '.$order_id.' FUE REALIZADO!',
        'message_contact' => 'Pronto nuestro operador se pondrá en contacto con usted para confirmar el pedido. Por favor, mantenga su teléfono disponible.',
        'message_check_data' => 'Por favor, compruebe que la información indicada en el formulario sea correcta.',
        'message_fio' => 'Nombre y Apellidos',
        'message_phone' => 'Número de teléfono',
        'message_correct' => 'Si comete un error en el formulario, <a href="'.$referer.'">rellenelo nuevamente con los datos correctos.</a>',
        'message_also' => 'Con este artículo también compran:',
    ),
);
$messages['by'] = $messages['ru'];
$messages['ua'] = $messages['ru'];
$messages['kz'] = $messages['ru'];
$messages['kg'] = $messages['ru'];
$messages['am'] = $messages['ru'];
$messages['az'] = $messages['ru'];
$messages['ge'] = $messages['ru'];
$messages['md'] = $messages['ru'];
$messages['hu'] = $messages['en'];
$messages['ba'] = $messages['rs'];

$mess_geo = empty($messages[$geo]) ? 'en' : $geo;
?><!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
    <link type="text/css" rel="stylesheet" href="leadr-css/style.css" />
    <title><?= $messages[$mess_geo]['message_title_fail'] ?></title>
</head>
<body>
<div class="wrap_block_success">
    <div class="block_success">
        <h2><?= $messages[$mess_geo]['message_fail'] ?></h2>
        <h3><?= $messages[$mess_geo]['message_check_data'] ?></h3>
        <div class="wrap_list_info">
            <ul class="list_info">
                <li><span><?= $messages[$mess_geo]['message_fio'] ?>:</span> <?php echo $name; ?></li>
                <li><span><?= $messages[$mess_geo]['message_phone'] ?>:</span> <?php echo $phone; ?></li>
            </ul>
        </div>
        <p class="fail"><?php echo $messages[$mess_geo]['message_correct'] ?></p>
    </div>
</div>
</body>
</html>
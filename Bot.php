<?php
///////////////////////////////////////////
//https://api.telegram.org/bot<token>/setwebhook?url=<url>

$botToken = "1929558096:AAGtGMMQW9P60hIdrs7oFsj-SuV7St4OzAA"; // INGRESA EL TOKEN DE TU BOT
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
$info = json_encode($update, JSON_PRETTY_PRINT);

//////////////////////////////////////////////
date_default_timezone_set('America/Lima');

#ARCHIVOS REQUERIDOS

    require_once('Functions.php');

#IDS DE LOS OWNERS

    $My_ID = ''; #AQUI VA TU ID, VARIABLE NECESARIA PARA AGREGAR NUEVOS USERS O GRUPOS.

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

    #COMANDO DE INICIO

    if (strpos($message, "!start") === 0 || strpos($message, "/start") === 0) {
        $message = "<b>¡Hola @$username! Lastimosamente este chat no se encuentra autorizado para usar este bot. Si estas interesado en tener acceso ingrese a @ElainaSellers y seleccione su vendedor de preferencia.</b>";
        EnviarMensaje($chatId, $message, $message_id);
        exit();
    }

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
?>
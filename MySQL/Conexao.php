<?php

error_reporting(0);
/*
 * Api de solicitações web desenvolvida para PrivateGamesBrasil
 * Desenvolvido por Rafael Henrique da Silva.
 * Whatsapp: +1 (941) 216-6633.
 * Skype: .
 * Email: fael.co.sa@gmail.com.
 * Qualquer duvida de uso leia a documentação, caso restem duvidas entre em contato por um dos meios acima.
 */
try {

    $dbapi = new PDO('mysql:host=localhost;port=3306;dbname=api', "root", "12345678");
//print  nl2br("\nAPI OK");
} catch (PDOException $e) {
    // print nl2br("\nError!: " . $e->getMessage());
}

try {
    $dbrag = new PDO('mysql:host=ragnarok.pgbrasil.net;port=3306;dbname=dbragpgbrasilmid', "api", "c10437be");
//print  nl2br("\nRagnarok OK");
} catch (PDOException $e) {
    // print nl2br("\nError!: " . $e->getMessage());
}

try {
    $dblin = new PDO('mysql:host=localhost;port=3306;dbname=lineage', "root", "c10437be");
//print  nl2br("\nLineage II OK");
} catch (PDOException $e) {
    // print nl2br("\nError!: " . $e->getMessage());
}

try {
    $dbeod = new PDO('mysql:host=localhost;port=3306;dbname=eodemons', "root", "c10437be");
//print  nl2br("\nEudemons OK");
} catch (PDOException $e) {
    // print nl2br("\nError!: " . $e->getMessage());
}
?>
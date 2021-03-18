<?php

/**
 * Retourne bdds Mysql
 *
 * @return array
 */
function mysqlGetDatabases(): array
{
    $dbs = [];
    exec('sudo mysql -e \'show databases\' -s --skip-column-names', $dbs);
    $dbs = array_filter($dbs,
        function ($db) {
        return !in_array($db, ['sys', 'information_schema', 'mysql', 'performance_schema', 'Database']);
    });
    return array_values($dbs);
}

function mysqlDumpDatabase($dbname, $outpath): bool
{
    $out = '';
    $end = date('Y-m-d-H-i-s') . "-$dbname.sql";
    $fout = "$outpath/mysql_" . $end;
    exec("mysqldump $dbname > $fout", $out);
    if(file_exists($fout)) {
        return true;
    }
    return false;
}

/**
 * Regarde si le script est executé en root (ou sudo)
 * @return bool
 */
function runningAsRoot(): bool
{
    $who = 9999;
    exec('id -u', $who);
    if($who[0] === "0") {
        return true;
    }
    return false;
}

/**
 * Coupe le script si le script n'a pas les droit root
 * @param int $errorCode
 */
function exitIfNotRoot($errorCode = 1): void
{
    if(!runningAsRoot()) {
        print 'Veuillez executer ce script en root';
        exit($errorCode);
    }
}
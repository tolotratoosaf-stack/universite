<?php
    $host = 'localhost';
    $dbname = 'universite';
    $charset = 'utf8mb4';
    $user = 'root';
    $mdp = '';

    $pdo = new PDO(
        "mysql:host=$host;dbname=$dbname;charset=$charset",
        $user,
        $mdp,
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]
    );

    function getData(string $sql, array $params = []):array {
        $STATEMENT = $GLOBALS["pdo"] -> prepare($sql);

        empty($params) ? $STATEMENT -> execute() : $STATEMENT -> execute($params);

        $resultat = $STATEMENT -> fetchAll();

        return $resultat;
    }

    function sendData(string $sql, array $params = []) {
        $STATEMENT = $GLOBALS['pdo'] -> prepare($sql);
        $STATEMENT -> execute($params);
    }
?>
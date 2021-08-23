<?php

    $consMensal = ($_POST["consumo"]*$_POST["hrdia"]/1000)*date("t");
    $nome = $_POST["nome"];
    $dados = ["nome" => $_POST["nome"],"consumoMensal" => $consMensal];

    $myfile = fopen("arquivo.txt", "a");
    fwrite($myfile, "nome: ".$nome);
    fwrite($myfile, " - Consumo mensal(Kw/h):". $consMensal."\n");

    header("Location: index.html");

    session_start();
    $consFinal =$_SESSION['teste'] + $consMensal;
    $_SESSION['teste'] = $consFinal;

    if($_GET["flag"] == 1){
        fwrite($myfile," ---Consumo Final: ".$_SESSION['teste']."---      "."\n\n\n");
        $_SESSION['teste'] = 0;
        header("Location: arquivo.txt");
    }

fclose($myfile);
?>
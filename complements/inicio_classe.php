<?php
//Startando Sessão
session_start();
//Padronização de Horario e linguagem
date_default_timezone_set('America/Sao_Paulo');
header("Content-type: text/html; charset=utf-8");

//Puxando variável de conexão
include_once '../conexao_bd.php';
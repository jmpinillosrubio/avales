<?php

$fp = fopen("dni_votos.txt", "a"); //Almacena el voto, si el fichero está bloqueado continua intentandolo cada segundo.
    if (flock($fp, LOCK_EX | LOCK_NB)) {
		echo "Bloqueando fichero";
        sleep(30);
        flock($fp, LOCK_UN);
		echo "Fichero desbloqueado";
    } 
?>
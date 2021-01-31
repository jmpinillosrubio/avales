<?php
$voto=$_REQUEST[voto]."\r\n";
$dni=$_REQUEST[dni];
$voto1=$_REQUEST[1];
$voto2=$_REQUEST[2];
$voto3=$_REQUEST[3];
$voto4=$_REQUEST[4];
$voto5=$_REQUEST[5];
$tel_envio=$_REQUEST[telefono];
$nombre=$_REQUEST[nombre];
$apellidos=$_REQUEST[apellidos];


$control_voto=false;

//La siguiente parte controla que el voto no se encuentre ya en el sistema para evitar que pueda volver a votar utilizando el botón de atrás del navegador. 
$dni_votos = fopen("dni_votos.txt", "r") or exit("Error abriendo fichero listado dni votos!");
while ($linea = fgets($dni_votos)) {

    if (md5($_REQUEST[dni]) == substr($linea, 0, 32)) {
    	$control_voto = true; 
		
	}
    $numlinea++;
}
fclose($dni_votos);
date_default_timezone_set('Europe/Madrid');

if ($control_voto==false){ //Si el voto no se encuentra registrado, inicia el proceso de grabación del voto.
	echo $dni."-".$nombre." ".$apellidos;

	if ($voto1=="on"){
		$fp = fopen("a.txt", "a"); //Almacena el voto, si el fichero está bloqueado continua intentandolo cada segundo.
		if (flock($fp, LOCK_EX | LOCK_NB)) {
			fwrite($fp, $dni.";".strtoupper ($nombre).";".strtoupper ($apellidos).";".date("d-m-Y/H:i:s")."-".md5($dni)."\r\n");
			//sleep(10);
			flock($fp, LOCK_UN);
		} 
		else {
			$fc=true;
			while ($fc==true){	
				sleep(1);
				$fp = fopen("a.txt", "a"); 
				if (flock($fp, LOCK_EX | LOCK_NB)) {
					fwrite($fp, $dni.";".strtoupper ($nombre).";".strtoupper ($apellidos).";".date("d-m-Y/H:i:s")."-".md5($dni)."\r\n");
					flock($fp, LOCK_UN);
					$fc=false;
				}
				fclose($fc);
			}
		}}
	if ($voto2=="on"){
		$fp = fopen("b.txt", "a"); //Almacena el voto, si el fichero está bloqueado continua intentandolo cada segundo.
		if (flock($fp, LOCK_EX | LOCK_NB)) {
			fwrite($fp, $dni.";".strtoupper ($nombre).";".strtoupper ($apellidos).";".date("d-m-Y/H:i:s")."-".md5($dni)."\r\n");
			//sleep(10);
			flock($fp, LOCK_UN);
		} 
		else {
			$fc=true;
			while ($fc==true){	
				sleep(1);
				$fp = fopen("b.txt", "a"); 
				if (flock($fp, LOCK_EX | LOCK_NB)) {
					fwrite($fp, $dni.";".strtoupper ($nombre).";".strtoupper ($apellidos).";".date("d-m-Y/H:i:s")."-".md5($dni)."\r\n");
					flock($fp, LOCK_UN);
					$fc=false;
				}
				fclose($fc);
			}
		}}
	if ($voto3=="on"){
		$fp = fopen("c.txt", "a"); //Almacena el voto, si el fichero está bloqueado continua intentandolo cada segundo.
		if (flock($fp, LOCK_EX | LOCK_NB)) {
			fwrite($fp, $dni.";".strtoupper ($nombre).";".strtoupper ($apellidos).";".date("d-m-Y/H:i:s")."-".md5($dni)."\r\n");
			//sleep(10);
			flock($fp, LOCK_UN);
		} 
		else {
			$fc=true;
			while ($fc==true){	
				sleep(1);
				$fp = fopen("c.txt", "a"); 
				if (flock($fp, LOCK_EX | LOCK_NB)) {
					fwrite($fp, $dni.";".strtoupper ($nombre).";".strtoupper ($apellidos).";".date("d-m-Y/H:i:s")."-".md5($dni)."\r\n");
					flock($fp, LOCK_UN);
					$fc=false;
				}
				fclose($fc);
			}
		}}	
	if ($voto4=="on"){
		$fp = fopen("d.txt", "a"); //Almacena el voto, si el fichero está bloqueado continua intentandolo cada segundo.
		if (flock($fp, LOCK_EX | LOCK_NB)) {
			fwrite($fp, $dni.";".strtoupper ($nombre).";".strtoupper ($apellidos).";".date("d-m-Y/H:i:s")."-".md5($dni)."\r\n");
			//sleep(10);
			flock($fp, LOCK_UN);
		} 
		else {
			$fc=true;
			while ($fc==true){	
				sleep(1);
				$fp = fopen("d.txt", "a"); 
				if (flock($fp, LOCK_EX | LOCK_NB)) {
					fwrite($fp, $dni.";".strtoupper ($nombre).";".strtoupper ($apellidos).";".date("d-m-Y/H:i:s")."-".md5($dni)."\r\n");
					flock($fp, LOCK_UN);
					$fc=false;
				}
				fclose($fc);
			}
		}}
	if ($voto5=="on"){
		$fp = fopen("e.txt", "a"); //Almacena el voto, si el fichero está bloqueado continua intentandolo cada segundo.
		if (flock($fp, LOCK_EX | LOCK_NB)) {
			fwrite($fp, $dni.";".strtoupper ($nombre).";".strtoupper ($apellidos).";".date("d-m-Y/H:i:s")."-".md5($dni)."\r\n");
			//sleep(10);
			flock($fp, LOCK_UN);
		} 
		else {
			$fc=true;
			while ($fc==true){	
				sleep(1);
				$fp = fopen("e.txt", "a"); 
				if (flock($fp, LOCK_EX | LOCK_NB)) {
					fwrite($fp, $dni.";".strtoupper ($nombre).";".strtoupper ($apellidos).";".date("d-m-Y/H:i:s")."-".md5($dni)."\r\n");
					flock($fp, LOCK_UN);
					$fc=false;
				}
				fclose($fc);
			}
		}}
	

$fp = fopen("dni_votos.txt", "a"); //Almacena el Hash MD5 de la persona que vota, fecha y hora local de votación
    if (flock($fp, LOCK_EX | LOCK_NB)) {
		date_default_timezone_set('Europe/Madrid');
		fwrite($fp, md5($dni)." ".date("d-m-Y (H:i:s)")."\r\n");
        flock($fp, LOCK_UN);
		fclose($fp);
    } 
	else {
        $fc=true;
		while ($fc==true){	
			sleep(1);
			$fp = fopen("dni_votos.txt", "a"); 
			if (flock($fp, LOCK_EX | LOCK_NB)) {
				date_default_timezone_set('Europe/Madrid');
				fwrite($fp, md5($dni)." ".date("d-m-Y (H:i:s)")."\r\n");
        		flock($fp, LOCK_UN);
				$fc=false;
			}
			fclose($fc);
		}
    }

//Envia la confirmación del voto por SMS
$tel_envio = "34".$_REQUEST[telefono];
		
		$post["to"] = array($tel_envio); 
		$post["message"] = "Voto confirmado con ID: ".date("d-m-Y/H:i:s")."-".md5($dni); 
		$post["from"] = "UGT";
		$user = "";
		$password = "";
		try {
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL,"https://dashboard.360nrs.com/api/rest/sms"); curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($post)); curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
		"Accept: application/json",
		"Authorization: Basic " . base64_encode($user . ":" . $password))); $result = curl_exec($ch);
		//var_dump($result);
		} catch (Exception $exc) {
		echo $exc->getTraceAsString();
		}



// Las siguientes líneas muestran la página web con la confirmación del voto y el Hash asignado al voto para futuras verificaciones
echo '<html>
  <head>
	<meta charset="utf-8" />
    <title>Título general</title>
    <link href="css.css" type="text/css" rel="stylesheet" />
	 
  </head>
  <body>
<section>
    <div class="container">
    <div class="user signinBx">
    <div class="imgBx">
        <img src="https://participa.fespugtclm.es/participa.png?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=60">
    </div>    
    <div class="formBx">
      <form action="https://fespugtclm.es" method="post">
        <h2>Voto registrado correctamente</h2>	
        <input type="submit" name="" value="Salir">
        <p class="signup">Tu aval ha quedado registrado en el sistema con el identificador: <br><b>'.md5($dni).'</b></p>
        </form>
    </div>
    </div>
        
    
     <div class="imgBx">
        <img src="https://images.unsplash.com/photo-1481824429379-07aa5e5b0739?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=60">
    </div>
    </div>
    
</section>
  </body>
</html>';
}

// En caso de que se detecte que ya había votado, solo se puede dar esta circunstancia usando el botón atrás del navegador, muestra el error en la página y no registra el voto. 
else {
	echo '<html>
  <head>
	<meta charset="utf-8" />
    <title>Título general</title>
    <link href="css.css" type="text/css" rel="stylesheet" />
	 
  </head>
  <body>
<section>
    <div class="container">
    <div class="user signinBx">
    <div class="imgBx">
        <img src="https://participa.fespugtclm.es/participa.png?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=60">
    </div>    
    <div class="formBx">
      <form action="index.html" method="post">
          <h2>Voto ya realizado</h2>
       
        <p class="signup">El aval ha sido rechazado porque ya se encuentra registraoa.</p>
		<input type="submit" name="" value="Volver">
        </form>
    </div>
    </div>
        
    
     <div class="imgBx">
        <img src="https://participa.fespugtclm.es/participa.png?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=60">
    </div>
    </div>
    
</section>
  </body>
</html>';


}

?>
<?php

	if (!isset($_COOKIE["login"])) { //verifica se o cookie login não esta definido, quem faz a inversão do sentido é o ! *NÃO ESQUECER DO !*
		require("erro.php");
	} else {
		require("conteudo.php");
	}

?>
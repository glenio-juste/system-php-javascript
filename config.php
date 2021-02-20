<?php
// coloque a barra / no final
define('URL', 'http://localhost/system/');
define('LIBS', 'libs/');

//conf. da conexao com o BD
define('DB_TYPE', 'oracle');
define('DB_HOST', 'oci:dbname=LOCAL;charset=UTF8');  // charset=UTF8 -> se não tiver não carrega os dados do banco (erro no json de acentuação)
define('DB_NAME', 'LOCAL');
define('DB_USER', 'UNPTA');
define('DB_PASS', 'UNPTA');
define('DB_SCHEMA', 'UNPTA');


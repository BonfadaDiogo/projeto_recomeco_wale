<?php

include "/xampp/htdocs/projeto_recomeco_wale/src/controller/header.php";

session_destroy();

echo "<p>Finalizando sessão...</p>";

header("Refresh: 2; url = ".ROOT);

include "/xampp/htdocs/projeto_recomeco_wale/src/controller/footer.php";
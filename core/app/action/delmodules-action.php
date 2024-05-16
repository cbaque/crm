<?php

$category = ModulesData::getById($_GET["id"]);

$category->del();
Core::redir("./index.php?view=departamento");


?>
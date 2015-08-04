<?php
include "logica-usuario.php";

logout();
header("Location: index.php?sucesso=Você foi deslogado com sucesso");
die();


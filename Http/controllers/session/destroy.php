<?php

// log the user out.

use Core\Authenticator;

(new Authenticator)->logout();

header("location: /");
exit();
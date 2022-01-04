<?php

declare(strict_types=1);

require_once "src/database.php";

var_dump(PDO::getAvailableDrivers());

var_dump(getDatabaseConnection()->getAttribute(PDO::ATTR_CONNECTION_STATUS));

phpinfo();

<?php
declare(strict_types=1);
if (!defined('WHMCS')) { exit('Direct access is not permitted.'); }
require_once __DIR__.'/bootstrap.php';
use Vexura\Whmcs\Ssl\Module;
use Vexura\Whmcs\Ssl\Registrar;
use Vexura\Whmcs\Ssl\Automation;

add_hook('InvoiceCreated', 1, static function (array $vars): void { Automation::snapshot('ssl', (int) $vars['invoiceid']); });
add_hook('InvoicePaid', 1, static function (array $vars): void { Automation::paid('ssl', (int) $vars['invoiceid']); });
add_hook('AfterCronJob', 1, static function (array $vars): void { Automation::cron('ssl'); });

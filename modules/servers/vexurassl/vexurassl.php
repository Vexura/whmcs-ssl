<?php
declare(strict_types=1);
if (!defined('WHMCS')) { exit('Direct access is not permitted.'); }
require_once __DIR__.'/bootstrap.php';
use Vexura\Whmcs\Ssl\Module;
use Vexura\Whmcs\Ssl\Registrar;
use Vexura\Whmcs\Ssl\Automation;

/** SSL-Zertifikat: WHMCS MetaData callback. */
function vexurassl_MetaData(): array
{
    return ['DisplayName' => 'Vexura · SSL-Zertifikat', 'APIVersion' => '1.1', 'RequiresServer' => true, 'DefaultSSLPort' => 443];
}

/** SSL-Zertifikat: WHMCS ConfigOptions callback. */
function vexurassl_ConfigOptions(): array
{
    return Module::config('ssl');
}

/** SSL-Zertifikat: WHMCS TestConnection callback. */
function vexurassl_TestConnection(array $params): array
{
    return Module::connection($params);
}

/** SSL-Zertifikat: WHMCS ClientArea callback. */
function vexurassl_ClientArea(array $params): array
{
    return Module::clientArea('ssl', $params);
}

/** SSL-Zertifikat: WHMCS AdminCustomButtonArray callback. */
function vexurassl_AdminCustomButtonArray(): array
{
    return ['Bereitstellung prüfen' => 'RefreshStatus', 'Bezahlte Rechnungen abgleichen' => 'SyncPaidInvoices'];
}

/** SSL-Zertifikat: WHMCS CreateAccount callback. */
function vexurassl_CreateAccount(array $params): string
{
    return Module::run('ssl', 'create', $params);
}

/** SSL-Zertifikat: WHMCS RefreshStatus callback. */
function vexurassl_RefreshStatus(array $params): string
{
    return Module::run('ssl', 'create', $params);
}

/** SSL-Zertifikat: WHMCS SyncPaidInvoices callback. */
function vexurassl_SyncPaidInvoices(array $params): string
{
    return Module::run('ssl', 'sync', $params);
}

/** SSL-Zertifikat: WHMCS TerminateAccount callback. */
function vexurassl_TerminateAccount(array $params): string
{
    return Module::run('ssl', 'terminate', $params);
}

/** SSL-Zertifikat: WHMCS SuspendAccount callback. */
function vexurassl_SuspendAccount(array $params): string
{
    return Module::run('ssl', 'suspend', $params);
}

/** SSL-Zertifikat: WHMCS UnsuspendAccount callback. */
function vexurassl_UnsuspendAccount(array $params): string
{
    return Module::run('ssl', 'unsuspend', $params);
}

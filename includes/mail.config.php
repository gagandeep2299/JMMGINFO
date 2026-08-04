<?php
declare(strict_types=1);

/** auto | smtp | mail | file */
define('MAIL_DRIVER', 'auto');

define('SMTP_HOST', '');
define('SMTP_PORT', 587);
define('SMTP_USER', '');
define('SMTP_PASS', '');
/** tls | ssl | (empty for none) */
define('SMTP_ENCRYPTION', 'tls');

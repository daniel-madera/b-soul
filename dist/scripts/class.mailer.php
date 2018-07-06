<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require("../assets/PHPMailer/src/PHPMailer.php");
require("../assets/PHPMailer/src/SMTP.php");
require("../assets/PHPMailer/src/Exception.php");

$config = parse_ini_file("config.ini", true);

class MyPHPMailer extends PHPMailer
{
    /**
     * myPHPMailer constructor.
     *
     * @param bool|null $exceptions
     * @param string    $body A default HTML message body
     */
    public function __construct($exceptions, $body = '')
    {
        parent::__construct($exceptions);
        $this->setFrom('web@b-soul.cz', 'B-SOUL Taneční škola');
        $this->isSMTP();
        $this->Host = $config['smtp']['host'];
        $this->User = $config['smtp']['user'];
        $this->Password = $config['smtp']['password'];
        //Set an HTML and plain-text body, import relative image references
        $this->msgHTML($body, '../img/');
        $this->SMTPDebug = 2;
    }
}

?>

<?php

namespace App\Action\Admin;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\Views\Twig;

use App\Repository\QueryFactory;
use App\Repository\DataTableRepository;
use App\Repository\RepositoryInterface;

use PHPMailer\PHPMailer\PHPMailer;
/**
 * Action.
 */
final class AdminAction
{
    /**
     * @var Twig
     */
    private $twig;

     private $queryFactory;
    private $dataTable;
    /**
     * The constructor.
     *
     * @param Twig $twig The twig engine
     */
    public function __construct(Twig $twig, QueryFactory $queryFactory, DataTableRepository $dataTableRepository)
    {
        $this->twig = $twig;
        
        $this->queryFactory = $queryFactory;
        $this->dataTable = $dataTableRepository;
    }

    /**
     * Action.
     *
     * @param ServerRequestInterface $request The request
     * @param ResponseInterface $response The response
     *
     * @return ResponseInterface The response
     */
    public function __invoke(ServerRequestInterface $request, ResponseInterface $response): ResponseInterface
    {
        // $viewData = [
        //     'now' => date('d.m.Y H:i:s'),
        // ];


        require __DIR__.'/../../../vendor/autoload.php';
        $mail = new PHPMailer(true);
        try {
            //Server settings
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
            $mail->isSMTP();                                            // Send using SMTP
            $mail->Host       = 'mailtrap.io';                    // Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
            $mail->Username   = '63bd291a50651f';                     // SMTP username
            $mail->Password   = 'aea8eff261d903';                               // SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
            $mail->Port       = 25;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
        
            //Recipients
            $mail->setFrom('poczta@mailtrap.io', 'Administrator');
            $mail->addAddress('mateusz.wrzol@o2.pl', 'Joe User');     // Add a recipient
            // $mail->addAddress('ellen@example.com');               // Name is optional
            $mail->addReplyTo('administracjaserwisu@example.com', 'Information');
            // $mail->addCC('cc@example.com');
            // $mail->addBCC('bcc@example.com');
        
            // Attachments
            // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
            // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
        
            // Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'Here is the subject';
            $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
        
            $html = new \Html2Text\Html2Text($mail->Body);
            $mail->AltBody = $html->getText();
        
            $mail->send();
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }


        if(isset($_GET['id_cons'])){
            $this->queryFactory->newUpdate('consultation',['accept' => 1])->andWhere(['id_consultation' => $_GET['id_cons']])->execute();
        }
        if(isset($_GET['id_cons2'])){
            $this->queryFactory->newDelete('consultation')->andWhere(['id_consultation' => $_GET['id_cons2']])->execute();
        }
        return $this->twig->render($response, 'admin/admin.twig');
    }
}

<?php

namespace App\Action\Mail;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\Views\Twig;
use Symfony\Component\HttpFoundation\Session\Session;


final class MailAction
{
    private $twig;

    public function __construct(Twig $twig)
    {
        $this->twig = $twig;
    }
public function __invoke(ServerRequestInterface $request, ResponseInterface $response): ResponseInterface
    {

        $config = array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://mateusz.wrzol@o2.pl',
            'smtp_port' => 465,
            'mailtype' => 'html',
            'smtp_user' => '',
            'smtp_pass' => '',
            'newline' => "\r\n",
           );
      
            //Load email library
      
      
            $this->load->library('email',$config);
            $this->email->set_newline("\r\n");
      
            $this->email->from('', '');
            $this->email->to('');
            $this->email->subject(' Visitor');
            $this->email->message('Testing the email class.');
      
           if($this->email->send()){
             echo "your email was sent";
           }
           else {
             show_error($this->email->print_debugger());
           }
        
        // $adres = "mateusz.wrzol@o2.pl";
        // $tytul = "Tytuł wiadomości";
        // $wiadomosc = "Treść przykładowej wiadomości wysyłanej bezpośrednio z kodu za pomocą funkcji mail().";
        // mail($adres, $tytul, $wiadomosc);
        return $this->twig->render($response, 'login/login.twig');
    }
}
?>
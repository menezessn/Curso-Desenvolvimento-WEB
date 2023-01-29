<?php
    require "./bibliotecas/PHPMailer/Exception.php";
    require "./bibliotecas/PHPMailer/OAuth.php";
    require "./bibliotecas/PHPMailer/PHPMailer.php";
    require "./bibliotecas/PHPMailer/POP3.php";
    require "./bibliotecas/PHPMailer/SMTP.php";
    
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;



    class Mensagem{
        private $para = null;
        private $assunto = null;
        private $mensagem = null;
        public $status = array('codigo' => null, 'descricao' => '');

        public function __set($atributo, $valor){
            $this->$atributo = $valor;
        }
        public function __get($atributo){
            return $this->$atributo;
        }
        public function validaMensagem(){
            if(empty($this->para) || empty($this->assunto) || empty($this->mensagem)){
                return false;
            }
            return true;
        }
    }

    $mensagem = new Mensagem();

    $mensagem->__set('para', $_POST['para']);
    $mensagem->__set('assunto', $_POST['assunto']);
    $mensagem->__set('mensagem', $_POST['mensagem']);

    if(!$mensagem->validaMensagem()){
        echo 'mensagem inválida';
        header('Location: index.php');
    }
    //Instantiation and passing `true` enables exceptions
    $mail = new PHPMailer(true);
    try {
        //Server settings
        $mail->SMTPDebug = false;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'programmingtests12@gmail.com';                     //SMTP username
        $mail->Password   = 'tvvevmyptbyykzte';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $mail->Port       = 587;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
    
        //Recipients
        $mail->setFrom('programmingtests12@gmail.com', 'WebMailer');
        $mail->addAddress($mensagem->__get('para'), 'Joe User');     //Add a recipient
        //$mail->addAddress('ellen@example.com');               //Name is optional
        //$mail->addReplyTo('info@example.com', 'Information');
        //$mail->addCC('cc@example.com');
        //$mail->addBCC('bcc@example.com');
    
        //Attachments
        //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
       // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
    
        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = $mensagem->__get('assunto');
        $mail->Body    = $mensagem->__get('mensagem');
        $mail->AltBody = $mensagem->__get('mensagem');
    
        $mail->send();
        $mensagem->status['codigo'] = 1;
        $mensagem->status['descricao'] = 'E-mail enviado com sucesso';
    } catch (Exception $e) {
        $mensagem->status['codigo'] = 2;
        $mensagem->status['descricao'] = 'Não foi possível enviar este e-mail. Detalhes do erro: ' . $mail->ErrorInfor;
        
    }
    
    
?>


<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Envio</title>
</head>
<body>
    
    <div class = "container">
        <div class="py-3 text-center">
            <img class="d-block mx-auto mb-2" src="logo.png" alt="" width="72" height="72">
            <h2>Send Mail</h2>
            <p class="lead">Seu app de envio de e-mails particular!</p>
        </div>
        <div class="row">
            <div class="col-md-12">
                <?php if($mensagem->status['codigo']==1){ ?>
                    <div class="container">
                        <h1 class= "text-success display-4" >Sucesso</h1>
                        <p><?=$mensagem->status['descricao']?></p>
                        <a href="index.php" class="btn btn-success btn-lg mt-5 text-white">Voltar</a>
                    </div>
                <?php } ?>
                <?php if($mensagem->status['codigo']==2){ ?>
                    <div class="container">
                        <h1 class="text-danger display-4">Erro</h1>
                        <p><?=$mensagem->status['descricao']?></p>
                        <a href="index.php" class="btn btn-danger btn-lg mt-5 text-white">Voltar</a>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</body>
</html>
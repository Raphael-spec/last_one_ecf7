<?php

session_start();

require './vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


class PublicController{

    private $pubcm;
    private $pubam;
    private $pubm;

        public function __construct()
        {
            $this->pubcm = new AdminCategorieModel();
            $this->pubam = new AdminArticleModel();
            $this->pubm = new PublicModel();
        }


        public function getPubArticles(){
        
            if(isset($_GET['id']) && !empty($_GET['id'])){
                
                if( isset($_POST['soumis']) && !empty($_POST['search'])){
                    $search = trim(htmlspecialchars(addslashes($_POST['search'])));
                    
                    $tabCat = $this->pubcm->getCategories();
                    $arts = $this->pubam->getArticles($search);
                    
                    require_once('./views/public/accueil.php');
                }
                
                $id = trim(htmlentities(addslashes($_GET['id'])));
                
                $a = new Article();
                
                $a->getCategorie()->setId_cat($id);
                
                $tabCat = $this->pubcm->getCategories();
                $articles = $this->pubm->findArticlesByCat($a);
                
                require_once('./views/public/articlesCat.php');
          
            }else{
                
                if( isset($_POST['soumis']) && !empty($_POST['search'])){
                    $search = trim(htmlspecialchars(addslashes($_POST['search'])));
                    
                    $tabCat = $this->pubcm->getCategories();
                    $arts = $this->pubam->getArticles($search);
                    
                    require_once('./views/public/accueil.php');
                }
                
                $tabCat = $this->pubcm->getCategories();
                $arts = $this->pubam->getArticles();
    
            require_once('./views/public/accueil.php');
            }
        }

        public function recap(){
            if(isset($_POST['envoi']) && !empty($_POST['titre']) && !empty($_POST['auteur'])){
                
                $id = htmlspecialchars(addslashes($_POST['id_article']));
                $titre = htmlspecialchars(addslashes($_POST['titre']));
                $auteur = htmlspecialchars(addslashes($_POST['auteur']));
                $image = htmlspecialchars(addslashes($_POST['image']));
                $description = htmlspecialchars(addslashes($_POST['description']));
                $prix = htmlspecialchars(addslashes($_POST['prix']));
    
    
                require_once('./views/public/articlesItem.php');
    
            }
        }

        public function contact(){

            require_once('./views/public/contact.php');

        }
        public function home(){

            require_once('./views/public/home.php');

        }

        public function validation(){

            require_once('./views/public/validation.php');

        }

        public function apropos(){

            require_once('./views/public/apropos.php');

        }

 
        public function payment(){
      
            if(isset($_POST) && !empty($_POST['email']) && !empty($_POST['quantite'])){
    
                
                \Stripe\Stripe::setApiKey('sk_test_51IdC0SEYTj0p2Az76g8Q530n2zC2GgwfkvjzmxmrDI3FrsH91r6CrWPfJQ1ddYCXhm3nN45aVYDdVZYoFkvNT9VN00aI8QsXPR');
    
                    header('Content-Type: application/json');
    
    
                    $checkout_session = \Stripe\Checkout\Session::create([
                        
                        'payment_method_types' => ['card'],
                        'line_items' => [[
                        'price_data' => [
                        'currency' => 'eur',
                        'unit_amount' => $_POST['prix']*100,
                        'product_data' => [
                            'name' => $_POST['titre']."-".$_POST['auteur'],
                            'images' => ["https://i.imgur.com/EHyR2nP.png"],
                            'description' => $_POST['description'],
                            ],
                            ],
                            'quantity' => 1,
                        ]],
                        'customer_email'=>$_POST['email'],
                        'mode' => 'payment',
                        'success_url' => 'http://localhost/php/poo/app/articles/index.php?action=success',
                        'cancel_url' => 'http://localhost:8080/php/poo/app/articles/index.php?action=cancel',
                        ]);
                            $_SESSION['pay'] = $_POST;
                        echo json_encode(['id' => $checkout_session->id]);
    
                    }
    
                }

                public function confirmation(){
                        
                    $art = new Article();
                    $art->setId_art($_SESSION['pay']['id']);
                    // var_dump($_SESSION['pay']);
                
                $email = $_SESSION['pay']['email'];
                $titre = $_SESSION['pay']['titre'];
                $auteur = $_SESSION['pay']['auteur'];
                $prix = $_SESSION['pay']['prix'];
                $description = $_SESSION['pay']['description'];
                
                $mail = new PHPMailer(true);
                
                try {
                
                    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
                    $mail->isSMTP();                                            //Send using SMTP
                    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
                    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                    $mail->Username   = 'dwwm94@gmail.com';                     //SMTP username
                    $mail->Password   = 'mziyzxforjcwijpo';                                //SMTP password
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
                    $mail->Port       = 587;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
                
                    //Recipients
                    $mail->setFrom('dwwm94@gmail.com', 'contact eart');
                    $mail->addAddress($email, 'Mr/Mme');     //Add a recipient
                
                
                    //Content
                    $mail->isHTML(true);                                  
                    $mail->Subject = 'Here is the subject';
                    $mail->Body    = "
                    <h2>confirmation d'achat</h2>
                    <div>
                    <b> Titre : $titre</b>
                    <b> Auteur : $auteur</b>
                    <b> Prix : $prix €</b>
                    <p>Nous vous Remercions pour votre achat, à très bientôt !</p>
                    </div>";
                
                    $mail->send();
                    echo 'Message has been sent';
                } catch (Exception $e) {
                    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                }
                
                require_once('./views/public/success.php');
                
                    }
    
    
        // public function orderArticle(){
    
        //     if(isset($_GET['id']) && !empty($_GET['id'])){
        //         $id = htmlspecialchars(addslashes($_GET['id']));
                
    
            
        //     }
        //         require_once('./views/public/orderForm.php');
        // }

}
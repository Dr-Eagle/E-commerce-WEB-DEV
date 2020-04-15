<?php

class Sendmail
{
    public function get_css()
    {
        $css="
        <style>
    body{margin: 0;padding: 0;font-family: sans-serif;}.conteneur{color:black;/*margin: 10% 30%;*/}.contenu{padding: 20px;}.entete{height: 40px;background-color: #1ca8d6;border-radius: 8px 8px 0 0;}.entete h3{color:white;text-align: center;line-height: 40px;text-transform: uppercase;}.corps{padding: 10px 30px;}.pied {padding: 20px;}.pied p{font-weight: bolder;}.pied h3{color: #1ca8d6;}.pied h2{text-align: center;margin-bottom: 10px;}
        </style>
        ";
        return $css;
    }
    public function sendmail_annulation($email,$objet,$nom_client,$commande)
    {
        $header="MIME-Version: 1.0\r\n";
        $header.='From:"Admin SBS"<support@primfx.com>'."\n";
        $header.='Content-Type:text/html; charset="uft-8"'."\n";
        $header.='Content-Transfer-Encoding: 8bit';

        $message='
        <html>
        <head>
        '.$this->get_css().'
        </head>
        <body>
            <div class="conteneur">
                <div class="contenu">
                    <div class="entete">
                        <h3>sbs informatique</h3>
                    </div>
                    <div class="corps">
                        <p>Bonjour Mr/Mme <strong>'.$nom_client.'</strong></p>
                        <br>
                        <p>Nous vous informons que votre commande N_'.$commande->id_commande.' a été annulée. Pour plus d\'information appelez-nous via le contact ci-dessous</p>
                    </div>
                    <div class="pied">
                        <h2>Contact</h2>
                        <p>Applez nous au</p>
                        <h3>+(216)31 109 888</h3>
                    </div>
                </div>
            </div>
        </body>
        </html>
        ';

        mail($email, $objet, $message, $header);

    }
    public function sendmail_validation($email,$objet,$nom_client,$commande)
    {
        $header="MIME-Version: 1.0\r\n";
        $header.='From:"Admin SBS"<support@primfx.com>'."\n";
        $header.='Content-Type:text/html; charset="uft-8"'."\n";
        $header.='Content-Transfer-Encoding: 8bit';

        $message='
        <html>
        <head>
        '.$this->get_css().'
        </head>
        <body>
            <div class="conteneur">
                <div class="contenu">
                    <div class="entete">
                        <h3>sbs informatique</h3>
                    </div>
                    <div class="corps">
                        <p>Bonjour Mr/Mme <strong>'.$nom_client.'</strong></p>
                        <br>
                        <p>Nous vous infromons que votre commande N_'.$commande->id_commande.' a été validée. vous serez livrez d\'ici '.$commande->date_livraison.' Pour plus de details veuillez consulter votre compte ici <a href="http://localhost/sbs/views/frontend/espace_client.php"> mon compte</a></p>
                    </div>
                    <div class="pied">
                        <h2>Contact</h2>
                        <p>Applez nous au</p>
                        <h3>+(216)31 109 888</h3>
                    </div>
                </div>
            </div>
        </body>
        </html>
        ';

        mail($email, $objet, $message, $header);

    }
    public function sendmail_en_attente($email,$objet,$nom_client,$commande)
    {
        $header="MIME-Version: 1.0\r\n";
        $header.='From:"Admin SBS"<support@primfx.com>'."\n";
        $header.='Content-Type:text/html; charset="uft-8"'."\n";
        $header.='Content-Transfer-Encoding: 8bit';

        $message='
        <html>
        <head>
        '.$this->get_css().'
        </head>
        <body>
            <div class="conteneur">
                <div class="contenu">
                    <div class="entete">
                        <h3>sbs informatique</h3>
                    </div>
                    <div class="corps">
                        <p>Bonjour Mr/Mme <strong>'.$nom_client.'</strong></p>
                        <br>
                        <p>Nous vous informons que votre commande N_'.$commande->id_commande.' a bien été reçue. Nous la traitons dans les plus bref delais .Pour plus de details veuillez consulter votre compte ici <a href="http://localhost/sbs/views/frontend/espace_client.php"> mon compte</a></p>
                    </div>
                    <div class="pied">
                        <h2>Contact</h2>
                        <p>Applez nous au</p>
                        <h3>+(216)31 109 888</h3>
                    </div>
                </div>
            </div>
        </body>
        </html>
        ';

        mail($email, $objet, $message, $header);

    }
}



?>
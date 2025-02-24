<?php
    $body = "<!DOCTYPE html>
        <html lang='it'>
        <head>
            <meta charset='UTF-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <title>Email</title>
            
            <!-- Fonts -->
            <link href='https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap' rel='stylesheet'>
            
        </head>
        <body style='margin: 0; padding: 0; font-family: 'Poppins', Arial, sans-serif; background-color: #f4f4f4;'>
            
            <!-- Contenitore principale -->
            <table role='presentation' width='100%' cellspacing='0' cellpadding='0' border='0' bgcolor='#f4f4f4'>
            <tr>
                <td align='center'>

                <!-- Wrapper dell'email -->
                <table role='presentation' width='600' cellspacing='0' cellpadding='0' border='0' bgcolor='#ffffff' style='margin: 20px auto; border-radius: 8px; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);'>
                    
                    <!-- HEADER -->
                    <tr>
                    <td bgcolor='#98bee2' style='padding: 20px; text-align: center;'>
                        <img src='https://studyplanner.altervista.org/app/images/main%20icons/logo/Logo2.png' alt='Logo' width='70' style='display: block; margin: 0 auto;'>
                    </td>
                    </tr>
                    
                    <!-- Contenuto principale -->
                    <tr>
                    <td style='padding: 40px; text-align: center; font-size: 18px; color: #333;'>
                        <h1 style='margin: 0; font-size: 24px;'>StudyPlanner</h1>
                        <br>
                        <p>
                        Clicca sul pulsante per modificare la password.
                        </p>
                        <br>
                        
                        <!-- Pulsante -->
                        <a href='https://studyplanner.altervista.org/app/scripts/updatePassword.php?token=$hashToken' style='text-decoration: none;'>
                        <table role='presentation' cellspacing='0' cellpadding='0' border='0' align='center'>
                            <tr>
                            <td bgcolor='#98bee2' style='border-radius: 30px;'>
                                <a href='https://studyplanner.altervista.org/app/scripts/updatePassword.php?token=$hashToken' style='display: inline-block; padding: 15px 45px; font-size: 16px; color: #ffffff; background-color: #98bee2; border-radius: 30px; text-decoration: none; font-weight: bold;'>
                                Ripristina
                                </a>
                            </td>
                            </tr>
                        </table>
                        </a>
                    </td>
                    </tr>

                    <!-- FOOTER -->
                    <tr>
                    <td bgcolor='#98bee2' style='padding: 20px; text-align: center; font-size: 14px; color: #ffffff;'>
                        &copy; 2025 StudyPlanner - Tutti i diritti riservati
                    </td>
                    </tr>

                </table>
                <!-- Fine wrapper -->
                
                </td>
            </tr>
            </table>

        </body>
        </html>
    ";

    $headers =  "From: noreply@studyplanner.it" . "\r\n" .
                "MIME-Version: 1.0" . "\r\n" .
                "Content-type: text/html; charset=UTF-8";
?>
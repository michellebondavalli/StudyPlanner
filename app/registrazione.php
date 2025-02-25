<?php
    session_start();
    if(isset($_SESSION["user"])) {
        header("Location: index.php");
        return;
    }
?>
<!DOCTYPE html>
<html lang="it">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" href="images/main icons/logo/Logo2.png" type="image/x-icon">
        <title>Registrazione</title>

        <link rel="stylesheet" href="styles/forms.css">
        <link rel="stylesheet" href="styles/globalvariables.css">
        <link rel="stylesheet" href="styles/generalstyle.css">

        <!--Fonts-->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href = "
            https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap
        " rel = "stylesheet">
    </head>

    <body>
        <div class="box">
            <div class="logo-container-form">
                <img src="images/main icons/logo/Logo2.png" height="60px" alt="logo">
                <h1>StudyPlanner</h1>
            </div>
            
            <form action="scripts/registrationConfirm.php" method="POST">
                <div class="inputBox">
                    <input type="text" name="nome" required onkeyup="this.setAttribute('value', this.value);" value="">
                    <label>Nome</label>
                </div>

                <div class="inputBox">
                    <input type="text" name="cognome" required onkeyup="this.setAttribute('value', this.value);" value="">
                    <label>Cognome</label>
                </div>

                <div class="inputBox">
                    <input type="email" name="email" required onkeyup="this.setAttribute('value', this.value);" value="">
                    <label>Email</label>
                </div>

                <div class="inputBox" id="password-container">
                    <input type="password" name="pwd" required onkeyup="this.setAttribute('value', this.value);" value="">
                    <label>Password</label>
                    <div class="eye eye2">
                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#98bee2"><path d="m644-428-58-58q9-47-27-88t-93-32l-58-58q17-8 34.5-12t37.5-4q75 0 127.5 52.5T660-500q0 20-4 37.5T644-428Zm128 126-58-56q38-29 67.5-63.5T832-500q-50-101-143.5-160.5T480-720q-29 0-57 4t-55 12l-62-62q41-17 84-25.5t90-8.5q151 0 269 83.5T920-500q-23 59-60.5 109.5T772-302Zm20 246L624-222q-35 11-70.5 16.5T480-200q-151 0-269-83.5T40-500q21-53 53-98.5t73-81.5L56-792l56-56 736 736-56 56ZM222-624q-29 26-53 57t-41 67q50 101 143.5 160.5T480-280q20 0 39-2.5t39-5.5l-36-38q-11 3-21 4.5t-21 1.5q-75 0-127.5-52.5T300-500q0-11 1.5-21t4.5-21l-84-82Zm319 93Zm-151 75Z"/></svg>
                    </div>
                </div>

                <div class="inputBox" id="password-container2">
                    <input type="password" name="confPwd" required onkeyup="this.setAttribute('value', this.value);" value="">
                    <label>Conferma password</label>
                    <div class="eye eye3">
                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#98bee2"><path d="m644-428-58-58q9-47-27-88t-93-32l-58-58q17-8 34.5-12t37.5-4q75 0 127.5 52.5T660-500q0 20-4 37.5T644-428Zm128 126-58-56q38-29 67.5-63.5T832-500q-50-101-143.5-160.5T480-720q-29 0-57 4t-55 12l-62-62q41-17 84-25.5t90-8.5q151 0 269 83.5T920-500q-23 59-60.5 109.5T772-302Zm20 246L624-222q-35 11-70.5 16.5T480-200q-151 0-269-83.5T40-500q21-53 53-98.5t73-81.5L56-792l56-56 736 736-56 56ZM222-624q-29 26-53 57t-41 67q50 101 143.5 160.5T480-280q20 0 39-2.5t39-5.5l-36-38q-11 3-21 4.5t-21 1.5q-75 0-127.5-52.5T300-500q0-11 1.5-21t4.5-21l-84-82Zm319 93Zm-151 75Z"/></svg>
                    </div>
                </div>

                <div class="form-error"><?php
                    /*print_r($_SESSION);
                    echo "<br><br><br>";*/
                    if(isset($_SESSION["errorRegistrationConfirm"])) {
                        echo $_SESSION["errorRegistrationConfirm"];
                        unset($_SESSION["errorRegistrationConfirm"]);
                    }
                ?></div>
                
                <input type="submit" name="registrati" value="Registrati">
            </form>

            <p>Hai già un account? <a href="login.php">Accedi</a></p>
        </div>

        <script>
            const passwordContainer = document.getElementById("password-container");
            const passwordContainer2 = document.getElementById("password-container2");
            let eye2 = document.querySelector(".eye2");
            let eye3 = document.querySelector(".eye3");

            eye2.addEventListener("click", () => {
                const input = passwordContainer.querySelector("input");
                let type = input.getAttribute("type");

                if(type === "password") {
                    type = "text";
                    eye2.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#98bee2"><path d="M480-320q75 0 127.5-52.5T660-500q0-75-52.5-127.5T480-680q-75 0-127.5 52.5T300-500q0 75 52.5 127.5T480-320Zm0-72q-45 0-76.5-31.5T372-500q0-45 31.5-76.5T480-608q45 0 76.5 31.5T588-500q0 45-31.5 76.5T480-392Zm0 192q-146 0-266-81.5T40-500q54-137 174-218.5T480-800q146 0 266 81.5T920-500q-54 137-174 218.5T480-200Zm0-300Zm0 220q113 0 207.5-59.5T832-500q-50-101-144.5-160.5T480-720q-113 0-207.5 59.5T128-500q50 101 144.5 160.5T480-280Z"/></svg>';
                } else {
                    type = "password";
                    eye2.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#98bee2"><path d="m644-428-58-58q9-47-27-88t-93-32l-58-58q17-8 34.5-12t37.5-4q75 0 127.5 52.5T660-500q0 20-4 37.5T644-428Zm128 126-58-56q38-29 67.5-63.5T832-500q-50-101-143.5-160.5T480-720q-29 0-57 4t-55 12l-62-62q41-17 84-25.5t90-8.5q151 0 269 83.5T920-500q-23 59-60.5 109.5T772-302Zm20 246L624-222q-35 11-70.5 16.5T480-200q-151 0-269-83.5T40-500q21-53 53-98.5t73-81.5L56-792l56-56 736 736-56 56ZM222-624q-29 26-53 57t-41 67q50 101 143.5 160.5T480-280q20 0 39-2.5t39-5.5l-36-38q-11 3-21 4.5t-21 1.5q-75 0-127.5-52.5T300-500q0-11 1.5-21t4.5-21l-84-82Zm319 93Zm-151 75Z"/></svg>';
                }
                
                input.setAttribute("type", type);
            });

            eye3.addEventListener("click", () => {
                const input = passwordContainer2.querySelector("input");
                let type = input.getAttribute("type");

                if(type === "password") {
                    type = "text";
                    eye3.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#98bee2"><path d="M480-320q75 0 127.5-52.5T660-500q0-75-52.5-127.5T480-680q-75 0-127.5 52.5T300-500q0 75 52.5 127.5T480-320Zm0-72q-45 0-76.5-31.5T372-500q0-45 31.5-76.5T480-608q45 0 76.5 31.5T588-500q0 45-31.5 76.5T480-392Zm0 192q-146 0-266-81.5T40-500q54-137 174-218.5T480-800q146 0 266 81.5T920-500q-54 137-174 218.5T480-200Zm0-300Zm0 220q113 0 207.5-59.5T832-500q-50-101-144.5-160.5T480-720q-113 0-207.5 59.5T128-500q50 101 144.5 160.5T480-280Z"/></svg>';
                } else {
                    type = "password";
                    eye3.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#98bee2"><path d="m644-428-58-58q9-47-27-88t-93-32l-58-58q17-8 34.5-12t37.5-4q75 0 127.5 52.5T660-500q0 20-4 37.5T644-428Zm128 126-58-56q38-29 67.5-63.5T832-500q-50-101-143.5-160.5T480-720q-29 0-57 4t-55 12l-62-62q41-17 84-25.5t90-8.5q151 0 269 83.5T920-500q-23 59-60.5 109.5T772-302Zm20 246L624-222q-35 11-70.5 16.5T480-200q-151 0-269-83.5T40-500q21-53 53-98.5t73-81.5L56-792l56-56 736 736-56 56ZM222-624q-29 26-53 57t-41 67q50 101 143.5 160.5T480-280q20 0 39-2.5t39-5.5l-36-38q-11 3-21 4.5t-21 1.5q-75 0-127.5-52.5T300-500q0-11 1.5-21t4.5-21l-84-82Zm319 93Zm-151 75Z"/></svg>';
                }
                
                input.setAttribute("type", type);
            });
        </script>
    </body>
</html>
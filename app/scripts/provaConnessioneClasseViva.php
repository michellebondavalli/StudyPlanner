<?php
    function accediClasseviva($userId, $password) {
        $url = "https://web.spaggiari.eu/rest/v1/auth/login";

        $headers = [
            "Content-Type: application/json",
            "User-Agent: CVVS/std/1.4.3 Android/12"
        ];

        $payload = json_encode([
            "uid" => $userId,
            "pass" => $password,
            "ident" => null
        ]);

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch);

        $json = json_decode($response, true);

        if (isset($json["token"])) {
            return [
                "token" => $json["token"],
                "studentId" => ltrim($userId, "SG") // Rimuove 'S' o 'G'
            ];
        }

        return null;
    }

    function ottieniVoti($studentId, $token) {
        $url = "https://web.spaggiari.eu/rest/v1/students/$studentId/grades";

        $headers = [
            "Z-Auth-Token: $token",
            "User-Agent: CVVS/std/1.4.3 Android/12"
        ];

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch);

        $json = json_decode($response, true);
        return $json["grades"] ?? [];
    }

    // Esempio di uso:
    $userId = "S8835257J";     // Inserisci qui il tuo ID ClasseViva
    $password = "Ciaociao008@";  // Inserisci la password

    $accesso = accediClasseviva($userId, $password);
    if ($accesso) {
        $voti = ottieniVoti($accesso["studentId"], $accesso["token"]);
        echo "<pre>";
        print_r($voti);
        echo "</pre>";
    } else {
        echo "Login fallito. Controlla le credenziali.";
    }

    echo json_encode(array(
        "uid" => $userId,
        "pass" => $password,
        "ident" => null
    ));
?>
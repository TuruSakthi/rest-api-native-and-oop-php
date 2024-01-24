<?php

require_once 'vendor/autoload.php';

use App\Controller\MahasiswaController;

// Split URL, kemudian pisahkan endpoint dari Domain.
$splitedUri = explode('?', $_SERVER['REQUEST_URI']);
$requestUri = $splitedUri[0];

// Ambil Method yang digunakan.
$method = $_SERVER['REQUEST_METHOD'];

// Ambil content via php://input
$content = file_get_contents('php://input');

// Set Content application/json
// Untuk menandakan responsenya adalah sebuah application/json.
header('Content-Type: application/json');

// Route berdasarkan method.
switch ($method) {
    case 'GET':
        switch ($requestUri) {
            case '/api/mahasiswa':
                // Proses aplikasi kalian di sini...


                // Query kalian di sini...


                // Hasil dari proses & response dari query, dikembalikan ke user.
                // Sebagai tanda, bahwa API berhasil mengolah request yang dikirimkan.
                $result = [
                    'status' => 200,
                    'message' => 'success',
                    'data_length' => 5,
                    'data' => [
                        ['nama' => 'Turu Sakthi', 'email' => 'kitakayaknyakreatif.tar@gmail.com', 'alamat' => 'Jakarta'],
                        ['nama' => 'Salfai Murdianto', 'email' => 'salfai-murdianto@gmail.com', 'alamat' => 'Bogor'],
                        ['nama' => 'Jono Mulyono', 'email' => 'jono-mulyono@gmail.com', 'alamat' => 'Depok'],
                        ['nama' => 'Suryo Dimas Maulana', 'email' => 'ryomasna@gmail.com', 'alamat' => 'Tangerang'],
                        ['nama' => 'Luckman', 'email' => 'luckman@gmail.com', 'alamat' => 'Bekasi'],
                    ],
                ];

                // Set Response code.
                http_response_code(200);

                // Kembalikan & Convert array menjadi json untuk pengirim request.
                echo json_encode($result);
                exit;
            break;
        }
    break;

    case 'POST':
        // Handle, jika pengirim mengirimkan request dengan format JSON.
        $request = json_decode($content);
        if (! is_null($request)) {
            $_POST = (array) $request;
        }

        switch ($requestUri) {
            // Route...
            case '/api/mahasiswa':
                $controller = new MahasiswaController();
                $controller->store($_POST);
            break;
        }
    break;

    case 'PUT':
        // Handle parameter.
        $splitedUri = explode('/', $requestUri);
        $valUri = $splitedUri[2];
        $idUri = $splitedUri[3] ?? null;

        // Handle, jika pengirim mengirimkan request dengan format JSON.
        $_PUT = json_decode($content);
        if (is_null($_PUT)) {
            parse_str($content, $_PUT);
        } else {
            $_PUT = (array) $_PUT;
        }

        // Handle jika ID tidak valid.
        // str_contains handle, jika parameter via postman tidak diisi.
        if (is_null($idUri) || str_contains($idUri, ':')) {
            echo json_encode([
                'status' => 400,
                'message' => "Failed!",
                'data' => ['id' => 'Parameter ID Wajib diisi!'],
            ]);

            http_response_code(400);
            exit;
        }

        switch ($valUri) {
            // Route...
            case 'mahasiswa':
                $controller = new MahasiswaController();
                $controller->update($_PUT);
            break;
        }
    break;

    case 'DELETE':
        // Handle parameter.
        $splitedUri = explode('/', $requestUri);
        $valUri = $splitedUri[2];
        $idUri = $splitedUri[3] ?? null;

        // Handle jika ID tidak valid.
        // str_contains handle, jika parameter via postman tidak diisi.
        if (is_null($idUri) || str_contains($idUri, ':')) {
            echo json_encode([
                'status' => 400,
                'message' => "Failed!",
                'data' => ['id' => 'Parameter ID Wajib diisi!'],
            ]);

            http_response_code(400);
            exit;
        }

        switch ($valUri) {
            // Route...
            case 'mahasiswa':
                // Proses aplikasi kalian di sini...

                // Query kalian di sini...

                // Hasil dari proses & response dari query, dikembalikan ke user.
                // Sebagai tanda, bahwa API berhasil mengolah request yang dikirimkan.

                // Set Response code.
                http_response_code(204);

                // Kembalikan & Convert array menjadi json untuk pengirim request.
                // $result = [
                //     'status' => 200,
                //     'message' => 'Success!',
                // ];
                // echo json_encode($result);

                exit;
            break;
        }
    break;
}
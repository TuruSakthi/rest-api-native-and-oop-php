<?php

namespace App\Controller;

use App\Request\MahasiswaStore;

class MahasiswaController
{
    public function store(array $request): void
    {
        // Persiapan nilai default.
        $responseCode = 201;
        $result = $request;
        $message = 'Success!';

        // Validasi Request
        [$isValidated, $errorMessage] = MahasiswaStore::validate($request);
        if (! $isValidated) {
            // Jiak tidak valid, sesuaikan pesan, hasil dan response code.
            // Yang wajib dilakukan adalah, menyampaikan errorMessage & penyesuaian response code.
            $message = 'Failed!';
            $result = $errorMessage;
            $responseCode = 400;
        } else {
            // logic aplikasi...

            // query di sini...
        }

        // Atur response code.
        http_response_code($responseCode);

        // Kembalikan & Convert array menjadi json untuk pengirim request.
        echo json_encode([
            'status' => $responseCode,
            'message' => $message,
            'data' => $result,
        ]);

        exit;
    }

    public function update(array $request): void
    {
        // Persiapan nilai default.
        $responseCode = 200;
        $result = $request;
        $message = 'Success!';

        // Validasi Request
        [$isValidated, $errorMessage] = MahasiswaStore::validate($request);

        if (! $isValidated) {
            // Jiak tidak valid, sesuaikan pesan, hasil dan response code.
            // Yang wajib dilakukan adalah, menyampaikan errorMessage & penyesuaian response code.
            $message = 'Failed!';
            $result = $errorMessage;
            $responseCode = 400;
        }

        // Atur response code.
        http_response_code($responseCode);

        // Kembalikan & Convert array menjadi json untuk pengirim request.
        echo json_encode([
            'status' => $responseCode,
            'message' => $message,
            'data' => $result,
        ]);

        exit;
    }
}
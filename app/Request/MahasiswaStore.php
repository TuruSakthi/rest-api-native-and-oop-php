<?php

namespace App\Request;

class MahasiswaStore
{
    public static function validate(array $request): array
    {
        $errorMessage = [];
        if (! isset($request['nama'])) {
            $errorMessage['nama'] = 'Nama wajib diisi!';
        } elseif (strlen($request['nama']) == 0) {
            $errorMessage['nama'] = 'Nama wajib diisi!';
        }

        if (! isset($request['email'])) {
            $errorMessage['email'] = 'Email Pelajaran wajib diisi!';
        } elseif (strlen($request['email']) == 0) {
            $errorMessage['email'] = 'Email Pelajaran wajib diisi!';
        }

        if (! isset($request['alamat'])) {
            $errorMessage['alamat'] = 'Alamat Kelas Wajib diisi!';
        } elseif (strlen($request['alamat']) == 0) {
            $errorMessage['alamat'] = 'Alamat Kelas Wajib diisi!';
        }

        return array_values(['isValidated' => count($errorMessage) == 0, 'errorMessage' => $errorMessage]);
    }
}

<?php

require_once __DIR__ . '/../models/Bahan.php';

class BahanController
{
    public static function index()
    {
        try {
            $result = Bahan::get();

            http_response_code(200);
            header('Content-Type: application/json');
            echo json_encode([
                'data' => $result
            ]);
        } catch (Exception $e) {
            self::error($e);
        }
    }

    public static function find($id)
    {
        try {
            $result = Bahan::find($id);

            if (!$result) {
                http_response_code(404);
                echo json_encode([
                    'error' => 'Bahan tidak ditemukan'
                ]);
                return;
            }

            http_response_code(200);
            header('Content-Type: application/json');
            echo json_encode([
                'data' => $result
            ]);
        } catch (Exception $e) {
            self::error($e);
        }
    }

    public static function create()
    {
        try {
            $payload = json_decode(file_get_contents('php://input'), true);

            if (!isset($payload['nama']) ||!isset($payload['deskripsi']) || !isset($payload['harga']) ||!isset($payload['jenis'])) {
                http_response_code(400);
                echo json_encode(['error' => 'Data tidak lengkap']);
                return;
            }

            $data = [
                'nama' => $payload['nama'],
                'deskripsi' => $payload['deskripsi'],
                'harga' => $payload['harga'],
                'jenis' => $payload['jenis'],
                'foto' => $payload['foto'] ?? null
            ];

            $result = Bahan::create($data);

            http_response_code(201);
            header('Content-Type: application/json');
            echo json_encode([
                'data' => $result
            ]);
        } catch (Exception $e) {
            self::error($e);
        }
    }

    public static function update($id)
    {
        try {
            $payload = json_decode(file_get_contents('php://input'), true);

            $data = [
                'nama' => $payload['nama'],
                'deskripsi' => $payload['deskripsi'],
                'harga' => $payload['harga'],
                'jenis' => $payload['jenis'],
                'foto' => $payload['foto'] ?? null
            ];

            $result = Bahan::update($id, $data);

            http_response_code(200);
            header('Content-Type: application/json');
            echo json_encode([
                'data' => $result
            ]);
        } catch (Exception $e) {
            self::error($e);
        }
    }

    public static function destroy($id)
    {
        try {
            $success = Bahan::delete($id);

            if (!$success) {
                http_response_code(404);
                header('Content-Type: application/json');
                echo json_encode([
                    'error' => 'Data not found'
                ]);
                return;
            }

            http_response_code(200);
            header('Content-Type: application/json');
            echo json_encode([
                'data' => ['deleted' => true]
            ]);
        } catch (Exception $e) {
            self::error($e);
        }
    }

    private static function error($e)
    {
        http_response_code(500);
        header('Content-Type: application/json');
        echo json_encode([
            'error' => $e->getMessage()
        ]);
    }
}

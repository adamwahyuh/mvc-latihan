<?php

require_once __DIR__ . '/../../../router.php';
require_once __DIR__ . '/../../../controller/BahanController.php';


get('/api/v1/bahan', function () {
    BahanController::index();
});

get('/api/v1/bahan/$id', function ($id) {
    BahanController::find($id);
});

post('/api/v1/bahan', function () {
    BahanController::create();
});

put('/api/v1/bahan/$id', function ($id) {
    BahanController::update($id);
});

delete('/api/v1/bahan/$id', function ($id) {
    BahanController::destroy($id);
});
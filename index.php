<?php 

require_once "router.php";
require_once "models/Bahan.php";

get('/', 'views/home');

get('/bahan', function (){
    $bahanBahan = Bahan::get();
    return include 'views/listing-bahan.php';
});

get('/bahan/$id', function ($id){
    $bahan = Bahan::find($id);
    if (!$bahan){
        return route('/404', 'views/404');
    }
    return include 'views/show-bahan.php';
});

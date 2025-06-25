<?php

class Bahan {
    private static $data = [
        ['id' => 1, 'nama' => 'Kunyit',],
        ['id' => 2, 'nama' => 'Jahe',],
        ['id' => 3, 'nama' => 'Madu',],
    ];
    
    public static function get() {
        return self::$data;
    }
    public static function find($id) {
        if(isset(self::$data)){
            $hasil = array_filter(self::$data, function($item) use ($id) {
                if($item['id'] == $id){
                    return $item;
                }
                return false;
            });
            if (count($hasil)){
                // $hasil = array_values($hasil); 
                return $hasil[$id - 1];
            }
            return null;
        }
        return null;
    }

}
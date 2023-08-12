<?php

namespace App\Library;

class WebpConvertor
{
    public static function convert($webp_path,$webp_image,$new_path,$new_file_name){

        //Old webp image convert
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://v2.convertapi.com/convert/webp/to/jpg?Secret=V9i2M4Pr5mYaGl1w&StoreFile=true',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array('File' => 'https://www.kajshop.com/'.$webp_path.$webp_image),
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        $r = (array) json_decode($response);
        //Old webp image convert

        
        
        //New jpg image put
        $curl2 = curl_init();
        curl_setopt_array($curl2, array(
             CURLOPT_URL => @$r['Files'][0]->Url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
        ));
        $response2 = curl_exec($curl2);
        curl_close($curl2);
        $new_image = $new_path.$new_file_name;
        file_put_contents($new_image,@$response2);
        return $new_file_name;
    }
}

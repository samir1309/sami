<?php

namespace App\Library;
use App\Models\Taggable;

class TagClass
{
    public static function relates($relate_data,$data_id,$data_type,$edit){
        $data = [];
        foreach($relate_data as $row){
            $item_ex = explode('|',$row);
            $data[]=[

                'tag_id'=>$data_id,
                'taggable_type'=>$item_ex[0],
                'taggable_id'=>$item_ex[1]
            ];

        }
        if($edit == true){
            $relate = Taggable::where('taggable_id',$data_id)->where('taggable_type',$data_type)->delete();
        }
        Taggable::insert($data);
        return true;
    }

    public static function relateData($data_id,$data_type){

        $arr = [];
        $relate = Taggable::where('tag_id',$data_id)->where('taggable_type',$data_type)->get();
        foreach($relate as $item){
            $arr[] = $item->taggable_type.'|'.$item->taggable_id;
        }
        return $arr;
    }


}

<?php
    namespace DAO\Json;

    class Json{
        
    public static function Serilize($list, $fileName){ 
        $string = "[";
        $end = count($list);
        
        if($end == 1){
            $string = $list[0]->toJson();
        }else{
            foreach ($list as $key => $value) {
                if($key!=$end-1)
                    $string .= $value->toJson().",";
                else
                    $string .= $value->toJson();
            }
            $string .= "]";
        }

        $fp = fopen($fileName, 'w');
        fwrite($fp, $string);
        fclose($fp);
    }

    public static function Deserilize($fileName){
        $fp = fopen($fileName, 'rb');
        $string = fread($fp, filesize('test.json'));
        fclose($fp);

        return $string;
    }


    }

?>
<?php
    namespace DAO\Json;

    class Json{
        
    public function Serilize($list){
        //$list[1] = $list[0];
        $end = count($list);
        $string = "[";
        
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

        $fp = fopen('test.json', 'w');
        fwrite($fp, $string);
        fclose($fp);
    }

    public function Deserilize(){
        $fp = fopen('test.json', 'rb');
        $string = fread($fp, filesize('test.json'));
        fclose($fp);

        return json_decode($string, true);
    }


    }

?>
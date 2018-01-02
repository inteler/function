<?php

class func {

    //phalcon模型find的分页写法
    /*public function getArticleFromUsers(Array $user = [], (int)$page = 1, (int)$nums = 15, (int)$type = 1)
    {
        $conditions = "user_id = :user_id: AND status = :status:";
        $bind = ['user_id' => $user['id'], 'status' => 1];
        if ($type == 1) {
            $rows = ForumArticleInfo::find([
                "conditions" => $conditions,
                "bind" => $bind,
                'order' => "id DESC",
                'limit' => $nums,
                'offset' => ($page - 1) * $nums,
            ]);
        }
        $count = ForumArticleInfo::count([
            "conditions" => $conditions,
            "bind" => $bind
        ]);
        return [
            'rows' => !empty($rows) ? $rows : [],
            'count' => $count,
            'max_page' => (int)ceil($count / $nums)
        ];
    }*/

    //转换数组中的null
    public static function change_null(array $arr,$str=0){
        if($arr !== null){
            if(is_array($arr)){
                if(!empty($arr)){
                    foreach($arr as $key => $value){
                        if($value === null){
                            $arr[$key] = $str;
                        }else{
                            $arr[$key] = self::change_null($value,$str);      //递归再去执行
                        }
                    }
                }else{ $arr = $str; }
            }else{
                if($arr === null){ $arr = $str; }  //注意三个等号
            }
        }else{ $arr = $str; }
        return $arr;
    }
}
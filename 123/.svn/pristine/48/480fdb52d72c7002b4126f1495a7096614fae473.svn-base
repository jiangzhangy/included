<?php 
//过滤sql注入
function filter_injection(&$request)
{   
    $pattern = "/(select)|(insert)|(update)|(delete)|(from)|(where)/i";
    foreach ($request as $k => $v) {
        if (preg_match($pattern, $k)) {
            die("SQL Injection denied!");
        }
        if (is_array($v)) {
            filter_injection($v);
        } else {
           // file_put_contents('user011.txt', $pattern.$v.preg_match($pattern, $v));
            if (preg_match($pattern, $v)) {
                die("SQL Injection denied!");
            }
        }
    }
}

/**
 * 转义php和javascript 代码标记
 *
 * @param $str
 * @return mixed
 */
function trim_script($str)
{
    if (is_array($str)) {
        foreach ($str as $key => $val) {
            $str[$key] = trim_script($val);
        }
    } else {
        $str = preg_replace('/\<([\/]?)script([^\>]*?)\>/si', '&lt;\\1script\\2&gt;', $str);
        $str = preg_replace('/\<([\/]?)iframe([^\>]*?)\>/si', '&lt;\\1iframe\\2&gt;', $str);
        $str = preg_replace('/\<([\/]?)frame([^\>]*?)\>/si', '&lt;\\1frame\\2&gt;', $str);
        $str = str_replace('javascript:', 'javascript：', $str);
        $str = str_replace('<?', '&lt;?', $str);
        $str = str_replace('?>', '?&gt;', $str);
        $str = str_replace('onabort', '', $str);
        $str = str_replace('onblur', '', $str);
        $str = str_replace('onchange', '', $str);
        $str = str_replace('onclick', '', $str);
        $str = str_replace('ondblclick', '', $str);
        $str = str_replace('onerror', '', $str);
        $str = str_replace('onfocus', '', $str);
        $str = str_replace('onkeydown', '', $str);
        $str = str_replace('onkeypress', '', $str);
        $str = str_replace('onkeyup', '', $str);
        $str = str_replace('onload', '', $str);
        $str = str_replace('onmousedown', '', $str);
        $str = str_replace('onmousemove', '', $str);
        $str = str_replace('onmouseout', '', $str);
        $str = str_replace('onmouseover', '', $str);
        $str = str_replace('onmouseup', '', $str);
        $str = str_replace('onreset', '', $str);
        $str = str_replace('onresize', '', $str);
        $str = str_replace('onselect', '', $str);
        $str = str_replace('onsubmit', '', $str);
        $str = str_replace('onunload', '', $str);
    }
    return $str;
}
 /**
 * 是否手机访问
 * @return bool
 * @author jry <598821125@qq.com>
 */
function is_wap() {
    // 如果有HTTP_X_WAP_PROFILE则一定是移动设备
    if (isset ($_SERVER['HTTP_X_WAP_PROFILE'])) {
        return true;
    }
    // 如果via信息含有wap则一定是移动设备,部分服务商会屏蔽该信息
    if (isset ($_SERVER['HTTP_VIA'])) {
        // 找不到为flase,否则为true
        return stristr($_SERVER['HTTP_VIA'], "wap") ? true : false;
    }
    // 脑残法，判断手机发送的客户端标志,兼容性有待提高
    if (isset ($_SERVER['HTTP_USER_AGENT'])) {
        $clientkeywords = array ('nokia',
            'sony',
            'ericsson',
            'mot',
            'samsung',
            'htc',
            'sgh',
            'lg',
            'sharp',
            'sie-',
            'philips',
            'panasonic',
            'alcatel',
            'lenovo',
            'iphone',
            'ipod',
            'blackberry',
            'meizu',
            'android',
            'netfront',
            'symbian',
            'ucweb',
            'windowsce',
            'palm',
            'operamini',
            'operamobi',
            'openwave',
            'nexusone',
            'cldc',
            'midp',
            'wap',
            'mobile'
        );
        // 从HTTP_USER_AGENT中查找手机浏览器的关键字
        if (preg_match("/(" . implode('|', $clientkeywords) . ")/i", strtolower($_SERVER['HTTP_USER_AGENT']))) {
            return true;
        }
    }
    // 协议法，因为有可能不准确，放到最后判断
    if (isset ($_SERVER['HTTP_ACCEPT'])) {
        // 如果只支持wml并且不支持html那一定是移动设备
        // 如果支持wml和html但是wml在html之前则是移动设备
        if ((strpos($_SERVER['HTTP_ACCEPT'], 'vnd.wap.wml') !== false) && (strpos($_SERVER['HTTP_ACCEPT'], 'text/html') === false || (strpos($_SERVER['HTTP_ACCEPT'], 'vnd.wap.wml') < strpos($_SERVER['HTTP_ACCEPT'], 'text/html')))) {
            return true;
        }
    }
    return false;
}
/**
     *-------------------------------------------
     * 生成随机字符串
     * @param int       $length  要生成的随机字符串长度
     * @param string    $type    随机码类型：0，数字+大小写字母；1，数字；2，小写字母；3，大写字母；4，特殊字符；-1，数字+大小写字母+特殊字符----------------------------------------
     * @return string
     */
function randCode($length = 5, $type = 0) {
        $arr = array(1 => "0123456789", 2 => "abcdefghijklmnopqrstuvwxyz", 3 => "ABCDEFGHIJKLMNOPQRSTUVWXYZ", 4 => "~@#$%^&*(){}[]|");
        if ($type == 0) {
            array_pop($arr);
            $string = implode("", $arr);
        } elseif ($type == "-1") {
            $string = implode("", $arr);
        } else {
            $string = $arr[$type];
        }
        $count = strlen($string) - 1;
        $code = '';
        for ($i = 0; $i < $length; $i++) {
            $code .= $string[rand(0, $count)];
        }
        return $code;
    }
  /**
     * 将数据集转换成Tree（真正的Tree结构）
     * @param array $list 要转换的数据集
     * @param string $pk ID标记字段
     * @param string $pid parent标记字段
     * @param string $child 子代key名称
     * @param string $root 返回的根节点ID
     * @param string $strict 默认严格模式
     * @return array
     */
function list_to_tree($list, $pk='id', $pid = 'parent_id', $child = '_child', $root = 0, $strict = true) {
        // 创建Tree
        $tree = array();
        if (is_array($list)) {
            // 创建基于主键的数组引用
            $refer = array();
            foreach ($list as $key => $data) {
                $refer[$data[$pk]] =& $list[$key];
            }
            foreach ($list as $key => $data) {
                // 判断是否存在parent
                $parent_id = $data[$pid];
                if ($parent_id === null || (String)$root === $parent_id) {
                    $tree[] =& $list[$key];
                } else {
                    if(isset($refer[$parent_id])){
                        $parent =& $refer[$parent_id];
                        $parent[$child][] =& $list[$key];
                    } else {
                        if($strict === false){
                            $tree[] =& $list[$key];
                        }
                    }
                }
            }
        }
        return $tree;
    }  

    function _toFormatTree($cate, $html = '┝', $pid = 0, $level = 0, $flag = 0)
    {
        $arr = array();
        foreach ($cate as $v) {
            if ($v['parent_id'] == $pid) {
                $v['level'] = $level + 1;
                if ($pid != 0) {
                    if ($flag == 0)
                        $v['name'] = str_repeat("　&nbsp", $level) . $html . $v['name'];
                    else
                        $v['name'] = $v['name'];
                }
                $arr[] = $v;
                $arr = array_merge($arr, _toFormatTree($cate, $html, $v['id'], $level + 1, $flag));
            }
        }
        return $arr;
    }
function https_request($url, $data = null){
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
    if (!empty($data)) {
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
    }
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_SSLVERSION, CURL_SSLVERSION_TLSv1);
    $output = curl_exec($curl);
    curl_close($curl);
    return $output;
}
//获取所有的子类id
function get_all_cate_id($pid,$model){
    $arr = cate_unlimitv($pid,$model);
    $arr[] = $pid;
    $cate_id_str = implode(',', $arr);
    return $cate_id_str;
}
//获取所有的子类
function cate_unlimitv($pid,$model){
    $list = M($model)->where(array('status'=>1))->select();
    $arr =array();
    foreach($list as $v){
     if($v['parent_id'] == $pid){
        $arr[] = $v['id']; 
        $arr = array_merge($arr,cate_unlimitv($v['id'],$model));
     }
  }
      return $arr;

  } 
//文章栏目
function getCateName($cate_id){
    $subject = M('article_cate')->where(array('id'=>$cate_id))->getField('subject');
    if(empty($subject)){
       $subject = '全部分类';
    }
    return $subject;
}
//广告位置
function getAdvName($type_id){
    $subject = M('advertise_cate')->where(array('id'=>$type_id))->getField('subject');
    return $subject;
}
//产品栏目
function getProductName($type_id){
    $subject = M('product_cate')->where(array('id'=>$type_id))->getField('subject');
    return $subject;
 }
function get_wxid(){
   $wxid = M('wx_wxuser')->getField('wxid');
    return $wxid?$wxid:false;
} 
//获取accesstoken
function get_accesstoken(){
    $public = M('wx_wxuser')->field('appid,secret,id')->find();
    if(!empty($public)){
         $url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid={$public['appid']}&secret={$public['secret']}";
         $json = json_decode(https_request($url),true);
         return $json['access_token'];
    }else{
         return false;
    }
 }  
<?php
/**
 * Created by PhpStorm.
 * User: allen
 * Date: 2018/10/30
 * Time: 9:42 PM
 */

/**
 * 变量友好化打印输出
 * @param variable  $param  可变参数
 * @example dump($a,$b,$c,$e,[.1]) 支持多变量，使用英文逗号符号分隔，默认方式 print_r，查看数据类型传入 .1
 * @version php>=5.6
 * @return void
 */
function pd(...$param){
    echo '<style>.php-print{background:#eee;padding:10px;border-radius:4px;border:1px solid #ccc;line-height:1.5;white-space:pre-wrap;font-family:Menlo,Monaco,Consolas,"Courier New",monospace;font-size:13px;}</style>', '<pre class="php-print">';

    if(end($param) === .1){
        array_splice($param, -1, 1);

        foreach($param as $k => $v){
            echo $k>0 ? '<hr>' : '';

            ob_start();
            var_dump($v);

            echo preg_replace('/]=>\s+/', '] => <label>', ob_get_clean());
        }
    }else{
        foreach($param as $k => $v){
            echo $k>0 ? '<hr>' : '', print_r($v, true); // echo 逗号速度快 https://segmentfault.com/a/1190000004679782
        }
    }
    echo '</pre>';
    die;
}

/**
 * 变量友好化打印输出
 * @param variable  $param  可变参数
 * @example dump($a,$b,$c,$e,[.1]) 支持多变量，使用英文逗号符号分隔，默认方式 print_r，查看数据类型传入 .1
 * @version php>=5.6
 * @return void
 */
function pp(...$param){
    echo '<style>.php-print{background:#eee;padding:10px;border-radius:4px;border:1px solid #ccc;line-height:1.5;white-space:pre-wrap;font-family:Menlo,Monaco,Consolas,"Courier New",monospace;font-size:13px;}</style>', '<pre class="php-print">';

    if(end($param) === .1){
        array_splice($param, -1, 1);

        foreach($param as $k => $v){
            echo $k>0 ? '<hr>' : '';

            ob_start();
            var_dump($v);

            echo preg_replace('/]=>\s+/', '] => <label>', ob_get_clean());
        }
    }else{
        foreach($param as $k => $v){
            echo $k>0 ? '<hr>' : '', print_r($v, true); // echo 逗号速度快 https://segmentfault.com/a/1190000004679782
        }
    }
    echo '</pre>';
}

function p($data,$die = 0){
    echo is_cli() ? "\n" : '<pre>';
    print_r($data);
    echo is_cli() ? "\n" : '</pre>';
    if($die){
        die;
    }
}

function hoops(){
    // whoops: php errors for cool kids
    $whoops = new \Whoops\Run;
    $whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
    $whoops->register();
}

if(!function_exists('is_cli')){
    /*
    判断当前的运行环境是否是cli模式
    */
    function is_cli()
    {
        return preg_match("/cli/i", php_sapi_name()) ? true : false;
    }
}
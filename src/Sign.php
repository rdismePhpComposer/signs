<?php

namespace Rdisme\Signs;


/**
 * 签名
 */
class Sign
{

    // 签名密钥
    private $secret;


    public function __construct($config)
    {
        $this->secret = $config['secret'];
    }


    /**
     * sign的校验
     * 全局唯一
     * 失败false
     * 成功true
     */
    public function check($data, $sign)
    {
        $s = $this->create($data);
        return $s == $sign;
    }


    /**
     * sign的生成
     */
    public function create($data)
    {
        // 根据key对数据升序排列
        ksort($data);

        // 删除sign值
        if (isset($data['sign'])) {
            unset($data['sign']);
        }

        // 开始拼接sign
        $sign = '';
        foreach ($data as $v) {
            $sign .= $v . $this->secret;
        }

        return md5(md5($sign));
    }
}

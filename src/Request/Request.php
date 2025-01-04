<?php

namespace TelegramBot\Request;

class Request
{
    public function make($method, $parameters = [])
    {
        $url = sprintf("%s%s", env('TELEGRAM_API_URL'), $method);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: multipart/form-data']);
        if (env('PROXY') !== null)
            curl_setopt($ch, CURLOPT_PROXY, env('PROXY'));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $parameters);
        $result = curl_exec($ch);
        curl_close($ch);
        return $result;

    }
}
<?php

namespace TelegramBot\Methods;

use TelegramBot\Request\Request;

class BaseMethod
{
    protected string $method = '';
    protected array $attributes = [];










    public static function __callStatic(string $name, array $arguments)
    {
        $className = get_called_class();
        $instance = new $className;
        return $instance->methodCaller($instance, $name, $arguments);

    }

    public function __call(string $name, array $arguments)
    {
        return $this->methodCaller($this, $name, $arguments);
    }

    public function __set(string $name, $value)
    {
        $this->attributes[$name] = $value;
        return $this;
    }


    public function __get(string $name)
    {
        return $this->attributes[$name];
    }

    private function methodCaller($instance, $name, $arguments)
    {

        if (method_exists($this, $name)) {
            return call_user_func_array([$instance, $name], $arguments);
        } else {
            return call_user_func_array([$instance, 'setAttribute'], [$name, $arguments]);
        }
    }


    private function setAttribute($name, $value)
    {
        $name = strtolower(preg_replace('/(?<!^)[A-Z]/', '_$0', $name));
        $this->$name = $value[0];
        return $this;
    }

    public function __destruct()
    {
        (new Request())->make($this->method, $this->attributes);

    }
}
<?php

namespace LaraPress\Auth;

class Credentials
{
    protected $wp_hasher;

    public function __construct()
    {
        $this->wp_hasher = new PasswordHash(8, true);
    }

    public function hashPassword($password)
    {
        return $this->wp_hasher->HashPassword(trim($password));
    }

    public function checkPassword($password, $user_pass)
    {
        return $this->wp_hasher->CheckPassword($password, $user_pass);
    }

    public function checkMD5($password, $user_pass)
    {

        return $this->wp_hasher->CheckPassword($password, $user_pass);
    }

    public function generatePassword($length = 12, $special_chars = true, $extra_special_chars = false)
    {
        $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        if ($special_chars)
            $chars .= '!@#$%^&*()';
        if ($extra_special_chars)
            $chars .= '-_ []{}<>~`+=,.;:/?|';

        $password = '';
        for ($i = 0; $i < $length; $i++) {
            $password .= substr($chars, wp_rand(0, strlen($chars) - 1), 1);
        }

        // random_password filter was previously in random_password function which was deprecated
        return apply_filters('random_password', $password);
    }

}
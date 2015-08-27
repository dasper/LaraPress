<?php namespace LaraPress\Database;

use Illuminate\Database\Eloquent\Model as Eloquent;

use LaraPress\Auth as Auth;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent
{

    protected $table = 'users';
    protected $primaryKey = 'ID';
    protected $timestamp = false;
    protected $hidden = array('password', 'user_pass');

    public function post()
    {
        return $this->hasMany('Post', 'post_author');
    }

    public function Usermeta()
    {
        return $this->hasMany('Usermeta', 'user_id');
    }

    public function hashPassword($password)
    {
        $wp_hasher = new Auth\PasswordHash(8, true);
        return $wp_hasher->HashPassword(trim($password));
    }

    public function checkPassword($password, $user_pass)
    {
        $wp_hasher = new Auth\PasswordHash(8, true);
        return $wp_hasher->CheckPassword($password, $user_pass);
    }

    public function wp_check_password($password, $user_pass)
    {
        return $this->checkPassword($password, $user_pass);
    }

    public function wp_hash_password($password)
    {
        return $this->hashPassword($password);
    }

    public function getAuthIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Get the password for the user.
     *
     * @return string
     */
    public function getAuthPassword()
    {
        return $this->password;
    }

    /**
     * Get the e-mail address where password reminders are sent.
     *
     * @return string
     */
    public function getReminderEmail()
    {
        return $this->email;
    }

    public function getRememberToken()
    {

    }

    public function getRememberTokenName()
    {

    }

    public function setRememberToken($value)
    {

    }

}

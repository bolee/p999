<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{

    public $email;
    public $id;
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */

    public function __construct(&$obj)
    {
        $this->email = $obj->email;
        $this->password = $obj->password;
        if(!empty($obj->id))
        {
            $this->username = $obj->display;
            $this->id = $obj->id;
        }
    }

	public function authenticate()
	{
        //注册登录的时候直接返回真
        if(!empty($this->id))
        {
            return !$this->errorCode = self::ERROR_NONE;
        }
        //进行登陆验证
        $user = User::model()->findByAttributes(array('email'=>$this->email));
        if(empty($user))
        {
            $this->errorCode=self::ERROR_UNKNOWN_IDENTITY;
        } elseif($user->password !== $this->password) {
            $this->errorCode=self::ERROR_UNKNOWN_IDENTITY;
        } else {
            $this->errorCode=self::ERROR_NONE;
        }
		return !$this->errorCode;
	}

    public function getEmail()
    {
        return $this->email;
    }

    public function getId()
    {
        return $this->id;
    }
}
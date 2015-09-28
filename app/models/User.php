<?php

use \Toddish\Verify\Models\User as VerifyUser;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends VerifyUser implements UserInterface, RemindableInterface {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'usuarios';
    protected $guarded = array();

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password');

	/**
	 * Get the unique identifier for the user.
	 *
	 * @return mixed
	 */
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


    /**
     * @return object
     */
    public static function role($user_id = null) {

        if( is_null($user_id) ) {
            $user_id = \Utils::usuario()['id'];
        }

        return DB::table('role_user')
            ->join('roles', 'role_user.role_id', '=', 'roles.id')
            ->where('role_user.user_id', $user_id )
            ->first();
    }

    /**
     * Retornar objeto con todos los usuarios
     * @return object
     */
    public static function todos() {
        return self::select(["usuarios.id", "usuarios.nombre", "usuarios.username","roles.name AS role_name","usuarios.disabled"])
            ->join('role_user', 'usuarios.id', '=', 'role_user.user_id')
            ->join('roles', 'role_user.role_id', '=', 'roles.id')
            ->remember(5);
    }


    /**
     * Retornar objeto con información del usuario
     * @return object
     */
    public static function get($usuario_id) {
        return self::select(["usuarios.*", "roles.name AS role_name", "role_user.role_id"])
            ->join('role_user', 'usuarios.id', '=', 'role_user.user_id')
            ->join('roles', 'role_user.role_id', '=', 'roles.id')
            ->where("usuarios.id", $usuario_id)
            ->first();
    }


    /**
     * Retornar objeto con todos los usuarios según el rol especificado
     * @return object
     */
    public static function filtroRol($val) {
        $return = self::select(["usuarios.*", "roles.name AS role_name", "role_user.role_id"])
            ->join('role_user', 'usuarios.id', '=', 'role_user.user_id')
            ->join('roles', 'role_user.role_id', '=', 'roles.id');

        if( is_numeric($val) ) {
            $return->where("roles.id", $val);
        }else {
            $return->where("roles.name", $val);
        }

        return $return->orderBy("usuarios.nombre")->get();
    }

    public static function nitUsers($nit)
    {
        $rs = self::whereNit($nit)->whereDisabled(0)->get(['email', 'nombre', \DB::raw(" '' as subject")]);

        return $rs->toArray();

    }

}
<?php

namespace EPHP\Auth;

use EPHP\Models\User;
use EPHP\Security\Hash;
use EPHP\Storage\Session;

class Auth
{
	/**
	 * Intenta loguear al usuario.
	 *
	 * @param string $email
	 * @param string $password
	 * @return boolean
	 */
	public static function login($email, $password)
	{
		$user = User::getByEmail($email);


		// Verificamos que exista un usuario con ese email.
		if($user !== null) {

			// Verificamos que el password coincida con lo hasheado.
			if(Hash::verify($password, $user->password)) {
				self::logUser($user);
				return true;
			}
			
		}

		return false;
	}

	/**
	 * Marca al usuario como logueado.
	 *
	 * @param User $user
	 */
	public static function logUser($user)
	{
		Session::set('id', $user->id_user);
	}

	/**
	 * Obtiene el id del usuario logueado.
	 *
	 * @return int
	 */
	public static function getUserId()
	{
		return (int) Session::get('id');
	}
}
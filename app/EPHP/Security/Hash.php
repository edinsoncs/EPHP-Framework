<?php

namespace EPHP\Security;

class Hash
{
	/**
	 * Encripta el password usando un algoritmo irreversible y seguro.
	 *
	 * @param string $password
	 * @return string
	 */
	public static function make($password)
	{
		return password_hash($password, PASSWORD_DEFAULT);
	}

	/**
	 * Verificar si un password coincide con el hash.
	 *
	 * @param string $password
	 * @param string $hash
	 * @return boolean
	 */
	public static function verify($password, $hash)
	{
		return password_verify($password, $hash);
	}
}
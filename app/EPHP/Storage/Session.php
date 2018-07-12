<?php
namespace EPHP\Storage;

/**
 * Maneja todo lo referente a la sesión.
 */
class Session
{
	/**
	 * Inicia la sesión.
	 */
	public static function start()
	{
		session_start();
	}

	/**
	 * Destruye la sesión.
	 */
	public static function destroy()
	{
		session_destroy();
	}

	/**
	 * Almacena un valor en la sesión.
	 *
	 * @param $name string
	 * @param $value string
	 */
	public static function set($name, $value)
	{
		$_SESSION[$name] = $value;
	}

	/**
	 * Recupera un valor de la sesión.
	 * 
	 * @param $name string
	 * @return mixed
	 */
	public static function get($name)
	{
		return $_SESSION[$name];
	}

	/**
	 * Recupera un valor de la sesión y lo elimina.
	 * 
	 * @param $name string
	 * @return mixed
	 */
	public static function once($name)
	{
		$value = $_SESSION[$name];
		self::remove($name);
		return $value;
	}

	/**
	 * Elimina un valor de la sesión.
	 * 
	 * @param $name string
	 */
	public static function remove($name)
	{
		unset($_SESSION[$name]);
	}

	/**
	 * Chequea si existe la variable de sesión.
	 *
	 * @param $name string
	 * @return boolean
	 */
	public static function has($name)
	{
		return isset($_SESSION[$name]);
	}
}
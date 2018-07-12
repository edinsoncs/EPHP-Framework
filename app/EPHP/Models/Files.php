<?php 
namespace EPHP\Models;

use PDO;
use Exception;
use EPHP\DB\DBConnection as Connection;
use EPHP\Storage\Session;


class Files {


	/* My Properties */
	public static $img;


	public static function createImage($files) {
		
		// Guardamos la ruta absoluta de base del proyecto.
		$rootPath = realpath(__DIR__ . '/../../../public/uploads/');
		
		
		$name = uniqid() . "{$files['file']['name']}";
		$folder =  $rootPath .'/' .$name;
		$result = move_uploaded_file($files['file']['tmp_name'], $folder);
		
		if($result) {
			return self::insertDB($name, true);
		} else {
			return false;
		}
		
	}


	public static function insertDB($name, $status) {

		if($status)  {

				$db = Connection::getConnection();
				$query = "INSERT INTO files (name, gallery, user, avatar, createdAt)
				VALUES (:name, :gallery, :user, :avatar, now())";
				$stmt = $db->prepare($query);
				$success = $stmt->execute([
					'name' => $name,
					'gallery' => null,
					'user' => Session::get('id'),
					'avatar' => null
				]);

				if($success) {

					$files 			= 	new Files;
					$files->id 		= 	$db->lastInsertId();

					return $files;

				} else {

					throw new Exception("Error al subir la imagen");

				}

		}

	}

	public static function removeImage($field){
		
		$database = Database::getConnect();
		$q = "DELETE FROM files WHERE id = :id AND user = :user";
		$stmt = $database->prepare($q);
		$success = $stmt->execute([
			'id' => $field['remove'],
			'user' => Session::get('id')
		]);

		return $success;

	}

	
	public static function updateImg($field, $files) {

		//User update
		if(isset($field['update'])) {

			$rImage = self::removeImage($field);

			if($rImage) {

				$cImage = self::createImage($field, $files);

				$database = Database::getConnect();
				//New upload avatar user
				$q = "INSERT INTO files (name, avatar, user)
				VALUES (:name, :avatar, :user) ";
				$stmt = $database->prepare($q);
				$success = $stmt->execute([
					'name' => $cImage,
					'avatar' => 1,
					'user' => Session::get('id')
				]);

				if($success) {
					return true;
				}

			} else {

				return false;

			}

		}
		

	}

	public static function newFigurita($field, $files) {

		$cImage = self::createImage($field, $files);

		if($cImage) {

			$database = Database::getConnect();
			//New upload avatar user
			$q = "INSERT INTO files (name, avatar, gallery, user)
			VALUES (:name, :avatar, :gallery, :user) ";
			$stmt = $database->prepare($q);
			$success = $stmt->execute([
				'name' => $cImage,
				'avatar' => 0,
				'gallery' => 1,
				'user' => Session::get('id')
			]);

			if($success) {

				$u = "UPDATE figurita SET file = :file WHERE id = :id ";
				$stmt_ = $database->prepare($u);
				$continue = $stmt_->execute([
					'id' => $field['idfigurita'],
					'file' => $database->lastInsertId()
				]);

				if($continue) {
					return true;
				}

			}


		}

		

	}

}


 ?>
<?php 

namespace EPHP\Models;

use PDO;
use Exception;
use EPHP\DB\DBConnection as Connection;
use EPHP\Storage\Session;
use EPHP\Models\Files;

class Post {

	/**
	 * Guarda post de los usuarios
	 *
	 * @param string $data
	 * @return POST|null
	 */
	public static function save($data)
	{
		$tPost = $_FILES['file']['name'];

		if($tPost) {

			$createImage = Files::createImage($_FILES);
			
			if($createImage) {

				$db = Connection::getConnection();
				$query = "INSERT INTO post (message, file, user, createdAt)
						  VALUES (:message, :file, :id, now())";
				$stmt = $db->prepare($query);
				$success = $stmt->execute([
					'message' => $data['message'],
					'file' => $createImage->id,
					'id' => Session::get('id')
				]);

				if($success) {
					return true;
				} else {
					return false;
				}


			}

		} else {

			$db = Connection::getConnection();
			$query = "INSERT INTO post (message, file, user, createdAt)
					  VALUES (:message, null, :id, now())";
			$stmt = $db->prepare($query);
			$success = $stmt->execute([
				'message' => $data['message'],
				'id' => Session::get('id')
			]);

			if($success) {
				return true;
			} else {
				return false;
			}
			
			
		}



			


	}


	public static function comment($data) {

		$db = Connection::getConnection();
		$query = "INSERT INTO comments (respt, post, user, createdAt)
		VALUES (:respt, :post, :id, now())";
		$stmt = $db->prepare($query);
		$success = $stmt->execute([
			'respt' => $data['message'],
			'post' => $data['id'],
			'id' => Session::get('id')
		]);

		if($success) {
			return true;
		} else {
			return false;
		}

	}

	public static function show() {

		$listArr = array();

		$db = Connection::getConnection();
		$query = "SELECT post.*, files.name FROM post 
		LEFT JOIN files ON post.file = files.id 
		ORDER BY post.createdAt DESC";
		
		$stmt = $db->prepare($query);
		$stmt->execute();

		while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {

			 array_push($listArr, $fila);
		}

		return $listArr;

		
	}

}


 ?>
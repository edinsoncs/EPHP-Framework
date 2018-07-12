<?php 


class Files {


	/* My Properties */
	public static $img;


	public static function newImg($field, $files) {

		//Register complet account
		if(isset($field['complet'])) {

			$cImage = self::createImage($field, $files);

			if($cImage)  {

				$database = Database::getConnect();
				
				//Create and upload avatar user
				$q = "INSERT INTO files (name, avatar, user)
				VALUES (:name, :avatar, :user) ";
				$stmt = $database->prepare($q);
				$success = $stmt->execute([
					'name' => $cImage,
					'avatar' => 1,
					'user' => Session::get('id')
				]);


				if($success) {


					//Modify user avatar true
					$u = "UPDATE user SET status = :status WHERE id = :id ";
					$stmt = $database->prepare($u);
					$continue = $stmt->execute([
						'id' => Session::get('id'),
						'status' => 1

					]);

					if($continue) {
						return true;
					}

				} else {
					throw new Exception("Error al subir la imagen");
				}

			}

			

		}

	}

	public static function createImage($field, $files) {

		$name = uniqid() . "{$files['avatar']['name']}";
		$folder = __DIR__ . "/../uploads/" . $name;
		$result = move_uploaded_file($files['avatar']['tmp_name'], $folder);
		
		if($result) {
			return $name;
		} else {
			return false;
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
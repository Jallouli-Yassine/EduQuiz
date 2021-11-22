<?php 
    require_once "./../config.php";
    require_once "./../model/modelComment.php";

    class CommentC{

        function ajouterComment($comment){
            $sql = "INSERT INTO c$comment(Idcomment,Iduser,nameuser,content,date,Idc$comment)
            VALUES(:Idcomment,:Iduser,:nameuser,:content,:date,:Idc$comment)";

            $db = config::getConnexion();
            try {
                
                $query = $db->prepare($sql);
                
                $query->execute([
                    'Idcomment' => $comment->getIdcomment(),
                    'Iduser' => $comment->getIduser(),
                    'nameuser' => $comment->getnameuser(),
                    'content' => $comment->getcontent(),
                    'date' => $comment->getdate(),
                    'Idpost' => $comment->getIdcomment(),
                ]);

            } catch(Exception $e){
				$e->getMessage();
			}
        }

        function affichercomment(){
			$sql="SELECT * FROM comment";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMeesage());
			}
		}


        function supprimercomment($idcomment){
			$sql="DELETE FROM comment WHERE idcomment=:idcomment";
			$db = config::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':idcomment', $idcomment);
			try{
				$req->execute();
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMeesage());
			}
		}


        function modifiercomment($comment, $idcomment){
			try {
				$db = config::getConnexion();
				$query = $db->prepare(
					'UPDATE comment SET 
						nameuser= :nameuser, 
						content= :content, 
						date= :date,
						idpost= :idpost,
					WHERE Idcomment= :Idcomment'
				);
				$query->execute([
					'nameuser' => $comment->getnameuser(),
					'content' => $comment->getcontent(),
					'date' => $comment->getdate(),
					'idpost'  => $comment->getidpost(),
					'Idcomment' => $idcommennt
				]);
				echo $query->rowCount() . " records UPDATED successfully <br>";
			} catch (PDOException $e) {
				$e->getMessage();
			}
		}

    }
    
?>
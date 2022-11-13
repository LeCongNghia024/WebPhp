<?php

class User
{
  public function insertUser($user_name,$email,$phone,$address, $password)
  {
    $db = new Database();

    $statement = $db->pdo->prepare("INSERT INTO account_user(user_name, email, phone, address, password) 
    VALUES (:user_name, :email,:phone ,:address, :password)");
    $statement->bindValue(':user_name', $user_name);
    $statement->bindValue(':email', $email);
    $statement->bindValue(':phone', $phone);
    $statement->bindValue(':address', $address);
    $statement->bindValue(':password', md5($password));
    $statement->execute();
  }

  public function getUser($email, $password)
  {
    $db = new Database();

    $statement = $db->pdo->prepare("SELECT * FROM account_user WHERE email = :email AND password = :password");
    $statement->bindValue(':email', $email);
    $statement->bindValue(':password', md5($password));
    $statement->execute();
    return $statement->fetch(PDO::FETCH_ASSOC);
  }
  public function checkEmail($email){
    $db = new Database();

    $statementemail = $db->pdo->prepare("SELECT user_id FROM account_user where email = :email");
    $statementemail->bindValue(':email',$email);
    $statementemail->execute();
    return $statementemail->fetch(PDO::FETCH_ASSOC);
  }
  public function checkpass($password){
    $db = new Database();

    $statementemail = $db->pdo->prepare("SELECT user_id FROM account_user where password = :password");
    $statementemail->bindValue(':password',md5($password));

    $statementemail->execute();
    return $statementemail->fetch(PDO::FETCH_ASSOC);
  }
  
  public function getalluser(){
    $db = new Database();
    $statement = $db->pdo->prepare("SELECT * FROM account_user");
    $statement->execute();
    return $statement->fetchAll(PDO::FETCH_ASSOC);  
  }

    public function updatepass($newpassword){
    $db = new Database();
    $statement = $db->pdo->prepare("UPDATE account_user SET password = :password where user_id = :user_id ");
    $statement->bindValue(':user_id',$_SESSION['user_id']);

    $statement->bindValue(':password', md5($newpassword));

    $statement->execute();

  }

}
?>
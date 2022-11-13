<?php
class Admin
{
  public function insertAdmin($admin_name, $email, $password, $rule)
  {
    $db = new Database();

    $statement = $db->pdo->prepare("INSERT INTO admin (admin_name, email, password , rule) 
    VALUES (:admin_name, :email, :password, :rule)");
    $statement->bindValue(':admin_name', $admin_name);
    $statement->bindValue(':email', $email);
    $statement->bindValue(':password', md5($password));
    $statement->bindValue(':rule', $rule);

    $statement->execute();
  }
 
  public function getAdmin($email, $password)
  {
    $db = new Database();

    $statement = $db->pdo->prepare("SELECT * FROM admin WHERE email = :email AND password = :password");
    $statement->bindValue(':email', $email);
    $statement->bindValue(':password', md5($password));
    $statement->execute();
    return $statement->fetch(PDO::FETCH_ASSOC); 
  }
  public function getalluser(){
    $db = new Database();
    $statement = $db->pdo->prepare("SELECT * FROM account_user");
    $statement->execute();
    return $statement->fetchAll(PDO::FETCH_ASSOC); 
  }
  public function checkEmail($email){
    $db = new Database();

    $statementemail = $db->pdo->prepare("SELECT admin_id FROM admin where email = :email");
    $statementemail->bindValue(':email',$email);
    $statementemail->execute();
    return $statementemail->fetch(PDO::FETCH_ASSOC);
  }
  public function getalladmin(){
    $db = new Database();
    $statement = $db->pdo->prepare(" SELECT * FROM admin");
    $statement->execute();
    return $statement->fetchAll(PDO::FETCH_ASSOC);  
  }
}
?>
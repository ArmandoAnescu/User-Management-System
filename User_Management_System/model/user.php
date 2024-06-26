<?php
function deleteUser(int $id){
    /**
     * @var $conn mysqli
     */
    $conn=$GLOBALS['mysqli'];
    $sql="DELETE FROM users WHERE id=$id";
    $res=$conn->query($sql);
    return $res && $conn->affected_rows;
}
function getUser(int $id){
    /**
     * @var $conn mysqli
     */
    $conn=$GLOBALS['mysqli'];
    $result=[];
    $sql="SELECT *FROM users WHERE id=$id";
    $res=$conn->query($sql);
    if($res && $res->num_rows)
    {
        $result=$res->fetch_assoc();
    }
    return $result;
}
function storeUser(int $id,array $data){
  /**
     * @var $conn mysqli
     */
    $conn=$GLOBALS['mysqli'];
    $result=0;
    $username=$conn->escape_string($data['username']);
    $email=$conn->escape_string($data['email']);
    $age=$conn->escape_string($data['age']);
    $fiscalcode=$conn->escape_string($data['fiscalcode']);
    $sql="UPDATE users SET username='$username',email='$email',fiscalcode='$fiscalcode',age='$age' WHERE id=$id";
    $res=$conn->query($sql);
    if($res )
    {
       $result= $conn->affected_rows;
    }else{
       $result=-1;
    }
    return $result;
}
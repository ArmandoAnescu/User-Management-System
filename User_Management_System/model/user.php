<?php
function deleteUser(int $id){
    /**
     * @var $conn mysqli
     */
    $conn=$GLOBALS['mysqli'];
    removeOldAvatar($id);
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

    $result=[
      'success'=>1,
      'affectedRows'=>0,
      'error'=>''
    ];
    $conn=$GLOBALS['mysqli'];
    $username=$conn->escape_string($data['username']);
    $email=$conn->escape_string($data['email']);
    $age=$conn->escape_string($data['age']);
    $fiscalcode=$conn->escape_string($data['fiscalcode']);
    $avatar=$conn->escape_string($data['avatar']);
    $sql="UPDATE users SET username='$username',email='$email',fiscalcode='$fiscalcode',age='$age',avatar='$avatar'";
    if($data['password'])
    {
      $data['password']= $data['password']?? 'testuser';//if password is not set use testuser
    $password=password_hash($data['password'],PASSWORD_DEFAULT);
    $sql.=",password='$password'";
    }
    if($data['roletype']){
      $roletype=in_array($data['roletype'],getConfig('roletypes',[]))?$data['roletype']:'user';
      $sql.=",roletype='$roletype'";
    }
        
    $sql.=" WHERE id=$id";
    var_dump($sql);
    $res=$conn->query($sql);
    if($res )
    {
       $result['affectedRows']= $conn->affected_rows;
    }else{
       $result['success']=0;
       $result['error']=$conn->error;
    }
    return $result;
}
function saveUser(array $data){
    /**
       * @var $conn mysqli
       */
      $conn=$GLOBALS['mysqli'];
      $result=[
         'id'=>0,
         'success'=>false,
         'message'=>'PROBLEM IN SAVING USER',
     ];
      $username=$conn->escape_string($data['username']);
      $email=$conn->escape_string($data['email']);
      $fiscalcode=$conn->escape_string($data['fiscalcode']);
      $age=(int)$data['age'];
      $data['password']= $data['password']?? 'testuser';//if password is not set use testuser

      $password=password_hash($data['password'],PASSWORD_DEFAULT);
      $roletype=in_array($data['roletype'],getConfig('roletypes',[]))?$data['roletype']:'user';
      $sql="INSERT INTO users (username,email,fiscalcode,age,password,roletype) VALUES ('$username','$email','$fiscalcode',$age,'$password','$roletype')";
      $res=$conn->query($sql);
      if($res )
      {
         $result['id']= $conn->insert_id;
         $result['success']=true;
      }else{
         $result['message']=$conn->error;
      }
      return $result;
  }
function updateUserAvatar(int $id,string $avatar=null)
{
   if(!$avatar)
   {
      return false;
   }
   $conn=$GLOBALS['mysqli'];
   $avatar=$conn->escape_string($avatar);
   $sql="UPDATE users SET avatar='$avatar' WHERE id=$id";
   $res=$conn->query($sql);
   return $res && $conn->affected_rows;


}
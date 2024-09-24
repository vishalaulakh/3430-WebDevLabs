<?php
class Contact
{
  // Properties
  private string $name;
  private string $email;
  private string $phoneType;
  private string $phone;
  private string $contactType;

  public function __construct(string $name = "test", string $email = "", string $phoneType = "", string $area = "", string $phone = "", string $ext = "", array $contactType = array())
  {
    $this->name = $name;
    $this->email = $email;
    $this->phoneType = $phoneType;

    if ($area && $phone){
      $phoneNumber = "($area)" . " ". $phone; 
    }
    else {
      $phoneNumber = "";
    }
    
    $ext && $phoneNumber = $phoneNumber. "-".$ext;
    
    $this->phone = $phoneNumber;

    $this->contactType = implode(",",$contactType);

    #############################
    #Finish the constructor here
    #############################

  }

  // Get Methods
  function get_name()
  {
    return $this->name;
  }
  function get_email()
  {
    return $this->email;
  }
  function get_phoneType()
  {
    return $this->phoneType;
  }
  function get_phone()
  {
    return $this->phone;
  }
  function get_contactType()
  {
    return $this->contactType;
  }
}
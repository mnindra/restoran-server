<?php

namespace App;
use Illuminate\Foundation\Auth\User as Authenticatable;
// use Illuminate\Database\Eloquent\Model;

class Petugas extends Authenticatable
{
  protected $table = 'petugas';
  protected $primaryKey = 'id_petugas';
  public $timestamps = false;
  protected $fillable = ['nama', 'telp', 'username', 'password'];

  // Disable remember_token
  public function getRememberToken()
  {
    return null;
  }

  public function setRememberToken($value)
  {

  }

  public function getRememberTokenName()
  {
    return null;
  }

  public function setAttribute($key, $value)
  {
    $isRememberTokenAttribute = $key == $this->getRememberTokenName();

    if (!$isRememberTokenAttribute)
    {
      parent::setAttribute($key, $value);
    }
  }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Event extends Model
{
    
    use  HasFactory;

    const CREATED_AT = 'createdAt';
    const UPDATED_AT = 'updatedAt';

    /**
     * The primary key associated with the table.
     *
     * @var uuid
     */
    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'name',
        'slug',
    ];



    /**
     * Generate a new UUID for the model.
    *
     * @return string
     */
   // public function newUniqueId()
   // {

    //    return (string) Uuid::uuid4();
    //}
 
    /**
    * Get the columns that should receive a unique identifier.
    *
    * @return array
    */
    public function uniqueIds()
    {
        return ['id', 'slug'];
    }

   // public function slug()
  //  {
    //    return $slug = Str::of('Laravel Framework')->slug('-');
    //}
    
}

//return $event;

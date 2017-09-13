<?php
/**
 * Author: Pawan Homsuwan
 * Version: 1.0
 * Date: 2016-09-12
 *
 */
namespace App\Domain\V1\Tasks\Model;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{

  protected $fillable = [
      'subject',
      'content',
      'status'
   ];

}

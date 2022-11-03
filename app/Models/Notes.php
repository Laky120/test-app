<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @OA\Schema(
 *  schema="Notes",
 *  @OA\Property(
 *      property="id",
 *      type="integer"
 *  ),
 *  @OA\Property(
 *      property="full_name",
 *      type="string"
 *  ),
 *  @OA\Property(
 *      property="company",
 *      type="string"
 *  ),
 *  @OA\Property(
 *      property="phone",
 *      type="integer"
 *  ),
 *  @OA\Property(
 *      property="email",
 *      type="string"
 *  ),
 *  @OA\Property(
 *      property="birthday",
 *      type="date"
 *  ),
 *  @OA\Property(
 *      property="photo",
 *      type="string"
 *  ),
 * )
 */
class Notes extends Model
{
    public $timestamps = false;
}

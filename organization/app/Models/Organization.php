<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class Organization extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name'
    ];

    /**
     * Organization have many Active users return
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */

    public function listOfActiveUsers()
    {
        return $this->hasMany(User::class, 'organization_id');
    }

    /**
     * Organization have many Inactive users return
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */

    public function listOfInactiveUsers()
    {
        return $this->listOfActiveUsers()->where('active',0)->get();
    }

    /**
     * All inactive users delete to relate with organization.
     *
     */

    public function deleteInactiveUsers()
    {
        return $this->listOfInactiveUsers()->delete();
    }

    /**
     * Monthly wise inActive users.
     *
     */
    public function monthlyWiseUserInActive($howManyMonthAgo=2)
    {
        $users = User::whereMonth('created_at', '=', $howManyMonthAgo)->get();
        foreach($users as $user){
            $setStatus = User::where('id',$user->id)->first();
            $setStatus->active = 0;
            $setStatus->save();
        }
    }


    /**
     * Create New User.
     *
     */
    public function registerUser($name,$email,$password,$organization_id)
    {
        $setUser        = new User();
        $setUser->name  = $name;
        $setUser->password  = Hash::make($password);
        $setUser->email     = $email;
        $setUser->organization_id = $organization_id;
        $setUser->save();
    }
}

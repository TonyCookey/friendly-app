<?php
namespace App;

use App\Status;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','first_name','last_name','location','theme',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    /**
     * Name methods of the User Model
     */
    public function getName()
    {
        if ($this->first_name && $this->last_name){
            return "{$this->first_name} {$this->last_name}";
        }
        if($this->first_name){
            return $this->first_name;
        }
        return null;
    } 
    public function getNameOrUsername()
    {
        return $this->getName() ?: $this->name;
    }
    public function getFirstnameOrUsernname()
    {
        return $this->first_name ?: $this->name; 
    }
    public function getLastnameOrUsernname()
    {
        return $this->last_name ?: $this->name;
    }
    public function getAvatarUrl()
    {
        return "https://www.gravatar.com/avatar/{{md5($this->email)}}?d=mm&s=40";
    }
    /**
     * Status methods of the User Model
     */

     public function statuses()
     {
         return  $this->hasMany('App\Status','user_id',);
     }
     
     public function likes()
    {
        return $this->hasMany('App\Like', 'user_id');
    }
     



    /**
     * Friend Methods of the User Model
     */
    public function friendsofMine()
    {
        // returns people i have added as friends or sent friend requests
        return $this->belongsToMany('App\User', 'friends', 'user_id', 'friend_id');
        
    } 
    public function friendsOf()
    {
        //friendsofMine() and friendsOf() are inverted in this project
        //they perform inversely due to the fact that im following his method
        // returns people who have added me as friends or sent me friend requests
        return $this->belongsToMany('App\User', 'friends', 'friend_id', 'user_id');
    }
    public function friends()
    {
        /**
         * returns a collection of people that are friends
         * people who have accepted your friend requests
         * the function uses both many-to-many relations to verify
         */
        return $this->friendsofMine()->wherePivot('accepted',true)->get()
        ->merge($this->friendsOf()->wherePivot('accepted',true)->get());
        
    }
    public function friendRequests()
    {
        //friend request function
        return $this->friendsofMine()->wherePivot('accepted',false)->get();
    }
    public function friendRequestPending()
    {
        return $this->friendsOf()->wherePivot('accepted',false)->get();
    }
    public function hasFriendRequestPending(User $user)
    {
       return (bool) $this->friendRequestPending()->where('id',$user->id)->count();
    }
    public function hasFriendRequestRecieved(User $user)
    {
         return (bool) $this->friendRequests()->where('id',$user->id)->count();
    }
    public function addFriend(User $user)
    {
        $this->friendsOf()->attach($user->id);
    }
    public function deleteFriend(User $user)
    {
        $this->friendsOf()->detach($user->id);
        $this->friendsOfMine()->detach($user->id);
    }
    public function acceptFriendRequest(User $user)
    {
        $this->friendRequests()->where('id',$user->id)->first()
        ->pivot->update(['accepted' => true]);
    }
    public function isFriendsWith(User $user)
    {
        return (bool) $this->friends()->where('id',$user->id)->count();
    }

    public function hasLikedStatus(Status $status)
    {
       return (bool) $status->likes->where('user_id', $this->id)->count();
    }
    
    
} 
 
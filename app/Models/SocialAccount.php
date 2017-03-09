<?php

namespace SystemInvoices\Models;


use SystemInvoices\User;
use SystemInvoices\Observers\UuidObserver;
use Illuminate\Database\Eloquent\Model;

class SocialAccount extends Model
{
    use UuidObserver;
    /**
     * @var array
     */
    protected $fillable = ['user_id', 'provider_user_id', 'provider'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

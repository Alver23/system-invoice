<?php
/**
 * Created by PhpStorm.
 * User: agrisales
 * Date: 8/03/17
 * Time: 11:21 PM
 */

namespace SystemInvoices\Observers;


use Webpatser\Uuid\Uuid;


trait UuidObserver
{

    /**
     * Nos permite rellenar ciertos campos al momento de guardar o actualizar que no se van por el request
     * @return void
     */
    protected static function boot() {
        parent::boot();
        static::creating(function($model) {
            $userId = (!empty(request()->user()->id) ? request()->user()->id : 1);
            if (\Schema::hasColumn($model->table, 'uuid')) {
                $model->uuid = Uuid::generate(4);
            }
            $model->owner_user_id = $userId;
            $model->updater_user_id = $userId;
            $model->ip_address = request()->ip();
        });

        static::updating(function($model) {
            $model->updater_user_id = request()->user()->id;
            $model->ip_address = request()->ip();
        });
    }
}




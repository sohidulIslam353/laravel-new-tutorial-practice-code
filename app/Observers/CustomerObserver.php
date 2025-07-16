<?php

namespace App\Observers;

use App\Models\Customer;
use Illuminate\Support\Facades\Log;


class CustomerObserver
{


    public function creating(Customer $customer): void
    {
        $customer->who_created = 'sohidul islam';
    }

    /**
     * Handle the Customer "created" event.
     */
    public function created(Customer $customer): void
    {
        Log::info('Customer created by sohidul islam');
    }

    /**
     * Handle the Customer "updated" event.
     */
    public function updated(Customer $customer): void
    {
        //
    }

    /**
     * Handle the Customer "deleted" event.
     */
    public function deleted(Customer $customer): void
    {
        //
    }

    /**
     * Handle the Customer "restored" event.
     */
    public function restored(Customer $customer): void
    {
        //
    }

    /**
     * Handle the Customer "force deleted" event.
     */
    public function forceDeleted(Customer $customer): void
    {
        //
    }
}

<?php

namespace App\Console\Commands;

use App\Models\Provider;
use Carbon\Carbon;
use Illuminate\Console\Command;

class InactivateExpiredSubscriptions extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'subscriptions:inactivate-expired';

    /**
     * The console command description.
     * 
     * @var string
     */
    protected $description = 'Inactivate subscriptions that have expired';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // Get users with active subscriptions that have expired
        $expiredUsers = Provider::where('subscription_status', 'active')
            ->where('subscription_expires_at', '<', Carbon::now())
            ->get();

        foreach ($expiredUsers as $user) {
            // Update subscription status to 'inactive'
            $user->update([
                'subscription_status' => 'INACTIVE'
            ]);

            // Optionally, log the inactivated subscription
            // $this->info('Inactivated subscription for user: ' . $user->id);
        }

        // Confirm task completion
        // $this->info('Expired subscriptions inactivated successfully.');
    }
}

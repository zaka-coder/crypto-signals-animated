<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class DeleteExpiredCustomers extends Command
{
  /**
   * The name and signature of the console command.
   *
   * @var string
   */
  protected $signature = 'delete:expired-customers';

  /**
   * The console command description.
   *
   * @var string
   */
  protected $description = 'Delete expired customers';

  /**
   * Execute the console command.
   */
  public function handle()
  {
    $expiredCustomers = \App\Models\Customer::where('expires_at', '<', now()->subDays(3))
      ->orWhere('status', 'expired')
      ->get();
    foreach ($expiredCustomers as $customer) {
      $customer->delete();
    }

    $this->info('Expired customers deleted successfully.');
  }
}

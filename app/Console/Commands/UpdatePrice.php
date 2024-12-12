<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class UpdatePrice extends Command
{
  /**
   * The name and signature of the console command.
   *
   * @var string
   */
  protected $signature = 'update:price';

  /**
   * The console command description.
   *
   * @var string
   */
  protected $description = 'update price';

  /**
   * Execute the console command.
   */
  public function handle()
  {
    $customers = \App\Models\Subscription::all();
    foreach ($customers as $customer) {
      $customer->update([
        'price' => $customer->category->price,]);
    }

    $this->info('Price updated successfully.');
  }
}

<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Category;
use App\Models\Customer;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\IOFactory;

class ImportController extends Controller
{
  // for first sheat
  public function store(Request $request)
  {

    $request->validate(
      [
        'file' => 'required|mimes:xls,xlsx,csv',
      ]
    );
    $extensions = ['xlx', 'xlsx', 'csv'];

    if (!in_array($request->file->getClientOriginalExtension(), $extensions)) {
      return redirect()->back()->with('error', 'Upload file in exact csv, xlx, xlsx format.')->withInput();
    }
    try {
      $spreadsheet = IOFactory::load($request->file);
      $sheetData = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);
      // dd($sheetData);

      // Define a mapping of file category names to database category names
      $categoryMapping = [
        '6 Months' => '6-Months',
        'Monthly' => 'Monthly',
        'Annual' => 'Yearly', // File's "Annual" maps to DB's "Yearly"
        'Yearly' => 'Yearly', // Added for potential matches
      ];

      // Loop through the data, skipping the header row (assume it's row 1)
      foreach ($sheetData as $index => $row) {
        // Skip the header row
        if ($index === 1) {
          continue;
        }

        // Extract data from the row
        $name = $row['B'] ?? null;
        $discordUsername = $row['C'] ?? null;
        $whatsapp = $row['D'] ?? null;
        $categoryName = trim($row['E'] ?? '');
        $price = null;
        $startsAt = $row['A'] ?? null;

        // Validate and process timestamp
        try {
          $startDate = Carbon::createFromFormat('m/d/Y H:i:s', $startsAt);
        } catch (\Exception $e) {
          // Skip row with invalid date
          continue;
        }

        // Extract category and price
        preg_match('/^([^\-]+)/', $row['E'], $durationMatch);
        $duration = trim($durationMatch[1] ?? '');
        preg_match('/\$(\d+)/', $row['E'], $priceMatch);
        $price = $priceMatch[1] ?? null;

        // Standardize the category name using the mapping
        $standardCategoryName = $categoryMapping[$duration] ?? $duration;

        // Find category by standardized name
        $category = Category::where('name', $standardCategoryName)->first();

        // Calculate expires_at based on category name
        $expiresAt = null;
        if ($category) {
          switch (strtolower($category->name)) {
            case 'monthly':
              $expiresAt = $startDate->copy()->addMonth();
              break;
            case 'yearly':
              $expiresAt = $startDate->copy()->addYear();
              break;
            case '6-months':
              $expiresAt = $startDate->copy()->addMonths(6);
              break;
            default:
              $expiresAt = null;
              break;
          }
        }

        // Save customer record
        $customer = Customer::create([
          'name' => $name,
          'email' => null, // Assuming email isn't provided in the file
          'discord_username' => $discordUsername,
          'whatsapp' => $whatsapp,
          'remarks' => null, // Assuming remarks aren't provided in the file
          'category_id' => $category->id ?? null,
          'price' => $price,
          'starts_at' => $startDate,
          'expires_at' => $expiresAt,
        ]);

        // Create subscription history
        $customer->subscriptionsHistory()->create([
          'category_id' => $category->id ?? null,
          'price' => $price,
          'starts_at' => $startDate,
          'expires_at' => $expiresAt,
        ]);
      }


      return redirect()->back()->with('success', 'Import Completed');
    } catch (\Illuminate\Database\QueryException $ex) {
      // dd($ex->getMessage());
      // Note any method of class PDOException can be called on $ex.
      return redirect()->back()->with('error', 'Import failed. Please try again.');
    }
  }


  // for second sheet
  // public function store(Request $request)
  // {
  //   $request->validate([
  //     'file' => 'required|mimes:csv,txt',
  //   ]);

  //   $extensions = ['csv'];
  //   if (!in_array($request->file->getClientOriginalExtension(), $extensions)) {
  //     return redirect()->back()->with('error', 'Upload file in CSV format only.')->withInput();
  //   }

  //   try {
  //     $spreadsheet = IOFactory::load($request->file);
  //     $sheetData = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);
  //     // dd($sheetData);

  //     foreach ($sheetData as $index => $row) {

  //       // Map columns
  //       $discordUsername = $row['A'] ?? null;
  //       $startsAt = $row['D'] ?? null;
  //       $expiresAt = $row['E'] ?? null;
  //       $categoryName = trim(strtolower($row['F'] ?? ''));

  //       if ($categoryName == '1-year') {
  //         $categoryName = 'yearly';
  //       }

  //       // Validate dates
  //       try {
  //         $startDate = Carbon::parse($startsAt);
  //         $expireDate = empty($expiresAt) ? null : Carbon::parse($expiresAt);
  //       } catch (\Exception $e) {
  //         // Skip row if dates are invalid
  //         continue;
  //       }

  //       // Calculate duration in months (if applicable)
  //       $durationInMonths = $expireDate ? $startDate->diffInMonths($expireDate) : null;

  //       // Map categories
  //       if ($durationInMonths !== null && $durationInMonths < 6) {
  //         $categoryName = 'monthly';
  //       }

  //       // Find category
  //       $category = Category::whereRaw('LOWER(name) = ?', [$categoryName])->first();
  //       if (!$category) {
  //         // skip this row
  //         continue;
  //         logger()->info('category not found for username: ' . $discordUsername);
  //       }

  //       // Save customer record
  //       $customer = Customer::create([
  //         'name' => $discordUsername, // Assuming name is not provided
  //         'email' => null, // Assuming email is not provided
  //         'discord_username' => $discordUsername,
  //         'whatsapp' => null, // Assuming WhatsApp is not provided
  //         'remarks' => null, // Assuming remarks are not provided
  //         'category_id' => $category->id,
  //         'price' => 0, // Assuming price is not provided
  //         'starts_at' => $startDate,
  //         'expires_at' => $expireDate,
  //       ]);

  //       // Create subscription history
  //       $customer->subscriptionsHistory()->create([
  //         'category_id' => $category->id ?? null,
  //         'price' => 0, // Assuming price is not provided
  //         'starts_at' => $startDate,
  //         'expires_at' => $expireDate,
  //       ]);
  //     }

  //     return redirect()->back()->with('success', 'Import Completed');
  //   } catch (\Exception $e) {
  //     return redirect()->back()->with('error', 'Error importing data: ' . $e->getMessage());
  //   }
  // }
}

<?php

if (!function_exists('theme')) {
    function theme($file)
    {
        return asset("theme/{$file}");
    }
}

if (!function_exists('landingTheme')) {
    function landingTheme($file)
    {
        return asset("landingTheme/{$file}");
    }
}

if (!function_exists('formatPhoneNumberForWhatsApp')) {
  /**
   * Format a phone number into WhatsApp-compatible international format.
   *
   * @param string|null $phoneNumber
   * @return string
   */
  function formatPhoneNumberForWhatsApp(?string $phoneNumber): string
  {
      // If the phone number is null or empty, return an empty string or a default value
      if (empty($phoneNumber)) {
          return ''; // or you could return a default message, e.g., 'Not Available'
      }

      $countryCodeMap = [
          '03' => '+92', // Pakistan
          '91' => '+91', // India
          '62' => '+62', // Indonesia
          '44' => '+44', // UK
          '353' => '+353', // Ireland
          '966' => '+966', // Saudi Arabia
          '880' => '+880', // Bangladesh
          // Add more mappings as needed
      ];

      // Remove all non-numeric characters except '+'
      $phoneNumber = preg_replace('/[^\d+]/', '', $phoneNumber);

      // Replace '00' at the start with '+'
      if (strpos($phoneNumber, '00') === 0) {
          $phoneNumber = '+' . substr($phoneNumber, 2);
      }

      // Check if the number starts with a '+'
      if (strpos($phoneNumber, '+') === 0) {
          $formattedNumber = $phoneNumber;
      } else {
          // Detect country code based on prefix
          $prefix = substr($phoneNumber, 0, 2);
          $countryCode = $countryCodeMap[$prefix] ?? '+92'; // Default to Pakistan if no match
          $formattedNumber = $countryCode . substr($phoneNumber, 1);
      }

      // Format as WhatsApp URL
      return 'https://wa.me/' . ltrim($formattedNumber, '+');
  }
}



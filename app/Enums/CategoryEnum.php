<?php

namespace App\Enums;

enum CategoryEnum: string
{
  case NORMAL = 'Normal';
  case PREMIUM = 'Premium Plus';

  case MONTHLY = 'Monthly';
  case SIX_MONTHS = '6-Months';
  case YEARLY = 'Yearly';
  case LIFETIME = 'Lifetime';
  case FREE = 'Free';
}
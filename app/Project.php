<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class Project extends Model
{
    /**
     * Monthly interest in the currency of the system setting.
     * @return mixed
     */
    public function InterestMonthly(){
        $interest_yearly_percentage = 9;
        $interest_monthly_percentage = pow(1 + ($interest_yearly_percentage / 100), 1 / 12) - 1;
        $durationInMonths = 60;//$this->getAttribute('duration_months');
        $investedAmount = $this->getAttribute('invested');
        $interest_montly = round(
            ($interest_monthly_percentage / (1 - pow((1 + $interest_monthly_percentage), -$durationInMonths)))
            * $investedAmount, 2);
        return $interest_montly;
    }
}

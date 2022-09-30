<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SiteSettingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'logo' => 'upload/logo/1727013687201165.png',
            'description' => 'SALZA adalah sebuah perusahaan yang bergerak di bidang jual beli secara online',
            'phone_one' => '+6281563977109',
            'phone_two' => '+6281563977109',
            'email' => 'esalza@gmail.com',
            'company_name' => 'SALZA', 
            'company_address' => 'Jl. Babakantiga No. 82 Ciwidey',
        ];
    }
}

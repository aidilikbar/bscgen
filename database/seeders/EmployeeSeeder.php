<?php

namespace Database\Seeders;

use App\Models\Employee;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    public function run(): void
    {
        // Create base-level supervisors first
        $ceo = Employee::create([
            'name' => 'Alan Budikusuma',
            'position_title' => 'Chief Executive Officer',
            'business_unit' => 'Executive Office',
            'supervisor_id' => null
        ]);

        $cto = Employee::create([
            'name' => 'Rudi Hartono',
            'position_title' => 'Chief Technology Officer',
            'business_unit' => 'Technology',
            'supervisor_id' => $ceo->id
        ]);

        $cmo = Employee::create([
            'name' => 'Susi Susanti',
            'position_title' => 'Chief Marketing Officer',
            'business_unit' => 'Marketing',
            'supervisor_id' => $ceo->id
        ]);

        // Mid-level managers
        $dev_mgr = Employee::create([
            'name' => 'Ricky Subagja',
            'position_title' => 'Software Development Manager',
            'business_unit' => 'Technology',
            'supervisor_id' => $cto->id
        ]);

        $infra_mgr = Employee::create([
            'name' => 'Mia Audina',
            'position_title' => 'Infrastructure Manager',
            'business_unit' => 'Technology',
            'supervisor_id' => $cto->id
        ]);

        $digital_mgr = Employee::create([
            'name' => 'Icuk Sugiarto',
            'position_title' => 'Digital Marketing Manager',
            'business_unit' => 'Marketing',
            'supervisor_id' => $cmo->id
        ]);

        // Staff
        Employee::create([
            'name' => 'Liem Swie King',
            'position_title' => 'Frontend Developer',
            'business_unit' => 'Technology',
            'supervisor_id' => $dev_mgr->id
        ]);

        Employee::create([
            'name' => 'Taufik Hidayat',
            'position_title' => 'Backend Developer',
            'business_unit' => 'Technology',
            'supervisor_id' => $dev_mgr->id
        ]);

        Employee::create([
            'name' => 'Liliyana Natsir',
            'position_title' => 'SEO Specialist',
            'business_unit' => 'Marketing',
            'supervisor_id' => $digital_mgr->id
        ]);

        Employee::create([
            'name' => 'Hendra Setiawan',
            'position_title' => 'System Administrator',
            'business_unit' => 'Technology',
            'supervisor_id' => $infra_mgr->id
        ]);
    }
}

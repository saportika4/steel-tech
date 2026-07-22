<?php

namespace Database\Seeders;

use App\Models\Career;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CareerSeeder extends Seeder
{
    public function run(): void
    {
        $careers = [
            [
                'title' => 'Production Engineer',
                'slug' => 'production-engineer',
                'department' => 'Production',
                'employment_type' => 'Full Time',
                'location' => 'Bengaluru',
                'vacancies' => 2,
                'short_description' => 'Handle shop floor production planning, fabrication coordination, and daily execution.',
                'description' => "We are looking for a Production Engineer to manage fabrication and assembly activities, coordinate with design and procurement teams, and ensure smooth execution of production schedules.\n\nResponsibilities:\n- Monitor fabrication and assembly operations.\n- Coordinate with vendors and internal departments.\n- Maintain production quality and documentation.\n- Improve process efficiency and output.\n\nRequirements:\n- BE / Diploma in Mechanical Engineering.\n- 2+ years of experience in fabrication or heavy engineering.\n- Strong knowledge of production workflows and drawings.",
                'is_active' => true,
                'sort_order' => 1,
            ],
            [
                'title' => 'Quality Engineer',
                'slug' => 'quality-engineer',
                'department' => 'Quality',
                'employment_type' => 'Full Time',
                'location' => 'Bengaluru',
                'vacancies' => 1,
                'short_description' => 'Inspect raw materials, in-process fabrication, and final dispatch quality standards.',
                'description' => "We need a Quality Engineer to oversee inspection processes and maintain quality compliance across fabrication and finished products.\n\nResponsibilities:\n- Conduct stage-wise and final inspections.\n- Prepare QA/QC reports and checklists.\n- Coordinate with production for corrective actions.\n- Ensure adherence to customer specifications.\n\nRequirements:\n- Diploma / BE in Mechanical Engineering.\n- Experience in fabrication quality inspection.\n- Familiarity with measuring instruments and reporting.",
                'is_active' => true,
                'sort_order' => 2,
            ],
            [
                'title' => 'Design Engineer',
                'slug' => 'design-engineer',
                'department' => 'Design',
                'employment_type' => 'Full Time',
                'location' => 'Bengaluru',
                'vacancies' => 1,
                'short_description' => 'Prepare technical drawings, optimize engineering layouts, and support project execution.',
                'description' => "We are hiring a Design Engineer with strong experience in mechanical drafting and fabrication drawing preparation.\n\nResponsibilities:\n- Create 2D and 3D drawings for projects.\n- Coordinate with production and project teams.\n- Revise drawings based on site and manufacturing feedback.\n- Maintain drawing and revision records.\n\nRequirements:\n- Proficiency in AutoCAD / SolidWorks.\n- Experience in fabrication or engineering design.\n- Good understanding of manufacturing feasibility.",
                'is_active' => true,
                'sort_order' => 3,
            ],
            [
                'title' => 'Procurement Executive',
                'slug' => 'procurement-executive',
                'department' => 'Procurement',
                'employment_type' => 'Full Time',
                'location' => 'Bengaluru',
                'vacancies' => 1,
                'short_description' => 'Source raw materials, negotiate with vendors, and ensure timely purchase coordination.',
                'description' => "We are seeking a Procurement Executive to manage sourcing and vendor coordination for engineering and fabrication requirements.\n\nResponsibilities:\n- Source materials from approved vendors.\n- Compare quotations and negotiate pricing.\n- Track purchase orders and delivery schedules.\n- Maintain procurement records and stock coordination.\n\nRequirements:\n- Experience in industrial procurement.\n- Strong vendor management and negotiation skills.\n- Familiarity with steel, fabrication, or engineering materials.",
                'is_active' => true,
                'sort_order' => 4,
            ],
            [
                'title' => 'CNC Machine Operator',
                'slug' => 'cnc-machine-operator',
                'department' => 'Operations',
                'employment_type' => 'Full Time',
                'location' => 'Bengaluru',
                'vacancies' => 3,
                'short_description' => 'Operate CNC equipment safely and maintain output quality as per production targets.',
                'description' => "We are hiring CNC Machine Operators to handle machine setup, operation, and production support.\n\nResponsibilities:\n- Operate CNC machines as per job specifications.\n- Monitor output quality during machining.\n- Report machine issues and coordinate maintenance.\n- Maintain safety and housekeeping standards.\n\nRequirements:\n- ITI / Diploma preferred.\n- Experience in CNC operation.\n- Ability to read basic technical drawings.",
                'is_active' => true,
                'sort_order' => 5,
            ],
            [
                'title' => 'Site Supervisor',
                'slug' => 'site-supervisor',
                'department' => 'Projects',
                'employment_type' => 'Full Time',
                'location' => 'Karnataka',
                'vacancies' => 2,
                'short_description' => 'Supervise on-site erection, installation, and coordination for engineering projects.',
                'description' => "We are looking for a Site Supervisor to manage field execution, coordinate labor teams, and report project progress.\n\nResponsibilities:\n- Supervise site activities and workforce.\n- Ensure timely project execution.\n- Coordinate with client/site representatives.\n- Maintain daily work and safety records.\n\nRequirements:\n- Experience in industrial project execution.\n- Willingness to travel.\n- Good coordination and reporting skills.",
                'is_active' => true,
                'sort_order' => 6,
            ],
        ];

        foreach ($careers as $career) {
            Career::updateOrCreate(
                ['slug' => $career['slug']],
                $career
            );
        }
    }
}

<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class SteelTechSeeder extends Seeder
{
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();

        Product::truncate();
        Category::truncate();

        Schema::enableForeignKeyConstraints();

        User::updateOrCreate(
            ['email' => 'admin@steeltech.com'],
            [
                'name' => 'Admin',
                'password' => Hash::make('steeltech@4670'),
                'role' => 'admin',
                'is_active' => true,
            ]
        );

        $categories = [
            ['name' => 'Laser Cutting Machines', 'icon' => 'fa-bolt', 'sort_order' => 1],
            ['name' => 'Press Brakes', 'icon' => 'fa-industry', 'sort_order' => 2],
            ['name' => 'Shearing Machines', 'icon' => 'fa-scissors', 'sort_order' => 3],
            ['name' => 'Plate Rolling Machines', 'icon' => 'fa-circle-notch', 'sort_order' => 4],
            ['name' => 'Notching Machines', 'icon' => 'fa-cut', 'sort_order' => 5],
        ];

        $categoryMap = [];

        foreach ($categories as $category) {
            $created = Category::create([
                'name' => $category['name'],
                'slug' => Str::slug($category['name']),
                'icon' => $category['icon'],
                'is_active' => true,
                'sort_order' => $category['sort_order'],
            ]);

            $categoryMap[$category['name']] = $created->id;
        }

        $products = [
            [
                'name' => 'VLF Plus Series',
                'category' => 'Laser Cutting Machines',
                'manufacturer' => 'VN-J Precision Mechanics',
                'machine_type' => 'Full-Protective Double Exchange Table',
                'description' => 'The VLF Plus Series is a fully enclosed CNC fiber laser cutting machine featuring an automatic double exchange table for continuous production, operator safety, and high-speed sheet metal processing.',
                'applications' => [
                    'Metal Fabrication',
                    'Electrical Cabinet Manufacturing',
                    'Steel Structure Construction',
                ],
                'available_models' => [
                    'VLF 3015 Plus',
                    'VLF 4020 Plus',
                    'VLF 6020 Plus',
                ],
                'specifications' => [
                    ['label' => 'Working Area', 'value' => '3000×1500 / 4000×2000 / 6000×2000 mm'],
                    ['label' => 'Laser Source', 'value' => 'IPG / Raycus / MAX'],
                    ['label' => 'Laser Power', 'value' => '1500W–20000W (model dependent)'],
                    ['label' => 'Wavelength', 'value' => '1070–1080 nm'],
                    ['label' => 'CNC Controller', 'value' => 'CypCut'],
                    ['label' => 'Servo Motor', 'value' => 'Yaskawa / Inovance'],
                    ['label' => 'Laser Head', 'value' => 'Raytools (Switzerland) / BOCI (China)'],
                    ['label' => 'Maximum Speed', 'value' => '120 m/min'],
                    ['label' => 'Position Accuracy', 'value' => '±0.03 mm'],
                    ['label' => 'Repeatability', 'value' => '0.025 mm'],
                    ['label' => 'Power Supply', 'value' => '380V, 3 Phase, 50Hz'],
                    ['label' => 'Machine Weight', 'value' => '7200–15800 kg'],
                ],
            ],
            [
                'name' => 'VLF E Plus Series',
                'category' => 'Laser Cutting Machines',
                'manufacturer' => 'VN-J Precision Mechanics',
                'machine_type' => 'Double Exchange Table',
                'description' => 'The VLF E Plus Series offers fast production through an automatic dual-table exchange system while maintaining a compact, open machine design.',
                'applications' => [
                    'Sheet Metal Fabrication',
                    'Steel Industries',
                    'Electrical Enclosures',
                ],
                'available_models' => [
                    'VLF 3015E Plus',
                    'VLF 4020E Plus',
                    'VLF 6020E Plus',
                ],
                'specifications' => [
                    ['label' => 'Working Area', 'value' => '3000×1500 / 4000×2000 / 6000×2000 mm'],
                    ['label' => 'Laser Source', 'value' => 'IPG / Raycus / MAX'],
                    ['label' => 'Laser Power', 'value' => '1500W–20000W'],
                    ['label' => 'Wavelength', 'value' => '1070–1080 nm'],
                    ['label' => 'CNC Controller', 'value' => 'CypCut'],
                    ['label' => 'Servo Motor', 'value' => 'Yaskawa / Inovance'],
                    ['label' => 'Laser Head', 'value' => 'Raytools / BOCI'],
                    ['label' => 'Maximum Speed', 'value' => '120 m/min'],
                    ['label' => 'Position Accuracy', 'value' => '±0.03 mm'],
                    ['label' => 'Repeatability', 'value' => '0.025 mm'],
                    ['label' => 'Power Supply', 'value' => '380V'],
                    ['label' => 'Machine Weight', 'value' => '6400–14600 kg'],
                ],
            ],
            [
                'name' => 'VLF B Series',
                'category' => 'Laser Cutting Machines',
                'manufacturer' => 'VN-J Precision Mechanics',
                'machine_type' => 'Single Table',
                'description' => 'The VLF B Series is an economical CNC fiber laser cutting machine designed for precision sheet cutting with a single worktable configuration.',
                'applications' => [
                    'General Fabrication',
                    'Small & Medium Industries',
                    'Electrical Cabinets',
                ],
                'available_models' => [
                    'VLF 3015B',
                    'VLF 4020B',
                    'VLF 6020B',
                ],
                'specifications' => [
                    ['label' => 'Working Area', 'value' => '3000×1500 / 4000×2000 / 6000×2000 mm'],
                    ['label' => 'Laser Source', 'value' => 'IPG / Raycus / MAX'],
                    ['label' => 'Laser Power', 'value' => '1500W–20000W'],
                    ['label' => 'Wavelength', 'value' => '1070–1080 nm'],
                    ['label' => 'CNC Controller', 'value' => 'CypCut'],
                    ['label' => 'Servo Motor', 'value' => 'Yaskawa / Inovance'],
                    ['label' => 'Laser Head', 'value' => 'Raytools / BOCI'],
                    ['label' => 'Maximum Speed', 'value' => '80–100 m/min'],
                    ['label' => 'Position Accuracy', 'value' => '±0.03 mm'],
                    ['label' => 'Repeatability', 'value' => '0.025 mm'],
                    ['label' => 'Power Supply', 'value' => '380V'],
                    ['label' => 'Machine Weight', 'value' => '3800–6800 kg'],
                ],
            ],
            [
                'name' => 'VLF G Series',
                'category' => 'Laser Cutting Machines',
                'manufacturer' => 'VN-J Precision Mechanics',
                'machine_type' => 'Detachable Table',
                'description' => 'Designed for large-format sheet cutting, the VLF G Series supports heavy plates and oversized workpieces with detachable table configurations.',
                'applications' => [
                    'Heavy Steel Fabrication',
                    'Shipbuilding',
                    'Industrial Equipment Manufacturing',
                ],
                'available_models' => [
                    'VLF 6025G',
                    'VLF 13025G',
                    'VLF 26032G',
                ],
                'specifications' => [
                    ['label' => 'Working Area', 'value' => '6000×2500 / 13000×2500 / 26000×3200 mm'],
                    ['label' => 'Laser Source', 'value' => 'IPG / Raycus / MAX'],
                    ['label' => 'Laser Power', 'value' => '3000W–30000W'],
                    ['label' => 'CNC Controller', 'value' => 'CypCut / HypCut'],
                    ['label' => 'Servo Motor', 'value' => 'Yaskawa / Inovance'],
                    ['label' => 'Laser Head', 'value' => 'Raytools / BOCI'],
                    ['label' => 'Maximum Speed', 'value' => '110 m/min'],
                    ['label' => 'Position Accuracy', 'value' => '±0.05 mm'],
                    ['label' => 'Repeatability', 'value' => '0.05 mm'],
                    ['label' => 'Power Supply', 'value' => 'AC 3 Phase 380V'],
                    ['label' => 'Machine Weight', 'value' => '6900–24000 kg'],
                ],
            ],
            [
                'name' => 'VLF-T Series',
                'category' => 'Laser Cutting Machines',
                'manufacturer' => 'VN-J Precision Mechanics',
                'machine_type' => 'Dual Function Plate & Tube Cutting Machine',
                'description' => 'A dual-purpose CNC fiber laser capable of processing both sheet metal and round/square tubes in one machine.',
                'applications' => [
                    'Medical Equipment',
                    'Sheet Metal',
                    'Tube Fabrication',
                    'Decorative Iron Works',
                ],
                'available_models' => [
                    'VLF-T3015',
                    'VLF-T4020',
                    'VLF-T6020',
                ],
                'specifications' => [
                    ['label' => 'Tube Diameter', 'value' => 'Ø10–225 mm'],
                    ['label' => 'Working Area', 'value' => '3000×1500 / 4000×2000 / 6000×2000 mm'],
                    ['label' => 'Laser Source', 'value' => 'Raycus / IPG / MAX'],
                    ['label' => 'Laser Power', 'value' => '3000W–12000W'],
                    ['label' => 'CNC Controller', 'value' => 'CypCut'],
                    ['label' => 'Servo Motor', 'value' => 'Yaskawa / Inovance'],
                    ['label' => 'Laser Head', 'value' => 'Raytools / BOCI'],
                    ['label' => 'Maximum Speed', 'value' => '80–120 m/min'],
                    ['label' => 'Position Accuracy', 'value' => '±0.05 mm'],
                    ['label' => 'Repeatability', 'value' => '0.05 mm'],
                    ['label' => 'Power Supply', 'value' => '380V'],
                ],
            ],
            [
                'name' => 'VLT Series',
                'category' => 'Laser Cutting Machines',
                'manufacturer' => 'VN-J Precision Mechanics',
                'machine_type' => 'Large Format Steel Cutting Machine',
                'description' => 'Specialized CNC laser cutting machine for structural steel profiles including H-beams, I-beams, channels, angle sections, and pipes.',
                'applications' => [
                    'Steel Structure Manufacturing',
                    'Heavy Engineering',
                    'Infrastructure Projects',
                ],
                'available_models' => [
                    'VLT-S6060',
                    'VLT-S12060(A)',
                    'VLT-S12035(A)',
                ],
                'specifications' => [
                    ['label' => 'Round Tube Diameter', 'value' => 'Ø20–590 mm'],
                    ['label' => 'Square Tube Diameter', 'value' => '□20–400 mm'],
                    ['label' => 'Cutting Length', 'value' => '6300–12300 mm'],
                    ['label' => 'Laser Source', 'value' => 'Raycus / IPG / MAX'],
                    ['label' => 'Laser Power', 'value' => '3000W–12000W'],
                    ['label' => 'CNC Controller', 'value' => 'FSCUT5000B'],
                    ['label' => 'Servo Motor', 'value' => 'Yaskawa / Inovance'],
                    ['label' => 'Laser Head', 'value' => 'Raytools / BOCI'],
                    ['label' => 'Maximum Speed', 'value' => '30–80 m/min'],
                    ['label' => 'Position Accuracy', 'value' => '±0.05 mm'],
                    ['label' => 'Repeatability', 'value' => '0.05 mm'],
                ],
            ],
            [
                'name' => 'VLT-S Series',
                'category' => 'Laser Cutting Machines',
                'manufacturer' => 'VN-J Precision Mechanics',
                'machine_type' => 'Tube Cutting Machine',
                'description' => 'A high-productivity CNC laser tube cutting machine for round, square, and rectangular tubes used in fabrication and structural manufacturing.',
                'applications' => [
                    'Tube Fabrication',
                    'Steel Structures',
                    'Industrial Manufacturing',
                ],
                'available_models' => [
                    'VLT-S6020(A)',
                    'VLT-S12020(A)',
                    'VLT-S12035(A)',
                ],
                'specifications' => [
                    ['label' => 'Round Tube Diameter', 'value' => 'Ø15–230 mm (up to Ø350 mm for selected model)'],
                    ['label' => 'Square Tube Diameter', 'value' => '□15–230 mm'],
                    ['label' => 'Cutting Length', 'value' => '6500–12500 mm'],
                    ['label' => 'Laser Source', 'value' => 'Raycus / IPG / MAX'],
                    ['label' => 'Laser Power', 'value' => '3000W–12000W'],
                    ['label' => 'CNC Controller', 'value' => 'FSCUT5000A'],
                    ['label' => 'Servo Motor', 'value' => 'Yaskawa / Inovance'],
                    ['label' => 'Laser Head', 'value' => 'Raytools / BOCI'],
                    ['label' => 'Maximum Speed', 'value' => '80–120 m/min'],
                    ['label' => 'Position Accuracy', 'value' => '±0.05 mm'],
                    ['label' => 'Repeatability', 'value' => '0.05 mm'],
                ],
            ],
            [
                'name' => 'VLT-Z Series',
                'category' => 'Laser Cutting Machines',
                'manufacturer' => 'VN-J Precision Mechanics',
                'machine_type' => 'High-Speed Tube Cutting Machine',
                'description' => 'Premium CNC laser tube cutting machine engineered for long workpieces and large-diameter tubes with high precision and production efficiency.',
                'applications' => [
                    'Steel Structure Fabrication',
                    'Pipe Processing',
                    'Industrial Tube Manufacturing',
                ],
                'available_models' => [
                    'VLT-Z12050',
                    'VLT-E12035',
                ],
                'specifications' => [
                    ['label' => 'Round Tube Diameter', 'value' => 'Ø20–500 mm (selected model: Ø10–350 mm)'],
                    ['label' => 'Square Tube Diameter', 'value' => '□20–350 mm (selected model: □10–350 mm)'],
                    ['label' => 'Cutting Length', 'value' => '12500 mm'],
                    ['label' => 'Laser Source', 'value' => 'Raycus / IPG / MAX'],
                    ['label' => 'Laser Power', 'value' => '3000W–12000W'],
                    ['label' => 'CNC Controller', 'value' => 'FSCUT5000A'],
                    ['label' => 'Servo Motor', 'value' => 'Yaskawa / Inovance'],
                    ['label' => 'Laser Head', 'value' => 'Raytools / BOCI'],
                    ['label' => 'Maximum Speed', 'value' => '50–60 m/min'],
                    ['label' => 'Position Accuracy', 'value' => '±0.05 mm'],
                    ['label' => 'Repeatability', 'value' => '0.05 mm'],
                ],
            ],
            [
                'name' => 'Fiber Laser Cutting Machine',
                'category' => 'Laser Cutting Machines',
                'manufacturer' => 'ACCURL',
                'machine_type' => 'Fiber Laser Cutting Machine',
                'description' => 'High-performance CNC Fiber Laser Cutting Machine designed for precision cutting of stainless steel, mild steel, aluminium, brass and copper. Available in multiple power ratings and table sizes for industrial production.',
                'applications' => [
                    'Stainless Steel Cutting',
                    'Mild Steel Cutting',
                    'Aluminium Cutting',
                    'Brass and Copper Processing',
                ],
                'available_models' => [],
                'specifications' => [
                    ['label' => 'Laser Source', 'value' => 'IPG / Raycus'],
                    ['label' => 'Laser Power', 'value' => '750W – 15kW'],
                    ['label' => 'Table Size', 'value' => '1.5m – 6m'],
                    ['label' => 'Laser Head', 'value' => 'Raytools Auto Focus (Switzerland)'],
                    ['label' => 'CNC Controller', 'value' => 'Beckhoff / CypCut FSCUT-2000'],
                    ['label' => 'Maximum Cutting Speed', 'value' => '120 – 180 m/min'],
                    ['label' => 'Maximum Acceleration', 'value' => '1.2G – 1.8G'],
                    ['label' => 'Rack & Pinion', 'value' => 'GUDEL (35mm) Grade M3'],
                    ['label' => 'Nesting Software', 'value' => 'CypCut'],
                ],
            ],
            [
                'name' => 'CNC Synchronized Hydraulic Press Brake',
                'category' => 'Press Brakes',
                'manufacturer' => 'ACCURL',
                'machine_type' => 'Hydraulic Press Brake',
                'description' => 'High-precision CNC synchronized hydraulic press brake suitable for complex sheet metal bending operations.',
                'applications' => [
                    'Complex Sheet Metal Bending',
                    'Industrial Fabrication',
                ],
                'available_models' => [],
                'specifications' => [
                    ['label' => 'Tonnage', 'value' => '63T – 2000T'],
                    ['label' => 'Working Length', 'value' => '1.6m – 8m'],
                    ['label' => 'CNC Controllers', 'value' => 'DA52S, DA53T, DA58T, DA66T'],
                    ['label' => 'Number of Axis', 'value' => '4 – 12 Axis'],
                    ['label' => 'Crowning', 'value' => 'Motorized Wila Type / Hydraulic Crowning'],
                    ['label' => 'Clamping', 'value' => 'Quick Clamps'],
                    ['label' => 'Back Gauge', 'value' => 'LM Guideway with Ball Screw'],
                ],
            ],
            [
                'name' => 'NC Torsion Bar Hydraulic Press Brake',
                'category' => 'Press Brakes',
                'manufacturer' => 'ACCURL',
                'machine_type' => 'Hydraulic Press Brake',
                'description' => 'Economical NC hydraulic press brake designed for reliable sheet metal bending with torsion bar synchronization.',
                'applications' => [
                    'Sheet Metal Bending',
                    'General Fabrication',
                ],
                'available_models' => [],
                'specifications' => [
                    ['label' => 'Tonnage', 'value' => '30T – 2000T'],
                    ['label' => 'Working Length', 'value' => '1.6m – 8m'],
                    ['label' => 'Controllers', 'value' => 'E21, E200, E300, CybTouch 8'],
                    ['label' => 'Number of Axis', 'value' => '1 – 4 Axis'],
                    ['label' => 'Crowning', 'value' => 'Motorized Wila Type'],
                    ['label' => 'Clamping', 'value' => 'Quick Clamps / Regular Clamps'],
                    ['label' => 'Back Gauge', 'value' => 'LM Guideway (Optional)'],
                ],
            ],
            [
                'name' => 'NC/CNC Hydraulic Swing Beam Shearing Machine',
                'category' => 'Shearing Machines',
                'manufacturer' => 'ACCURL',
                'machine_type' => 'Swing Beam Shearing Machine',
                'description' => 'Hydraulic swing beam shearing machine for high-quality straight sheet cutting with excellent accuracy.',
                'applications' => [
                    'Straight Sheet Cutting',
                    'Industrial Shearing',
                ],
                'available_models' => [],
                'specifications' => [
                    ['label' => 'Cutting Thickness', 'value' => '4mm – 40mm'],
                    ['label' => 'Cutting Length', 'value' => '2.5m – 8m'],
                    ['label' => 'Number of Axis', 'value' => '1 – 4'],
                    ['label' => 'Controllers', 'value' => 'E21, E200, DAC310, DAC360'],
                ],
            ],
            [
                'name' => 'NC/CNC Hydraulic Guillotine Shearing Machine',
                'category' => 'Shearing Machines',
                'manufacturer' => 'ACCURL',
                'machine_type' => 'Guillotine Shearing Machine',
                'description' => 'Industrial hydraulic guillotine shearing machine offering precision cutting, high rigidity and smooth operation.',
                'applications' => [
                    'Precision Sheet Cutting',
                    'Heavy Duty Industrial Use',
                ],
                'available_models' => [],
                'specifications' => [
                    ['label' => 'Cutting Thickness', 'value' => '4mm – 40mm'],
                    ['label' => 'Cutting Length', 'value' => '2.5m – 8m'],
                    ['label' => 'Number of Axis', 'value' => '1 – 5'],
                    ['label' => 'Controllers', 'value' => 'E21, E200, DAC310, DAC360'],
                ],
            ],
            [
                'name' => 'Hydraulic Plate Rolling Machine',
                'category' => 'Plate Rolling Machines',
                'manufacturer' => 'ACCURL',
                'machine_type' => 'Hydraulic Plate Rolling Machine',
                'description' => 'Heavy-duty plate rolling machine suitable for rolling steel, stainless steel and aluminium sheets into cylindrical and conical shapes.',
                'applications' => [
                    'Sheet Rolling',
                    'Cylinder Formation',
                ],
                'available_models' => [],
                'specifications' => [
                    ['label' => 'Machine Type', 'value' => 'Hydraulic Plate Rolling Machine'],
                    ['label' => 'Rolling Rollers', 'value' => 'Hardened Steel Rollers'],
                    ['label' => 'Construction', 'value' => 'Heavy Duty Fabricated Frame'],
                    ['label' => 'Application', 'value' => 'Sheet Rolling & Cylinder Formation'],
                    ['label' => 'Material Compatibility', 'value' => 'MS, SS, Aluminium'],
                ],
            ],
            [
                'name' => 'Hydraulic Notching Machine',
                'category' => 'Notching Machines',
                'manufacturer' => 'ACCURL',
                'machine_type' => 'Hydraulic Notching Machine',
                'description' => 'Hydraulic notching machine for fast and accurate corner cutting in sheet metal fabrication.',
                'applications' => [
                    'Corner Notching',
                    'Sheet Metal Fabrication',
                ],
                'available_models' => [],
                'specifications' => [
                    ['label' => 'Operation', 'value' => 'Hydraulic'],
                    ['label' => 'Cutting Type', 'value' => 'Corner Notching'],
                    ['label' => 'Blade Material', 'value' => 'High Strength Alloy Steel'],
                    ['label' => 'Applications', 'value' => 'Sheet Metal Fabrication'],
                    ['label' => 'Suitable Materials', 'value' => 'MS, SS, Aluminium'],
                ],
            ],
        ];

        foreach ($products as $index => $product) {
            Product::create([
                'category_id' => $categoryMap[$product['category']],
                'name' => $product['name'],
                'slug' => Str::slug($product['name']),
                'manufacturer' => $product['manufacturer'],
                'machine_type' => $product['machine_type'],
                'description' => $product['description'],
                'applications' => $product['applications'],
                'available_models' => $product['available_models'],
                'specifications' => $product['specifications'],
                'is_active' => true,
                'sort_order' => $index + 1,
            ]);
        }
    }
}

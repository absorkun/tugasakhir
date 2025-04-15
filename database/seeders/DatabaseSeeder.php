<?php

namespace Database\Seeders;

use App\Models\Kendaraan;
use App\Models\Pemilik;
use App\Models\Tagihan;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Create Admin
        $admin = User::firstOrCreate(
            ['email' => 'admin@email.com'],
            [
                'name' => 'Super Admin',
                'password' => Hash::make('superadmin'),
                'role' => 'admin',
            ]
        );

        // Create Regular User
        // $user = User::firstOrCreate(
        //     ['email' => 'user@email.com'],
        //     [
        //         'name' => 'Example User',
        //         'password' => Hash::make('exampleuser'),
        //     ]
        // );

        // Create Pemilik
        // $pemilik = Pemilik::firstOrCreate(
        //     ['user_id' => $user->id],
        //     [
        //         'nama' => $user->name,
        //         'nomor_ktp' => '1234567890123456',
        //         'tanggal_lahir' => '2002-12-02',
        //         'alamat' => 'Jakarta Palsu',
        //         'nomor_telepon' => '08123456781',
        //     ]
        // );

        // Create Kendaraan
        // $kendaraan1 = Kendaraan::firstOrCreate(
        //     ['nomor_polisi' => 'B 1234 ABC'],
        //     [
        //         'pemilik_id' => $pemilik->id,
        //         'model' => 'Vario 125',
        //         'merek' => 'Honda',
        //         'nomor_mesin' => 'XYZ123456789',
        //         'tanggal_rilis' => '2020-05-05',
        //     ]
        // );

        // $kendaraan2 = Kendaraan::firstOrCreate(
        //     ['nomor_polisi' => 'B 5678 DEF'],
        //     [
        //         'pemilik_id' => $pemilik->id,
        //         'model' => 'Beat 110',
        //         'merek' => 'Honda',
        //         'nomor_mesin' => 'ABC987654321',
        //         'tanggal_rilis' => '2023-05-05',
        //     ]
        // );

        // // Create Tagihan
        // Tagihan::firstOrCreate(
        //     ['kode' => 'INV-001'],
        //     [
        //         'kendaraan_id' => $kendaraan1->id,
        //         'pemilik_id' => $pemilik->id,
        //         'jatuh_tempo' => '2023-02-02',
        //         'jenis' => 'STNK',
        //         'status' => 'Belum Bayar',
        //         'jumlah_bayar' => 100000,
        //     ]
        // );

        // Tagihan::firstOrCreate(
        //     ['kode' => 'INV-002'],
        //     [
        //         'kendaraan_id' => $kendaraan2->id,
        //         'pemilik_id' => $pemilik->id,
        //         'jatuh_tempo' => '2023-02-02',
        //         'jenis' => 'Pajak',
        //         'status' => 'Belum Bayar',
        //         'jumlah_bayar' => 300000,
        //     ]
        // );
    }
}

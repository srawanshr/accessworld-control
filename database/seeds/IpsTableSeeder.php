<?php

use Illuminate\Database\Seeder;

class IpsTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $maps = \App\Models\Dhcp\Map::all();

        $ips = \App\Models\Ip::all();

        foreach ($ips as $ip)
        {
            $ip->update(['mac' => null, 'hostname' => null, 'is_used' => false]);
        }
        foreach ($maps as $map)
        {
            $ip = \App\Models\Ip::firstOrCreate(['ip' => $map->ip]);

            if ($ip)
                $ip->update(['mac' => $map->mac, 'hostname' => $map->hostname, 'is_used' => true]);
        }
    }
}

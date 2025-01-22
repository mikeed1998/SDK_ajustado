
<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ConfigurationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('configurations')->insert([
            'titulo'                => 'System Managment Resources',
            'descripcion'           => 'System Managment Resources',
            'destinatario'          => 'mikeed1998@gmail.com',
            'destinatario2'         => '',
            'remitente'             => 'testing@michcvdev.com',
            'remitentepass'         => 'yI!TRH{7dQzI', 
            'remitentehost'         => 'mail.michcvdev.com',
            'remitenteport'         => '465',
            'remitenteseguridad'    => 'ssl',
            'telefono'              => '3322932239',
            'whatsapp'              => '3322932239',
            'whatsapp2'             => '3322932239',
            'facebook'              => 'facebook.com/miempresa',
            'instagram'             => 'instagram.com/miempresa',
            'youtube'               => 'youtube.com/miempresa',
            'linkedin'              => 'linkedin.com/company/miempresa',
            'envio'                 => '',
            'envioglobal'           => '',
            'iva'                   => '',
            'incremento'            => '',
            'mapa'                  => '',
            'direccion'             => '',
            'created_at'            => now(),
            'updated_at'            => now(),
        ]);
    }
}

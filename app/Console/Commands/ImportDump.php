<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ImportDump extends Command
{
    protected $signature = 'db:import-dump';
    protected $description = 'Importa el dump.sql con la base de datos real';

    public function handle()
    {
        $dumpPath = database_path('dumps/dump.sql');
        $db = config('database.connections.mysql.database');
        $user = config('database.connections.mysql.username');
        $pass = config('database.connections.mysql.password');
        $host = config('database.connections.mysql.host');

        $command = "mysql -u {$user}" . ($pass ? " -p{$pass}" : "") . " -h {$host} {$db} < {$dumpPath}";

        $this->info("Importando dump desde {$dumpPath}...");

        $result = null;
        system($command, $result);

        if ($result === 0) {
            $this->info(' Dump importado correctamente.');
        } else {
            $this->error(' Error al importar el dump.');
        }
    }
}

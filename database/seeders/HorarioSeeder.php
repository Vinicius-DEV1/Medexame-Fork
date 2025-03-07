<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Agenda;
use App\Models\Horario;
use App\Models\Procedimento; // Precisamos do modelo de Procedimento
use Carbon\Carbon;

class HorarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Recupera todas as agendas (médicos) cadastradas
        $agendas = Agenda::all();

        // Define alguns horários para cada agenda de médico
        foreach ($agendas as $agenda) {
            // Para cada agenda, busque os procedimentos disponíveis
            $procedimentos = Procedimento::all(); // Aqui você pega todos os procedimentos disponíveis

            // Se não houver procedimentos, pula para a próxima agenda
            if ($procedimentos->isEmpty()) {
                continue;
            }

            // Define a quantidade de horários que você quer adicionar por agenda
            for ($i = 0; $i < 5; $i++) { // Adiciona 5 horários por agenda, por exemplo
                // Seleciona um procedimento aleatório para o médico
                $procedimento = $procedimentos->random(); // Escolhe um procedimento aleatório

                // Cria um horário para cada agenda de médico
                Horario::create([
                    'agenda_id' => $agenda->id,
                    'data' => Carbon::now()->addDays(rand(1, 10)), // Data aleatória nos próximos 10 dias
                    'horario_inicio' => Carbon::now()->addHours(rand(8, 17))->format('H:i'), // Horário de início aleatório entre 8h e 17h
                    'duracao' => rand(30, 60), // Duração aleatória de 30 a 60 minutos
                    'procedimento_id' => $procedimento->id, // Associando o procedimento aleatório ao horário
                ]);
            }
        }
    }
}

<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class createFirstUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:create-first-users';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Tworzy początkowych użytkowników systemu';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Sprawdź czy użytkownicy już istnieją
        if (User::count() > 0) {
            $this->warn('Użytkownicy już istnieją w bazie danych!');
            
            if (!$this->confirm('Czy chcesz kontynuować i dodać więcej użytkowników?')) {
                return;
            }
        }

        // Lista początkowych użytkowników
        $users = [
            [
                'name' => 'Admin',
                'email' => 'test_admin@test.pl',
                'password' => 'admin123#!',
                'is_admin' => true,
            ],
            [
                'name' => 'Trener',
                'email' => 'test_trener@test.pl',
                'password' => 'trener123#!',
                'is_admin' => false,
            ],
            // Możesz dodać więcej użytkowników tutaj
        ];

        foreach ($users as $userData) {
            try {
                User::create([
                    'name' => $userData['name'],
                    'email' => $userData['email'],
                    'password' => Hash::make($userData['password']),
                    'is_admin' => $userData['is_admin'],
                ]);

                $this->info("Utworzono użytkownika: {$userData['email']}");
            } catch (\Exception $e) {
                $this->error("Błąd podczas tworzenia użytkownika {$userData['email']}: " . $e->getMessage());
            }
        }

        $this->info('Zakończono tworzenie użytkowników!');
    }
}

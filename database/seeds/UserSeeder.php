<?php

use Faker\Factory;
use App\Models\User;
use Illuminate\Http\File;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $myCv = 'Scrupoloso gastroenterologo con 7 anni di esperienza in una clinica privata, ho una media di 20 visite al giorno, mantenendo rapporti regolari con tutti i miei pazienti. Ho raggiunto un alto standard di eccellenza clinica con oltre 300 recensioni positive e, grazie a una campagna di sensibilizzazione avviata lo scorso anno, ho aumentato il numero dei pazienti abituali del 20%. Desidero offrire le mie competenze professionali alla clinica Healtcare.
        Esperienze lavorative
        Medico Gastroenterologo
        Clinica privata “Il cerotto”, Pavia
        Settembre 2015-oggi
        
        Contatto diretto con oltre 300 pazienti fissi.
        Efficacia dei trattamenti aumentata del 30%.
        Riduzione dei tempi di attesa dei referti di 2 giorni.
        Riduzione del 20% degli esami invasivi non necessari sui pazienti.
         
        Medico di Pronto soccorso
        Ospedale Maggiore di Pavia
        Giugno 2014- Agosto 2015
        
        Oltre 50 interventi tempestivi ogni giorno.
        Riduzione dei tempi di attesa del 30%.
        Analisi cliniche e valutazione delle condizioni dei pazienti con urgenza.
        Organizzazione del lavoro con un team di 10 medici e 20 infermiere.
         
        Educazione
        Specializzazione in Gastroenterologia
        Università degli Studi di Pavia
        2012-2014
        Laurea in medicina e chirurgia
        
        Università degli Studi di Pavia
        2007-2012
        Valutazione finale: 110/110 e lode
        
        Competenze
        
        Ascolto e cura dei pazienti
        Capacità analitica
        Resistenza allo stress
        Etica lavorativa
        Tempestività nella diagnosi
        Utilizzo di strumentazione medica
        Valutazione delle terapie
         
        Certificazioni
        
        Abilitazione alla professione di Medico Chirurgo, Milano, 2014.
        Relatore al seminario “Studi di nutrizione”, Pavia, 2018.
        Corso di aggiornamento “Healt and Food”, 40 ore, Pavia, 2020.
         
        Lingue
        Inglese avanzato';

        $myCity = ['Milano', 'Roma', 'Napoli', 'Palermo', 'Bologna'];
        $myService = 'Esperto di interventi rapidi';

        $faker = Factory::create('it_IT');
        for ($i = 0; $i < 20; $i++) {
            $user = new User();

            $user->name = $faker->firstName();
            $user->lastname = $faker->lastName();
            $user->email = $faker->freeEmail();
            $user->address = $faker->streetAddress();
            $user->password = Hash::make('asdf');
            $user->phone = $faker->phoneNumber();
            // $user->city = $faker->city();
            $user->city = $faker->randomElement($myCity);
            $user->postal_code = (int)$faker->postcode();
            // $user->cv = implode($faker->paragraphs(3));
            $user->cv = $myCv;
            // $user->service = $faker->word();
            $user->service = $myService;
            $contents = new File(__DIR__ . '/../../storage/app/img/' . rand(1, 13) . '.jpg');
            $user->photo = Storage::put('uploads', $contents);
            $user->save();
        }
    }
}

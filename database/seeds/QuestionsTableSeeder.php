<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuestionsTableSeeder extends Seeder
{
    public function run()
    {
         $questions = [
            [
                'question' => 'Which player scored the fastest hat-trick in the Premier League 2015 Season?',
                'option_a' => 'Sadio Mane',
                'option_b' => 'David Beckham',
                'option_c' => 'Joe Cole',
                'correct_option' => 'A',
                'created_at'=>now(),
            ],
            [
                'question' => 'With 260 goals, who is the Premier League\'s all-time top scorer?',
                'option_a' => 'Alan Shearer',
                'option_b' => 'Sadio Mane',
                'option_c' => 'Paul Scole',
                'correct_option' => 'A',
                'created_at'=>now(),
            ],
            [
                'question' => 'When was the inaugural Premier League season?',
                'option_a' => '1995-96',
                'option_b' => '1992-93',
                'option_c' => '2000-2003',
                'correct_option' => 'B',
                'created_at'=>now(),
            ],
            [
                'question' => 'The fastest goal scored in Premier League history came in 7.69 seconds. Who scored it?',
                'option_a' => 'Teddy Sheringham',
                'option_b' => 'Eric Cantona',
                'option_c' => 'Shane Long',
                'correct_option' => 'C',
                'created_at'=>now(),
            ],
            [
                'question' => 'With 202 clean sheets, which goalkeeper has the best record in the Premier League?',
                'option_a' => 'Alison Becker',
                'option_b' => 'Petr Cech',
                'option_c' => 'Onana',
                'correct_option' => 'B',
                'created_at'=>now(),
            ],
            [
                'question' => 'How many clubs competed in the inaugural Premier League season?',
                'option_a' => '22',
                'option_b' => '25',
                'option_c' => '30',
                'correct_option' => 'A',
                'created_at'=>now(),
            ],
            [
                'question' => 'Which three players shared the Premier League Golden Boot in 2018-19?',
                'option_a' => 'Gareth Bell, David Villa, Theiry Henry',
                'option_b' => 'Pierre-Emerick Aubameyang, Mohamed Salah and Sadio Mane',
                'option_c' => 'Gomes, Da Silva, Sergio Agüero',
                'correct_option' => 'B',
                'created_at'=>now(),
            ],
            [
                'question' => 'Which team won the first Premier League title?',
                'option_a' => 'Arsenal',
                'option_b' => 'Chelsea',
                'option_c' => 'Manchester United',
                'correct_option' => 'C',
                'created_at'=>now(),
            ],
            [
                'question' => 'Which country won the first-ever World Cup in 1930?',
                'option_a' => 'Brazil',
                'option_b' => 'Uruguay',
                'option_c' => 'Argentina',
                'correct_option' => 'B',
                'created_at'=>now(),
            ],
            [
                'question' => 'In which World Cup did Diego Maradona score his infamous "Hand of God" goal?',
                'option_a' => 'Mexico 1986',
                'option_b' => 'Italy 1990',
                'option_c' => 'USA 1994',
                'correct_option' => 'A',
                'created_at'=>now(),
            ],
        ];

        // Insert data into the `quiz_questions` table
        DB::table('quiz_questions')->insert($questions);
    }
}

<?php

namespace app\Services;
use GuzzleHttp\Client;

class AIService
{
    protected $client;
    protected $apiKey;
    protected $apiUrl;

   public function __construct()
   {
     $this->client = new Client();
     $this->apiKey = env('GEMINI_API_KEY');
     $this->apiUrl = "https://generativelanguage.googleapis.com/v1beta/models/gemini-2.0-flash:generateContent?key={$this->apiKey}";
   }

   public function getAiConsiel($Data){
    $DataTypeString = json_encode($Data);
            $request = $this->client->post($this->apiUrl, [
                'headers' => [
                    'Content-Type' => 'application/json'
                ],
                'json' => [
                    'contents' => [
                        [
                            'parts' => [
                                [
                                    'text' => "À partir des données suivantes : $DataTypeString, génèrer des conseils pratiques pour économiser de l'argent, mieux gérer les finances et atteindre les objectifs de la liste de souhaits. Réponds en 2 à 3 lignes en tenant compte des informations du client. Réfère-toi à chaque catégorie par son nom et propose des recommandations générales adaptées au mois en cours. Si un événement particulier a lieu ce mois-ci, comme le Ramadan 2025, mentionne-le dans tes conseils. (Note : la devise utilisée est le DH (Dirham Marocain)."
                                ]
                            ]
                        ]
                    ]
                ],
            ]);

            $response = json_decode($request->getBody()->getContents(), true);
            $advice = $response['candidates'][0]['content']['parts'][0]['text'] ?? 'Pas de consiel a proposé pour le mement';
            return $advice;
   }




}
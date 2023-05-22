<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function sendMessage(Request $request)
    {
        try {
            $message = $request['message'];
            $history = json_decode($request['history']);
            $history[] = (object)['role' => 'user', 'content' => $message];
            $botResponse = $this->getReply($history);
            return json_encode([
                'success' => true,
                'message' => $botResponse
            ]);
        } catch (Exception $e) {
            return json_encode([
                'success' => false,
                'message' => $e->getMessage()
            ]);
        }
    }

    private function getReply($chat)
    {
        try {
            $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_URL => 'https://api.openai.com/v1/chat/completions',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS => json_encode([
                    'model' => "gpt-3.5-turbo",
                    'messages' => $chat
                ]),
                CURLOPT_HTTPHEADER => array(
                    "Content-Type: application/json",
                    "Authorization: Bearer " . env('OPENAI_KEY')
                ),
            ));
            $response = curl_exec($curl);
            curl_close($curl);
            $response = json_decode($response);
            if (isset($response->error)) {
                return "";
            }
            return trim($response->choices[0]->message->content);
        } catch (Exception $e) {
            return "";
        }
    }
}

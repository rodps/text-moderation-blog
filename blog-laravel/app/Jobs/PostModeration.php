<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;
use App\Models\Post;
use Illuminate\Support\Facades\Log;

class PostModeration implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function __construct(
        public Post $post
    ){}

    public function handle(): void
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . env('OPENAI_API_KEY'),
            'Content-Type' => 'application/json',
        ])->post('https://api.openai.com/v1/moderations', [
            'input' => $this->post->text,
        ]);

        if ($response->failed()) {
            Log::error($response->body());
            return;
        }

        $data = $response->json();
        $isFlagged = $data['results'][0]['flagged'];

        if ($isFlagged) {
            $this->post->status = 'rejected';
        } else {
            $this->post->status = 'approved';
        }
        $this->post->save();
    }
}

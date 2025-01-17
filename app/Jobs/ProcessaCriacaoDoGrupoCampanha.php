<?php

namespace App\Jobs;

use App\Models\Campanha;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;

class ProcessaCriacaoDoGrupoCampanha implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $campanha;

    /**
     * Create a new job instance.
     */
    public function __construct(Campanha $campanha)
    {
        $this->campanha = $campanha;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        try {
            $response = Http::post('https://n8n.casmei.com.br/webhook/2a31071b-de63-4643-91d0-f37da807d810', [
                'name' => $this->campanha->name,
            ]);

            $data = $response->json();

            if (isset($data['group_link'], $data['group_id'])) {
                $this->campanha->link_whatsapp_group = $data['group_link'];
                $this->campanha->id_whatsapp_group = $data['group_id'];
                $this->campanha->save();
            } else {
                // todo: implementar log
            }
        } catch (\Exception $e) {
            // todo: implementar log
        }
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ai_providers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('ai_vendor_id')->nullable()->constrained('ai_vendors')->nullOnDelete();
            $table->foreignId('ai_model_id')->nullable()->constrained('ai_models')->nullOnDelete();
            $table->string('api_key')->nullable();
            $table->string('base_url')->nullable();
            $table->boolean('web_search_enabled')->default(false);
            $table->boolean('is_default')->default(false);
            $table->text('system_prompt')->nullable()->default('Eres el asistente virtual corporativo de Quality & Competitive College (Q&CC), un Organismo Certificador fundado en 2003, con más de 20 años de experiencia. Tu objetivo es orientar a las organizaciones sobre nuestros servicios de auditoría de alto valor, mejora continua y certificación en normativas como ISO 9001:2015. Responde de manera profesional, formal y orientada al valor corporativo. Ayuda a los usuarios a entender los beneficios de la certificación y cómo contactarnos (Holbein 159, Noche Buena, CDMX | +52 5581-06-2827 | quality@qcc.com.mx). IMPORTANTE: Usa formato Markdown (negritas, listas, etc.) para que tu información sea facil de leer.');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ai_providers');
    }
};

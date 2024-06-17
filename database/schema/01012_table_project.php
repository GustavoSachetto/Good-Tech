<?php

use App\Model\DatabaseManager\Database;
use App\Common\CommandLine\Required\Interaction;
use App\Model\DatabaseManager\Diagram\Blueprint;

return new class extends Interaction
{
    /** 
     * Método responsável por subir a infomação no banco de dados.
    */
    public function up(): void
    {
        (new Database)->create('project', function(Blueprint $table) {
            $table->id();
            $table->varchar('title', 70)->unique()->notNull();
            $table->varchar('subtitle', 200)->notNull();
            $table->text('content')->notNull();
            $table->varchar('image');
            $table->timestamp('created_at');
            $table->bigInt('user_id', true)->notNull();
            $table->bigInt('category_id', true)->notNull();
            $table->foreign('user_id', 'user', 'id');
            $table->foreign('category_id', 'category', 'id');
            $table->boolean('deleted')->default('false');
        });
    }

    /** 
     * Método responsável por descer a infomação no banco de dados.
    */
    public function down(): void
    {
        (new Database)->dropIfExists('project');
    }
};

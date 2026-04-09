<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class AddSlugToBlogsTable extends Migration
{
    public function up()
    {
        Schema::table('blogs', function (Blueprint $table) {
            $table->string('slug')->nullable()->after('title');
        });

        // Populate slugs for all existing blog rows
        DB::table('blogs')->get()->each(function ($blog) {
            $base = Str::slug($blog->title ?? 'blog-' . $blog->id);
            $base = $base ?: 'blog-' . $blog->id;
            $slug = $base;
            $i    = 1;
            while (DB::table('blogs')->where('slug', $slug)->where('id', '!=', $blog->id)->exists()) {
                $slug = $base . '-' . $i++;
            }
            DB::table('blogs')->where('id', $blog->id)->update(['slug' => $slug]);
        });

        // Now enforce uniqueness
        Schema::table('blogs', function (Blueprint $table) {
            $table->string('slug')->nullable(false)->unique()->change();
        });
    }

    public function down()
    {
        Schema::table('blogs', function (Blueprint $table) {
            $table->dropUnique(['slug']);
            $table->dropColumn('slug');
        });
    }
}

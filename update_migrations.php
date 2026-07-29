<?php
$dir = __DIR__ . '/database/migrations';
$files = scandir($dir);

$schemas = [
  'website_settings' => '
            $table->id();
            $table->string("key")->unique();
            $table->text("value")->nullable();
            $table->string("type")->default("text");
            $table->string("group")->default("general");
            $table->timestamps();
  ',
  'services' => '
            $table->id();
            $table->string("title");
            $table->string("slug")->unique();
            $table->text("description")->nullable();
            $table->string("icon")->nullable();
            $table->boolean("is_active")->default(true);
            $table->integer("order")->default(0);
            $table->string("seo_title")->nullable();
            $table->text("seo_description")->nullable();
            $table->timestamps();
  ',
  'portfolio_categories' => '
            $table->id();
            $table->string("name");
            $table->string("slug")->unique();
            $table->integer("order")->default(0);
            $table->timestamps();
  ',
  'portfolio_projects' => '
            $table->id();
            $table->foreignId("portfolio_category_id")->constrained()->cascadeOnDelete();
            $table->string("title");
            $table->string("slug")->unique();
            $table->string("client_name")->nullable();
            $table->string("url")->nullable();
            $table->string("status")->default("completed");
            $table->string("image")->nullable();
            $table->integer("order")->default(0);
            $table->timestamps();
  ',
  'testimonials' => '
            $table->id();
            $table->string("client_name");
            $table->string("company")->nullable();
            $table->string("position")->nullable();
            $table->text("review");
            $table->integer("rating")->default(5);
            $table->string("image")->nullable();
            $table->boolean("is_visible")->default(true);
            $table->timestamps();
  ',
  'faqs' => '
            $table->id();
            $table->string("category")->default("General");
            $table->string("question");
            $table->text("answer");
            $table->integer("order")->default(0);
            $table->timestamps();
  ',
  'contact_leads' => '
            $table->id();
            $table->string("name");
            $table->string("company")->nullable();
            $table->string("email");
            $table->string("phone")->nullable();
            $table->string("service")->nullable();
            $table->string("budget")->nullable();
            $table->string("timeline")->nullable();
            $table->text("message");
            $table->string("status")->default("New");
            $table->string("ip_address")->nullable();
            $table->string("browser")->nullable();
            $table->string("device")->nullable();
            $table->text("admin_notes")->nullable();
            $table->timestamps();
  ',
  'newsletter_subscribers' => '
            $table->id();
            $table->string("email")->unique();
            $table->string("status")->default("subscribed");
            $table->timestamps();
  ',
  'seo_pages' => '
            $table->id();
            $table->string("page_name")->unique();
            $table->string("title")->nullable();
            $table->text("description")->nullable();
            $table->string("keywords")->nullable();
            $table->string("og_image")->nullable();
            $table->timestamps();
  '
];

foreach ($files as $file) {
    foreach ($schemas as $table => $schema) {
        if (str_contains($file, "create_{$table}_table.php")) {
            $path = $dir . '/' . $file;
            $content = file_get_contents($path);
            $content = preg_replace('/\$table->id\(\);\s+\$table->timestamps\(\);/', trim($schema), $content);
            file_put_contents($path, $content);
            echo "Updated $file\n";
        }
    }
}

<?php

$resources = [
    'PortfolioCategories' => [
        'form' => "
                \Filament\Forms\Components\TextInput::make('name')->required(),
                \Filament\Forms\Components\TextInput::make('slug')->required(),
                \Filament\Forms\Components\TextInput::make('order')->numeric()->default(0),
        ",
        'table' => "
                \Filament\Tables\Columns\TextColumn::make('name')->searchable(),
                \Filament\Tables\Columns\TextColumn::make('slug'),
                \Filament\Tables\Columns\TextColumn::make('order')->sortable(),
        "
    ],
    'PortfolioProjects' => [
        'form' => "
                \Filament\Forms\Components\Select::make('portfolio_category_id')->relationship('category', 'name')->required(),
                \Filament\Forms\Components\TextInput::make('title')->required(),
                \Filament\Forms\Components\TextInput::make('slug')->required(),
                \Filament\Forms\Components\TextInput::make('client_name'),
                \Filament\Forms\Components\TextInput::make('url')->url(),
                \Filament\Forms\Components\Select::make('status')->options(['completed' => 'Completed', 'in_progress' => 'In Progress'])->default('completed'),
                \Filament\Forms\Components\TextInput::make('image'),
                \Filament\Forms\Components\TextInput::make('order')->numeric()->default(0),
        ",
        'table' => "
                \Filament\Tables\Columns\TextColumn::make('title')->searchable(),
                \Filament\Tables\Columns\TextColumn::make('category.name'),
                \Filament\Tables\Columns\TextColumn::make('status'),
        "
    ],
    'Testimonials' => [
        'form' => "
                \Filament\Forms\Components\TextInput::make('client_name')->required(),
                \Filament\Forms\Components\TextInput::make('company'),
                \Filament\Forms\Components\TextInput::make('position'),
                \Filament\Forms\Components\Textarea::make('review')->required(),
                \Filament\Forms\Components\TextInput::make('rating')->numeric()->default(5)->maxValue(5),
                \Filament\Forms\Components\TextInput::make('image'),
                \Filament\Forms\Components\Toggle::make('is_visible')->default(true),
        ",
        'table' => "
                \Filament\Tables\Columns\TextColumn::make('client_name')->searchable(),
                \Filament\Tables\Columns\TextColumn::make('company'),
                \Filament\Tables\Columns\IconColumn::make('is_visible')->boolean(),
        "
    ],
    'Faqs' => [
        'form' => "
                \Filament\Forms\Components\TextInput::make('category')->default('General'),
                \Filament\Forms\Components\TextInput::make('question')->required(),
                \Filament\Forms\Components\Textarea::make('answer')->required(),
                \Filament\Forms\Components\TextInput::make('order')->numeric()->default(0),
        ",
        'table' => "
                \Filament\Tables\Columns\TextColumn::make('question')->searchable(),
                \Filament\Tables\Columns\TextColumn::make('category')->sortable(),
        "
    ],
    'ContactLeads' => [
        'form' => "
                \Filament\Forms\Components\TextInput::make('name')->required(),
                \Filament\Forms\Components\TextInput::make('company'),
                \Filament\Forms\Components\TextInput::make('email')->email()->required(),
                \Filament\Forms\Components\TextInput::make('phone'),
                \Filament\Forms\Components\TextInput::make('service'),
                \Filament\Forms\Components\TextInput::make('budget'),
                \Filament\Forms\Components\TextInput::make('timeline'),
                \Filament\Forms\Components\Textarea::make('message')->required(),
                \Filament\Forms\Components\Select::make('status')->options(['New' => 'New', 'Contacted' => 'Contacted', 'Closed' => 'Closed'])->default('New'),
                \Filament\Forms\Components\Textarea::make('admin_notes'),
        ",
        'table' => "
                \Filament\Tables\Columns\TextColumn::make('name')->searchable(),
                \Filament\Tables\Columns\TextColumn::make('email'),
                \Filament\Tables\Columns\TextColumn::make('service'),
                \Filament\Tables\Columns\TextColumn::make('status'),
        "
    ],
    'NewsletterSubscribers' => [
        'form' => "
                \Filament\Forms\Components\TextInput::make('email')->email()->required(),
                \Filament\Forms\Components\Select::make('status')->options(['subscribed' => 'Subscribed', 'unsubscribed' => 'Unsubscribed'])->default('subscribed'),
        ",
        'table' => "
                \Filament\Tables\Columns\TextColumn::make('email')->searchable(),
                \Filament\Tables\Columns\TextColumn::make('status'),
        "
    ],
    'SeoPages' => [
        'form' => "
                \Filament\Forms\Components\TextInput::make('page_name')->required(),
                \Filament\Forms\Components\TextInput::make('title'),
                \Filament\Forms\Components\Textarea::make('description'),
                \Filament\Forms\Components\TextInput::make('keywords'),
                \Filament\Forms\Components\TextInput::make('og_image'),
        ",
        'table' => "
                \Filament\Tables\Columns\TextColumn::make('page_name')->searchable(),
                \Filament\Tables\Columns\TextColumn::make('title'),
        "
    ],
    'WebsiteSettings' => [
        'form' => "
                \Filament\Forms\Components\TextInput::make('key')->required(),
                \Filament\Forms\Components\Textarea::make('value'),
                \Filament\Forms\Components\TextInput::make('type')->default('text'),
                \Filament\Forms\Components\TextInput::make('group')->default('general'),
        ",
        'table' => "
                \Filament\Tables\Columns\TextColumn::make('key')->searchable(),
                \Filament\Tables\Columns\TextColumn::make('value')->limit(50),
                \Filament\Tables\Columns\TextColumn::make('group'),
        "
    ]
];

$basePath = __DIR__ . '/app/Filament/Resources/';

foreach ($resources as $dir => $data) {
    // Determine singular name (e.g. ContactLeads -> ContactLead)
    $singular = rtrim($dir, 's');
    if ($dir === 'PortfolioCategories') $singular = 'PortfolioCategory';
    
    // FORM
    $formPath = $basePath . $dir . '/Schemas/' . $singular . 'Form.php';
    if (file_exists($formPath)) {
        $content = file_get_contents($formPath);
        $content = preg_replace('/(\->components\(\[\s*)\/\/(\s*\]\);)/s', '$1' . $data['form'] . '$2', $content);
        file_put_contents($formPath, $content);
    }
    
    // TABLE
    $tablePath = $basePath . $dir . '/Tables/' . $dir . 'Table.php';
    if (file_exists($tablePath)) {
        $content = file_get_contents($tablePath);
        $content = preg_replace('/(\->columns\(\[\s*)\/\/(\s*\]\))/s', '$1' . $data['table'] . '$2', $content);
        file_put_contents($tablePath, $content);
    }
}
echo "Done.";

---
extends: _layouts.post
section: content
title: "Filament: the best TALL Stack Package"
date: 2022-12-16
description: The filament is a collection of tools for rapidly building beautiful TALL Stack apps, designed for humans.
categories: [tools]
---

The filament is a collection of tools for rapidly building beautiful TALL Stack apps, designed for humans. - https://filamentphp.com/

The filament is the open-source alternative of the Laravel-Nova package.

Filament v2 is an admin panel builder at its core. In v3, the Filament team wants to make it an [App framework](https://github.com/filamentphp/filament/discussions/4400) instead of an admin panel builder.

With Filament, you can build Admin panels (and soon the entire app) with the minimum amount of code you can imagine.

look at these code snippets :
```PHP
<?php

namespace App\Filament\Resources;

use App\Filament\FilamentSidebar;
use App\Filament\Resources\UserResource\Pages;
use App\Models\Enums\GenderTypes;
use App\Models\User;
use Ariaieboy\FilamentJalaliDatetimepicker\Forms\Components\JalaliDateTimePicker;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $modelLabel = 'user';

    protected static ?string $pluralModelLabel = 'users';

    protected static ?string $navigationGroup = 'management';

    protected static ?int $navigationSort = 0;

    protected static ?string $navigationIcon = 'fad-users';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('first_name')
                    ->maxLength(125),
                Forms\Components\TextInput::make('last_name')
                    ->maxLength(125),
                Forms\Components\TextInput::make('email')
                    ->unique(ignoreRecord: true)
                    ->email()
                    ->extraInputAttributes(['autocomplete' => 'off'])
                    ->maxLength(125),
                Forms\Components\TextInput::make('phone')
                    ->afterStateHydrated(function ($component, $state) {
                        $component->state((string) $state);
                    })
                    ->unique(ignoreRecord: true)
                    ->tel()
                    ->required()
                    ->maxLength(125),
                JalaliDateTimePicker::make('email_verified_at'),
                Forms\Components\TextInput::make('password')
                    ->password()
                    ->extraInputAttributes(['autocomplete' => 'new-password'])
                    ->minLength(8)
                    ->maxLength(125),
                JalaliDateTimePicker::make('birth_date')->weekStartsOnSunday(),
                Forms\Components\Select::make('gender')->options(GenderTypes::toNameArray()),
                Forms\Components\Select::make('roles')
                    ->multiple()
                    ->relationship('roles', 'name')
                    ->preload(),
                Forms\Components\Toggle::make('completed')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')->sortable(),
                Tables\Columns\TextColumn::make('full_name'),
                Tables\Columns\TextColumn::make('email'),
                Tables\Columns\TextColumn::make('phone')->formatStateUsing(fn ($state) => $state->get()),
                Tables\Columns\BooleanColumn::make('completed'),
                Tables\Columns\TextColumn::make('gender')->enum(GenderTypes::toNameArray()),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}


```

The Code above is the only thing you need to create a full CRUD for your User Model.

Even if it's your first time seeing a Filament resource file you can understand 90% of the snippet's code above. Because of the great syntax of the Filament.

One of the best features of Filament is the auto-populating of select options using the model relationship:
```PHP
Forms\Components\Select::make('roles')
                    ->multiple()
                    ->relationship('roles', 'name')
                    ->preload(),
```
In these snippets, I've created a multiple select input for the `roles` relationship of my User model. with only 4 lines of code, it's gonna populate my select options using the `roles` relationship of my User model.
It's getting, even more, interesting because these 4 lines of code also handle the creation or updating of the record relationship automatically and you don't need to do anything to save the selected options that users send with the create or edit form and that is amazing.

Your relationship may have a lot of options and good practice is to add a search to the select something like Select2js is very useful in a typical application you must install and configure the Select2 and provide the needed data or create an API endpoint so Select2 can fetch the data remotely. but in the Filament the only thing that you need to do is to add one line of code.
```PHP
Forms\Components\Select::make('roles')
                    ->multiple()
		            ->searchable() // [tl! focus]
                    ->relationship('roles', 'name')
                    ->preload(),
```
By adding one method `searchable()` you gonna have a Select2 kind of search on your select input. isn't that amazing?

If your relationship is more complicated than a simple select input you can use [Relation managers](https://filamentphp.com/docs/2.x/admin/resources/relation-managers) to handle the relationship between your resources.

Filament also gives you the option to use its packages outside of the Filament Admin if your application is using the TALL Stack.

Right now there are 3 plugins you can use outside of filament admin.
[Form builder](https://filamentphp.com/docs/2.x/forms), [Table builder](https://filamentphp.com/docs/2.x/tables) and [Notifications](https://filamentphp.com/docs/2.x/notifications).

And it's not the end of the story Filament has a lot of third-party plugins you can use. right now that I am writing this article there are more than 140 plugins for Filament that you can find them [here](https://filamentphp.com/plugins).

Filament also has a nice [Tricks](https://filamentphp.com/tricks) section on their website where users share Tips and Tricks about how you can do things using Filament and Tall Stack.

I hope this article helped you find great tools. You can share the tools You're using with me on Twitter.

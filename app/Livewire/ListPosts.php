<?php

namespace App\Livewire;

use App\Models\Post;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ViewAction;
use Livewire\Component;

class ListPosts extends Component implements HasTable, HasForms
{
    use InteractsWithTable, InteractsWithForms;
    public function render()
    {
        return view('livewire.list-posts');
    }

    public function table(Table $table) : Table
    {
        return $table
            ->query(Post::query())
            ->columns([
                TextColumn::make('id')->searchable(),
                TextColumn::make('property_id')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('post')->searchable(),
                TextColumn::make('status')->searchable(),
                TextColumn::make('url'),
                TextColumn::make('created_at')->dateTime(),
                TextColumn::make('Actions')
            ])
            ->filters([
                SelectFilter::make('status')
                    ->options([
                        'Pendiente' => 'Pendiente',
                        'Autorizado' => 'Autorizado',
                        'Publicado' => 'Publicado'
                    ])
            ])
//            ->actions([
//                ActionGroup::make([
//                    ViewAction::make(),
//                    EditAction::make(),
//                    DeleteAction::make(),
//                ]),
//            ])
            ->actions([
                Action::make('Publicar')
                    ->action(function (Post $record) {
                        $record->status = 'Publicado';
                        $record->save();
                    })->button()
                      ->label('Publicar')
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);

    }
}

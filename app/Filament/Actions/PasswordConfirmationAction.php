<?php

namespace App\Filament\Actions;

use Jeffgreco13\FilamentBreezy\Actions\PasswordButtonAction;

/**
 * Example: PasswordConfirmationAction
 * 
 * Gunakan di Resource Actions untuk protect sensitive operations
 * 
 * Contoh penggunaan:
 * 
 * use App\Filament\Actions\PasswordConfirmationAction;
 * 
 * // Di dalam Resource atau Page
 * ->actions([
 *     PasswordConfirmationAction::make('delete_account')
 *         ->action(fn ($data) => handleDeleteAccount())
 * ])
 */

class PasswordConfirmationAction
{
    /**
     * Create a password confirmation action for deleting account
     */
    public static function deleteAccount(): PasswordButtonAction
    {
        return PasswordButtonAction::make('delete_account')
            ->label(__('Delete Account'))
            ->icon('heroicon-o-trash')
            ->color('danger')
            ->modalHeading(__('Delete Account'))
            ->modalDescription(__('This action cannot be undone. All your data will be permanently deleted.'))
            ->modalSubmitActionLabel(__('Delete'))
            ->action(function () {
                auth()->user()->delete();
                return redirect('/');
            });
    }

    /**
     * Create a password confirmation action for resetting data
     */
    public static function resetData(): PasswordButtonAction
    {
        return PasswordButtonAction::make('reset_data')
            ->label(__('Reset Data'))
            ->icon('heroicon-o-arrow-path')
            ->color('warning')
            ->modalHeading(__('Reset Data'))
            ->modalDescription(__('This will reset all your data to default values.'))
            ->modalSubmitActionLabel(__('Reset'))
            ->action(function () {
                // Handle reset logic
            });
    }

    /**
     * Create a password confirmation action for exporting data
     */
    public static function exportData(): PasswordButtonAction
    {
        return PasswordButtonAction::make('export_data')
            ->label(__('Export Data'))
            ->icon('heroicon-o-arrow-down-tray')
            ->color('info')
            ->modalHeading(__('Export Personal Data'))
            ->modalDescription(__('Your data will be exported as a CSV file.'))
            ->modalSubmitActionLabel(__('Export'))
            ->action(function () {
                // Handle export logic
                // return downloadFile();
            });
    }
}

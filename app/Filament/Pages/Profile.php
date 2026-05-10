<?php

namespace App\Filament\Pages;

use App\Models\User;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class Profile extends Page implements HasForms
{
    use InteractsWithForms;

    protected static ?string $navigationIcon = 'heroicon-o-user-circle';
    protected static ?string $navigationLabel = 'My Profile';
    protected static ?string $title = 'My Profile';
    protected static ?string $slug = 'profile';
    protected static ?int $navigationSort = 999;
    protected static string $view = 'filament.pages.profile';

    // Data containers for the forms
    public ?array $profileData = [];
    public ?array $passwordData = [];

    public function mount(): void
    {
        /** @var User $user */
        $user = Auth::user();

        $this->profileForm->fill([
            'name' => $user->name,
            'email' => $user->email,
        ]);

        $this->passwordForm->fill();
    }

    protected function getForms(): array
    {
        return [
            'profileForm',
            'passwordForm',
        ];
    }

    public function profileForm(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Profile Information')
                    ->description('Update your account\'s profile information and email address.')
                    ->schema([
                        TextInput::make('name')
                            ->required()
                            ->maxLength(255),
                        TextInput::make('email')
                            ->email()
                            ->required()
                            ->maxLength(255)
                            ->unique(User::class, 'email', ignoreRecord: true),
                    ]),
            ])
            ->statePath('profileData');
    }

    public function passwordForm(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Update Password')
                    ->description('Ensure your account is using a long, random password to stay secure.')
                    ->schema([
                        TextInput::make('current_password')
                            ->password()
                            ->required()
                            ->currentPassword(),
                        TextInput::make('password')
                            ->label('New Password')
                            ->password()
                            ->required()
                            ->rule(Password::default())
                            ->same('password_confirmation'),
                        TextInput::make('password_confirmation')
                            ->label('Confirm Password')
                            ->password()
                            ->required()
                            ->dehydrated(false),
                    ]),
            ])
            ->statePath('passwordData');
    }

    public function updateProfile(): void
    {
        $data = $this->profileForm->getState();

        /** @var User $user */
        $user = Auth::user();
        $user->update($data);

        Notification::make()
            ->title('Profile updated successfully')
            ->success()
            ->send();
    }

    public function updatePassword(): void
    {
        $data = $this->passwordForm->getState();

        /** @var User $user */
        $user = Auth::user();
        $user->update([
            'password' => Hash::make($data['password']),
        ]);

        $this->passwordForm->fill();

        Notification::make()
            ->title('Password updated successfully')
            ->success()
            ->send();
    }

    public static function shouldRegisterNavigation(): bool
    {
        /** @var User $user */
        $user = Auth::user();
        return $user && $user->isAdmin();
    }
}

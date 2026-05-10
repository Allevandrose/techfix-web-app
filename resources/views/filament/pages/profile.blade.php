<x-filament-panels::page>
    <div class="space-y-6">
        
        {{-- Profile Information Section --}}
        <x-filament::section>
            <x-slot name="heading">
                <div class="flex items-center gap-2">
                    <x-filament::icon icon="heroicon-o-user" class="h-5 w-5 text-primary-500" />
                    <span>Profile Information</span>
                </div>
            </x-slot>
            
            <x-slot name="description">
                Update your account's profile information and email address.
            </x-slot>
            
            <x-filament-panels::form wire:submit="updateProfile">
                {{ $this->profileForm }}
                
                <div class="flex justify-end">
                    <x-filament::button type="submit" color="primary">
                        Save Changes
                    </x-filament::button>
                </div>
            </x-filament-panels::form>
        </x-filament::section>

        {{-- Update Password Section --}}
        <x-filament::section>
            <x-slot name="heading">
                <div class="flex items-center gap-2">
                    <x-filament::icon icon="heroicon-o-key" class="h-5 w-5 text-primary-500" />
                    <span>Update Password</span>
                </div>
            </x-slot>
            
            <x-slot name="description">
                Ensure your account is using a long, random password to stay secure.
            </x-slot>
            
            <x-filament-panels::form wire:submit="updatePassword">
                {{ $this->passwordForm }}
                
                <div class="flex justify-end">
                    <x-filament::button type="submit" color="primary">
                        Update Password
                    </x-filament::button>
                </div>
            </x-filament-panels::form>
        </x-filament::section>

        {{-- Delete Account Section --}}
        @if(Auth::user()->id !== 1)
        <x-filament::section>
            <x-slot name="heading">
                <div class="flex items-center gap-2">
                    <x-filament::icon icon="heroicon-o-trash" class="h-5 w-5 text-danger-500" />
                    <span class="text-danger-500">Delete Account</span>
                </div>
            </x-slot>
            
            <x-slot name="description">
                Once your account is deleted, all of its resources and data will be permanently deleted.
            </x-slot>
            
            <div class="space-y-4">
                <p class="text-sm text-gray-600 dark:text-gray-400">
                    Are you sure you want to delete your account? This action cannot be undone.
                </p>
                
                <div class="flex justify-end">
                    {{-- Filament recommends using Actions for deletions, but this confirm works for now --}}
                    <x-filament::button 
                        color="danger" 
                        x-on:click="if(confirm('Are you sure you want to delete your account? This action cannot be undone.')) { $wire.deleteAccount() }"
                    >
                        Delete Account
                    </x-filament::button>
                </div>
            </div>
        </x-filament::section>
        @endif
    </div>
</x-filament-panels::page>
<x-app-layout>
    <x-slot name="header">
        <div>
            <p class="page-label">Pengaturan Akun</p>
            <h1 class="page-title">Edit Profil</h1>
        </div>
    </x-slot>

    <div class="max-w-2xl space-y-6">
        <!-- Update Profile Information -->
        <div class="info-card">
            @include('profile.partials.update-profile-information-form')
        </div>

        <!-- Update Password -->
        <div class="info-card">
            @include('profile.partials.update-password-form')
        </div>

        <!-- Delete Account -->
        <div class="info-card border-red-200 bg-red-50">
            @include('profile.partials.delete-user-form')
        </div>
    </div>
</x-app-layout>

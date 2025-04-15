<?php

use App\Models\User;
use App\Models\Pemilik;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('components.layouts.auth')] class extends Component {
    public string $name = '';
    public string $email = '';
    public string $password = '';
    public string $password_confirmation = '';

    // --------

    // Data untuk tabel pemiliks
    public string $nomor_ktp = '';
    public string $tanggal_lahir = '';
    public string $alamat = '';
    public string $nomor_telepon = '';

    /**
     * Handle an incoming registration request.
     */
    public function register(): void
    {
        $validated = $this->validate([
            // Validasi untuk users
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'string', 'confirmed', Rules\Password::defaults()],

            // Validasi untuk pemiliks
            'nomor_ktp' => ['required', 'numeric', 'digits:16', 'unique:pemiliks,nomor_ktp'],
            'tanggal_lahir' => ['required'],
            'alamat' => ['required', 'string', 'max:255'],
            'nomor_telepon' => ['required', 'numeric', 'digits_between:10,13'],
        ]);

        // Enkripsi password
        $validated['password'] = Hash::make($validated['password']);

        // Mulai database transaction
        DB::beginTransaction();

        try {
            // Buat user
            $user = User::create([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'password' => $validated['password'],
            ]);

            // Buat pemilik terkait
            Pemilik::create([
                'user_id' => $user->id,
                'nama' => $validated['name'],
                'nomor_ktp' => $validated['nomor_ktp'],
                'tanggal_lahir' => $validated['tanggal_lahir'],
                'alamat' => $validated['alamat'],
                'nomor_telepon' => $validated['nomor_telepon'],
            ]);

            DB::commit();

            event(new Registered($user));
            Auth::login($user);
            $this->redirectIntended(route('dashboard', absolute: false), navigate: true);
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }
}; ?>

<div class="flex flex-col gap-6">
    <x-auth-header :title="__('Create an account')" :description="__('Enter your details below to create your account')" />

    <!-- Session Status -->
    <x-auth-session-status class="text-center" :status="session('status')" />

    <form wire:submit="register" class="flex flex-col gap-6">
        <!-- Name -->
        <flux:input wire:model="name" :label="__('Name')" type="text" required autofocus autocomplete="name"
            :placeholder="__('Full name')" />

        <!-- NIK -->
        <flux:input wire:model="nomor_ktp" :label="__('NIK')" type="number" required autocomplete="nomor_ktp"
            :placeholder="__('NIK')" />

        <!-- Tanggal Lahir -->
        <flux:input wire:model="tanggal_lahir" :label="__('Tanggal Lahir')" type="date" required
            autocomplete="tanggal_lahir" :placeholder="__('Tanggal Lahir')" />

        <!-- Alamat -->
        <flux:input wire:model="alamat" :label="__('Alamat')" type="text_area" required autocomplete="alamat"
            :placeholder="__('Alamat')" />

        <!-- Nomor Telepon -->
        <flux:input wire:model="nomor_telepon" :label="__('Nomor Telepon')" type="number" required
            autocomplete="nomor_telepon" :placeholder="__('Nomor Telepon')" />

        <!-- Email Address -->
        <flux:input wire:model="email" :label="__('Email address')" type="email" required autocomplete="email"
            placeholder="email@example.com" />

        <!-- Password -->
        <flux:input wire:model="password" :label="__('Password')" type="password" required autocomplete="new-password"
            :placeholder="__('Password')" />

        <!-- Confirm Password -->
        <flux:input wire:model="password_confirmation" :label="__('Confirm password')" type="password" required
            autocomplete="new-password" :placeholder="__('Confirm password')" />

        <div class="flex items-center justify-end">
            <flux:button type="submit" variant="primary" class="w-full">
                {{ __('Create account') }}
            </flux:button>
        </div>
    </form>

    <div class="space-x-1 text-center text-sm text-zinc-600 dark:text-zinc-400">
        {{ __('Already have an account?') }}
        <flux:link :href="route('login')" wire:navigate>{{ __('Log in') }}</flux:link>
    </div>
</div>

<section class="auth-card">
    <div>
        <p class="eyebrow">ProcureBid</p>
        <h1>Buat akun</h1>
        <p class="muted">Akun yang sama dapat digunakan oleh UI Livewire dan API.</p>
    </div>

    <form wire:submit="register" class="form-stack">
        <label>
            <span>Nama</span>
            <input type="text" wire:model="name" autocomplete="name" autofocus>
            @error('name') <small class="error">{{ $message }}</small> @enderror
        </label>

        <label>
            <span>Email</span>
            <input type="email" wire:model="email" autocomplete="email">
            @error('email') <small class="error">{{ $message }}</small> @enderror
        </label>

        <label>
            <span>Password</span>
            <input type="password" wire:model="password" autocomplete="new-password">
            @error('password') <small class="error">{{ $message }}</small> @enderror
        </label>

        <label>
            <span>Konfirmasi password</span>
            <input type="password" wire:model="password_confirmation" autocomplete="new-password">
        </label>

        <button type="submit" wire:loading.attr="disabled">
            <span wire:loading.remove>Register</span>
            <span wire:loading>Menyimpan...</span>
        </button>
    </form>

    <p class="muted">Sudah punya akun? <a href="{{ route('login') }}" wire:navigate>Login</a></p>
</section>

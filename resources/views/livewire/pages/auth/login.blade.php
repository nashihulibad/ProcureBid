<section class="auth-card">
    <div>
        <p class="eyebrow">ProcureBid</p>
        <h1>Masuk ke akun</h1>
        <p class="muted">Gunakan session web untuk halaman Livewire.</p>
    </div>

    <form wire:submit="login" class="form-stack">
        <label>
            <span>Email</span>
            <input type="email" wire:model="email" autocomplete="email" autofocus>
            @error('email') <small class="error">{{ $message }}</small> @enderror
        </label>

        <label>
            <span>Password</span>
            <input type="password" wire:model="password" autocomplete="current-password">
            @error('password') <small class="error">{{ $message }}</small> @enderror
        </label>

        <label class="checkbox-row">
            <input type="checkbox" wire:model="remember">
            <span>Ingat saya</span>
        </label>

        <button type="submit" wire:loading.attr="disabled">
            <span wire:loading.remove>Login</span>
            <span wire:loading>Memproses...</span>
        </button>
    </form>

    <p class="muted">Belum punya akun? <a href="{{ route('register') }}" wire:navigate>Daftar</a></p>
</section>

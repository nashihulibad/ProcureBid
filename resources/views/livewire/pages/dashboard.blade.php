<section class="dashboard-card">
    <p class="eyebrow">Fondasi Livewire aktif</p>
    <h1>Halo, {{ auth()->user()->name }}</h1>
    <p class="muted">Halaman web memakai session. Konsumen eksternal tetap menggunakan API Sanctum di <code>/api/v1</code>.</p>

    <div class="architecture-flow">
        <span>Livewire</span>
        <strong>→</strong>
        <span>Action</span>
        <strong>←</strong>
        <span>API v1</span>
    </div>

    <button type="button" wire:click="logout">Logout</button>
</section>

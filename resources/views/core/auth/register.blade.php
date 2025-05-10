<div class="card w-full max-w-md  shadow-xl">
    <div class="card-body">
        <h2 class="card-title text-2xl font-bold mb-4">Daftar Akun Baru</h2>

        <form wire:submit.prevent="register" class="space-y-4">
            <!-- Nama Lengkap -->
            <div class="form-control">
                <label class="label">
                    <span class="label-text">Nama Lengkap</span>
                </label>
                <input wire:model="name" type="text" placeholder="Masukkan nama lengkap" class="input input-bordered"
                    required />
                
                @error('name')
                    <p class="text-red-600 text-sm">{{ $message }}</p>
                @enderror

            </div>

            <!-- Email -->
            <div class="form-control">
                <label class="label">
                    <span class="label-text">Email</span>
                </label>
                <input type="email" wire:model="email" placeholder="contoh@email.com" class="input input-bordered"
                    required />
                @error('email')
                    <p class="text-red-600 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <!-- Password -->
            <div class="form-control">
                <label class="label">
                    <span class="label-text">Password</span>
                </label>
                <input type="password" wire:model="password" placeholder="********" class="input input-bordered"
                    required />
                @error('password')
                    <p class="text-red-600 text-sm">{{ $message }}</p>
                @enderror

            </div>

            <!-- Konfirmasi Password -->
            <div class="form-control">
                <label class="label">
                    <span class="label-text">Konfirmasi Password</span>
                </label>
                <input type="password" wire:model="password_confirmation" placeholder="********"
                    class="input input-bordered" required />
                @error('password_confirmation')
                    <p class="text-red-600 text-sm">{{ $message }}</p>
                @enderror
            </div>


            <!-- Checkbox Terms -->
            <div class="form-control">
                <label class="label cursor-pointer justify-start gap-2">
                    <input type="checkbox" class="checkbox checkbox-primary" required />
                    <span class="label-text">Saya menyetujui <a href="#" class="link link-primary">Syarat &
                            Ketentuan</a></span>
                </label>
            </div>

            <!-- Submit Button -->
            <div class="form-control mt-6">
                <button id="loginBtn" class="btn btn-primary text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                    </svg>
                    Login
                  </button>
            </div>

            <!-- Login Link -->
            <div class="text-center">
                <p>Sudah punya akun? <a wire:navigate href="{{ route('login') }}" class="link link-primary">Masuk
                        disini</a></p>
            </div>
        </form>
        @script
            document.getElementById('loginBtn').addEventListener('click', function() {
              const btn = this;
              
              // Tambahkan class loading
              btn.classList.add('loading');
              btn.disabled = true;
              
              // Ganti teks tombol
              const originalText = btn.innerHTML;
              btn.innerHTML = 'Memproses...';
              
              // Simulasi proses login (3 detik)
              setTimeout(function() {
                // Hapus class loading setelah selesai
                btn.classList.remove('loading');
                btn.disabled = false;
                btn.innerHTML = originalText;
                
                // Alert login berhasil (bisa diganti dengan redirect dll)
                
              }, 3000);
            });
        @endscript
    </div>
</div>

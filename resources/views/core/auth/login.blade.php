<div class="min-h-screen flex items-center justify-center bg-base-200">
    <div class="card w-full max-w-md shadow-2xl bg-base-100">
        <div class="card-body">
            <h1 class="text-2xl font-bold text-center">Login</h1>
            
            <form wire:submit.prevent="login" class="mt-6 space-y-4">
                <div class="form-control">
                    <label class="label">
                        <span class="label-text">Email</span>
                    </label>
                    <input 
                        type="email" 
                        wire:model="email"
                        placeholder="email@example.com" 
                        class="input input-bordered" 
                        required
                    />
                </div>
                
                <div class="form-control">
                    <label class="label">
                        <span class="label-text">Password</span>
                    </label>
                    <input 
                        type="password" 
                        wire:model="password"
                        placeholder="********" 
                        class="input input-bordered" 
                        required
                    />
                    <label class="label">
                        <a href="#" class="label-text-alt link link-hover">Forgot password?</a>
                    </label>
                </div>
                
                <div class="form-control mt-6">
                    <button class="btn btn-primary">Login</button>
                </div>
            </form>
            
            <div class="divider">OR</div>
            
            <div class="flex justify-center gap-4">
                <button class="btn btn-outline btn-accent">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z" />
                    </svg>
                    GitHub
                </button>
                <button class="btn btn-outline btn-info">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M7 11v2.4h3.97c-.16 1.029-1.2 3.02-3.97 3.02-2.39 0-4.34-1.979-4.34-4.42 0-2.44 1.95-4.42 4.34-4.42 1.36 0 2.27.58 2.79 1.08l1.9-1.83c-1.22-1.14-2.8-1.83-4.69-1.83-3.87 0-7 3.13-7 7s3.13 7 7 7c4.04 0 6.721-2.84 6.721-6.84 0-.46-.051-.81-.111-1.16h-6.61zm0 0 17 2h-3v3h-2v-3h-3v-2h3v-3h2v3h3v2z" fill-rule="evenodd" clip-rule="evenodd"/>
                    </svg>
                    Google
                </button>
            </div>
            
            <p class="text-center mt-4">
                Don't have an account? 
                <a wire:navigate href="{{ route('register') }}" class="link link-primary">Sign up</a>
            </p>
        </div>
    </div>
</div>
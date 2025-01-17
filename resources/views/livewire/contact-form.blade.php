@section('styles')
    <link rel="stylesheet" href="{{ asset('css/notificaciones.css') }}">
@endsection

<div class="container py-5">
    @if (session()->has('success'))
        <div class="alert alert-success mb-4">
            {{ session('success') }}
        </div>
    @endif

    @if (session()->has('error'))
        <div class="alert alert-danger mb-4">
            {{ session('error') }}
        </div>
    @endif

    <form wire:submit.prevent="submit" class="bg-white p-4 col-md-6 col-11 rounded shadow-sm mx-auto">
        <h2 class="text-center mb-4">{{ __('messages.contact_me') }}</h2>

        <div class="mb-3">
            <label for="name" class="form-label">{{ __('messages.name') }}</label>
            <input type="text" id="name" wire:model="name" class="form-control">
            @error('name') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label for="phone" class="form-label">{{ __('messages.phone') }}</label>
            <input type="text" id="phone" wire:model="phone" class="form-control">
            @error('phone') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label for="subject" class="form-label">{{ __('messages.subject') }}</label>
            <input type="text" id="subject" wire:model="subject" class="form-control">
            @error('subject') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label for="message" class="form-label">{{ __('messages.message') }}</label>
            <textarea id="message" wire:model="message" rows="5" class="form-control"></textarea>
            @error('message') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <button type="submit" class="btn btn-primary w-100">{{ __('messages.send') }}</button>
    </form>
</div>

<div id="notification" class="opacity-0 fixed top-5 right-5 p-4 rounded shadow-lg text-white z-50"></div>

@section('scripts')
    <script src="{{ asset('js/notificaciones.js') }}"></script>
@endsection

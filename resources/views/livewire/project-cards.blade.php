<div class="row g-4">
    @foreach ($projects as $project)
        <div class="col-md-4">
            <div class="card shadow-sm border-0">
                <img src="{{ asset($project->image) }}" alt="{{ $project->title }}" class="card-img-top rounded">
                <div class="card-body">
                    <h5 class="card-title">{{ $project->title }}</h5>
                    <p class="card-text text-muted">{{ $project->description }}</p>
                    <a href="{{ $project->demo_url }}" target="_blank" class="btn btn-outline-primary">Ver Demo</a>
                </div>
            </div>
        </div>
    @endforeach
</div>

@if ($projects->count() < App\Project::count())
    <div class="mt-4 text-center">
        <button wire:click="loadMore" class="btn btn-primary">
            Cargar más
        </button>
    </div>
@endif

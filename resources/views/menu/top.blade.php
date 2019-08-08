@foreach ($specializations as $specialization)
    <a href="{{ $specialization->slug }}"
       class="btn btn-outline-primary m-1 {{ ($specialization->slug == $activeSlug) ? 'active' : '' }}"
       role="button" aria-pressed="true">
        {{ $specialization->name }}
    </a>
@endforeach

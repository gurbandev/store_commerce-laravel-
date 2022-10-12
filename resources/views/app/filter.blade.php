<div>
    <a class="btn btn-secondary btn-sm" href="{{ request()->fullUrlWithQuery(['sort' => 'low-to-high', 'page' => 1]) }}">
        Arzandan
    </a>
    <a class="btn btn-secondary btn-sm" href="{{ request()->fullUrlWithQuery(['sort' => 'high-to-low', 'page' => 1]) }}">
        Gymmatdan arzana
    </a>
    <a class="btn btn-secondary btn-sm" href="{{ request()->fullUrlWithQuery(['sort' => 'most-viewed', 'page' => 1]) }}">
        Köp görülenler
    </a>
</div>
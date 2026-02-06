<h1>PokeG Database Test</h1>
<div style="display: flex; flex-wrap: wrap; gap: 20px;">
    @foreach($pokemon as $p)
        <div style="border: 1px solid #ccc; padding: 10px; text-align: center;">
            <img src="{{ $p->sprite_url }}" alt="{{ $p->name }}">
            <h3>{{ ucfirst($p->name) }}</h3>
            <p>HP: {{ $p->hp }} | ATK: {{ $p->attack }}</p>
        </div>
    @endforeach
</div>
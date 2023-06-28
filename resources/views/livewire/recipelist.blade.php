<div wire:init="getRecepies" class="wire-container">
    @php 
        print_r($filter_options);
    @endphp

    @if ($isLoading)

        @include('loading')

    @else 
        @foreach ($recepies as $recipe)
            @component('../components/recipe', ['recipe' => $recipe])
            @endcomponent
        @endforeach
    @endif

    {{$printed}}

    @if (isset($error))
      <div class="alert alert-danger">
          <ul>
            <li>{{ $error }}</li>
          </ul>
      </div>
    @endif
</div>

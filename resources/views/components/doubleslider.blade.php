<script src="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/14.6.3/nouislider.min.js"></script>

<h3 class="blog-post-title">{{$title}}</h3>
<div class="form-group">
    <label for="kochzeit">{{$name}}</label>
    <div id="slider" class="slider"></div>
    <div class="d-flex justify-content-between">
        <span id="min">Min: {{$minimum}}</span>
        <span id="max">Max: {{$maximum}}</span>
    </div>
    <input type="hidden" id="min_input" name="{{$min_name}}" value="{{$minimum}}">
    <input type="hidden" id="max_input" name="{{$max_name}}" value="{{$maximum}}">
</div>

<script>
  var slider = document.getElementById('slider');
  var minKochzeitInput = document.getElementById('min_input');
  var maxKochzeitInput = document.getElementById('max_input');
  var minKochzeitLabel = document.getElementById('min');
  var maxKochzeitLabel = document.getElementById('max');

  noUiSlider.create(slider, {
    start: [{{$minimum}}, {{$maximum}}],
    connect: true,
    step: 1,
    range: {
      'min': {{$minimum}},
      'max': {{$maximum}}
    }
  });

  slider.noUiSlider.on('update', function (values, handle) {
    var value = values[handle];

    if (handle === 0) {
      minKochzeitInput.value = Math.round(value);
      minKochzeitLabel.textContent = 'Min: ' + Math.round(value);
    } else {
      maxKochzeitInput.value = Math.round(value);
      if (maxKochzeitInput.value == {{$maximum}}){
        maxKochzeitLabel.textContent = 'None';
      } else {
        maxKochzeitLabel.textContent = 'Max: ' + Math.round(value);
      }
    }
  });
</script>

@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/14.6.3/nouislider.min.css">

<style>
    ul ul {
        display: none;
    }
    input[type="checkbox"]:checked ~ ul {
        display: block;
    }
</style>
@endsection
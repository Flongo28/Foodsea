<h3 class="blog-post-title">{{$title}}</h3>
<div class="form-group">
    <div id="liste">
        <div class="input-group mb-3">
        </div>
    </div>
    <button id="zutat-hinzufuegen-btn" class="btn btn-outline-primary" type="button">+</button>
</div>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    // Zutat hinzufügen
    document.getElementById('zutat-hinzufuegen-btn').addEventListener('click', function() {
      var zutatenListe = document.getElementById('liste');

      var neueZutatInput = document.createElement('div');
      neueZutatInput.classList.add('input-group', 'mb-3');

      neueZutatInput.innerHTML = `
        <input type="text" class="form-control zutat-input" name="{{$item}}[]" placeholder="{{$input_name}}">
        <div class="input-group-append">
          <button class="btn btn-outline-secondary entfernen-btn" type="button">-</button>
        </div>
      `;

      zutatenListe.appendChild(neueZutatInput);
    });

    // Zutat entfernen
    document.addEventListener('click', function(event) {
      if (event.target.classList.contains('entfernen-btn')) {
        var zutatInput = event.target.closest('.input-group');
        zutatInput.parentNode.removeChild(zutatInput);
      }
    });
  });
</script>
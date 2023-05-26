<h3 class="blog-post-title">Kategorien</h3>
@php
    $categoriesCollection = collect($categories);
    $parentCategories = $categoriesCollection->where('level', 1);
@endphp

<input type="text" class="form-control" id="category-search" placeholder="Kategorie suchen">

<div class="card">
    <div class="card-body">
        <ul id="category-list">
            @foreach ($parentCategories as $parentCategory)
                <li class="parent-category">
                    <input type="checkbox" id="{{ $parentCategory->id }}" name="categories[{{ $parentCategory->id }}]" value="{{ $parentCategory->id }}">
                    <label for="{{ $parentCategory->id }}">{{ $parentCategory->title }}</label>
                    @include('partials.category-checkboxes', ['categories' => $categoriesCollection, 'parentId' => $parentCategory->id])
                </li>
            @endforeach
        </ul>
    </div>
</div>

<script>
    function searchCategories(searchTerm) {
        const categoryItems = document.querySelectorAll('.category-item');
        const parentCategories = document.querySelectorAll('.parent-category');

        categoryItems.forEach(function(categoryItem) {
            const label = categoryItem.querySelector('label');
            const labelText = label.textContent.toLowerCase();

            if (labelText.includes(searchTerm)) {
                categoryItem.style.display = 'block';
                categoryItem.classList.add('show');
            } else {
                categoryItem.style.display = 'none';
                categoryItem.classList.remove('show');
            }
        });

        parentCategories.forEach(function(parentCategory) {
            const childItems = parentCategory.querySelectorAll('.category-item');
            const showParent = Array.from(childItems).some(function(childItem) {
                return childItem.classList.contains('show');
            });
            parentCategory.style.display = showParent ? 'block' : 'none';
        });
    }

    const searchInput = document.getElementById('category-search');

    searchInput.addEventListener('input', function() {
        const searchTerm = this.value.toLowerCase();
        searchCategories(searchTerm);
    });

    // Initial search
    searchCategories('');
</script>
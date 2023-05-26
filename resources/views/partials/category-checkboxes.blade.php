@if ($categories->where('parentId', $parentId)->isNotEmpty())
    <ul>
        @foreach ($categories->where('parentId', $parentId) as $category)
            <li class="category-item">
                <input type="checkbox" id="{{ $category->id }}" name="categories[{{ $category->id }}]" value="{{ $category->id }}">
                <label for="{{ $category->id }}">{{ $category->title }}</label>
                @include('partials.category-checkboxes', ['categories' => $categories, 'parentId' => $category->id])
            </li>
        @endforeach
    </ul>
@endif

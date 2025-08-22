@php
    $categories = \App\Models\Category::where('status', 1)
        ->with(['subCategories.childCategories' => function ($query) {
            $query->where('status', 1);
        }])
        ->get();
 @endphp


<div class="mega__menu">
    <div class="mega__menu-inner">
        <div class="mega__menu-left border-right">
            <ul class="mega__menu-list">
                @foreach($categories as $category)
                    <li class="px-2 py-1">
                        <a href="product/{{ $category->slug }}"
                           class="tab-open"
                           data-id="{{ Str::slug($category->name, '-') }}">
                            <img class="tab-title__img title-icon__mega"
                                 src="{{ $category->image }}"
                                 alt="">
                            {{ $category->name }}
                            <span class="right-side__mega">
                                <img style="width: 100%; height: auto;"
                                     src="{{ asset('frontend/icons/right-icon.png') }}" alt="right icon">
                            </span>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>

        <div class="mega__menu-right">
            @foreach($categories as $category)
                <div class="tab-content "
                     data-id="{{ Str::slug($category->name, '-') }}">
                    <div class="mega__menu-right-inner">
                        <div class="mega__menu-content">
                            @foreach($category->subCategories as $subcategory)
                                <div class="mega__menu-item">
                                    <a class="menu__item-title"
                                       href="/product/{{ $subcategory->slug }}">{{ $subcategory->name }}</a>

                                    @foreach($subcategory->childCategories as $childcategory)
                                        <div class="mega__menu-item-inner my-2">
                                            <a href="/product/{{ $childcategory->slug }}">{{ $childcategory->name }}</a>
                                        </div>
                                    @endforeach
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <img src="/custom-assets/images/icons/mega__menu-icon.svg" alt=""
                         class="mega__menu-button-icon">
                </div>
            @endforeach
        </div>
    </div>
</div>

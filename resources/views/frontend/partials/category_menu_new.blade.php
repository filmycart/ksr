    <div style="border:0px solid red;width:650px;float:left;margin:0px;">
    @foreach (\App\Models\Category::where('level', 0)->orderBy('order_level', 'asc')->get()->take(10) as $key => $category)
        <div style="border:0px solid red;width:90px;float:left;" class="categorymenudropdown">
         <a href="{{ route('products.category', $category->slug) }}">
            <div style="border:0px solid black;width:90px;float:left;text-align:left;">
                 <img
                        class="cat-image lazyload mr-2 opacity-100"
                        src="{{ static_asset('assets/img/placeholder.jpg') }}"
                        data-src="{{ uploaded_asset($category->icon) }}"
                        width="65"
                        alt="{{ $category->getTranslation('name') }}"
                        onerror="this.onerror=null;this.src='{{ static_asset('assets/img/placeholder.jpg') }}';"
                    >
            </div>
            <div style="border:0px solid red;width:150px;float:left;text-align:left;">
                <span class="cat-name">{{ $category->getTranslation('name') }}</span>
            </div>
        </a>
            @if(count(\App\Utility\CategoryUtility::get_immediate_children_ids($category->id))>0)
                <div class="categorymenudropdown-content" style="border:0px solid red;float:left;width:100%;">
                    @foreach (\App\Models\Category::where('parent_id', $category->id)->orderBy('order_level', 'asc')->get() as $key => $sub_category)
                        <div style="border:0px solid red;float:left;width:200px;;">
                            <a href="{{ route('products.category', $sub_category->slug) }}">
                                <span class="sub-cat-name">{{ $sub_category->getTranslation('name') }}</span>
                            </a>
                            @if(count(\App\Utility\CategoryUtility::get_immediate_sub_children($sub_category->id))>0)
                                <div class="subcategorymenudropdown-content" style="border:0px solid red !important;float:left;width:100%;">
                                    @foreach (\App\Models\Category::where('parent_id', $sub_category->id)->orderBy('order_level', 'asc')->get() as $key => $sub_category)
                                        <div style="border:0px solid red;float:left;width:200px;;">
                                            <a href="{{ route('products.category', $sub_category->slug) }}">
                                                <span class="sub-sub-cat-name">{{ $sub_category->getTranslation('name') }}</span>
                                            </a>     
                                        </div>
                                    @endforeach
                                </div>
                            @endif    
                        </div>
                    @endforeach
                </div>
            @endif
    </div>
     @endforeach
 </div>



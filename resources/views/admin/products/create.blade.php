@extends('layouts.admin.main')

@section('title')
    Create product
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            @include('layouts.admin.sidebar')
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="row my-4">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header bg-white">
                                <h3 class="mt-2">Create product</h3>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('admin.products.store') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="name_en" class="my-2 form-label">Name EN (*)</label>
                                            <input type="text" name="name_en" placeholder="Name EN*"
                                                value="{{ old('name_en') }}"
                                                class="form-control @error('name_en') is-invalid @enderror" />
                                            @error('name_en')
                                            <span class="invalid-feedback">
                                                {{ $message }}
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <label for="name_fr" class="my-2 form-label">Name FR (*)</label>
                                            <input type="text" name="name_fr" placeholder="Name FR*"
                                                value="{{ old('name_fr') }}"
                                                class="form-control @error('name_fr') is-invalid @enderror" />
                                            @error('name_fr')
                                            <span class="invalid-feedback">
                                                {{ $message }}
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="qty" class="my-2 form-label">Quantity (*)</label>
                                            <input type="number" name="qty" placeholder="Quantity*"
                                                value="{{ old('qty') }}"
                                                class="form-control @error('qty') is-invalid @enderror" />
                                            @error('qty')
                                            <span class="invalid-feedback">
                                                {{ $message }}
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="category_id" class="my-2 form-label">Category (*)</label>

                                            <select name="category_id" id="category_id" class="form-select @error('category_id') is-invalid @enderror">
                                                <option value="" selected disabled>Choose a category</option>
                                                @foreach ($categories as $category)
                                                <option @if ($category->id == old('category_id')) selected @endif
                                                    value="{{ $category->id }}">{{ $category->name_en }}</option>
                                                @endforeach
                                            </select>
                                            @error('category_id')
                                            <span class="invalid-feedback">
                                                {{ $message }}
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <label for="subcategory_id" class="my-2 form-label">Subcategory (*)</label>

                                            <select name="subcategory_id" id="subcategory_id" class="form-select @error('subcategory_id') is-invalid @enderror">
                                                <option value="" selected disabled>Choose a subcategory</option>
                                                @foreach ($subcategories as $subcategory)
                                                <option @if ($subcategory->id == old('subcategory_id')) selected @endif
                                                    value="{{ $subcategory->id }}">{{ $subcategory->name_en }}</option>
                                                @endforeach
                                            </select>
                                            @error('subcategory_id')
                                            <span class="invalid-feedback">
                                                {{ $message }}
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="selling_price" class="my-2 form-label">Price (*)</label>
                                            <input type="number" name="selling_price" placeholder="Price*" value="{{ old('selling_price') }}"
                                                class="form-control @error('selling_price') is-invalid @enderror" />
                                            @error('selling_price')
                                            <span class="invalid-feedback">
                                                {{ $message }}
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="col-md-6">
                                            <label for="old_price" class="my-2 form-label">Old Price</label>
                                            <input type="number" name="old_price" placeholder="Old Price" value="{{ old('old_price') }}"
                                                class="form-control @error('old_price') is-invalid @enderror" />
                                            @error('old_price')
                                            <span class="invalid-feedback">
                                                {{ $message }}
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="desc_en" class="my-2 form-label">Description EN (*)</label>
                                            <textarea name="desc_en" cols="30" rows="10" placeholder="Description EN*" class="form-control summernote @error('desc_en') is-invalid @enderror">{{ old('desc_en') }}</textarea>
                                            @error('desc_en')
                                                <span class="invalid-feedback">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="col-md-6">
                                            <label for="desc_fr" class="my-2 form-label">Description FR (*)</label>
                                            <textarea name="desc_fr" cols="30" rows="10" placeholder="Description FR*" class="form-control summernote @error('desc_fr') is-invalid @enderror">{{ old('desc_fr') }}</textarea>
                                            @error('desc_fr')
                                                <span class="invalid-feedback">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>

                                    </div>

                                    <div class="row my-3">
                                        <div class="col-md-6">
                                            <div class="row mb-2">
                                                <div class="col-md-3">
                                                    <label for="tag_en" class="form-label">Tag EN</label>

                                                </div>
                                                <div class="col-md-9">
                                                    <input type="text" name="tag_en" class="form-control @error('tag_en') is-invalid @enderror" data-role="tagsinput" placeholder="Tags EN"
                                                    value="{{ old('tag_en') }}">
                                                    @error('tag_en')
                                                        <span class="invalid-feedback">
                                                            {{ $message }}
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="row mb-2">
                                                <div class="col-md-3">
                                                    <label for="tag_fr" class="form-label">Tag FR</label>

                                                </div>
                                                <div class="col-md-9">
                                                    <input type="text" name="tag_fr" class="form-control @error('tag_fr') is-invalid @enderror" data-role="tagsinput" placeholder="Tags FR"
                                                    value="{{ old('tag_fr') }}">
                                                    @error('tag_fr')
                                                        <span class="invalid-feedback">
                                                            {{ $message }}
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row my-3">
                                        <div class="col-md-6">
                                            <div class="row mb-2">
                                                <div class="col-md-3">
                                                    <label for="color_en" class="form-label">Color EN (*)</label>

                                                </div>
                                                <div class="col-md-9">
                                                    <input type="text" name="color_en" class="form-control @error('color_en') is-invalid @enderror" data-role="tagsinput" placeholder="Color EN*"
                                                    value="{{ old('color_en') }}">
                                                    @error('color_en')
                                                        <span class="invalid-feedback">
                                                            {{ $message }}
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="row mb-2">
                                                <div class="col-md-3">
                                                    <label for="color_fr" class="form-label">Color FR (*)</label>

                                                </div>
                                                <div class="col-md-9">
                                                    <input type="text" name="color_fr" class="form-control @error('color_fr') is-invalid @enderror" data-role="tagsinput" placeholder="Color FR*"
                                                    value="{{ old('color_fr') }}">
                                                    @error('color_fr')
                                                        <span class="invalid-feedback">
                                                            {{ $message }}
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row my-3">
                                        <div class="col-md-6">
                                            <div class="row mb-2">
                                                <div class="col-md-3">
                                                    <label for="size_en" class="form-label">Size EN</label>

                                                </div>
                                                <div class="col-md-9">
                                                    <input type="text" name="size_en" class="form-control @error('size_en') is-invalid @enderror"
                                                        data-role="tagsinput" placeholder="Size EN" value="{{ old('size_en') }}">
                                                    @error('size_en')
                                                    <span class="invalid-feedback">
                                                        {{ $message }}
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="row mb-2">
                                                <div class="col-md-3">
                                                    <label for="size_fr" class="form-label">Size FR</label>

                                                </div>
                                                <div class="col-md-9">
                                                    <input type="text" name="size_fr" class="form-control @error('size_fr') is-invalid @enderror"
                                                        data-role="tagsinput" placeholder="Size FR" value="{{ old('size_fr') }}">
                                                    @error('size_fr')
                                                    <span class="invalid-feedback">
                                                        {{ $message }}
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="product_thumbnail" class="my-2 form-label">Product Thumbnail (*)</label>
                                            <input type="file" name="product_thumbnail" id="product_thumbnail" value="{{ old('product_thumbnail') }}"
                                                class="form-control @error('product_thumbnail') is-invalid @enderror" />
                                            @error('product_thumbnail')
                                                <span class="invalid-feedback">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                            <div class="mt-2">
                                                <img src="#" id="thumbnail_preview" class="d-none img-fluid rounded mb-2" width="100" height="100">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <label for="product_image_one" class="my-2 form-label">Image 1</label>
                                            <input type="file" name="product_image_1" id="product_image_one" value="{{ old('product_image_1') }}"
                                                class="form-control @error('product_image_1') is-invalid @enderror" />
                                            @error('product_image_1')
                                                <span class="invalid-feedback">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                            <div class="mt-2">
                                                <img src="#" id="image_one_preview" class="d-none img-fluid rounded mb-2" width="100" height="100">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="product_image_two" class="my-2 form-label">Image 2</label>
                                            <input type="file" name="product_image_2" id="product_image_two" value="{{ old('product_image_2') }}"
                                                class="form-control @error('product_image_2') is-invalid @enderror" />
                                            @error('product_image_2')
                                                <span class="invalid-feedback">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                            <div class="mt-2">
                                                <img src="#" id="image_two_preview" class="d-none img-fluid rounded mb-2" width="100" height="100">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <label for="product_image_three" class="my-2 form-label">Image 3</label>
                                            <input type="file" name="product_image_3" id="product_image_three" value="{{ old('product_image_3') }}"
                                                class="form-control @error('product_image_3') is-invalid @enderror" />
                                            @error('product_image_3')
                                                <span class="invalid-feedback">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                            <div class="mt-2">
                                                <img src="#" id="image_three_preview" class="d-none img-fluid rounded mb-2" width="100" height="100">
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row my-2">
                                        <div class="col-md-12">
                                            <div class="row mb-2">

                                                <div class="col-md-3">
                                                    <div class="form-check">
                                                        <label for="new" class="form-check-label">
                                                            New
                                                        </label>
                                                        <input type="checkbox" name="new" class="form-check-input shadow-none"
                                                            @checked(old('new')) value="1" />
                                                    </div>
                                                </div>

                                                <div class="col-md-3">
                                                    <div class="form-check">
                                                        <label for="hot_deal" class="form-check-label">
                                                            Hot
                                                        </label>
                                                        <input type="checkbox" name="hot_deal" class="form-check-input shadow-none"
                                                            @checked(old('hot_deal')) value="1" />
                                                    </div>
                                                </div>

                                                <div class="col-md-3">
                                                    <div class="form-check">
                                                        <label for="best_seller" class="form-check-label">
                                                            Best seller
                                                        </label>
                                                        <input type="checkbox" name="best_seller" class="form-check-input shadow-none"
                                                            @checked(old('best_seller')) value="1" />
                                                    </div>
                                                </div>

                                                <div class="col-md-3">
                                                    <div class="form-check">
                                                        <label for="featured" class="form-check-label">
                                                            Featured
                                                        </label>
                                                        <input type="checkbox" name="featured" class="form-check-input shadow-none"
                                                            @checked(old('featured')) value="1" />
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="row my-2">
                                        <div class="col-md-12">
                                            <div class="row mb-2">

                                                <div class="col-md-4">
                                                    <div class="form-check">
                                                        <label for="status" class="form-check-label">
                                                            In stock
                                                        </label>
                                                        <input type="radio" name="status" class="form-check-input shadow-none"
                                                            @checked(old('status')) value="1" />
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-check">
                                                        <label for="status" class="form-check-label">
                                                            Out of Stock
                                                        </label>.
                                                        <input type="radio" name="status" class="form-check-input shadow-none"
                                                            @checked(old('status')) value="0" />
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="row my-2">
                                        <div class="col-md-6">
                                            <button class="btn btn-primary">
                                                Submit
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
@endsection
@section('script')
    <script>
        function readUrl(input, image) {
            if(input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById(image).classList.remove('d-none');
                    document.getElementById(image).setAttribute('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        function handleImageInputChange(input, image) {
            document.getElementById(input).addEventListener('change', function () {
            readUrl(this, image);
        });
        }

        handleImageInputChange('product_thumbnail', 'thumbnail_preview');

        handleImageInputChange('product_image_one', 'image_one_preview');

        handleImageInputChange('product_image_two', 'image_two_preview');

        handleImageInputChange('product_image_three', 'image_three_preview');

    </script>
@endsection

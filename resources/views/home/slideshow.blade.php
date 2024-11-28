<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carousel Example</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>


    <div id="carouselExampleControls" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="3500">
        <div class="carousel-inner">
            @foreach ($carouselItems as $carouselItem)
            <div class="carousel-item @if($loop->first) active @endif">
                <div class="d-flex" style="height: 500px;">
                    <div class="slide-bg" style="flex: 1; padding: 20px; color: white; display: flex; align-items: center;">
                        <div style="flex: 1;">
                            <h4 class="animate-text slide" style="margin-bottom: 20px;">
                                <a href="#" style="color: white; text-decoration: none;" target="_blank">{{ $carouselItem->title }}</a>
                            </h4>
                            <p class="content animate-text slide" style="margin: 0;">{{ $carouselItem->description }}</p>
                        </div>
                        <div class="content animate-text slide img" style="flex: 1; display: flex; align-items: center; justify-content: center;">
                            <img src="{{ asset('storage/' . $carouselItem->image_path) }}" class="d-block" alt="Slide Image" style="max-width: 100%; height: auto;">
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="carousel-indicators">
            @foreach ($carouselItems as $index => $carouselItem)
            <button type="button" data-bs-target="#carouselExampleControls" data-bs-slide-to="{{ $index }}" class="{{ $loop->first ? 'active' : '' }}" aria-current="true" aria-label="Slide {{ $index + 1 }}"></button>
            @endforeach
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>

</html>
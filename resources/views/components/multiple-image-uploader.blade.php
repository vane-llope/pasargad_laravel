@props(['images'])

@php
    $imagesArray = json_decode($images, true); 
@endphp

<style>
  .img-container {
    position: relative;
    display: inline-block;
  }

  .img-container img {
    width: 100%;
  }

  .img-container .btn-danger {
    position: absolute;
    top: 5px;
    right: 5px;
  }
</style>

<div data-role="secure-file-uploader"
  data-name="images[]" 
  data-default-photos='@json($imagesArray)' 
  data-id="images"
  data-max-size="30000" 
  data-min-size="50">
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
$(document).ready(function () {
  let $element = $('[data-role="secure-file-uploader"]');
  let $label = $("<label class='btn main-btn-color text-light mb-2'>Upload Images</label>");
  let $input = $('<input class="d-none" multiple/>');
  $element.append($label);

  let $name = $element.data('name');
  let $id = $element.data('id');
  let $maxSize = $element.data('maxSize');
  let $minSize = $element.data('minSize');
  let $defaultPhotos = $element.data('defaultPhotos');

  $input.attr("type", "file");
  $input.attr("accept", "image/*");
  $input.attr("id", $id);
  $input.attr("name", $name);
  $input.attr("min-size", $minSize);
  $input.attr("max-size", $maxSize);

  $label.append($input);
  $element.append($label);

  let $container = $('<div class="w-100 mb-3"></div>');
  $element.append($container);

  // Display existing images if $defaultPhotos is not null
  if ($defaultPhotos) {
    $defaultPhotos.forEach(photo => {
      let $imgContainer = $('<div class="img-container mb-2"></div>');
      let $img = $('<img class="w-100"/>');
      let $removeBtn = $('<button class="btn btn-danger btn-sm">Remove</button>');

      $img.attr('src', '{{ asset('storage') }}'+"/" + photo);
      $removeBtn.attr('data-photo', photo);

      $imgContainer.append($img).append($removeBtn);
      $container.append($imgContainer);
    });
  }

  $input.change(function () {
    const files = Array.from(this.files);
    files.forEach(file => {
      if (file && (file.size / 1024 > $minSize) && (file.size / 1024 < $maxSize)) {
        let reader = new FileReader();
        reader.onload = function (event) {
          let $imgContainer = $('<div class="img-container mb-2"></div>');
          let $img = $('<img class="w-100"/>');
          let $removeBtn = $('<button class="btn btn-danger btn-sm">Remove</button>');

          $img.attr('src', event.target.result);
          $removeBtn.attr('data-photo', event.target.result);

          $imgContainer.append($img).append($removeBtn);
          $container.append($imgContainer);
        }
        reader.readAsDataURL(file);
      } else {
        alert("size Error");
      }
    });
  });

  // Remove image
  $(document).on('click', '.btn-danger', function () {
    $(this).parent('.img-container').remove();
  });
});
</script>

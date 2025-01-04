@props(['image'])

<div data-role="secure-file-uploader"
data-name="image" 
data-default-photo="{{($image) ? asset('storage/'. $image) : ''}}" 
 data-id="image"
 data-max-size="3000" 
 data-min-size="50">
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script >
 $(document).ready(function () {
             let $element = $('[data-role="secure-file-uploader"]')
            //-------------elements  -  input----------------
            let $label = $("<label class='btn main-btn-color text-light mb-2'>{{__('messages.uploadImage')}}</label>")
            let $input = $('<input class="d-none"/>')
            $element.append($label)

            //get input element
            let $name = $element.data('name')
            let $id = $element.data('id')
            let $maxSize = $element.data('maxSize')
            let $minSize = $element.data('minSize')
            let $defaultImg = $element.data('defaultPhoto')
            console.log($defaultImg )

             //set input element
            $input.attr("type", "file")
            $input.attr("accept", "image/*")
            $input.attr("id", $id)
            $input.attr("name", $name)
            $input.attr("min-size", $minSize)
            $input.attr("max-size", $maxSize)

            //append input
             $label.append($input)
            $element.append($label)

          //-------------elements  -  showImage---------------- 
            let $div = $('<div  class="w-100  mb-3 "></div>')
            let $img = $('<img  class="w-100"/>')
             $img.attr('src', $defaultImg);
       //check uploaded image
           $(document).ready(() => {
           
                $('#'+$id).change(function () {
                    const file = this.files[0];
                    console.log(file);
                    if (file && (( file.size/1024)>$minSize) &&  ((file.size/1024)< $maxSize ))  {
                        let reader = new FileReader();
                        reader.onload = function (event) {
                                console.log(event.target.result);
                                 $defaultImg = event.target.result
                                 $img.attr('src', $defaultImg);
                        }
                        reader.readAsDataURL(file);
                    }
                    else{
                    alert("size Error")
                    $img.attr('src', $element.data('defaultPhoto'));
                    $input.val("")    
                }
                });
            });

            //append uploaded image
            $div.append($img)
            $element.append($div)
})

</script>